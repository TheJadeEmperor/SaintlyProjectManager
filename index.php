<?php
function displayMenu($menu) {
    foreach($menu as $name => $url) {
        if($name == 'divider')
            $display .= '<li class="divider"></li>';
        else
            $display .= '<li><a href="'.$url['href'].'" '.$url['attr'].'>'.$name.'</a></li>';
    }
    return $display;
}

$newslHost = 'http://saintlynewsletters.test/';
$apiHost = 'http://localhost/btcAPI/';

$siteNUS = 'https://ultimateneobuxstrategy.com/';
$localNUS = 'http://NeobuxUltimateStrategy.test/';

$siteBPS = 'https://bestpayingsites.com/';
$localBPS = 'http://BestPayingSites.test/';

switch($_GET['action']) {

    //localhost
    case 'localhost':
        $link = 'http://localhost';
        break;
    case 'archive':
        $link = 'archive_links.php';
        break;
    case 'newsletters':
        $link = $newslHost;
        break;

    case 'newsl-index':
        $link = $newslHost;
        break;
    case 'newsl-all':
        $link = $newslHost.'AllSubscribers';
        break;
    case 'newsl-mms':
        $link = $newslHost.'MakeMoneySurveys';
        break;
    case 'newsl-ppb':
        $link = $newslHost.'PaypalBooster';
        break;
    case 'newsl-nus':
        $link = $newslHost.'NeobuxUltimateStrategy';
        break;
    case 'newsl-translate':
        $link = $newslHost.'TranslatorJobs';
        break;
    case 'newsl-online':
        $link = $newslHost.'OnlineJobs';
        break;
 
        
	case 'gmail-filters':
		$link = 'https://mail.google.com/mail/u/0/?shva=1#settings/filters';
		break;
	case 'gmail-accounts':
		$link = 'https://mail.google.com/mail/u/0/?shva=1#settings/accounts';
		break;

    case 'api-login': 
        $link = $apiHost;
        break;
    case 'curl': 
        $link = $apiHost .'curl.php';
        break;

    case 'splash-freereport-live':
        $link = 'https://ultimateneobuxstrategy.com/?action=freereport';
        break;
    case 'splash-freereport-local':
        $link = 'http://NeobuxUltimateStrategy.test/?action=freereport';
        break;
 
    case 'splash-ppb-live': 
        $link = 'https://bestpayingsites.com/?action=booster';
        break;
    case 'splash-ppb-local': 
        $link = 'http://localhost/bestpayingsites/?action=booster';
        break;

    case 'splash-video-live': 
        $link = 'https://bestpayingsites.com/?action=translate';
        break;
    case 'splash-video-local': 
        $link = 'http://localhost/bestpayingsites/?action=translate';
        break;

    case 'nus':
        $link = 'nus.php';
        break;
	case 'blog': 
		$link = 'blog_nus.php';
		break;
    case 'ninja': 
        $link = 'code_ninja.php';
        break;
 
	default:
        $link = 'nus.php';
}
?>
<html>
<head>
    <title>Saintly Projects Manager</title>
    <link href="include/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="include/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css" media="screen" />    
    <link href="<?= $dir ?>admin.css" rel="stylesheet" type="text/css" media="screen" />
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
<body>	
    
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

<?php

    $menuLocal = array(
        'Localhost' => array(
            'href' => 'http://localhost'),
        'phpMyAdmin' => array(
            'href' => 'http://localhost/phpmyadmin/'),
        'Account Manager' => array(
            'href' => 'http://SaintlyAccountsManager.test',
        'attr' => 'target="_BLANK"' ),
        'divider',
        'Achive Links' => array(
            'href' => '?action=archive'),
        'NUS Blog & SEO' => array(
            'href' => '?action=blog'),         
        'Code Ninja' => array(
            'href' => '?action=ninja'),
    );

?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"  id="main-menu">
                    <li class="dropdown" id="localhost">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Localhost <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           
                            <?
                            echo displayMenu($menuLocal);
                            ?>				
                        </ul>
                    </li>
                   
<?php

    $menuCohost = array(
        'Cohost Training 1' => array(
            'href' => 'https://9hlkiaj7v8uncrbvap4u.app.clientclub.net/courses/products/cc438f35-c5c8-4b4c-a626-22f513398456/categories/6bfce0bf-a058-4bc7-875e-3ae92294de6f/posts/f5e4a432-6763-4468-9b31-cd88148fa093',
            'attr' => 'target="_BLANK"'),
        'Cohost Training 2' => array( 
            'href' => 'https://9hlkiaj7v8uncrbvap4u.app.clientclub.net/courses/products/188ea491-afbb-4362-9d44-7a5bb7087670/categories/e38ec500-74e9-4005-96a1-e226d7acb1b3/posts/f4c84c72-6300-43fd-9b56-f09f1a57331e',
            'attr' => 'target="_BLANK"'), 
        'Discord' => array( 
            'href' => 'https://discord.com/channels/1247641248857198773',
            'attr' => 'target="_BLANK"'),
        );

        $menuTools = array(
            'Airdna' => array(
                'href' => 'https://www.airdna.co/',
                'attr' => 'target="_BLANK"'),
            'Pricelabs' => array(
                'href' => 'https://pricelabs.co/pricing',
                'attr' => 'target="_BLANK"'),
        );
        
        $websiteTools = array(
            'Search Console' => array(
                'href' => 'https://search.google.com/search-console?utm_source=about-page&resource_id=https://vacationrentals4ny.com/',
                'attr' => 'target="_BLANK"'),
            'UptimeRobot' => array(
                'href' => 'https://uptimerobot.com/dashboard#mainDashboard',
                'attr' => 'target="_BLANK"'),
        );
?>

                    <li id="cohost">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cohost<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?
                            echo displayMenu($menuCohost);
                            ?>

                            <li class="divider"></li>

                            <li><a href="#" target="_BLANK">Pricing Tools<b class="caret"></b></a></li>
                            <?
                            echo displayMenu($menuTools);
                            ?>
                            <li class="divider"></li>
                            <li><a href="#" target="_BLANK">Website Tools<b class="caret"></b></a></li>
                           
                            <?
                            echo displayMenu($websiteTools);
                            ?>

                        </ul>
                    </li>
					
					
					<li id="gmail">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gmail & HM<b class="caret"></b></a>
                        <ul class="dropdown-menu">
        
                            <li><a href="https://mail.google.com/mail/u/0/?shva=1#settings/accounts" target="_BLANK">gmail Accounts</a></li>
                            <li><a href="https://mail.google.com/mail/u/0/?shva=1#settings/filters" target="_BLANK">gmail Filters</a></li>
							
							<li class="divider"></li>
							
							<li><a href="https://my.hostmonster.com/cgi-bin/cplogin?lil=1" target="_BLANK">Hostmonster<b class="caret"></b></a></li>
							<li><a href="https://my.hostmonster.com/cgi-bin/cplogin?lil=1" target="_BLANK">Login</a></li>

                            <li class="divider"></li>
                            <li><a href="https://hpanel.hostinger.com/websites/ultimateneobuxstrategy.com" target="_BLANK">Hostinger</a></li>
                            <li><a href="https://hpanel.hostinger.com/domains" target="_BLANK">Domains</a></li>
                        </ul>
                    </li>
<?php
$menuContacts = array(
    'Upwork' => array(
        'href' => 'https://www.upwork.com/ab/account-security/login?redir=%2Fab%2Fmessages%2F',
        'attr' => 'target="_BLANK"' ),  
    'Batch Skip Trace' => array(
        'href' => 'https://app.batchskiptracing.com/app/skip-trace/list',
        'attr' => 'target="_BLANK"' ),
    'divider', 
    'Hubspot - import' => array(
        'href' => 'https://app.hubspot.com/import/47026806',
        'attr' => 'target="_BLANK"'  ),
    'Hubspot - Contacts' => array(
        'href' => 'https://app.hubspot.com/contacts/47026806/objects/0-1/views/all/list',
        'attr' => 'target="_BLANK"' ),
)
?>                 
                    <li id="contacts"> 
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Contacts <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <?
                            echo displayMenu($menuContacts);
                            ?>
                            
                        </ul>
                    </li>

<?php
    $menuMessages = array(
        'All Messages' => array(
            'href' => 'https://www.airbnb.com/hosting/inbox/folder/all/'),
        'Sched Messages - Listings' => array(
            'href' => 'https://www.airbnb.com/hosting/messages/settings/scheduled-messages?product=STAYS'),
        'Sched Messages - Experiences' => array(
            'href' => 'https://www.airbnb.com/hosting/messages/settings/scheduled-messages?product=EXPERIENCES'),
        );

    $menuVRBO = array(
        'Vrbo Calendar' => array(
            'href' => 'https://www.airbnb.com/hosting/inbox/folder/all/'),
        'Vrbo Inbox' => array(
            'href' => 'https://www.airbnb.com/hosting/messages/settings/scheduled-messages?product=STAYS'),
    );

    $menuListings = array(
        'Royal Room' => array(
            'href' => 'https://www.airbnb.com/rooms/841300394500737442?source_impression_id=p3_1719790415_P36temSnhYUDm2Le'),
 
    );

?>    
                    <li id="airbnb">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Airbnb <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        
                        <li>
                            <a tabindex="-1" href="https://www.airbnb.com/hosting/listings"  target="_BLANK">Listings<b class="caret"></b></a>
                        </li>

                        <?
                        echo displayMenu($menuListings);
                        ?>
                            


                        <li class="divider"></li>

 

                        <li class="dropdown-submenu">
                                <a tabindex="-1" href="https://www.airbnb.com/hosting/inbox/folder/all/" target="_BLANK">Messages</a>
                                <ul class="dropdown-menu">
                                    <?
                                    echo displayMenu($menuMessages);
                                    ?>
                                </ul>
                            </li>

                            <li class="divider"></li>
						
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="?action=onlinejobs-profile" title="onlinejobs">VRBO</a>
                                <ul class="dropdown-menu">
                                    <?
                                    echo displayMenu($menuVRBO);
                                    ?>
                                </ul>
                                
                            </li>
                             
                         
                        </ul>
                    </li>


<?php
    $menuEvents = array(
        'Facebook' => array(
            'href' => 'https://www.facebook.com/groups/AirbnbNYC'),
        'OSE Permit'=> array(
            'href' => 'https://strr-portal.ose.nyc.gov/s/?language=en_US&t=1722621055881'),
        'divider',
 
        );

?>    

                    <li id="events">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<b class="caret"></b></a>
                        
                        <ul class="dropdown-menu">
                        <?
                        echo displayMenu($menuEvents);
                        ?>
						 
                         
                        
                        </ul>
                    </li>
                    
                </ul><!--navbar-->
                
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="URL" value="<?= $link ?>" onclick="this.select();" size="70">
                                <a href="<?=$link?>" target="_BLANK"><input type="button" value="Open in New Window" /></a>
                            </div>
                        </form>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <?php
        echo '<iframe width=100% height=95% src="' . $link . '"></iframe>';
    ?>
</body>
</html>