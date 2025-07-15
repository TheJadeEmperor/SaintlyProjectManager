<?php

$siteAirbnb = 'https://vacationrentals4ny.com';
$localAirbnb = 'http://vacationrentals4ny.test';

$siteBlog = 'https://vacationrentals4ny.com/blog';
$localBlog = 'http://vacationrentals4ny.test/blog';

$siteWP = 'https://vacationrentals4ny.com/wp-login.php';
$localWP = 'http://vacationrentals4ny.test/wp-login.php';

$shittyLocal = 'http://localhost//2134_shelter/';
$shittyLive = 'https://noshelterhere.com/';

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
            <br /> <p>Vacation Rentals 4 NY</p>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm text-sm-end">
            <a target="_BLANK" href="<?=$localAirbnb?>"><?=$localAirbnb?></a> <br />
            <a target="_BLANK" href="<?=$localBlog?>"><?=$localBlog?></a> <br />
            <a target="_BLANK" href="<?=$localWP?>"><?=$localWP?></a>
        </div>
        <div class="col-sm text-start">
            <a target="_BLANK" href="<?=$siteAirbnb?>"><?=$siteAirbnb?></a> <br />
            <a target="_BLANK" href="<?=$siteBlog?>"><?=$siteBlog?></a> <br />
            <a target="_BLANK" href="<?=$siteWP?>"><?=$siteWP?></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
          <div class="section-heading">
            <br /> <p>Properties </p> 
          </div>
        </div>
    </div>
   <div class="row">
        <div class="col-sm text-sm-end">
            <a href="">105 Pine Cone Lane</a>  <br />
            Jennifer Cottone 10-3-2 <br /> 
        </div>
        <div class="col-sm text-start">
            <a target="_BLANK" href="https://app.turno.com/properties/523877">Turno</a> <br />
            <a target="_BLANK" href="https://drive.google.com/drive/folders/14ylgljqnW7Zy_HcoxXhxOSiO9VZqv9VH?usp=drive_link">G-Drive</a> <br />

            <a target="_BLANK" href="https://www.airbnb.com/hosting/listings/editor/1397966363653363779/details/photo-tour">Airbnb Listing</a> |  <a target="_BLANK" href="https://www.airbnb.com/hosting/listings/editor/1397966363653363779/details/photo-tour">Edit</a> | <a target="_BLANK" href="https://www.airbnb.com/multicalendar/1397966363653363779/pricing-settings/fees">Fees</a> | <a target="_BLANK" href="https://airbnb.com/h/mtg-firepit">| Live </a> <br /> 
            
            <a target="_BLANK" href="https://app.pricelabs.co/pricing?listings=1397966363653363779&pms_name=airbnb&open_calendar=true">Pricelabs</a> | 
            <a href="https://app.pricelabs.co/reports/140863">Comp Set</a> <br />
            <a target="_BLANK" href="https://my.hospitable.com/properties/property/1830588/messaging-rules">Hospitable Messages</a>
        </div>
    </div>

       <div class="row">
        <div class="col-sm text-sm-end">
            2037 Coyle Street 
            2-1-1
        </div>
        <div class="col-sm text-start">
            <a target="_BLANK" href="#">G-Drive</a> <br /> 

            <a target="_BLANK" href="https://www.airbnb.com/hosting/listings/editor/841300394500737442/details/photo-tour">Airbnb Listing</a> | <a target="_BLANK" href="https://www.airbnb.com/hosting/listings/editor/841300394500737442/details/photo-tour">Edit</a> | <a target="_BLANK" href="https://www.airbnb.com/multicalendar/841300394500737442/pricing-settings/fees">Fees</a> | <a target="_BLANK" href="https://www.airbnb.com/rooms/841300394500737442?source_impression_id=p3_1719790415_P36temSnhYUDm2Le">| Live </a> <br />

            <a target="_BLANK" href="https://app.pricelabs.co/pricing?listings=841300394500737442&pms_name=airbnb&open_calendar=true">Pricelabs</a> <br />
            <a target="_BLANK" href="https://my.hospitable.com/properties/property/1830574/messaging-rules">Hospitable Messages</a>
        </div>
    </div>
    
</div>


</center>