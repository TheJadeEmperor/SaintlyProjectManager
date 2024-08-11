<?php

$siteNinja = 'https://CodeLikeANinja.com';
$localNinja = 'http://CodeLikeANinja.test';

$siteAirbnb = 'https://vacationrentals4ny.com';
$localAirbnb = 'http://localhost//vacationrentals4ny.com';

$siteBLWS = 'https://benjaminlouie.com';
$localBLWS = 'http://localhost//BenjaminLouie';

$scamLocal = 'http://localhost//SusanZhuangLies';
$scamSite = 'https://susanzhuanglies.com';

$site5G = 'https://5gradio1.com';
$local5G = 'http://localhost//5gradio1.com';

$siteCulture = 'https://myculturelink.com/';
$localCulture = 'http://localhost//MyCultureLink';

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
            <br /> <p>Benjamin4NY</p>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm text-sm-end">
         
            <a target="_BLANK" href="<?=$localAirbnb?>"><?=$localAirbnb?></a>
        </div>
        <div class="col-sm text-start">
      
            <a target="_BLANK" href="<?=$siteAirbnb?>"><?=$siteAirbnb?></a>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg">
          <div class="section-heading">
            <br /> <p>MyCultureLink</p>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm text-sm-end">
         
            <a target="_BLANK" href="<?=$localCulture?>"><?=$localCulture?></a>
        </div>
        <div class="col-sm text-start">
      
            <a target="_BLANK" href="<?=$siteCulture?>"><?=$siteCulture?></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
          <div class="section-heading">
            <br /> <p>BL Web Solutions</p>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm text-sm-end">
         
            <a target="_BLANK" href="<?=$localBLWS?>"><?=$localBLWS?></a>
        </div>
        <div class="col-sm text-start">
      
            <a target="_BLANK" href="<?=$siteBLWS?>"><?=$siteBLWS?></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
          <div class="section-heading">
            <br /> <p>Scammer Susan</p>
          </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm text-sm-end">
         
            <a target="_BLANK" href="<?=$scamLocal?>"><?=$scamLocal?></a>
        </div>
        <div class="col-sm text-start">
      
            <a target="_BLANK" href="<?=$scamSite?>"><?=$scamSite?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
          <div class="section-heading">
            <br /><p>5GRadio1</p>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md text-sm-end">
         
            <a target="_BLANK" href="<?=$local5G?>"><?=$local5G?></a>
        </div>
        <div class="col-md text-start">
         
            <a target="_BLANK" href="<?=$site5G?>"><?=$site5G?></a>
        </div>
    </div>
</div>
 
</center>