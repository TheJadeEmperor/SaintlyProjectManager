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
                <a class="navbar-brand" href="?action=db">Links Project</a>
            </div>


<?php
$menuAPI = array(
    'API Login' => array(
        'href' => '?action=api-login'),
    'Curl Main Page' => array(
        'href' => '?action=curl'),
);

$menuLocal = array(
    'Localhost' => array(
        'href' => 'http://localhost'),
    'phpMyAdmin' => array(
        'href' => 'http://localhost/phpmyadmin/'),
    'Account Manager' => array(
        'href' => 'http://SaintlyAccountsManager.test',
     'attr' => 'target="_BLANK"' ),
    'Achive Links' => array(
        'href' => '?action=archive'),
    'divider',
  
    'NUS Blog & SEO' => array(
        'href' => '?action=blog'),
          
    'Code Ninja' => array(
        'href' => '?action=ninja'),
);

$menuTrello = array(
    'Stripe Payments' => array(
        'href' => 'https://dashboard.stripe.com/payments',
        'attr' => 'target="_BLANK"'),
    'Payment Links' => array( 
        'href' => 'https://dashboard.stripe.com/payment-links',
        'attr' => 'target="_BLANK"'), 
    'Webook' => array( 
        'href' => 'https://dashboard.stripe.com/webhooks',
        'attr' => 'target="_BLANK"'),
)
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
                   
                    <li id="trello">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stripe<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?
                            echo displayMenu($menuTrello);
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
                        </ul>
                    </li>
<?php
$menuNewsl = array(
    'Newsletters Index' => array(
        'href' => '?action=newsl-index'),
    'divider',
    'All Subscribers - Edit' => array(
        'href' => '?action=newsl-all'),
    //'divider',
    'NUS Newsletter - Edit' => array(
        'href' => '?action=newsl-nus'),
)
?>                 
                    <li id="newsletters"> 
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Newsletters <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <?
                            echo displayMenu($menuNewsl);
                            ?>
                            
                      
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-mms">Make Money Surveys - Edit</a></li>
                      		
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-online">Online Jobs - Edit</a></li>
                      		 
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-ppb">Paypal Booster - Edit</a></li>
                        </ul>
                    </li>

                    <li id="trafficwave">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">TrafficWave <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        
                        <li class="dropdown-submenu">
                                <a tabindex="-1" href="?action=ptcprograms-letters" title="ptcprograms">All Subscribers</a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?action=edit_letter&series=472254" target="_BLANK">allsubscribers - letters</a></li>
                                    <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/autoletter.cgi?series=472254"  target="_BLANK">automated series</a></li>
                                    <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/subscrmgr.cgi?action=subscr_manage&series=472254" target="_BLANK">manage subs</a></li>
                                </ul>
                            </li>

                            <li class="divider"></li>

                        <li class="dropdown-submenu">
                                <a tabindex="-1" href="https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?action=edit_letter&series=472175" title="nusnewsletter"  target="_BLANK">NUS Newsletter</a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?action=edit_letter&series=472175" target="_BLANK">nusnewsl - letters</a></li>
                                    <li><a href=""  target="_BLANK">automated series</a></li>
                                    <li><a href=""  target="_BLANK">manage subs</a></li>
                                </ul>
                            </li>

                            <li class="divider"></li>
						
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="?action=onlinejobs-profile" title="onlinejobs">Online Jobs</a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?action=edit_letter&series=472253" target="_BLANK">onlinejobs - letters</a></li>
                                    <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/autoletter.cgi?series=472253" target="_BLANK">automated series</a></li>
                                    <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/subscrmgr.cgi?action=subscr_manage&series=472253" target="_BLANK">manage subs</a></li>
                                </ul>
                            </li>
                            
                            <li class="divider"></li>
                         
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="?action=ppbooster-profile" title="paypalbooster">Paypal Booster</a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?action=edit_letter&series=472259"  target="_BLANK">ppbooster - letters</a></li>
                                    <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/autoletter.cgi?series=472259" target="_BLANK">ppbooster - stats</a></li>
                                    <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/subscrmgr.cgi?action=subscr_manage&series=472259" target="_BLANK">ppbooster - manage</a></li>
                                </ul>
                            </li>

                            <li class="divider"></li>
                         
                         <li class="dropdown-submenu">
                             <a tabindex="-1" href="?action=ppbooster-profile" title="paypalbooster">Make Money Surveys</a>
                             <ul class="dropdown-menu">
                                 <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?action=edit_letter&series=472260"  target="_BLANK">makemoneysurveys - letters</a></li>
                                 <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/autoletter.cgi?series=472260" target="_BLANK">makemoneysurveys - stats</a></li>
                                 <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/subscrmgr.cgi?action=subscr_manage&series=472260" target="_BLANK">makemoneysurveys - manage</a></li>
                             </ul>
                         </li>

                         <li class="divider"></li>

                            <li><a href="https://www.trafficwave.net/cgi-bin/autoresp/AFSstart.cgi" target="_BLANK">Campaign Manager</a></li>   
                          </ul>
                    </li>
 
                    <li id="splash pages">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Splash Pages <b class="caret"></b></a>
                        
                        <ul class="dropdown-menu">
							<li><a href="?action=splash-ppb-live">live - Paypal Booster</a></li>
							<li><a href="?action=splash-ppb-local">local - Paypal Booster</a></li>
						 
							<li class="divider"></li>
						 
							<li><a href="?action=splash-freereport-live">live - Free Neobux Report</a></li>
							<li><a href="?action=splash-freereport-local">local - Free Neobux Report</a></li>
							
							<li class="divider"></li>
							<li><a href="http://bestpayingsites.com/?action=bonus" target="_blank">Ad Pages<b class="caret"></b></a></li>
							
							<li><a href="http://bestpayingsites.com/?action=bonus" target="_blank">PPB & EPS Bonus Downloads</a></li>
                            <li><a href="http://neobuxultimatestrategy.com/basics/" target="_blank">NUS Basics</a></li>
                            
                            <li class="divider"></li>

                            <li><a href="http://neobuxultimatestrategy.com/?action=download&id=vipuser" target="_blank">NUS Download Page</a></li>
							
                            <li><a href="http://bestpayingsites.com/?action=download&id=vipuser" target="_blank">EPS Download Page</a></li>
                        </ul>
                    </li>
	 	
                    <li id="buy_ads">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li><a href="https://accounts.clickbank.com/login.htm" target="_blank">Clickbank Login</a></li>

                            <li><a href="https://ironprice.accounts.clickbank.com/account/analytics.htm" target="_blank">CB Reporting</a></li>
							
                        <li class="divider"></li>
						
							<li><a href="http://www.easyhits4u.com/" target="_blank">EasyHits4U</a></li>
                        
                          
                            
							<li><a href="http://neobux.com/login" target="_blank"></a></li>
							
                            <li><a href="http://neobux.com/login" target="_blank">Neobux</a></li>
 
                            <li><a href="https://www.trafficwave.net/login.html" target="_blank">TrafficWave Login</a></li>
                           
                        </ul>
                    </li>
                    
                </ul><!--navbar-->
                
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="URL" value="<?= $link ?>" onclick="this.select();" size="70">
                                <a href="<?=$link?>" target="_blank"><input type="button" value="Open in New Window" /></a>
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