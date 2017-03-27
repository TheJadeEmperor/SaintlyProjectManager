<?php
include('include/functions.php');


function showLinksGroup ($group) {
	global $archiveLinks;
	
	foreach($archiveLinks[$group] as $name => $url) {
		
		$urlDisplay = shortenText($url, 30);
		echo '<p title="'.$url.'"><a href="'.$url.'" target="_BLANK">'.$name.'</a> - 
		<a href="'.$url.'" target="_BLANK">'.$urlDisplay.'</a></p>';
	}
}

global $archiveLinks; 

$archiveLinks = array(
	'Code_Geass' => array(
		'Code Geass Refrain' => 'http://codegeass.us/',
		'Admin Login' => 'http://codegeass.us/admin/',
		'Facebook Group' => 'https://www.facebook.com/groups/cgrefrain3/',
	),
	'PTC_Sales_Pages' => array(
		'PTC Code' => 'http://the-ptc-code.com/free-ebook.html',
		'Universal PTC Guide' => 'http://www.ptcdirectreferrals.com/?hop=53754',
		'Top New Paying Sites' => 'http://newpayingsites.com/',
		'Best PTC Paying' => 'http://www.bestptcpaying.com/',
		'Best PTC Sites' => 'http://best-ptc-sites.org/',
		'Top 10 PTC' => 'http://top10-ptc.com/',
		'Top PTC 4ever' => 'http://topptc4ever.com/', 
	),
	'Clickbank_Products' => array( 
		'GCFS' => 'http://www.getcashforsurveys.com/?hop=benlouie',
		'GCFS Members Login' => 'http://www.getcashforsurveys.com/members/',
		'Real Translator Jobs' => 'http://www.realtranslatorjobs.com/?hop=benlouie',
		'RTJ Members Login' => 'http://www.realtranslatorjobs.com/members/members.php'
	),
	'Useful_Tools' => array(
		'10 Minute Mail' => 'http://10minutemail.com/10MinuteMail/index.html',
		'Fax Zero' => 'http://faxzero.com/',
		'Logical Fallacy' => 'https://yourlogicalfallacyis.com',
		'4 Hour Work Week' => 'http://fourhourworkweek.com/',
		'Ramit Sethi site' => 'http://www.iwillteachyoutoberich.com/',
		'Cashflow Game' => 'http://www.richdad.com/apps-games/cashflow-classic.aspx'
		
	),
	'Training_Links' => array(
		'Ramit Sethi - Interviewing' => 'http://privatelist.findyourdreamjob.com/master-level-interviewing/',
		'Find person by email address' => 'http://www.labnol.org/internet/find-person-by-email-address/13913/',
		'Best gmail tips' => 'http://www.businessinsider.com/the-best-gmail-tips-tricks-and-extensions-2016-5',
		'Forcing Functions' => 'http://www.danmartell.com/forcingfunctions/',
	),
	'Forums' => array(
		'Modee World - Paypal / Ebay Forums' => 'http://www.modeeworld.com/forums/',
		'Favorite Fiverr Gigs - BlackHatWorld' => 'http://www.blackhatworld.com/blackhat-seo/black-hat-seo/399209-favorite-fiverr-gigs.html',
		'WarriorForum - The War Room' => 'http://www.warriorforum.com/war-room/',
	)
	
);

?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!--<link href="<?= $dir ?>admin.css" rel="stylesheet" type="text/css" media="screen" />-->
	
	

<div class="pull-left">

	<div class="panel panel-default">
		<div class="panel-heading">Anime Empire</div>

		<div class="panel-body">

		<?
		showLinksGroup('Code_Geass')
		?>
		</div>   
	</div>
	
	
	<div class="panel panel-default">
		<div class="panel-heading">Clickbank Products</div>

		<div class="panel-body">

		<?
		showLinksGroup('Clickbank_Products')
		?>
		</div>   
	</div>
	
	
	<div class="panel panel-default">
		<div class="panel-heading">Useful Tools</div>

		<div class="panel-body">

		<?
		showLinksGroup('Useful_Tools')
		?>
		</div>
	</div>

	
</div>


<div class="pull-left">

	<div class="panel panel-default">
		<div class="panel-heading">PTC Sales Pages</div>

		<div class="panel-body">

		<?
		showLinksGroup('PTC_Sales_Pages')
		?>
		</div>
	</div>


	<div class="panel panel-default">
		<div class="panel-heading">Training Links</div>

		<div class="panel-body">

		<?
		showLinksGroup('Training_Links')
		?>
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">Forums</div>

		<div class="panel-body">

		<?
		showLinksGroup('Forums')
		?>
		</div>
	</div>
</div>