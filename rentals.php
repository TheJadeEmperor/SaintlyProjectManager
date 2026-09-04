<?php
$siteAirbnb = 'https://littlebookstays.com';
$localAirbnb = 'http://littlebookstays.test';

$siteBlog = 'https://littlebookstays.com/blog';
$localBlog = 'http://littlebookstays.test/blog';

$siteWP = 'https://littlebookstays.com/wp-login.php';
$localWP = 'http://littlebookstays.test/wp-login.php';

$newline = ' <br />';


?>
<head>
    <title>Saintly Project Manager</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
   
    <script src="http://code.jquery.com/jquery-latest.min.js" type='text/javascript' /></script> 
    <script src="include/jquery-ui/ui/jquery-ui.js"></script>
    <script src="include/bootstrap/js/bootstrap.js"></script>

    <link href="<?= $dir ?>admin.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<center>
<div class="container">
    <div class="row">

        <div class="col-2 text-start">
            <div class="section-heading">
                <br /> 
                Airbnb Atrocity = 15.5% fee <br />
                Hospital = 18.35% to even out the 15.5% fee <br />
                ADR = average daily rate <br />
                2 night min | 3 night min for far out bookings<br /> 
            </div>
            
            <div>
                <br /> <strong>AI Tools</strong>  <br /> 
                 
                <i class="fa fa-diamond"></i> <a target="_BLANK" href="https://gemini.google.com/app">gemini | chat</a> <br />

                <i class="fa fa-folder"></i> <a target="_BLANK" href="https://grok.com/project">grok projects</a> <br />

                <i class="fa fa-magic"></i> <a target="_BLANK" href="https://www.grok.com">grok | novels </a><br />

                <i class="fa fa-code"></i> <a target="_BLANK" href="https://claude.ai/projects">claude | code</a><br /> 
                 
            </div>
            <div>
                <br /> <strong>Sales Forms</strong> <br /> 
                <i class="fa fa-file-text-o"></i> <a href="https://drive.google.com/drive/folders/1fBPRkrfLUd7_hx08NCDepKgLcgMP1Ekw" target="_BLANK">Onboarding Forms</a> | gdrive<br /> 

                <i class="fa fa-check-square-o"></i> <a href="http://localhost//onboarding_steps/" target="_BLANK">Onboarding Steps</a> | localhost<br /> 

                <i class="fa fa-check-square-o"></i> <a href="http://littlebookstays.test/wp-admin/admin.php?page=lbs-onboarding" target="_BLANK">Onboarding Steps</a> | Staging WP<br /> 

                <i class="fa fa-check-square-o"></i> <a href="https://littlebookstays.com/wp-admin/admin.php?page=lbs-onboarding" target="_BLANK">Onboarding Steps</a> | Live WP<br /> 


                <i class="fa fa-microphone"></i> <a href="https://drive.google.com/drive/folders/1vYQLa272dzjUdnllnQyAd-0k-mgxkuMJ" target="_BLANK">Sales Scripts</a> | gdrive<br /> 

                <i class="fa fa-book"></i> <a href="https://drive.google.com/drive/folders/1bqj6vWUCHvW9Wk5KSSCcWHB0NK7BFCQH" target="_BLANK">VA Training</a> | gdrive<br /> 
            </div>
            <div>
              
                 <br />
            </div>
        </div><!-- <div class="col-2 text-start">--> 
        <div class="col-8">
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
                        <br /><p> Listings | <strong><a target="_BLANK" href="https://www.airbnb.com/hosting/listings">Airbnb</a></strong> | <a target="_BLANK" href="https://www.vrbo.com/p/properties">VRBO</a> </p> 
                    </div>
                </div>
            </div>

            
<?php


// --- DB Props ---
    $mysqli = new mysqli('localhost', 'root', 'password', 'rentals');

    if (!$mysqli->connect_error) {
        $result = $mysqli->query("SELECT * FROM pm_prop_hub ORDER BY num desc");

        while ($p = $result->fetch_assoc()) {

            if($p['status'] == 0) {continue;}

            $propName = $p['name']; // or a name field if you add one to the table

            if ($p['shorturl'])
                $propTitle = '<a target="_BLANK" href="'.$p['shorturl'].'">'.$propName.'</a>';
            else
                $propTitle = $propName;

            $output = '<div class="row">
            <div class="col-sm text-sm-end">'.$propTitle.'<br />
            <a href="'.$p['close'].'" target="_BLANK">'.$p['client'].'</a> <br />
            <a href="https://www.google.com/maps/place/'.$p['zip'].'" target="_BLANK">'.$p['zip'].'</a></div>
            <div class="col-5 text-start">';

            if ($p['turno']) {
                $output .= '<a target="_BLANK" href="'.$p['turno'].'">Turno</a> | ';
            }

            if ($p['gdrive']) {

                $base_url_gdrive = 'https://drive.google.com/drive/folders/';

                $output .= '<a target="_BLANK" href="'.$base_url_gdrive.$p['gdrive'].'">G-Drive</a>';
            }

            
            if ($p['hostco']) {
                $base_url_hostco = 'https://app.thehost.co/store/';

                $output .= ' | <a target="_BLANK" href="'.$base_url_hostco.$p['hostco'].'"><span class="hospital">Hostco</span></a>'; 
            }
			 
 
            if ($p['a_listing']) {
                $output .= $newline.'<a target="_BLANK" href="https://www.airbnb.com/hosting/listings/editor/'.$p['a_listing'].'/details/photo-tour">A Listing</a> | 
                <a target="_BLANK" href="https://www.airbnb.com/hosting/listings/editor/'.$p['a_listing'].'/details/amenities">Amen</a> | 
                <a target="_BLANK" href="https://www.airbnb.com/multicalendar/'.$p['a_listing'].'/discounts">Discounts</a> | 
                <a target="_BLANK" href="'.$p['a_direct'].'">Direct</a>';
            }


            if ($p['v_list']) {
                $output .= $newline.'<a target="_BLANK" href="'.$p['v_list'].'">V Listing</a> 
                | <a target="_BLANK" href="'.$p['v_fees'].'">Fees</a> 
                | <a target="_BLANK" href="'.$p['v_ins'].'">Ins</a>';
            }

            $output .= $newline;

           
            $base_url_h_calendar = 'https://my.hospitable.com/calendar/property/'; 
            $base_url_h_msg = 'https://my.hospitable.com/gx/messaging/rules;query=';
            $base_url_h_custom_code = 'https://my.hospitable.com/gx/messaging/custom-codes;query=';

            $output .= '<a target="_BLANK" href="'.$base_url_h_calendar.$p['hosp'].'"><span class="hospital">H Calendar</span></a> 
            | <a target="_BLANK" href="'.$p['hosp_msg'].'"><span class="hospital">H Msg</span></a> 
            | <a target="_BLANK" href="'.$p['h_custom_code'].'"><span class="hospital">H Custom Codes</span></a>';

		
            if ($p['pricelabs']) {
                $output .= $newline.'<a target="_BLANK" href=" https://app.pricelabs.co/pricing?listings='.$p['pricelabs'].'&pms_name=smartbnb&open_calendar=true"><span class="pricelabs">Pricelabs</span></a>';

                if ($p['compset'])
                    $output .= ' | <a target="_BLANK" href="https://app.pricelabs.co/reports/'.$p['compset'].'&template=full_dashboard ">Comp Set</a>';

            }

            $output .= '</div>
            <div class="col-sm text-start">
            
            </div>
            </div>';

            echo $output.$newline;
        }

        $mysqli->close();
    }

   
?>
    </div><!--<div class="col-8">-->
    
   
    <!-- right sidebar -->
    <div id="teammates" class="col-2 text-start">   
        
        <div class="section-heading">
            <br /><strong>Teammates</strong><br />

            <i class="fa fa-android"></i> <a target="_BLANK" href="https://app.close.com/lead/lead_k1dzGfSSEdfEs9wfWtflyMhm5RrJr5GASSBkxM8fw5R/">CC Mahran Makin</a><br />

            <i class="fa fa-android"></i> <a target="_BLANK" href="https://app.close.com/lead/lead_xZEzkkgcSF7sJuXrXLUzvhSFvSOpizwrzfguYpgoO5U/">VA Zoha</a><br />
                     
            <i class="fa fa-android"></i> <a target="_BLANK" href="https://app.close.com/lead/lead_QOQdqH8zFy0J8hnPPZqqlyCN84D0NGb6lfK1FrrVkzg/">Hostbuddy</a><br />

            <i class="fa fa-book"></i> <a target="_BLANK" href="https://app.close.com/lead/lead_on24Hvop5B62XTCxZVEB8nsNnKWcwYYcu4CzbaD0Ir3/">Hostco</a><br />

             <i class="fa fa-book"></i> <a target="_BLANK" href="https://app.close.com/lead/lead_ugTE9dJoj0W6p3OfKTbF4wBuIBpw79WKFKuoinwEda2/">Vrbo Villains</a><br />

             <i class="fa fa-book"></i> <a target="_BLANK" href="https://app.close.com/lead/lead_Qicd9QBBuzBNL55aJ8ias8AvJQYmMxtddB4Z9L1Oe1m/">Clickfire</a><br />

        </div>
    </div>
 

</div><!--row-->  
     
    </div>
</div>


</center>