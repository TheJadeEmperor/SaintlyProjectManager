<?php

$newslHost = 'http://saintlynewsletters.test/';

switch($_GET['action']) {

    //localhost
    case 'localhost':
        $link = 'http://localhost';
        break;
	case 'blog-bcm':
        $link = 'blog_bcm.php';
        break;
    case 'archive':
        $link = 'archive_links.php';
        break;
    case 'fanfic':
        $link = 'fanfic_html.php';
        break;
    //sendgrid 
    case 'sendgrid_api':  
        $link = $newslHost.'sendgrid/api_test.php';  
        break;
    case 'newsletters':
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
        $link = $newslHost.'UltimateStrategy';
        break;
    case 'newsl-ptcprograms':
        $link = $newslHost.'PTCPrograms';
        break;
    case 'newsl-translate':
        $link = $newslHost.'TranslatorJobs';
        break;
    case 'newsl-online':
        $link = $newslHost.'OnlineJobs';
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
    
	case 'gmail-filters':
		$link = 'https://mail.google.com/mail/u/0/?shva=1#settings/filters';
		break;
	case 'gmail-accounts':
		$link = 'https://mail.google.com/mail/u/0/?shva=1#settings/accounts';
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
	
    case 'nus':
        $link = 'nus.php';
        break;
	case 'blog': 
		$link = 'blog_nus.php';
		break;
	case 'ig-posts': 
		$link = 'ig_posts.php';
		break;
	default:
        $link = 'blog_bcm.php';
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
 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"  id="main-menu">
                    <li class="dropdown" id="localhost">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Localhost <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost" target="_blank">Localhost</a></li>
							
                            <li><a href="http://localhost/phpmyadmin/" target="_blank">phpMyAdmin</a></li>
							
                            <li><a href="http://SaintlyAccountsManager.test">Account Manager</a></li> 

                            <li><a href="?action=archive">Achive Links</a></li> 
							
                            <li class="divider"></li>
                            
                            <li><a href="?action=fanfic">Fanfiction</a></li> 
							
							<li><a href="?action=ig-posts">IG Posts</a></li> 
						
							<li><a href="?action=blog-bcm">BCM Blog</a></li> 
														
							<li><a href="?action=blog">NUS Blog & SEO</a></li> 
							
							<li><a href="?action=nus">NUS & PPB Links</a></li> 					
                        </ul>
                    </li>
                   
                    <li id="trello">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Trello<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="https://trello.com/b/lx8xpiWr/2019-goals" target="_BLANK"><?=date('Y', time())?> Goals</a></li>
                           
                            <li><a href="https://trello.com/b/tT7IOsDu/affiliate-links" target="_BLANK">Affiliate Links</a></li>
						
							<li><a href="https://trello.com/b/Y57UfweD/jokes-quotes" target="_BLANK">Jokes & Quotes</a></li>
													
                            <li><a href="https://trello.com/b/Tu9CxFFh/writing" target="_BLANK">Writing</a></li>
                            
							<li><a href="https://trello.com/b/5CNProvG/animefavoritechannel" target="_BLANK">AnimeFavorite</a></li>
							 
							<li><a href="https://trello.com/b/sguRUO8x/blackcrimesmatter" target="_BLANK">Black Crime Matters</a></li>
                        </ul>
                    </li>
					
					
					<li id="gmail">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gmail<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="https://mail.google.com/mail/u/0/?shva=1#settings/accounts" target="_BLANK">Accounts</a></li>
                            <li><a href="https://mail.google.com/mail/u/0/?shva=1#settings/filters" target="_BLANK">Filters</a></li>
							
							<li class="divider"></li>
							
							<li><a href="https://my.hostmonster.com/cgi-bin/cplogin?lil=1" target="_BLANK">Hostmonster<b class="caret"></b></a></li>
							
							<li><a href="https://my.hostmonster.com/cgi-bin/cplogin?lil=1" target="_BLANK">Login</a></li>
							
							<li><a href="https://host187.hostmonster.com:2083/cpsess7112426105/frontend/hostmonster/cron/index.html" target="_BLANK">Cron Jobs</a></li>
							
                        </ul>
                    </li>
					
                    <li id="trafficwave">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sendgrid <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                            <li><a href="?action=sendgrid_api">Sendgrid API</a></li>

                            <li><a href="?action=newsletters">Newsletters List</a></li>
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
							
							<li class="divider"></li>
                            
							 <li><a href="?action=tw-chain">Campaign Chaining</a></li>
                           
						    <li><a href="?action=tw-global">Global Subscribers</a></li>
                           
                          </ul>
                    </li>
                    
                    <li id="newsletters"> 
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Newsletters <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?action=copy">Newsletters Index</a></li>
                            <li class="divider"></li>
                            <li><a href="?action=newsl-all">All Subscribers - Edit</a></li>
                      		
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-nus">NUS Newsletter - Edit</a></li>
                      
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-mms">Make Money Surveys - Edit</a></li>
                      		
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-online">Online Jobs - Edit</a></li>
                      		
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-ptcprograms">PTC Programs - Edit</a></li>
                      		
                            <li class="divider"></li>
							
                            <li><a href="?action=newsl-ppb">Paypal Booster - Edit</a></li>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login 1x/month<b class="caret"></b></a>
                        <ul class="dropdown-menu">
						
							<li><a href="http://www.easyhits4u.com/" target="_blank">EasyHits4U</a></li>
                            
                            <li class="divider"></li>
                            
							<li><a href="http://neobux.com/login" target="_blank"></a></li>
							
                            <li><a href="http://neobux.com/login" target="_blank">Neobux</a></li>

                            <li><a href="http://ysense.com/login" target="_blank">ySense</a></li>
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
    if ($splitScreen)
        echo '<table width="100%" height="95%">
	<tr>
            <td width="40%"><iframe src="' . $leftScreen . '"></iframe></td>
            <td><iframe src="' . $rightScreen . '"></iframe></td>
	</tr>
	</table>';
    else
        echo '<iframe width=100% height=95% src="' . $link . '"></iframe>';
    ?>
</body>
</html>