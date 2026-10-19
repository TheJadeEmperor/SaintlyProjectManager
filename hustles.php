<!DOCTYPE html>
<html>
<head>
    <link href="admin.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<?php
include('include/config.php');
//domains 
$flypDomain = 'https://tools.joinflyp.com/'; 

 
?> 
<div class="container-fluid">
    <div class="container-fluid">
        <div class="row hustle-links-row">
            <div class="col-12 hustle-link-column">
                <div class="row">
                    <center><p>Marketing </p> </center>
                </div>
            </div>
        </div>

        <div class="row hustle-links-row">
            <div class="col-md-6 hustle-link-column">
                <div class="contentBox rightAlign">
                    <p>Mailchimp<br />
                    <a href="https://login.mailchimp.com/" target="_blank">https://login.mailchimp.com/</a></p>

                    <p>U: <?=$mailchimpUser ?> P: <?=$mailchimpPass ?> </p>

                    <p>Canva<br />
                    <a href="https://www.canva.com/projects" target="_blank">https://www.canva.com/projects</a></p>

                    <p>U: <?=$mailchimpUser ?> P: <?=$mailchimpPass ?> </p>
                </div>
            </div>
            <div class="col-md-6 hustle-link-column">
                <div class="contentBox">
                    <p>tinyurl <br />
                    <a href="https://tinyurl.com/#recent-links" target="_blank">https://tinyurl.com/#recent-links</a></p>

                    <p>U: <?=$tinyurlUser ?> P: <?=$tinyurlPass ?>  </p>


                    <p>Flyp <br />
                    <a href="https://tools.joinflyp.com/my-items" target="_blank">https://tools.joinflyp.com/my-items</a><br /> 
                    <p>U: <?=$flypUser ?> P: <?=$flypPass?>  </p> 
                </div>
            </div>
        </div>
        <!--
        <div class="row hustle-links-row">
            <div class="col-md-6 hustle-link-column">
                <div class="contentBox rightAlign">

                </div>
            </div>
            <div class="col-md-6 hustle-link-column">
                <div class="contentBox">

                </div>
            </div>
        </div> --> 
    </div>

    <div class="row hustle-links-row">
        <div class="col-md-6 hustle-link-column">
            <div class="contentBox hustle-account-box rightAlign">
              
                <p>Poshmark <br />
                <a href="https://poshmark.com/login?fpm=true" target="_blank">https://poshmark.com/login?fpm=true</a></p>

                <p>U: <?=$poshmarkUser ?> P: <?=$poshmarkPass ?>  </p>
            </div>
        </div>
        <div class="col-md-6 hustle-link-column">
            <div class="contentBox hustle-account-box">
                <p>Mercari</p>
                <p><a href="https://www.mercari.com/mypage/listings/active/" target="_blank">https://www.mercari.com/mypage/listings/active/</a></p>

                <p>U: <?=$mercUser ?> P: <?=$mercPass ?>  </p> 
            </div>
        </div>
    </div>

    <div class="row hustle-links-row">
        <div class="col-md-6 hustle-link-column">
            <div class="contentBox hustle-account-box rightAlign">
                <p>eBay - VA to register<br />
                <a href="https://www.ebay.com/sh/lst/active" target="_blank">https://www.ebay.com/sh/lst/active</a></p>

                 <p>U: <?=$ebayUser ?> P: <?=$ebayPass ?>  </p> 
            </div>
        </div>
        <div class="col-md-6 hustle-link-column">
            <div class="contentBox hustle-account-box">
                <p>Etsy<br />
                <a href="https://www.etsy.com/your/shops/me/listings/active" target="_blank">https://www.etsy.com/your/shops/me/listings/active</a></p>

                <p>U: <?=$etsyUser ?> P: <?=$etsyPass ?>  </p> 
            </div>
        </div>
</div>


</body>
</html>