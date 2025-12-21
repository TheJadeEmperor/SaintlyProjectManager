<?php

function menuDropDown ($mainName, $dropDownMenu) {

    $display = '<li id="cohost">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$mainName.'<b class="caret"></b></a>
            <ul class="dropdown-menu">';

    //loop thru drop down menu
    foreach($dropDownMenu as $name => $menu) {
        $div = $caret = '';  //attr | c =caret | d = divider

        if($menu['attr'] == 'c') //caret
            $caret = '<b class="caret"></b>';


        if($menu['submenu']) { //submenu - right side
            $display .= '<li class="dropdown-submenu">
                <a tabindex="-1" target="_BLANK" href="'.$menu['href'].'">'.$name.'</a>
                    <ul class="dropdown-menu">';

            //loop thru submenu
            foreach($menu['submenu'] as $subName => $subURL) {
                $display .= '<li><a href="'.$subURL['href'].'" target="_BLANK">'.$subName.'  </a></li>';
            }

            $display .= '
                </ul>
            </li>'; 
        }
        else  //normal menu item
        $display .= '<li><a href="'.$menu['href'].'" target="_BLANK">'.$name.' '.$caret .'</a></li>';

       
        if($menu['attr'] == 'd') //divider
            $div = '<li class="divider"></li>';
         $display .= $div;
    }

    $display .= '</ul>
    </li>';

    return $display; 
}




function dropDownMenu ($menu) {
    //print_r($menu); exit;
    
    foreach($menu as $name => $url) {
       
        if ($url['dropdown']) { 
           
            $display .= '<li class="dropdown-submenu">
                <a tabindex="-1" target="_BLANK" href="'.$url['href'].'">'.$name.'</a>
                    <ul class="dropdown-menu">';

                    $display .=  displayMenu($url['dropdown']);
            
                        $display .= '
                    </ul>
                </li>'; 
        }
        else {
            $display .= '<li><a href="'.$url['href'].'" '.$url['attr'].'>'.$name.'</a>';
 
            if($url['caret']) {
                $display = '<b class="caret"></b>'; 
            }

            $display .= '</li>';
        }

        if($url['divider']) {
            $display .= '<li class="divider"></li>'; 
        }

    }
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
  
    case 'nus': 
        $link = 'nus.php';

    case 'rentals': 
    default:
        $link = 'rentals.php';
        break;
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

        .container {
            margin: 0 !important;
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
            'href' => 'http://localhost',
            'attr' => 'target="_BLANK"' ),
        'phpMyAdmin' => array(
            'href' => 'http://localhost/phpmyadmin/',
            'attr' => 'target="_BLANK"' ),
        'Account Manager' => array(
            'href' => 'http://SaintlyAccountsManager.test',
            'attr' => 'target="_BLANK"' ),
        'divider' => 1,
        'Achive Links' => array(
            'href' => '?action=archive'),
        'NUS Blog & SEO' => array(
            'href' => '?action=blog'),
        'NUS BPS' => array(
            'href' => '?action=nus'),           
        'Little Book Stays' => array(
            'href' => '.'),
    );



?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"  id="main-menu">
                    <li class="dropdown" id="localhost">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Localhost <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           
                            <?php
                            echo displayMenu($menuLocal);
                            ?>				
                        </ul>
                    </li>

<?php
$menuGmail = array( 
    'gmail Accounts' => array(
        'href' => 'https://mail.google.com/mail/u/0/?shva=1#settings/accounts',
        'attr' => 'target="_BLANK"' ),
    'gmail Filters' => array(
        'href' => 'https://mail.google.com/mail/u/0/?shva=1#settings/filters',
        'attr' => 'target="_BLANK"',
        'divider' => 1, ),

    'Hostinger' => array(
        'href' => 'https://hpanel.hostinger.com/domains',
        'attr' => 'target="_BLANK"' ),
    'Domains' => array(
        'href' => 'https://hpanel.hostinger.com/domains',
        'attr' => 'target="_BLANK"' ),
    'phpMyAdmin' => array(
        'href' => 'https://hpanel.hostinger.com/websites/littlebookstays.com/databases/my-sql-databases',
        'attr' => 'target="_BLANK"' ),
);

?>

                    <li id="gmail">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gmail & HM<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <?php echo dropDownMenu($menuGmail) ?>
        
                        </ul>
                    </li> 

<?php 

    $mainCohost = 'Cohost';

   $menuCohost = array(
        'Cohost Group' => array(
            'href' => 'https://cohostingacquisitions.circle.so/c/module-1/',
            'attr' => 'c'
        ), 
        'Cohost Course ' => array(
            'href' => 'https://cohostingacquisitions.circle.so/c/module-1/',
        ),
        'Group Chat' => array(
            'href' => 'https://cohostingacquisitions.circle.so/c/group-chat/',
            'attr' => 'd'
        ),

        'Batch Skip Trace' => array(
            'href' => 'https://app.batchskiptracing.com/app/skip-trace/list',
            'attr' => 'target="_BLANK"',
            'attr' => 'd'
        ), 

        'Upwork Msg' => array(
            'href' => 'https://www.upwork.com/ab/messages/rooms/room_007a0a45db0a964b83f0854be6c2e37e?pageTitle=Mahran%20Makin&companyReference=1816859020641894400&sidebar=true',
        ),
        'Upwork Trans History' => array(
            'href' => 'https://www.upwork.com/nx/payments/reports/transaction-history',
            'attr' => 'target="_BLANK"',
            
        ),

    ); 


echo menuDropDown($mainCohost, $menuCohost);


    $mainSales = 'Sales';

    $menuSales = array(
        'Close' => array( 
            'href' => ' https://app.close.com/tasks/inbox/',
            'attr' => 'c'
        ), 
        'All Leads' => array( 
            'href' => 'https://app.close.com/leads',
        ), 
        'Sched Links' => array( 
            'href' => 'https://app.close.com/settings/scheduling-links/my-links/',
        ), 
        'Email Templates' => array( 
            'href' => 'https://app.close.com/settings/templates/email/',
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
        'Google Meets' => array( 
            'href' => ' ', 
        ),
        'Calendly' => array( 
            'href' => 'https://calendly.com/kaiba-online-acc/prop-mgr?preview_source=et_card',
            'attr' => 'd',
        ),
        'Rev Projections' => array(
           'submenu' => array(
                'Awning' => array(
                    'href' => 'https://awning.com/airbnb-estimator'
                ), 
                'Airdna' => array(
                    'href' => 'https://app.airdna.co/data',
                    'attr' => 'target="_BLANK"' 
                ),
                'Pricelabs Rev Est' => array(
                    'href' => 'https://app.pricelabs.co/revenue_estimator', 
                ),
            )

        )
       
    ); 


    echo menuDropDown($mainSales, $menuSales);


    $mainGuests = 'Guests';

   $menuGuests = array(
        'BNB Messages' => array(
            'href' => 'https://www.airbnb.com/hosting/inbox/folder/all/', 
            'attr' => 'd'
        ), 
        'Hospital Inbox' => array(
            'href' => 'https://my.hospitable.com/inbox/segments/default', 
            'attr' => 'c'
        ), 
        'Calendars' => array (
            'href' => 'https://my.hospitable.com/calendar/occupancy', 
        ),
        'Msg Rules' => array (
            'href' => 'https://my.hospitable.com/gx/rules',
        ),
        'Upsells' => array (
            'href' => 'https://my.hospitable.com/gx/upsells',
            'attr' => 'd'
        ), 
        'Hosp AI' => array (
            'href' => 'https://my.hospitable.com/gx/questions'
        ),
        'Hostbuddy' => array (
            'href' => 'https://www.hostbuddy.ai/properties'
        ),


    );

    echo menuDropDown($mainGuests, $menuGuests);

 
    $mainPM = 'PM';

   $menuPM = array(
        'Pricelabs Dashboard' => array(
            'href' => 'https://pricelabs.co/pricing',
        ),
        'Comp Sets' => array(
            'href' => 'https://pricelabs.co/reports',
            'attr' => 'd' 
        ), 
        'Rankbreeze' => array (
            'href' => 'https://app.rankbreeze.com/listings',
        ), 
        'Intellihost' => array (
            'href' => 'https://intellihost.com',
            'attr' => 'd' 
        ), 
        'Turno Calendar' => array(
            'href' => 'https://app.turno.com/view/schedule',
        ),
        'Turno Chat' => array(
            'href' => 'https://chat.turno.com/',
        ),     

   );


   echo menuDropDown($mainPM, $menuPM);
 
    $mainBNB = 'BNB'; 

   $menuBNB = array(
        'Get Help' => array(
            'href' => 'https://www.airbnb.com/help/contact-us?entry=HELP_CENTER&role=home_host',
        ),
        'Res Center' => array(
            'href' => 'https://www.airbnb.com/resolutions',
        ),
        'Trans History' => array(
            'href' => 'https://www.airbnb.com/users/transaction_history', 
        ),
        'Maint | Appts' => array(
            'href' => 'https://app.close.com/activities/custom-activity/actitype_3oEjtZdr8UkkqfmtJBDdWi/save_bjqFnOtjRgQsI0Qm9AqG4fSPAGxCtCfOgK6oskcFcIS/',
        ),
    );

    
   echo menuDropDown($mainBNB, $menuBNB);
 
?>    

             
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