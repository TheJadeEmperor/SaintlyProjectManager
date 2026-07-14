<?php
$siteAirbnb = 'https://littlebookstays.com';
$localAirbnb = 'http://vacationrentals4ny.test';

$siteG = 'https://littlebookstays.com/guests/';
$localG = 'http://vacationrentals4ny.test/guests/';

$siteBlog = 'https://littlebookstays.com/blog';
$localBlog = 'http://vacationrentals4ny.test/blog';

$siteWP = 'https://littlebookstays.com/wp-login.php';
$localWP = 'http://vacationrentals4ny.test/wp-login.php';

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
                <br /> RevPAR = Rev per available room <br /> 
                ADR = average daily rate <br />
                LOS = length of stay <br /> 
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

                <i class="fa fa-check-square-o"></i> <a href="https://www.notion.so/Onboarding-Steps-2f0e540782c180c4a93ced63633d4337" target="_BLANK">Onboarding Steps</a>  | notion<br /> 

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
                    <a target="_BLANK" href="<?=$localG?>"><?=$localG?></a> <br />
                    <a target="_BLANK" href="<?=$localBlog?>"><?=$localBlog?></a> <br />
                    <a target="_BLANK" href="<?=$localWP?>"><?=$localWP?></a>
                </div>
                <div class="col-sm text-start">
                    Live <br />
                    <a target="_BLANK" href="<?=$siteAirbnb?>"><?=$siteAirbnb?></a> <br />
                    <a target="_BLANK" href="<?=$siteG?>"><?=$siteG?></a> <br />
                    <a target="_BLANK" href="<?=$localBlog?>"><?=$localBlog?></a> <br />
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


// --- DB Props ---
    $mysqli = new mysqli('localhost', 'root', 'password', 'props');

    if (!$mysqli->connect_error) {
        $result = $mysqli->query("SELECT * FROM props ORDER BY num desc");

        while ($p = $result->fetch_assoc()) {

            $propName = $p['name']; // or a name field if you add one to the table

            if ($p['shorturl'])
                $propTitle = '<a target="_BLANK" href="'.$p['shorturl'].'">'.$propName.'</a>';
            else
                $propTitle = $propName;

            $output = '<div class="row">
            <div class="col-sm text-sm-end">'.$propTitle.'<br />
            <a href="'.$p['close'].'" target="_BLANK">'.$p['client'].'</a> <br />
            <a href="https://www.google.com/maps/place/'.$p['zip'].'" target="_BLANK">'.$p['zip'].'</a></div>
            <div class="col-4 text-start">';

            if ($p['turno']) {
                $output .= '<a target="_BLANK" href="'.$p['turno'].'">Turno</a> | ';
            }

            if ($p['gdrive']) {
                $output .= '<a target="_BLANK" href="https://drive.google.com/drive/folders/'.$p['gdrive'].'">G-Drive</a>';
            }

            if ($p['hub']) {
                $output .= ' | <a target="_BLANK" href="https://littlebookstays.com/wp-admin/post.php?post='.$p['hub'].'&action=edit"><span class="propHub">Prop Hub</span></a>'.$newline;
            }
			
            if ($p['a_listing']) {
                $output .= '<a target="_BLANK" href="https://www.airbnb.com/hosting/listings/editor/'.$p['a_listing'].'/details/photo-tour">A Listing</a> | <a target="_BLANK" href="'.$p['a_amen'].'">Amen</a> | <a target="_BLANK" href="'.$p['a_fees'].'">Fees</a> | <a target="_BLANK" href="'.$p['a_live'].'">Live</a>';
            }
			 

            if ($p['v_list']) {
                $output .= $newline.'<a target="_BLANK" href="'.$p['v_list'].'">V Listing</a> | <a target="_BLANK" href="'.$p['v_fees'].'">Fees</a> | <a target="_BLANK" href="'.$p['v_ins'].'">Ins</a>';
            }

            $output .= $newline;

            $output .= '<a target="_BLANK" href="https://my.hospitable.com/calendar/property/'.$p['hosp'].'"><span class="hospital">H Calendar</span></a> | <a target="_BLANK" href="'.$p['hosp_msg'].'"><span class="hospital">H Msg</span></a> ';
            

            if ($p['hostco'])
                $output .= ' | <a target="_BLANK" href="'.$p['hostco'].'"><span class="hospital">Hostco</span></a>'; 
			 
		
            if ($p['pricelabs']) {
                $output .= $newline.'<a target="_BLANK" href=" https://app.pricelabs.co/pricing?listings='.$p['pricelabs'].'&pms_name=smartbnb&open_calendar=true"><span class="pricelabs">Pricelabs</span></a>';

                if ($p['compset'])
                    $output .= ' | <a target="_BLANK" href="https://app.pricelabs.co/reports/'.$p['compset'].'&template=full_dashboard ">Comp Set</a>';

                if ($p['intel'])
                    $output .= ' <a target="_BLANK" href="'.$p['intel'].'">Intellihost</a>';

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

            <i class="fa fa-trophy"></i> <a target="_BLANK" href=" https://app.close.com/lead/lead_n0vfRarxwMaY6aqUKqFVuFyY59jbVIf51D8UISzdYeE/">Intellihost</a><br />
            <i class="fa fa-android"></i> <a target="_BLANK" href="https://app.close.com/lead/lead_QOQdqH8zFy0J8hnPPZqqlyCN84D0NGb6lfK1FrrVkzg/">Hostbuddy</a><br />
            <i class="fa fa-book"></i> <a target="_BLANK" href="https://app.close.com/lead/lead_on24Hvop5B62XTCxZVEB8nsNnKWcwYYcu4CzbaD0Ir3/">Hostco</a><br />
             <i class="fa fa-book"></i> <a target="_BLANK" href="https://app.close.com/lead/lead_ugTE9dJoj0W6p3OfKTbF4wBuIBpw79WKFKuoinwEda2/">Vrbo Villains</a><br />

        </div>
    </div>


</div><!--row-->  
     
    </div>
</div>


</center>