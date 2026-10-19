<?php
declare(strict_types=1);

$isHttps = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== '' && $_SERVER['HTTPS'] !== 'off';
ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');
session_set_cookie_params([
    'httponly' => true,
    'secure' => $isHttps,
    'samesite' => 'Lax',
]);
session_start();

header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: no-referrer');

if (!isset($_SESSION['plaid_csrf_token'])) {
    $_SESSION['plaid_csrf_token'] = bin2hex(random_bytes(32));
}

class PlaidApiException extends RuntimeException
{
}

function sendJson(array $body, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($body, JSON_THROW_ON_ERROR);
    exit;
}

function plaidRequest(string $endpoint, array $payload): array
{
    global $clientID, $secret, $plaidBaseUrl;

    if (!extension_loaded('curl')) {
        throw new RuntimeException('The PHP cURL extension is required to connect to Plaid.');
    }
    if (!isset($clientID, $secret) || !is_string($clientID) || !is_string($secret) || $clientID === '' || $secret === '') {
        throw new RuntimeException('Plaid client credentials are missing from banking/config.php.');
    }

    $payload['client_id'] = $clientID;
    $payload['secret'] = $secret;

    $curl = curl_init($plaidBaseUrl . $endpoint);
    if ($curl === false) {
        throw new RuntimeException('Could not initialize the Plaid connection.');
    }

    curl_setopt_array($curl, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload, JSON_THROW_ON_ERROR),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_TIMEOUT => 30,
    ]);

    $response = curl_exec($curl);
    $curlError = curl_error($curl);
    $status = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if ($response === false) {
        throw new RuntimeException('Could not connect to Plaid: ' . $curlError);
    }

    try {
        $data = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    } catch (JsonException $exception) {
        throw new RuntimeException('Plaid returned an unreadable response.', 0, $exception);
    }

    if (!is_array($data)) {
        throw new RuntimeException('Plaid returned an unexpected response.');
    }
    if ($status < 200 || $status >= 300) {
        $errorCode = isset($data['error_code']) && is_string($data['error_code']) ? $data['error_code'] : 'UNKNOWN_ERROR';
        $errorMessage = isset($data['error_message']) && is_string($data['error_message'])
            ? $data['error_message']
            : 'Plaid could not complete the request.';
        throw new PlaidApiException($errorCode . ': ' . $errorMessage);
    }

    return $data;
}

function plaidBaseUrl(): string
{
    $environment = getenv('PLAID_ENV') ?: 'production';
    $urls = [
        'sandbox' => 'https://sandbox.plaid.com',
        'development' => 'https://development.plaid.com',
        'production' => 'https://production.plaid.com',
    ];

    if (!isset($urls[$environment])) {
        throw new RuntimeException('PLAID_ENV must be sandbox, development, or production.');
    }

    return $urls[$environment];
}

function plaidTokenStorePath(string $bank = 'chase'): string
{
    global $clientID;

    if (!in_array($bank, ['chase', 'td', 'capital_one'], true)) {
        throw new InvalidArgumentException('Unsupported bank connection.');
    }

    $privateDirectory = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'plaid-private';
    $tokenKey = $bank === 'chase' ? $clientID : $clientID . ':' . $bank;
    return $privateDirectory . DIRECTORY_SEPARATOR . hash('sha256', $tokenKey) . '.json';
}

function savePlaidAccessToken(string $accessToken, string $bank = 'chase'): void
{
    global $clientID, $secret;

    if (!extension_loaded('openssl')) {
        throw new RuntimeException('The PHP OpenSSL extension is required to store the Plaid connection securely.');
    }

    $path = plaidTokenStorePath($bank);
    $directory = dirname($path);
    if (!is_dir($directory) && !mkdir($directory, 0700, true) && !is_dir($directory)) {
        throw new RuntimeException('Could not create the private Plaid token directory.');
    }

    $nonce = random_bytes(12);
    $tag = '';
    $key = hash('sha256', $clientID . ':' . $secret, true);
    $ciphertext = openssl_encrypt($accessToken, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $nonce, $tag, $clientID, 16);
    if ($ciphertext === false) {
        throw new RuntimeException('Could not encrypt the Plaid access token.');
    }

    $storedToken = json_encode([
        'nonce' => base64_encode($nonce),
        'tag' => base64_encode($tag),
        'ciphertext' => base64_encode($ciphertext),
    ], JSON_THROW_ON_ERROR);
    $handle = fopen($path, 'c+b');
    if ($handle === false) {
        throw new RuntimeException('Could not open the private Plaid token file.');
    }

    try {
        if (!flock($handle, LOCK_EX) || !ftruncate($handle, 0) || fwrite($handle, $storedToken) !== strlen($storedToken)) {
            throw new RuntimeException('Could not persist the Plaid connection.');
        }
        fflush($handle);
    } finally {
        fclose($handle);
    }
}

function loadPlaidAccessToken(string $bank = 'chase'): ?string
{
    global $clientID, $secret;

    $path = plaidTokenStorePath($bank);
    if (!is_file($path)) {
        return null;
    }
    if (!extension_loaded('openssl')) {
        throw new RuntimeException('The PHP OpenSSL extension is required to read the Plaid connection.');
    }

    $handle = fopen($path, 'rb');
    if ($handle === false) {
        throw new RuntimeException('Could not read the private Plaid token file.');
    }

    try {
        if (!flock($handle, LOCK_SH)) {
            throw new RuntimeException('Could not lock the private Plaid token file.');
        }
        $contents = stream_get_contents($handle);
    } finally {
        fclose($handle);
    }
    if (!is_string($contents)) {
        throw new RuntimeException('Could not read the private Plaid token file.');
    }

    try {
        $storedToken = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
    } catch (JsonException $exception) {
        throw new RuntimeException('The stored Plaid connection is unreadable.', 0, $exception);
    }
    if (!is_array($storedToken)
        || !isset($storedToken['nonce'], $storedToken['tag'], $storedToken['ciphertext'])
        || !is_string($storedToken['nonce'])
        || !is_string($storedToken['tag'])
        || !is_string($storedToken['ciphertext'])) {
        throw new RuntimeException('The stored Plaid connection is incomplete.');
    }

    $nonce = base64_decode($storedToken['nonce'], true);
    $tag = base64_decode($storedToken['tag'], true);
    $ciphertext = base64_decode($storedToken['ciphertext'], true);
    if ($nonce === false || strlen($nonce) !== 12 || $tag === false || strlen($tag) !== 16 || $ciphertext === false) {
        throw new RuntimeException('The stored Plaid connection is invalid.');
    }

    $key = hash('sha256', $clientID . ':' . $secret, true);
    $accessToken = openssl_decrypt($ciphertext, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $nonce, $tag, $clientID);
    if ($accessToken === false || $accessToken === '') {
        throw new RuntimeException('Could not decrypt the stored Plaid connection. Check that the Plaid credentials have not changed.');
    }

    return $accessToken;
}

require_once __DIR__ . DIRECTORY_SEPARATOR . 'config.php';
$action = $_GET['action'] ?? null;
if ($action !== null) {
    try {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            sendJson(['error' => 'Use POST for Plaid requests.'], 405);
        }

        $csrfToken = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
        if (!is_string($csrfToken) || !hash_equals($_SESSION['plaid_csrf_token'], $csrfToken)) {
            sendJson(['error' => 'Your session has expired. Reload the page and try again.'], 403);
        }

        $requestBody = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
        if (!is_array($requestBody)) {
            sendJson(['error' => 'The request body must be a JSON object.'], 400);
        }

        $plaidBaseUrl = plaidBaseUrl();

        if ($action === 'create_link_token') {
            $bank = $requestBody['bank'] ?? 'chase';
            if (!is_string($bank) || !in_array($bank, ['chase', 'td', 'capital_one'], true)) {
                sendJson(['error' => 'Select a supported bank connection.'], 400);
            }

            $clientUserId = $_SESSION['plaid_client_user_id'] ?? null;
            if (!is_string($clientUserId)) {
                $clientUserId = bin2hex(random_bytes(16));
                $_SESSION['plaid_client_user_id'] = $clientUserId;
            }

            $linkToken = plaidRequest('/link/token/create', [
                'client_name' => 'Saintly Project Manager',
                'country_codes' => ['US'],
                'language' => 'en',
                'products' => ['auth', 'liabilities'],
                'user' => ['client_user_id' => $clientUserId],
            ]);

            if (!isset($linkToken['link_token']) || !is_string($linkToken['link_token'])) {
                throw new RuntimeException('Plaid did not return a link token.');
            }
            sendJson(['link_token' => $linkToken['link_token']]);
        }

        if ($action === 'exchange_public_token') {
            $bank = $requestBody['bank'] ?? 'chase';
            if (!is_string($bank) || !in_array($bank, ['chase', 'td', 'capital_one'], true)) {
                sendJson(['error' => 'Select a supported bank connection.'], 400);
            }

            $publicToken = $requestBody['public_token'] ?? null;
            if (!is_string($publicToken) || $publicToken === '') {
                sendJson(['error' => 'A Plaid public token is required.'], 400);
            }

            $tokenResponse = plaidRequest('/item/public_token/exchange', [
                'public_token' => $publicToken,
            ]);
            if (!isset($tokenResponse['access_token']) || !is_string($tokenResponse['access_token'])) {
                throw new RuntimeException('Plaid did not return an access token.');
            }

            savePlaidAccessToken($tokenResponse['access_token'], $bank);
            sendJson(['connected' => true, 'bank' => $bank]);
        }

        if ($action === 'get_balance') {
            $bank = $requestBody['bank'] ?? 'chase';
            if (!is_string($bank) || !in_array($bank, ['chase', 'td', 'capital_one'], true)) {
                sendJson(['error' => 'Select a supported bank connection.'], 400);
            }

            $accessToken = loadPlaidAccessToken($bank);
            if ($bank === 'chase' && $accessToken === null && is_string($_SESSION['plaid_access_token'] ?? null)) {
                $accessToken = $_SESSION['plaid_access_token'];
                savePlaidAccessToken($accessToken, $bank);
            }
            if ($accessToken === null) {
                sendJson(['error' => 'Connect this bank account before requesting a balance.'], 400);
            }

            $balanceResponse = plaidRequest('/accounts/balance/get', [
                'access_token' => $accessToken,
            ]);
            $liabilityLimits = [];
            if ($bank === 'capital_one') {
                $needsLiabilityLimits = false;
                foreach (($balanceResponse['accounts'] ?? []) as $account) {
                    if (!is_array($account) || ($account['type'] ?? null) !== 'credit') {
                        continue;
                    }

                    $balances = is_array($account['balances'] ?? null) ? $account['balances'] : [];
                    if (!is_numeric($balances['limit'] ?? null)) {
                        $needsLiabilityLimits = true;
                        break;
                    }
                }

                if ($needsLiabilityLimits) {
                    $liabilitiesResponse = plaidRequest('/liabilities/get', [
                        'access_token' => $accessToken,
                    ]);
                    foreach (($liabilitiesResponse['accounts'] ?? []) as $liabilityAccount) {
                        if (!is_array($liabilityAccount)
                            || !is_string($liabilityAccount['account_id'] ?? null)) {
                            continue;
                        }

                        $liabilityBalances = is_array($liabilityAccount['balances'] ?? null)
                            ? $liabilityAccount['balances']
                            : [];
                        if (is_numeric($liabilityBalances['limit'] ?? null)) {
                            $liabilityLimits[$liabilityAccount['account_id']] = (float) $liabilityBalances['limit'];
                        }
                    }
                }

                $needsAccountLimits = false;
                foreach (($balanceResponse['accounts'] ?? []) as $account) {
                    if (!is_array($account) || ($account['type'] ?? null) !== 'credit') {
                        continue;
                    }

                    $balances = is_array($account['balances'] ?? null) ? $account['balances'] : [];
                    $accountId = $account['account_id'] ?? '';
                    if (!is_numeric($balances['limit'] ?? null)
                        && !isset($liabilityLimits[$accountId])) {
                        $needsAccountLimits = true;
                        break;
                    }
                }

                if ($needsAccountLimits) {
                    $accountsResponse = plaidRequest('/accounts/get', [
                        'access_token' => $accessToken,
                    ]);
                    foreach (($accountsResponse['accounts'] ?? []) as $account) {
                        if (!is_array($account) || !is_string($account['account_id'] ?? null)) {
                            continue;
                        }

                        $balances = is_array($account['balances'] ?? null) ? $account['balances'] : [];
                        if (is_numeric($balances['limit'] ?? null)
                            && !isset($liabilityLimits[$account['account_id']])) {
                            $liabilityLimits[$account['account_id']] = (float) $balances['limit'];
                        }
                    }
                }
            }

            $accounts = [];
            foreach (($balanceResponse['accounts'] ?? []) as $account) {
                if (!is_array($account)) {
                    continue;
                }

                $balances = is_array($account['balances'] ?? null) ? $account['balances'] : [];
                $type = is_string($account['type'] ?? null) ? strtolower($account['type']) : 'other';
                $subtype = is_string($account['subtype'] ?? null) ? strtolower($account['subtype']) : null;
                $accountName = is_string($account['official_name'] ?? null) && $account['official_name'] !== ''
                    ? $account['official_name']
                    : (is_string($account['name'] ?? null) ? $account['name'] : 'Account');

                $creditBalance = $type === 'credit'
                    ? ($balances['current'] ?? $balances['available'] ?? null)
                    : null;
                $creditLimit = null;
                if ($type === 'credit') {
                    $creditLimit = is_numeric($balances['limit'] ?? null)
                        ? $balances['limit']
                        : ($liabilityLimits[$account['account_id'] ?? ''] ?? null);

                    if ($bank === 'capital_one') {
                        $normalizedName = strtolower($accountName);
                        if (str_contains($normalizedName, 'savor')) {
                            $creditLimit = 5000;
                        } elseif (str_contains($normalizedName, 'venture')) {
                            $creditLimit = 17000;
                        }
                    }
                }
                $amount = $type === 'credit'
                    ? $creditBalance
                    : ($balances['available'] ?? $balances['current'] ?? $balances['limit'] ?? null);

                $accounts[] = [
                    'name' => $accountName,
                    'mask' => is_string($account['mask'] ?? null) ? $account['mask'] : '',
                    'balance' => is_numeric($amount) ? (float) $amount : null,
                    'limit' => is_numeric($creditLimit) ? (float) $creditLimit : null,
                    'currency' => is_string($balances['iso_currency_code'] ?? null)
                        ? $balances['iso_currency_code']
                        : null,
                    'type' => $type,
                    'subtype' => $subtype,
                    'bank' => $bank,
                ];
            }

            usort($accounts, static function (array $left, array $right): int {
                $leftLabel = is_string($left['name'] ?? null) ? strtolower($left['name']) : '';
                $rightLabel = is_string($right['name'] ?? null) ? strtolower($right['name']) : '';
                return strcmp($leftLabel, $rightLabel);
            });

            sendJson(['accounts' => $accounts]);
        }

        sendJson(['error' => 'Unknown Plaid action.'], 404);
    } catch (PlaidApiException $exception) {
        sendJson(['error' => $exception->getMessage()], 502);
    } catch (JsonException $exception) {
        sendJson(['error' => 'The request body must be valid JSON.'], 400);
    } catch (Throwable $exception) {
        error_log('Plaid banking error: ' . $exception->getMessage());
        sendJson(['error' => 'Unable to complete the Plaid request. Check the server error log for details.'], 500);
    }
}

$csrfToken = htmlspecialchars($_SESSION['plaid_csrf_token'], ENT_QUOTES, 'UTF-8');
$isChaseConnected = is_file(plaidTokenStorePath('chase')) || isset($_SESSION['plaid_access_token']);
$isTdConnected = is_file(plaidTokenStorePath('td'));
$isCapitalOneConnected = is_file(plaidTokenStorePath('capital_one'));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account balances</title>
    <script src="https://cdn.plaid.com/link/v2/stable/link-initialize.js"></script>
    <style>
        body { background: #f4f6f8; color: #17212b; font: 16px/1.5 system-ui, sans-serif; margin: 0; padding: 2rem 1rem; }
        main { background: #fff; border-radius: 12px; box-shadow: 0 4px 20px #17212b12; margin: 0 auto; max-width: 980px; padding: 2rem; }
        h1 { font-size: 1.6rem; margin-top: 0; }
        button { background: #146c5a; border: 0; border-radius: 6px; color: #fff; cursor: pointer; font: inherit; font-weight: 600; margin: .5rem .5rem .5rem 0; padding: .7rem 1rem; }
        button:disabled { cursor: wait; opacity: .65; }
        .accounts-layout { display: grid; grid-template-columns: minmax(0, 1.7fr) minmax(220px, 1fr); gap: 1.5rem; align-items: start; }
        #status { min-height: 1.5em; }
        #error { color: #a12622; }
        .account-list { display: grid; gap: .75rem; }
        .account { border: 1px solid #e2e7eb; border-radius: 10px; padding: 1rem; background: #f9fbfc; }
        .account.primary { background: #edf9f6; border-color: #bfe5d8; }
        .account-header { display: flex; justify-content: space-between; gap: 1rem; align-items: center; }
        .account-name { font-weight: 600; }
        .account-tag { color: #146c5a; background: #dff5ee; border-radius: 999px; font-size: .72rem; font-weight: 700; letter-spacing: .04em; padding: .35rem .6rem; text-transform: uppercase; }
        .balance { font-size: 1.5rem; font-weight: 700; margin: .25rem 0 0; }
        .note { color: #53616d; font-size: .9rem; }
        .sidebar { background: #f5f8fa; border: 1px solid #e0e8ee; border-radius: 10px; padding: 1rem; }
        .sidebar h2 { font-size: 1rem; margin: 0 0 .75rem; }
        .sidebar-list { display: grid; gap: .75rem; }
        .sidebar-item { border-top: 1px solid #dfe7ee; padding-top: .75rem; }
        .sidebar-item:first-child { border-top: 0; padding-top: 0; }
        .sidebar-item .name { font-weight: 600; }
        .sidebar-item .meta { color: #53616d; font-size: .82rem; }
        @media (max-width: 760px) { .accounts-layout { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
<main>
    <h1>Account balances</h1>
    <p>Securely connect your Chase, TD Bank, and Capital One accounts with Plaid to view their balances, including credit cards.</p>
    <button id="connect-chase" type="button">Connect to Plaid</button>
    <button id="connect-td" type="button">Connect a TD Bank account</button>
    <button id="connect-capital-one" type="button">Connect to Capital One</button>
    <?php if ($isChaseConnected || $isTdConnected || $isCapitalOneConnected): ?>
        <button id="refresh" type="button">Refresh balances</button>
    <?php endif; ?>
    <p id="status" role="status" aria-live="polite"></p>
    <p id="error" role="alert"></p>
    <div class="accounts-layout">
        <section id="accounts" class="account-list" aria-label="Linked account balances"></section>
        <aside id="sidebar" class="sidebar" aria-label="Other linked accounts">
            <h2>Other linked accounts</h2>
            <div id="sidebar-list" class="sidebar-list"></div>
        </aside>
    </div>
    <p class="note">Refreshing requests the latest balances from your bank through Plaid. Your encrypted Plaid connection is stored on this server, so you should not need to reconnect just because your browser session expires.</p>
</main>
<script>
    const csrfToken = <?= json_encode($csrfToken, JSON_THROW_ON_ERROR) ?>;
    const connectChaseButton = document.getElementById('connect-chase');
    const connectTdButton = document.getElementById('connect-td');
    const connectCapitalOneButton = document.getElementById('connect-capital-one');
    const refreshButton = document.getElementById('refresh');
    const connectedBanks = <?= json_encode([
        'chase' => $isChaseConnected,
        'td' => $isTdConnected,
        'capital_one' => $isCapitalOneConnected,
    ], JSON_THROW_ON_ERROR) ?>;
    const statusElement = document.getElementById('status');
    const errorElement = document.getElementById('error');
    const accountsElement = document.getElementById('accounts');
    const sidebarListElement = document.getElementById('sidebar-list');

    async function postAction(action, payload = {}) {
        const response = await fetch(`?action=${encodeURIComponent(action)}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': csrfToken
            },
            body: JSON.stringify(payload)
        });
        const result = await response.json();
        if (!response.ok) {
            throw new Error(result.error || 'The request failed.');
        }
        return result;
    }

    function setBusy(isBusy, message = null) {
        connectChaseButton.disabled = isBusy;
        connectTdButton.disabled = isBusy;
        connectCapitalOneButton.disabled = isBusy;
        if (refreshButton) refreshButton.disabled = isBusy;
        if (message !== null) statusElement.textContent = message;
        if (isBusy) errorElement.textContent = '';
    }

    function formatCurrency(value, currency) {
        if (value === null) return 'Balance unavailable';
        if (currency) {
            return new Intl.NumberFormat(undefined, {
                style: 'currency',
                currency
            }).format(value);
        }
        return value.toFixed(2);
    }

    function formatBalance(account) {
        if (account.type === 'credit') {
            if (account.balance === null && account.limit === null) {
                return 'Balance unavailable';
            }
            const balanceText = account.balance === null ? '—' : formatCurrency(account.balance, account.currency);
            const limitText = account.limit === null ? '—' : formatCurrency(account.limit, account.currency);
            return `${balanceText} / ${limitText}`;
        }

        return formatCurrency(account.balance, account.currency);
    }

    function displayAccounts(accounts) {
        accountsElement.replaceChildren();
        sidebarListElement.replaceChildren();

        if (accounts.length === 0) {
            statusElement.textContent = 'No linked account was returned. Check the selected accounts in Plaid and try again.';
            return;
        }

        statusElement.textContent = '';

        const orderedAccounts = [...accounts].sort((left, right) => {
            const typeOrder = (account) => account.type === 'depository' ? 0 : account.type === 'credit' ? 1 : 2;
            const bankOrder = (account) => account.bank === 'chase' ? 0 : account.bank === 'td' ? 1 : account.bank === 'capital_one' ? 2 : 3;
            const capitalOneCardOrder = (account) => {
                if (account.bank !== 'capital_one') return 0;
                const name = account.name.toLowerCase();
                return name.includes('savor') ? 0 : name.includes('venture') ? 1 : 2;
            };
            return typeOrder(left) - typeOrder(right)
                || bankOrder(left) - bankOrder(right)
                || capitalOneCardOrder(left) - capitalOneCardOrder(right)
                || left.name.localeCompare(right.name);
        });

        for (const account of orderedAccounts) {
            const article = document.createElement('article');
            const isPrimary = account.type === 'depository';
            const bankName = account.bank === 'td' ? 'TD Bank' : account.bank === 'capital_one' ? 'Capital One' : 'Chase';
            article.className = `account${isPrimary ? ' primary' : ''}`;

            const header = document.createElement('div');
            header.className = 'account-header';

            const name = document.createElement('div');
            name.className = 'account-name';
            name.textContent = account.mask ? `${account.name} **** ${account.mask}` : account.name;

            const tag = document.createElement('span');
            tag.className = 'account-tag';
            tag.textContent = account.type === 'credit' ? 'Credit card' : account.subtype === 'checking' ? 'Checking' : (account.subtype || account.type || 'Account');
            header.append(name, tag);

            const detail = document.createElement('div');
            detail.className = 'note';
            detail.textContent = account.type === 'credit'
                ? `${bankName} credit card`
                : account.type === 'depository'
                    ? `${bankName} ${account.subtype === 'checking' ? 'checking' : (account.subtype || 'deposit')} account`
                    : `${bankName} ${account.subtype || account.type || 'account'}`;

            const balance = document.createElement('p');
            balance.className = 'balance';
            balance.textContent = formatBalance(account);

            article.append(header, detail, balance);
            accountsElement.append(article);
        }

        const otherAccountsList = orderedAccounts.filter((account) => account.type !== 'depository');
        for (const account of otherAccountsList) {
            const item = document.createElement('div');
            item.className = 'sidebar-item';

            const name = document.createElement('div');
            name.className = 'name';
            name.textContent = account.mask ? `${account.name} **** ${account.mask}` : account.name;

            const meta = document.createElement('div');
            meta.className = 'meta';
            const bankName = account.bank === 'td' ? 'TD Bank' : account.bank === 'capital_one' ? 'Capital One' : 'Chase';
            meta.textContent = `${bankName} ${account.type === 'credit' ? 'credit card' : (account.subtype || account.type || 'account')} • ${formatBalance(account)}`;

            item.append(name, meta);
            sidebarListElement.append(item);
        }
    }

    async function loadBalance() {
        setBusy(true, 'Loading balance...');
        try {
            const banks = Object.keys(connectedBanks).filter((bank) => connectedBanks[bank]);
            if (banks.length === 0) {
                displayAccounts([]);
                statusElement.textContent = 'Connect a Chase, TD Bank, or Capital One account to view balances.';
                return;
            }

            const results = await Promise.all(banks.map((bank) => postAction('get_balance', { bank })));
            displayAccounts(results.flatMap((result) => result.accounts));
        } catch (error) {
            statusElement.textContent = '';
            errorElement.textContent = error.message;
        } finally {
            setBusy(false);
        }
    }

    async function connectBank(bank, bankName) {
        setBusy(true, `Opening Plaid to connect ${bankName}...`);
        try {
            if (!window.Plaid) {
                throw new Error('Plaid Link did not load. Check your connection and reload the page.');
            }
            const result = await postAction('create_link_token', { bank });
            const handler = window.Plaid.create({
                token: result.link_token,
                onSuccess: async (publicToken) => {
                    setBusy(true, `Connecting ${bankName}...`);
                    try {
                        await postAction('exchange_public_token', { public_token: publicToken, bank });
                        window.location.reload();
                    } catch (error) {
                        setBusy(false, '');
                        errorElement.textContent = error.message;
                    }
                },
                onExit: (error) => {
                    setBusy(false, '');
                    if (error) errorElement.textContent = error.display_message || error.error_message || 'Plaid Link was closed.';
                }
            });
            setBusy(false, '');
            handler.open();
        } catch (error) {
            setBusy(false, '');
            errorElement.textContent = error.message;
        }
    }

    connectChaseButton.addEventListener('click', () => connectBank('chase', 'Chase'));
    connectTdButton.addEventListener('click', () => connectBank('td', 'TD Bank'));
    connectCapitalOneButton.addEventListener('click', () => connectBank('capital_one', 'Capital One'));

    if (refreshButton) {
        refreshButton.addEventListener('click', loadBalance);
    }
    loadBalance();
</script>
</body>
</html>