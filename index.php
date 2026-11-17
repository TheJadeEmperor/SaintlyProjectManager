<?php


function menuDropDown(string $mainName, array $dropDownMenu): void
{
    $escape = static function ($value): string {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    };
    ?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $escape($mainName) ?><b class="caret"></b></a>
        <?php renderMenuItems($dropDownMenu); ?>
    </li>
    <?php
}

function renderMenuItems(array $items): void
{
    $escape = static function ($value): string {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    };
    ?>
    <ul class="dropdown-menu">
        <?php foreach ($items as $name => $menu):
            $icon = isset($menu['icon']) ? '<i class="fa ' . $escape($menu['icon']) . '" style="' .
                (isset($menu['iconColor']) ? 'color:' . $escape($menu['iconColor']) . '; ' : '') .
                'width: 20px; text-align: center; margin-right: 5px;"></i> ' : '';
            $href = $escape($menu['href'] ?? '#');
            $target = $escape($menu['target'] ?? '_blank');
        ?>
            <?php if (isset($menu['submenu'])): ?>
                <li class="dropdown-submenu">
                    <a tabindex="-1" href="<?= $href ?>" target="<?= $target ?>" rel="noopener noreferrer"><?= $icon . $escape($name) ?></a>
                    <?php renderMenuItems($menu['submenu']); ?>
                </li>
            <?php else: ?>
                <li>
                    <a href="<?= $href ?>" target="<?= $target ?>" rel="noopener noreferrer">
                        <?= $icon . $escape($name) ?>
                        <?php if (($menu['attr'] ?? null) === 'c'): ?><b class="caret"></b><?php endif; ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (($menu['attr'] ?? null) === 'd'): ?><li class="divider"></li><?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <?php
}


    $menuFile = __DIR__ . DIRECTORY_SEPARATOR . 'menu.json';
    $menuJson = file_get_contents($menuFile);
    $menus = array();
    $menuLoadError = null;
    if ($menuJson === false) {
        $menuLoadError = 'Unable to read menu.json.';
    } else {
        try {
            $decodedMenus = json_decode($menuJson, true, 512, JSON_THROW_ON_ERROR);
            if (!is_array($decodedMenus)) {
                $menuLoadError = 'menu.json must contain an object of menu groups.';
            } else {
                $menus = $decodedMenus;
            }
        } catch (JsonException $exception) {
            $menuLoadError = 'menu.json has invalid JSON: ' . $exception->getMessage();
        }
    }

$siteNUS = 'https://ultimateneobuxstrategy.com/';
$localNUS = 'http://NeobuxUltimateStrategy.test/';

$siteBPS = 'https://bestpayingsites.com/';
$localBPS = 'http://BestPayingSites.test/';

switch ($_GET['action'] ?? '') {

    case 'menu':
        $link = 'menu.php';
        break;

    //localhost
    case 'localhost':
        $link = 'http://localhost';
        break;
  
	case 'gmail-filters':
		$link = 'https://mail.google.com/mail/u/0/?shva=1#settings/filters';
		break;
	case 'gmail-accounts':
		$link = 'https://mail.google.com/mail/u/0/?shva=1#settings/accounts';
		break;

 
    case 'archive':
        $link = 'archive/archive_links.php';
        break;
    case 'nus':
        $link = 'archive/nus_bps.php';
        break;
	case 'blog':
    case 'codeNinja': 
		$link = 'archive/code_ninja.php';
		break;

    case 'hustles': 
        $link = 'hustles.php';
        break;

    case 'rentals':
        $link = 'rentals.php';
        break;
    default:
        $link = 'hustles.php';
        break;
}
?>
<!DOCTYPE html>
<head>
    <title>Saintly Projects Manager</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="include/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="include/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css" media="screen" />    

    <link href="include/admin.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type='text/javascript' /></script> 

    <script src="include/jquery-ui/ui/jquery-ui.js"></script>
    <script src="include/bootstrap/js/bootstrap.js"></script>
    <style>
        .dropdown-submenu {
            position: relative;
        }
        .dropdown-submenu>.dropdown-menu {
            top: 0;
            border-radius: 0 6px 6px 6px;
            left: 100%;
            margin-left: -1px;
            margin-top: -6px;
            moz-border-radius: 0 6px 6px 6px;
            webkit-border-radius: 0 6px 6px 6px;
        }
        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }
        .dropdown-submenu>a:after {
            border-color: transparent;
            border-left-color: #cccccc;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            content: " ";
            display: block;
            float: right;
            height: 0;
            margin-right: -10px;
            margin-top: 5px;
            width: 0;
        }
        .dropdown-submenu:hover>a:after {
            border-left-color: #ffffff;
        }
        .dropdown-submenu.pull-left {
            float: none;
        }
        .dropdown-submenu.pull-left>.dropdown-menu {
            border-radius: 6px 0 6px 6px;
            left: -100%;
            margin-left: 10px;
            moz-border-radius: 6px 0 6px 6px;
            webkit-border-radius: 6px 0 6px 6px;
        }
      
    </style>
</head>
<body class="spm-shell">

    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?action=db">SPM</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"  id="main-menu">
                     
<?php foreach ($menus as $menuTitle => $menuItems): ?>
                    <?php menuDropDown($menuTitle, $menuItems); ?>
                <?php endforeach; ?>    

             
                </ul><!--navbar-->
                <ul class="nav navbar-nav">
                    <li><a href="?action=menu">Edit Menu</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="URL" value="<?= $link ?>" onclick="this.select();" size="40" readonly>
                            </div>
                        </form>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right theme-toggle" aria-label="Color theme">
                    <li>
                        <button type="button" class="theme-toggle-button" id="theme-light" aria-label="Light mode" title="Light mode" aria-pressed="true">
                            <i class="fa fa-sun-o" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="theme-toggle-button" id="theme-dark" aria-label="Dark mode" title="Dark mode" aria-pressed="false">
                            <i class="fa fa-moon-o" aria-hidden="true"></i>
                        </button>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
            <?php if ($menuLoadError !== null): ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($menuLoadError, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>
                    <a href="?action=menu">Open the menu editor to fix it.</a>
                </div>
            <?php endif; ?>
        </div><!-- /.container-fluid -->
    </nav>
    <?php
        echo '<iframe class="spm-content-frame" src="' . $link . '"></iframe>';
    ?>
    <script>
        (function () {
            var lightButton = document.getElementById('theme-light');
            var darkButton = document.getElementById('theme-dark');
            var frame = document.querySelector('iframe');
            var theme = localStorage.getItem('spm-theme') === 'dark' ? 'dark' : 'light';

            function applyTheme(selectedTheme) {
                theme = selectedTheme;
                document.body.setAttribute('data-theme', theme);
                lightButton.setAttribute('aria-pressed', theme === 'light' ? 'true' : 'false');
                darkButton.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
                localStorage.setItem('spm-theme', theme);

                var frameDocument = frame.contentDocument;
                if (frameDocument && frameDocument.body) {
                    frameDocument.body.setAttribute('data-theme', theme);
                }
            }

            lightButton.addEventListener('click', function () {
                applyTheme('light');
            });
            darkButton.addEventListener('click', function () {
                applyTheme('dark');
            });
            frame.addEventListener('load', function () {
                applyTheme(theme);
            });

            applyTheme(theme);
        }());
    </script>
</body>
</html>