<?
switch($_GET['action']) {

    //localhost
    case 'localhost':
        $link = 'http://localhost';
        break;
    case 'phpMyAdmin':
        $link = 'http://localhost/phpmyadmin/';
        break;
    case 'accounts':
        $link = 'http://localhost/SaintlyAccountsManager';
        break;
	case 'archive_links':
        $link = 'archive_links.php';
        break;
		
    //merchant links
    case 'clickbank':       
        $link = 'https://accounts.clickbank.com/login.htm';
        break;
    
    //adhitz
    case 'site-ads':
        $link = 'http://www.adhitz.com/en/Advertisers-My_Site_Specific_Ads';
        break;
    case 'network-ads':
        $link = 'http://www.adhitz.com/en/Advertisers-My_Network_Ads';
        break;
    case 'adhitz':
        $link = 'http://adhitz.com';
        break;
    case 'trafficwave':
        $link = 'https://www.trafficwave.net/members_only/members_only.cgi/toolbar.html';
        break;

    case 'site-pages':
        $link = 'site-pages.php';
        break;
        
    //allsubscribers 
    case 'all-stats':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_overview&series=350956';
        break;
    case 'all-manage':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_manage&series=350956';
        break; 
    case 'all-letters':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=350956';
        break;
    case 'all-profile':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/editprofile.cgi?series=350956';
        break;
        
    //allcustomers
    case 'nuscust-stats':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_overview&series=375842';
        break;
    case 'nuscust-manage':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_manage&series=375842';
        break;	
    case 'nuscust-letters':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=375842';
        break;
    case 'nuscust-profile':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/editprofile.cgi?header=admin&series=375842';
        break;
        
    //nus newsl		
    case 'nusnewsl-stats':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_overview&series=247336';
        break;
    case 'nusnewsl-manage':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_manage&series=247336';
        break; 
    case 'nusnewsl-letters':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=247336';
        break;
    case 'nusnewsl-profile':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/editprofile.cgi?header=admin&series=247336';
        break;

    //ppb newsl
    case 'ppbooster-stats':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_overview&series=290716';
        break;
    case 'ppbooster-manage':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_manage&series=290716';
        break;
    case 'ppbooster-letters':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=290716';
        break;
    case 'ppbooster-profile':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/editprofile.cgi?header=admin&series=290716';
        break;

            
    //mms newsl
    case 'mms-stats':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_overview&series=263238';
        break; 
    case 'mms-manage':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_manage&series=263238';
        break;
    case 'mms-letters':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=263238';
        break;
    case 'mms-profile':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/editprofile.cgi?header=admin&series=263238';
        break;

    //// onlinejobs newsl \\\\
    case 'onlinejobs-stats':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_overview&series=375894';	
        break;
    case 'onlinejobs-manage':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_manage&series=375894';
        break;
    case 'onlinejobs-letters':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=375894';
        break;	
    case 'onlinejobs-profile':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?header=admin&series=375894';
        break;
		 		
    
    //// ptcprograms newsl \\\\
    case 'ptcprograms-stats':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_overview&series=357941';	
        break;
    case 'ptcprograms-manage':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?action=subscr_manage&series=357941';
        break;
    case 'ptcprograms-letters':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=357941';
        break;	
    case 'ptcprograms-profile':
        $link = 'https://www.trafficwave.net/cgi-bin/autoresp/subscrstats.cgi?header=admin&series=357941';
        break;
		 
    
    case 'newsletters':
        $link = 'http://localhost/SaintlyNewsletters';
        break;
    case 'newsl-all':
        $link = 'http://localhost/SaintlyNewsletters/AllSubscribers';
        break;
    case 'newsl-mms':
        $link = 'http://localhost/SaintlyNewsletters/MakeMoneySurveys';
        break;
    case 'newsl-ppb':
        $link = 'http://localhost/SaintlyNewsletters/PaypalBooster';
        break;
    case 'newsl-nus':
        $link = 'http://localhost/SaintlyNewsletters/UltimateStrategy';
        break;
    case 'newsl-ptcprograms':
        $link = 'http://localhost/SaintlyNewsletters/PTCPrograms';
        break;
    case 'newsl-translate':
        $link = 'http://localhost/SaintlyNewsletters/TranslatorJobs';
        break;
    case 'newsl-online':
        $link = 'http://localhost/SaintlyNewsletters/OnlineJobs';
        break;
		
	
    case 'copy':
        $splitScreen = true;
        $leftScreen = 'http://localhost/SaintlyNewsletters';
        $rightScreen = 'https://www.trafficwave.net/members_only/members_only.cgi/toolbar.html';
        break;

    case 'copy-all':
        $splitScreen = true;
        $leftScreen = 'http://localhost/SaintlyNewsletters/AllSubscribers';
        $rightScreen = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=350956';
        break;

    case 'copy-ppbooster':
        $splitScreen = true;
        $leftScreen = 'http://localhost/SaintlyNewsletters/PaypalBooster';
        $rightScreen = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=290716';
        break; 
    case 'copy-nusnewsl':
        $splitScreen = true;
        $leftScreen = 'http://localhost/SaintlyNewsletters/UltimateStrategy';
        $rightScreen = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=247336';
        break;
    case 'copy-ptcprograms':
        $splitScreen = true;
        $leftScreen = 'http://localhost/SaintlyNewsletters/PTCPrograms';
        $rightScreen = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=357941';
        break;
    case 'copy-mms':
        $splitScreen = true;
        $leftScreen = 'http://localhost/SaintlyNewsletters/MakeMoneySurveys';
        $rightScreen = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=263238';
        break;
    case 'copy-translate':
        $splitScreen = true;
        $leftScreen = 'http://localhost/SaintlyNewsletters/TranslatorJobs';
        $rightScreen = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=342122';
        break;
    case 'copy-onlinejobs':
        $splitScreen = true;
        $leftScreen = 'http://localhost/SaintlyNewsletters/OnlineJobs';
        $rightScreen = 'https://www.trafficwave.net/cgi-bin/autoresp/reviewletter.cgi?header=letters&series=375894';
        break;
    
    case 'splash-freereport-live':
        $link = 'http://neobuxultimatestrategy.com/?action=freereport';
        break;
    case 'splash-freereport-local':
        $link = 'http://localhost/NeobuxUltimateStrategy/?action=freereport';
        break;

    case 'splash-ecourse-live': 
        $link = 'http://neobuxultimatestrategy.com/?action=ecourse';
        break;
    case 'splash-ecourse-local': 
        $link = 'http://localhost/NeobuxUltimateStrategy/?action=ecourse';
        break;

    case 'splash-ppb-live': 
        $link = 'http://bestpayingsites.com/?action=booster';
        break;
    case 'splash-ppb-local': 
        $link = 'http://localhost/bestpayingsites/?action=booster';
        break;

    case 'splash-video-live': 
        $link = 'http://bestpayingsites.com/?action=translate';
        break;
    case 'splash-video-local': 
        $link = 'http://localhost/bestpayingsites/?action=translate';
        break;

    default:
        $link = 'db.php';
}
?>
<html>
<head>
    <title>Links Project</title>
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
 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"  id="main-menu">
                    <li class="dropdown" id="localhost">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Localhost <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost" target="_blank">Localhost</a></li>
							
                            <li><a href="?action=phpMyAdmin">phpMyAdmin</a></li>
							
                            <li class="divider"></li>
							
                            <li><a href="?action=accounts">Account Manager</a></li> 
							
							<li class="divider"></li>
							
                            <li><a href="?action=archive_links">Archive Links</a></li> 
                            
                        </ul>
                    </li>
                   
                    <li id="trafficwave">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">TrafficWave <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                            <li><a href="?action=trafficwave">TrafficWave Login</a></li>

                            <li class="divider"></li>
                             
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="?action=all-profile" title="allsubscribers">All Subscribers</a>
                                <ul class="dropdown-menu">
                                    <li><a href="?action=all-letters">allsubscribers - letters</a></li>
                                    <li><a href="?action=all-stats">allsubscribers - stats</a></li>
                                    <li><a href="?action=all-manage">allsubscribers - manage</a></li>
                                </ul>
                            </li>
                            
                            <li class="divider"></li>
                            
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="?action=mms-profile" title="makemoneysurveys">Make Money Surveys</a>
                                <ul class="dropdown-menu">
                                     <li><a href="?action=mms-letters">mms - letters</a></li>
                                    <li><a href="?action=mms-stats">mms - stats</a></li>
                                    <li><a href="?action=mms-manage">mms - manage</a></li>
                                </ul>
                            </li>
                            
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="?action=onlinejobs-profile" title="onlinejobs">Online Jobs</a>
                                <ul class="dropdown-menu">
                                    <li><a href="?action=onlinejobs-letters">onlinejobs - letters</a></li>
                                    <li><a href="?action=onlinejobs-stats">onlinejobs - stats</a></li>
                                    <li><a href="?action=onlinejobs-manage">onlinejobs - manage</a></li>
                                </ul>
                            </li>
                            
                            <li class="divider"></li>
                            
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="?action=nusnewsl-profile" title="nusnewsletter">NUS Newsletter</a>
                                <ul class="dropdown-menu">
                                    <li><a href="?action=nusnewsl-letters">nus - letters</a></li>
                                    <li><a href="?action=nusnewsl-stats">nus - stats</a></li>
                                    <li><a href="?action=nusnewsl-manage">nus - manage</a></li>
                                </ul>
                            </li>
							
							<li class="dropdown-submenu">
                                <a tabindex="-1" href="?action=ptcprograms-letters" title="ptcprograms">PTC Programs</a>
                                <ul class="dropdown-menu">
                                    <li><a href="?action=ptcprograms-letters">ptcprograms - letters</a></li>
                                    <li><a href="?action=ptcprograms-stats">ptcprograms - stats</a></li>
                                    <li><a href="?action=ptcprograms-manage">ptcprograms - manage</a></li>
                                </ul>
                            </li>
                              
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="?action=ppbooster-profile" title="paypalbooster">Paypal Booster</a>
                                <ul class="dropdown-menu">
                                    <li><a href="?action=ppbooster-letters">ppbooster - letters</a></li>
                                    <li><a href="?action=ppbooster-stats">ppbooster - stats</a></li>
                                    <li><a href="?action=ppbooster-manage">ppbooster - manage</a></li>
                                </ul>
                            </li>
                            
                          </ul>
                    </li>
                    
                    <li class="dropdown" id="newsletters"> 
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Newsletters <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?action=copy">Newsletters Index</a></li>
                            <li class="divider"></li>
                            <li><a href="?action=newsl-all">All Subscribers - Edit</a></li>
                            <li><a href="?action=copy-all">All Subscribers - Copy</a></li>
							
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-nus">NUS Newsletter - Edit</a></li>
                            <li><a href="?action=copy-nusnewsl">NUS Newsletter - Copy</a></li>
							
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-mms">Make Money Surveys - Edit</a></li>
                            <li><a href="?action=copy-mms">Make Money Surveys - Copy</a></li>
							
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-online">Online Jobs - Edit</a></li>
                            <li><a href="?action=copy-onlinejobs">Online Jobs - Copy</a></li>
							
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-ptcprograms">PTC Programs - Edit</a></li>
                            <li><a href="?action=copy-ptcprograms">PTC Programs - Copy</a></li>
							
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-ppb">Paypal Booster - Edit</a></li>
                            <li><a href="?action=copy-ppbooster">Paypal Booster - Copy</a></li>
                        </ul>
                    </li>
                    
                    <li id="splash pages">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Splash Pages <b class="caret"></b></a>
                        
                        <ul class="dropdown-menu">
							<li><a href="?action=splash-ppb-live">Paypal Booster</a></li>
							<li><a href="?action=splash-ppb-live">live</a></li>
							<li><a href="?action=splash-ppb-local">localhost</a></li>
						 
							<li class="divider"></li>
						 
							<li><a href="?action=splash-freereport-live">Free Neobux Report</a></li>
							<li><a href="?action=splash-freereport-live">live</a></li>
							<li><a href="?action=splash-freereport-local">localhost</a></li>
							
							<li class="divider"></li>
							
							<li><a href="?action=splash-ecourse-live">Free PTC Report</a></li>
							<li><a href="?action=splash-ecourse-live">live</a></li>
							<li><a href="?action=splash-ecourse-local">localhost</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ad Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            
                            <li><a href="http://bestpayingsites.com/?action=bonus" target="_blank">PPB & EPS Bonus Downloads</a></li>
                            <li><a href="http://neobuxultimatestrategy.com/basics/" target="_blank">NUS Basics</a></li>
                            
                            <li class="divider"></li>

                            <li><a href="http://neobuxultimatestrategy.com/?action=download&id=vipuser" target="_blank">NUS Download Page</a></li>
                            <li><a href="http://bestpayingsites.com/?action=download&id=vipuser" target="_blank">EPS Download Page</a></li>
							
                            <li class="divider"></li>
							
							<li><a href="https://paypal.com" target="_BLANK">Paypal</a></li>
                            <li><a href="https://accounts.clickbank.com/login.htm">Clickbank</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Buy Ads <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?action=network-ads">Adhitz<b class="caret"></b></a></li>
                            <li><a href="?action=network-ads">Network Ads</a></li>
                            <li><a href="?action=site-ads">Site Ads</a></li>
                            <li><a href="http://www.adhitz.com/en/Advertisers-Buy_Network_Ads" target="_blank">Buy Network Ads</a></li>
							
                            <li class="divider"></li>
                            
							<li><a href="http://www.clixsense.com/en/ClixGrid-My_Links" target="_blank">Clixsense<b class="caret"></b></a></li>
                            <li><a href="http://www.clixsense.com/en/ClixGrid-My_Links" target="_blank">Clixgrid View</a></li>
							<li><a href="http://www.clixsense.com/en/ClixGrid-Buy_Links" target="_blank">Clixgrid Buy</a></li>
                            
							<li class="divider"></li>

                            <li><a href="http://neobux.com" target="_blank">Neobux <b class="caret"></b></a></li>
                            <li><a href="http://www.neobux.com/c/a/" target="_blank">Manage Ads</a></li>
                            <li><a href="https://www.neobux.com/c/a/?s1=pgt" target="_blank">Buy Ads</a></li>
                        </ul>
                    </li>
                    
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Trello<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="https://trello.com/b/lx8xpiWr/2016-goals" target="_BLANK"><?=date('Y', time())?> Goals</a></li>
                            <li><a href="https://trello.com/b/eCbwlbjV/email-answers-faq" target="_BLANK">Email Answers & FAQ</a></li>
                            <li><a href="https://trello.com/b/tT7IOsDu/affiliate-links" target="_BLANK">Affiliate Links</a></li>
                            <li><a href="https://trello.com/b/L7rsEyHd/events" target="_BLANK">Events</a></li>
                            <li><a href="https://trello.com/b/9YHVktaG/stories" target="_BLANK">Stories</a></li>
                            <li><a href="https://trello.com/b/Y57UfweD/jokes-quotes" target="_BLANK">Jokes & Quotes</a></li>
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
    
    <?
    if ($splitScreen)
        echo '<table width="100%" height="95%">
	<tr>
            <td><iframe src="' . $leftScreen . '"></iframe></td>
            <td><iframe src="' . $rightScreen . '"></iframe></td>
	</tr>
	</table>';
    else
        echo '<iframe width=100% height=95% src="' . $link . '"></iframe>';
    ?>
</body>
</html>