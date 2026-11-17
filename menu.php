<?php
session_start();

$menuFile = __DIR__ . DIRECTORY_SEPARATOR . 'menu.json';
$menuJson = file_get_contents($menuFile);
if ($menuJson === false) {
    throw new RuntimeException('Unable to read the main menu JSON file.');
}

if (!isset($_SESSION['menu_editor_token'])) {
    $_SESSION['menu_editor_token'] = bin2hex(random_bytes(32));
}

$errors = array();
$saved = false;

function isValidMenuHref(string $href): bool
{
    $href = trim($href);
    if ($href === '' || preg_match('/[\x00-\x1F\x7F]/', $href)) {
        return false;
    }

    $parts = parse_url($href);
    if ($parts === false) {
        return false;
    }

    $scheme = strtolower($parts['scheme'] ?? '');
    return $scheme === '' || in_array($scheme, array('http', 'https', 'mailto', 'tel'), true);
}

function validateMenuItems($items, string $path, array &$errors): void
{
    if (!($items instanceof stdClass)) {
        $errors[] = $path . ' must be a JSON object.';
        return;
    }

    foreach ($items as $name => $item) {
        $itemPath = $path . ' > ' . $name;
        if (trim((string) $name) === '' || !($item instanceof stdClass)) {
            $errors[] = $itemPath . ' must have a name and a JSON object of settings.';
            continue;
        }

        if (property_exists($item, 'href')) {
            if (!is_string($item->href) || !isValidMenuHref($item->href)) {
                $errors[] = $itemPath . ' has an invalid href. Use a relative, HTTP, HTTPS, mailto, or tel link.';
            }
        } elseif (!property_exists($item, 'submenu')) {
            $errors[] = $itemPath . ' needs an href.';
        }

        if (property_exists($item, 'icon') &&
            (!is_string($item->icon) || !preg_match('/^fa-[a-zA-Z0-9-]+$/', $item->icon))) {
            $errors[] = $itemPath . ' has an invalid icon; use a Font Awesome class such as fa-home.';
        }

        if (property_exists($item, 'iconColor') &&
            (!is_string($item->iconColor) ||
                !preg_match('/^#(?:[0-9a-fA-F]{3}|[0-9a-fA-F]{4}|[0-9a-fA-F]{6}|[0-9a-fA-F]{8})$/', $item->iconColor))) {
            $errors[] = $itemPath . ' has an invalid iconColor; use a hex color such as #e05c3a.';
        }

        if (property_exists($item, 'target') &&
            (!is_string($item->target) || !in_array($item->target, array('_blank', '_self'), true))) {
            $errors[] = $itemPath . ' target must be _blank or _self.';
        }

        if (property_exists($item, 'submenu')) {
            validateMenuItems($item->submenu, $itemPath . ' submenu', $errors);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submittedToken = $_POST['token'] ?? '';
    $submittedJson = $_POST['menu_json'] ?? null;

    if (!is_string($submittedToken) || !hash_equals($_SESSION['menu_editor_token'], $submittedToken)) {
        $errors[] = 'Your form session expired. Reload this page and try again.';
    } elseif (!is_string($submittedJson)) {
        $errors[] = 'Menu JSON was not submitted.';
    } else {
        try {
            $decoded = json_decode($submittedJson, false, 512, JSON_THROW_ON_ERROR);
            if (!($decoded instanceof stdClass) || count(get_object_vars($decoded)) === 0) {
                $errors[] = 'The menu must be a non-empty JSON object of menu groups.';
            } else {
                foreach ($decoded as $groupName => $items) {
                    if (trim((string) $groupName) === '' || !($items instanceof stdClass)) {
                        $errors[] = 'Menu groups must have a name and contain a JSON object of items.';
                        continue;
                    }

                    validateMenuItems($items, 'Menu > ' . $groupName, $errors);
                }
            }
        } catch (JsonException $exception) {
            $errors[] = 'Invalid JSON: ' . $exception->getMessage();
        }

        if (!$errors) {
            try {
                $formattedJson = json_encode(
                    $decoded,
                    JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
                ) . PHP_EOL;
            } catch (JsonException $exception) {
                $errors[] = 'Unable to format the menu JSON: ' . $exception->getMessage();
            }

            if (!$errors) {
                if (file_put_contents($menuFile, $formattedJson, LOCK_EX) === false) {
                    $errors[] = 'Unable to save menu.json. Check that the web server can write to the project folder.';
                } else {
                    $menuJson = $formattedJson;
                    $saved = true;
                }
            }
        }
    }

    if (isset($submittedJson) && is_string($submittedJson) && !$saved) {
        $menuJson = $submittedJson;
    }
}

$escape = static function (string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Main Menu</title>
    <link rel="stylesheet" href="include/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="include/admin.css">
    <style>
        .menu-editor { margin: 24px auto; max-width: 1200px; }
        .menu-editor textarea { font: 14px/1.5 Consolas, Monaco, monospace; min-height: 65vh; }
        .menu-editor .alert { margin-top: 16px; }
    </style>
</head>
<body>
    <main class="container-fluid menu-editor">
        <h1>Edit Main Menu</h1>
        <p>Update the menu JSON below. Group and item order in the file is the order shown in the navigation. Items need an <code>href</code>; optional fields include <code>icon</code>, <code>iconColor</code>, <code>target</code>, and <code>attr</code>. Use a <code>submenu</code> object for nested links.</p>
        <p><a href="index.php" target="_top">Back to dashboard</a></p>

        <?php if ($saved): ?>
            <div class="alert alert-success" role="status">Menu saved.</div>
        <?php endif; ?>
        <?php if ($errors): ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $escape($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="token" value="<?= $escape($_SESSION['menu_editor_token']) ?>">
            <div class="form-group">
                <label for="menu-json">menu.json</label>
                <textarea class="form-control" id="menu-json" name="menu_json" spellcheck="false" required><?= $escape($menuJson) ?></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Validate and Save</button>
            <button class="btn btn-default" id="format-json" type="button">Format JSON</button>
        </form>
    </main>
    <script>
        document.getElementById('format-json').addEventListener('click', function () {
            var editor = document.getElementById('menu-json');
            try {
                editor.value = JSON.stringify(JSON.parse(editor.value), null, 4);
            } catch (error) {
                alert('Invalid JSON: ' + error.message);
            }
        });
    </script>
</body>
</html>
