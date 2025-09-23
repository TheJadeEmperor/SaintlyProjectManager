<?php

$siteAirbnb = 'https://littlebookstays.com';
$localAirbnb = 'http://vacationrentals4ny.test';

$siteBlog = 'https://littlebookstays.com/blog';
$localBlog = 'http://vacationrentals4ny.test/blog';

$siteWP = 'https://littlebookstays.com/wp-login.php';
$localWP = 'http://vacationrentals4ny.test/wp-login.php';

$shittyLocal = 'http://localhost//2134_shelter/';
$shittyLive = 'https://noshelterhere.com/';


$propsAll = array(
'59 Gregory Dr<br />Steve Summers 6-3-1.5' => array(
        'shorturl' => '',
        'Turno' => 'https://app.turno.com/properties/589380',
        'G-Drive' => 'https://drive.google.com/drive/folders/1PDWk7DbFB25ypyLAVJsrBxu4uN8W9EKd', 

        'Airbnb Listing' => 'https://www.airbnb.com/hosting/listings/editor/1501050725249962697/details/photo-tour', 
        'Amenities' => 'https://www.airbnb.com/hosting/listings/editor/1501050725249962697/details/amenities',
        'Fees' => 'https://www.airbnb.com/multicalendar/1501050725249962697/pricing-settings/fees',
        'A Live' => 'https://www.airbnb.com/rooms/1501050725249962697',
        
        'Vrbo Listing' => 'https://www.vrbo.com/supply/pe/?propertyId=120651120', 
        'V Calendar' => 'https://www.vrbo.com/p/calendar/321.4844374.5418540', 
        'V Live' => '', 

        'Pricelabs' => 'https://app.pricelabs.co/pricing?listings=1501050725249962697&pms_name=airbnb&open_calendar=true',
        'Comp Set' => '',
        'Rankbreeze' => '',
        'Hospitable' => '',
        'H Calendar' => '', 
    ), 


    '105 Pine Cone Lane<br />Jennifer Cottone 10-3-2' => array(
        'shorturl' => 'https://airbnb.com/h/mtg-firepit',
        'Turno' => 'https://app.turno.com/properties/523877',
        'G-Drive' => 'https://drive.google.com/drive/folders/14ylgljqnW7Zy_HcoxXhxOSiO9VZqv9VH?usp=drive_link', 
        'Airbnb Listing' => 'https://www.airbnb.com/hosting/listings/editor/1397966363653363779/details/photo-tour',

        'Amenities' => 'https://www.airbnb.com/hosting/listings/editor/1397966363653363779/details/amenities',
        'Fees' => 'https://www.airbnb.com/multicalendar/1397966363653363779/pricing-settings/fees',
        'A Live' => 'https://www.airbnb.com/rooms/1397966363653363779?source_impression_id=p3_1752274162_P3ZEAwc7Eau_D_ga',
        
        'Vrbo Listing' => 'https://www.vrbo.com/supply/pe/?propertyId=120453789', 
        'V Calendar' => 'https://www.vrbo.com/p/calendar/321.4824102.5398269', 
        'V Live' => 'https://www.vrbo.com/4824102?dateless=true', 

        'Pricelabs' => 'https://app.pricelabs.co/pricing?listings=0e7b5cb5-de02-4a13-abb9-6b2f87e557e5&pms_name=smartbnb&open_calendar=true',
        'Comp Set' => 'https://app.pricelabs.co/reports/140863',
        'Rankbreeze' => 'https://app.rankbreeze.com/rankings/116604/optimization',
        'Hospitable' => 'https://my.hospitable.com/properties/property/1830588/messaging-rules',
        'H Calendar' => 'https://my.hospitable.com/calendar/property/1830588', 
    ), 

    '2037 Coyle Street 2-1-1' => array(
        'shorturl' => '',
        'G-Drive' => 'https://drive.google.com/drive/folders/1u4P7hDa_OXMzd3wGbEeNF0pFPHXueRiA?usp=drive_link',
        'Airbnb Listing' => 'https://www.airbnb.com/hosting/listings/editor/841300394500737442/details/photo-tour',
        'Amenities' => 'https://www.airbnb.com/hosting/listings/editor/841300394500737442/details/amenities',
        'Fees' => 'https://www.airbnb.com/multicalendar/841300394500737442/pricing-settings/fees',
        'A Live' => 'https://www.airbnb.com/rooms/841300394500737442?source_impression_id=p3_1719790415_P36temSnhYUDm2Le',
        'Pricelabs' => 'https://app.pricelabs.co/pricing?listings=b67a0e70-784b-4c5f-9713-e2b2cfe7342c&pms_name=smartbnb&open_calendar=true', 
        'Comp Set' => 'https://app.pricelabs.co/reports/140863',
        'Rankbreeze' => 'https://app.rankbreeze.com/rankings/116605/optimization',
        'Hospitable' => 'https://my.hospitable.com/properties/property/1830574/messaging-rules', 
        'H Calendar' => 'https://my.hospitable.com/calendar/property/1830574', 
    ),
 
);

?>
<head>
    <title>Saintly Projects Manager</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link href="<?= $dir ?>admin.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type='text/javascript' /></script> 
    <script src="include/jquery-ui/ui/jquery-ui.js"></script>
    <script src="include/bootstrap/js/bootstrap.js"></script>
</head>

<center>
<div class="container">
    <div class="row">
        <div class="col-lg">
          <div class="section-heading">
            <br /> <p>Little Book Stays</p>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm text-sm-end">
            Localhost <br />
            <a target="_BLANK" href="<?=$localAirbnb?>"><?=$localAirbnb?></a> <br />
            <a target="_BLANK" href="<?=$localBlog?>"><?=$localBlog?></a> <br />
            <a target="_BLANK" href="<?=$localWP?>"><?=$localWP?></a>
        </div>
        <div class="col-sm text-start">
            Live <br />
            <a target="_BLANK" href="<?=$siteAirbnb?>"><?=$siteAirbnb?></a> <br />
            <a target="_BLANK" href="<?=$siteBlog?>"><?=$siteBlog?></a> <br />
            <a target="_BLANK" href="<?=$siteWP?>"><?=$siteWP?></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
          <div class="section-heading">
            <br /><p> Listings | <a target="_BLANK" href="https://www.airbnb.com/hosting/listings">Airbnb</a> | <a target="_BLANK" href="https://www.vrbo.com/p/properties">VRBO</a> </p> 
          </div>
        </div>
    </div>
   
<?php
$newline = ' <br />';
foreach ($propsAll as $propName => $p) {

    if ($p['shorturl']) 
        $propTitle = '<a target="_BLANK" href="'.$p['shorturl'].'">'.$propName.'</a>';
    else 
        $propTitle = $propName; 

    $output = '<div class="row">
    <div class="col-sm text-sm-end">'.$propTitle.'</div>
    <div class="col-sm text-start">';
 
    if ($p['Turno']) {
        $output .= '<a target="_BLANK" href="'.$p['Turno'].'">Turno</a> <br />';
    }

    if ($p['G-Drive']) { 
        $output .= '<a target="_BLANK" href="'.$p['G-Drive'].'">G-Drive</a>'.$newline;
    } 

    if ($p['Airbnb Listing']) { 
        $output .= '<a target="_BLANK" href="'.$p['Airbnb Listing'].'">Airbnb Listing</a> | <a target="_BLANK" href="'.$p['Amenities'].'">Amen</a> | <a target="_BLANK" href="'.$p['Fees'].'">Fees</a> | <a target="_BLANK" href="'.$p['A Live'].'">Live</a>';
    }

    if ($p['Vrbo Listing']) { 
        $output .= $newline.'<a target="_BLANK" href="'.$p['Vrbo Listing'].'">Vrbo Listing</a> |  <a target="_BLANK" href="'.$p['V Calendar'].'">Calendar</a>';
    }

    if ($p['V Live']) {
        $output .=  ' | <a target="_BLANK" href="'.$p['V Live'].'">Live</a>';
    }


    $output .= $newline.'<a target="_BLANK" href="'.$p['Pricelabs'].'">Pricelabs</a> | '; 

    if($p['Comp Set'])
        $output .= '<a target="_BLANK" href="'.$p['Comp Set'].'">Comp Set</a> '; 

    if($p['Rankbreeze']) 
        $output .= ' | <a target="_BLANK" href="'.$p['Rankbreeze'].'">Rankbreeze</a> '; 

    $output .= $newline;


    $output .= '<a target="_BLANK" href="'.$p['Hospitable'].'">Hospitable</a> | <a target="_BLANK" href="'.$p['H Calendar'].'">Calendar</a>'; 
    $output .= '</div>
    </div>';

    echo $output.$newline;
}

?>
<p>&nbsp;</p>

        <div class="row">
        <div class="col-lg">
          <div class="section-heading">
            <br /> RevPAR = Rev per available room <br /> 
            ADR = average daily rate <br />
            LOS = length of stay <br />
            OTA = online travel agency 
          </div>
        </div>
    </div>
</div>


</center>