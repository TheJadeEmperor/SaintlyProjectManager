<?php

//software
$gmailFilterEditor = 'http://localhost//gmail_filters/'; 
$fileSizeTree = 'http://localhost//fileSizeTree/';
$gmailPurgeScripts = 'https://drive.google.com/drive/folders/1usncxY8h4s0JMsqYz9MuXAuMWx3P0csg?usp=sharing';

//co-hosting
$trello2026 = 'https://trello.com/b/lx8xpiWr/2026-goals';
$trelloLBS = 'https://trello.com/b/9NK1LyNF/prop-mgr-for-lbs';
$trelloDailyOps = 'https://trello.com/b/7LFdgACm/lbs-daily-operations';

//finance
$ccc = 'https://www.notion.so/Crap-Credit-Cards-2eee540782c180688ae5d744f91d1cca';

$utilityBills = 'https://www.notion.so/315e540782c1803ab64dd61f5b0566bb?v=315e540782c180df8432000cc109da2f';

$otherFinance = 'https://www.notion.so/2efe540782c180f2b770f9802638b8a0?v=2efe540782c18053b39b000c59572d94';


//fanservice
$fanService = 'http://localhost/FanService/?page=goat';

$hwBrowser = 'http://localhost/HomeworkProject/';

$messyMem = 'https://docs.google.com/spreadsheets/d/1dYrlhVLcF45OM81Scg_y5DH9eE2J9KUc/edit?gid=1173786652#gid=1173786652';

$dada = 'http://localhost//dancingDamsels/';


$menus = array(
    'Documents' => array(
        'Document Center' => array('href' => 'plaid.php'),
        'Loser Loans' => array('href' => 'https://app.notion.com/p/Loser-Loans-332e540782c180fba65dda63b5d0633c'),
    ),
    'Co-hosting' => array(
        'Cohosting' => array('href' => 'http://saintlyprojectmanager.test/?action=rentals'),
        'Trello 2026 Goals' => array('href' => $trello2026 ),
        'Trello LBS Tasks' => array('href' => $trelloLBS ),
        'LBS Daily Ops' => array('href' => $trelloDailyOps ),
    ),
    'Finances' => array(
        'Banking Balances' => array('href' => 'plaid.php'),
        'Crap Credit Cards' => array('href' => 'https://www.notion.so/Crap-Credit-Cards-2eee540782c180688ae5d744f91d1cca'),
        'Utility Bills' => array('href' => 'https://www.notion.so/315e540782c1803ab64dd61f5b0566bb?v=315e540782c180df8432000cc109da2f'),
        'Other Finance' => array('href' => 'https://www.notion.so/2efe540782c180f2b770f9802638b8a0?v=2efe540782c18053b39b000c59572d94'),
    ),
    'Software' => array(
        'Gmail Filter Editor' => array('href' => $gmailFilterEditor ),
        'Gmail Filters' => array('href' => 'https://mail.google.com/mail/u/0/#settings/filters'),
        'Purge Gmail Scripts' => array('href' => 'https://drive.google.com/drive/folders/1usncxY8h4s0JMsqYz9MuXAuMWx3P0csg?usp=sharing'), 
        'File Size Tree' => array('href' => $fileSizeTree)
    ),
    'Fan Service' => array(
        'Fan Service' => array('href' => $fanService),
        'Homework Browser' => array('href' => $hwBrowser),
        'Messy Mem' => array('href' => $messyMem),
        'Dancing Damsels' => array('href' => $dada),
    ),
);


function renderAtlantisMenu(array $menus): void
{
    $escape = static function (string $value): string {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    };
    ?>
    <nav class="navbar navbar-default atlantis-navbar" aria-label="Main menu">
        <header class="atlantis-welcome">
            <a class="navbar-brand" href="./">Atlantis</a>
        </header>
        <ul class="nav navbar-nav">
            <?php foreach ($menus as $name => $items): ?>
                <li>
                    <details class="atlantis-dropdown">
                        <summary><?= $escape($name) ?> <b class="caret"></b></summary>
                        <ul class="dropdown-menu">
                            <?php foreach ($items as $itemName => $item): ?>
                                <li>
                                    <a href="<?= $escape($item['href']) ?>" target="_blank" rel="noopener noreferrer">
                                        <?= $escape($itemName) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </details>
                </li>
                <?php endforeach; ?>
        </ul>
    </nav>
    <?php
}