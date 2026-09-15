<?php

function menuDropDown ($mainName, $dropDownMenu) {

    $display = '<li id="cohost">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$mainName.'<b class="caret"></b></a>
    <ul class="dropdown-menu">';

    foreach($dropDownMenu as $name => $menu) {
        $div = $caret = $iconHTML = ''; 

        // 1. Logic for adding the icon
        if(isset($menu['icon'])) {
            $colorStyle = isset($menu['iconColor']) ? 'color:'.$menu['iconColor'].'; ' : '';
            $iconHTML = '<i class="fa '.$menu['icon'].'" style="'.$colorStyle.'width: 20px; text-align: center; margin-right: 5px;"></i> ';
        }

        if($menu['attr'] == 'c') $caret = '<b class="caret"></b>';

        if(isset($menu['submenu'])) { 
            $display .= '<li class="dropdown-submenu">
                <a tabindex="-1" target="_BLANK" href="'.$menu['href'].'">'.$iconHTML.$name.'</a>
                    <ul class="dropdown-menu">';

            foreach($menu['submenu'] as $subName => $subURL) {
                $subIcon = isset($subURL['icon']) ? '<i class="fa '.$subURL['icon'].'" style="width: 20px; text-align: center; margin-right: 5px;"></i> ' : '';
                $display .= '<li><a href="'.$subURL['href'].'" target="_BLANK">'.$subIcon.$subName.'</a></li>';
            }

            $display .= '</ul></li>'; 
        }
        else {
            // 2. Apply iconHTML here for normal items
            $display .= '<li><a href="'.$menu['href'].'" target="_BLANK">'.$iconHTML.$name.' '.$caret .'</a></li>';
        }

        if($menu['attr'] == 'd') $div = '<li class="divider"></li>';
        $display .= $div;
    }

    $display .= '</ul></li>';
    return $display; 
}



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

    case 'archive':
        $link = 'archive/archive_links.php';
        break;
    case 'nus':
        $link = 'archive/nus.php';
        break;
	case 'blog': 
		$link = 'archive/blog_nus.php';
		break;
   
    case 'rentals': 
    default:
        $link = 'rentals.php';
        break;
}
?>
<!DOCTYPE html>
<head>
    <title>Saintly Projects Manager</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"  id="main-menu">
                     
<?php
    $mainLocal = 'Localhost';

    $menuLocal = array(
       'Localhost' => array(
            'href' => 'http://localhost',
            'icon' => 'fa-home',
            'iconColor' => '#e05c3a',   // red-orange
        ), 
        'phpMyAdmin' => array(
            'href' => 'http://localhost/phpmyadmin5.2.3/', 
            'icon' => 'fa-database',
            'iconColor' => '#4a90d9',   // blue
        ),
        'Account Manager' => array(
            'href' => 'http://SaintlyAccountsManager.test',
            'icon' => 'fa-user',
            'iconColor' => '#3a9e6e',   // green
            'attr' => 'd' ),
        'Achive Links' => array(
            'href' => '?action=archive',
            'icon' => 'fa-archive',
            'iconColor' => '#8c6b3e',   // brown
        ),
        'NUS Blog & SEO' => array(
            'href' => '?action=blog' ),
        'NUS BPS' => array(
            'href' => '?action=nus'),           
        'Little Book Stays' => array(
            'href' => '.'),
    ); 

    echo menuDropDown($mainLocal, $menuLocal);


    $mainHost= 'Host';

    $menuHost = array(
        'gmail Accounts' => array(
            'href' => 'https://mail.google.com/mail/u/0/?shva=1#settings/accounts',
            'icon' => 'fa-envelope',
            'iconColor' => '#e05c7a',   // red-pink
        ),
        'gmail Filters' => array(
            'href' => 'https://mail.google.com/mail/u/0/?shva=1#settings/filters',
            'icon' => 'fa-filter',
            'iconColor' => '#7a8c9e',   // gray
            'attr' => 'd' 
        ),
        'Hostinger' => array(
            'href' => 'https://hpanel.hostinger.com/domains',
        ),
        'Domains' => array(
            'href' => 'https://hpanel.hostinger.com/domains',
        ),
        'phpMyAdmin' => array(
            'href' => 'https://hpanel.hostinger.com/websites/littlebookstays.com/databases/my-sql-databases',
        ),
        'Notion Home Base' => array(
            'href' => 'https://www.notion.so/Put-these-docs-into-notion-2ece540782c18085b79dd552bc03b48d?source=copy_link'
        )

    );
 
    echo menuDropDown($mainHost, $menuHost);

 
    $mainCohost = 'Cohost';

   $menuCohost = array(
        'Cohost Course' => array(
            'href' => 'https://cohostingacquisitions.circle.so/c/module-1/',
            'attr' => 'c'
        ), 
        'Cohost Course ' => array(
            'href' => 'https://cohostingacquisitions.circle.so/c/module-1/',
            'icon' => 'fa-graduation-cap',
            'iconColor' => '#8c6b3e',   // brown
        ),
        'Group Chat' => array(
            'href' => 'https://cohostingacquisitions.circle.so/c/group-chat/',
            'icon' => 'fa-comments',
            'iconColor' => '#4a90d9',   // blue
        ),
        'Events Calendar' => array(
            'href' => 'https://cohostingacquisitions.circle.so/events',
            'icon' => 'fa-calendar',
            'iconColor' => '#3a9e6e',   // green
            'attr' => 'd'
        ),
        'Data Submit' => array(
            'href' => 'https://awais.codes/co-hosting-acquisitions/',
            'icon' => 'fa-file',
            'iconColor' => '#7a8c9e',   // gray
        ),
        'Batch Skip Trace' => array(
            'href' => 'https://app.batchdata.com/property-skip-trace',
            'icon' => 'fa-search',
            'iconColor' => '#e0963a',   // orange
        ), 

    ); 


echo menuDropDown($mainCohost, $menuCohost);

    $mainSales = 'Sales';

    $menuSales = array(
        'Close | Inbox' => array( 
            'href' => ' https://app.close.com/tasks/inbox/',
            'icon' => 'fa-inbox',
            'iconColor' => '#4a90d9',   // blue
            'attr' => 'c'
        ), 
        'All Leads' => array( 
            'href' => 'https://app.close.com/leads',
            'icon' => 'fa-users',
            'iconColor' => '#5b8dd9',   // blue
        ), 
        'AI Agent' => array( 
            'href' => 'https://app.close.com/chloe/agentconfig_032u5sLbxvJrebGDYtQ4Ja/',
            'icon' => 'fa-android',
            'iconColor' => '#3a9e6e',   // green
        ), 
        'Statuses & Pipes' => array( 
            'href' => 'https://app.close.com/settings/statuses/',
            'icon' => 'fa-link',
            'iconColor' => '#7a8c9e',   // gray
        ), 
        'Sched Links' => array( 
            'href' => 'https://app.close.com/settings/scheduling/',
            'icon' => 'fa-link',
            'iconColor' => '#7a8c9e',   // gray
        ), 
        'Email Templates' => array( 
            'href' => 'https://app.close.com/settings/templates/email/',
            'icon' => 'fa-file-text',
            'iconColor' => '#e0963a',   // orange
            'attr' => 'd',
            'submenu' => array(
                'E Templates' => array(
                    'href' => 'https://app.close.com/settings/templates/email/'
                ), 
                'E Workflows' => array(
                    'href' => 'https://app.close.com/workflows/'
                ), 
            )
        ), //'Email Templates'
        
        'Rev Projections' => array(
            'icon' => 'fa-line-chart',
            'iconColor' => '#3a9e6e',   // green
           'submenu' => array(
                'Airdna' => array(
                    'href' => 'https://app.airdna.co/data',
                    'attr' => 'target="_BLANK"' 
                ),
                'Pricelabs Rev Est' => array(
                    'href' => 'https://app.pricelabs.co/revenue_estimator', 
                ),
                'Vantage Prospects' => array(
                    'href' => 'https://vantagestr.co/dashboard/operator/prospects', 
                ),
                'Vantage Pipeline' => array(
                    'href' => 'https://vantagestr.co/dashboard/operator/pipeline', 
                ),
            ),
            'attr' => 'd',
        ),
        'Google Meets' => array(
            'href' => 'https://meet.google.com/zjn-zuxt-zzp', 
            'icon' => 'fa-video-camera',
            'iconColor' => '#e05c3a',   // red-orange
        ),
        'Calendly' => array(
            'href' => 'https://calendly.com/littlebookstays/30min',
            'icon' => 'fa-calendar-check-o',
            'iconColor' => '#4a90d9',   // blue
        ),

    ); 


    echo menuDropDown($mainSales, $menuSales);


    $mainGuests = 'Guests';

    $menuGuests = array(
        'BNB Messages' => array(
            'href' => 'https://www.airbnb.com/hosting/inbox/folder/all/', 
            'icon' => 'fa-commenting',
            'iconColor' => '#e05c3a',   // red-orange (Airbnb)
            'attr' => 'd'
        ), 
        'Hospital Inbox' => array(
            'href' => 'https://my.hospitable.com/inbox/segments/default', 
            'icon' => 'fa-inbox',
            'iconColor' => '#e05c7a',   // red-pink (Hospitable)
            'attr' => 'c'
        ), 
        'Calendars' => array (
            'href' => 'https://my.hospitable.com/calendar/occupancy',
            'icon' => 'fa-calendar',
            'iconColor' => '#4a90d9',   // blue
        ),
        'Msg Rules' => array (
            'href' => 'https://my.hospitable.com/gx/rules',
            'icon' => 'fa-cog',
            'iconColor' => '#7a8c9e',   // gray
        ),
        'Upsells' => array (
            'href' => 'https://my.hospitable.com/gx/upsells',
            'attr' => 'd',
            'icon' => 'fa-tag',
            'iconColor' => '#e0963a',   // orange
        ), 
        'Hostbuddy' => array (
            'href' => 'https://www.hostbuddy.ai/properties',
            'icon' => 'fa-android',
            'iconColor' => '#3a9e6e',   // green
        ),

    );

    echo menuDropDown($mainGuests, $menuGuests);

 
    $mainPM = 'PM';

    $menuPM = array(
        'Pricelabs Dashboard' => array(
            'href' => 'https://pricelabs.co/pricing',
            'icon' => 'fa-tachometer',
            'iconColor' => '#e0763a',   // orange (Pricelabs brand)
        ),
        'Comp Sets' => array(
            'href' => 'https://pricelabs.co/reports',
            'icon' => 'fa-bar-chart',
            'iconColor' => '#3a9e6e',   // green
        ), 
        'Turno Calendar' => array(
            'href' => 'https://app.turno.com/view/schedule',
            'icon' => 'fa-calendar',
            'iconColor' => '#7a5c3e',   // brown 
            'attr' => 'd' 
        ), 
        'Maint | Appts' => array(
            'href' => 'https://app.close.com/activities/custom-activity/actitype_3oEjtZdr8UkkqfmtJBDdWi/save_bjqFnOtjRgQsI0Qm9AqG4fSPAGxCtCfOgK6oskcFcIS/',
            'icon' => 'fa-wrench',
            'iconColor' => '#7a8c9e',   // gray
            'attr' => 'd' 
        ),
        'Hostco' => array(
            'href' => 'https://app.thehost.co/overview/stores/',
            'icon' => 'fa-book',
            'iconColor' => '#8c6b3e',   // brown
        ),
         'StayFi' => array(
            'href' => 'https://app.stayfi.com/sign_in',
            'icon' => 'fa-book',
            'iconColor' => '#8c6b3e',   // brown
        ),


   );


   echo menuDropDown($mainPM, $menuPM);
 
$mainBNB = 'BNB'; 

   $menuBNB = array(
        'BNB Messages' => array(
            'href' => 'https://www.airbnb.com/hosting/inbox/folder/all/', 
            'icon' => 'fa-commenting',
            'iconColor' => '#e05c3a',   // red-orange (Airbnb)
            'attr' => 'd'
        ), 
        'Get Help' => array(
            'href' => 'https://www.airbnb.com/help/contact-us?entry=HELP_CENTER&role=home_host',
            'icon' => 'fa-question',
            'iconColor' => '#e05c3a',   // red-orange (Airbnb)
        ),
        'Res Center' => array(
            'href' => 'https://www.airbnb.com/resolutions',
            'icon' => 'fa-balance-scale',
            'iconColor' => '#7a8c9e',   // gray
        ),
        'Trans History' => array(
            'href' => 'https://www.airbnb.com/users/transaction_history', 
            'icon' => 'fa-money',
            'iconColor' => '#3a9e6e',   // green
            'attr' => 'd'
        ),

    );

    
    echo menuDropDown($mainBNB, $menuBNB);
 

    $mainTeam = 'Team'; 



    $menuTeam = array(
        'Trello 2026 Goals' => array(
            'href' => 'https://trello.com/b/lx8xpiWr/2024-goals',
            'icon' => 'fa-book',
            'iconColor' => '#4a90d9',   // blue (Trello)
        ),
        'Trello LBS VA Tasks' => array(
            'href' => 'https://trello.com/b/9NK1LyNF/prop-mgr-for-lbs',
            'icon' => 'fa-book',
            'iconColor' => '#5b8dd9',   // blue
        ),
        'Trello LBS Later Tasks' => array(
            'href' => 'https://trello.com/b/UJ8yPVr0/lbs-later-tasks',
            'icon' => 'fa-book',
            'iconColor' => '#5b8dd9',   // green
            'attr' => 'd'
        ),
        'Upwork Msg' => array(
            'href' => 'https://www.upwork.com/ab/messages/rooms/room_007a0a45db0a964b83f0854be6c2e37e?pageTitle=Mahran%20Makin&companyReference=1816859020641894400&sidebar=true',
            'icon' => 'fa-briefcase',
            'iconColor' => '#3e8c6b',   // teal-green (Upwork)
        ),
        'Upwork Trans History' => array(
            'href' => 'https://www.upwork.com/nx/payments/reports/transaction-history', 
            'icon' => 'fa-money',
            'iconColor' => '#3a9e6e',   // green
        ),

    );

    echo menuDropDown($mainTeam, $menuTeam);
?>    

             
                </ul><!--navbar-->
                
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="URL" value="<?= $link ?>" onclick="this.select();" size="40">
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