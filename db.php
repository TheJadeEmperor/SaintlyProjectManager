<style>
    h1, h2 {
        text-align: center; 
    }
    .contentBox {
        border: 1px solid gray;
        padding: 25px;
    }
</style>
<?
//domains
$siteNUS = 'http://neobuxultimatestrategy.com/';
$localNUS = 'http://localhost/NeobuxUltimateStrategy/';

$siteBPS = 'http://bestpayingsites.com/';
$localBPS = 'http://localhost/bestpayingsites/';

$sitePPB = 'http://bestpayingsites.com/ppbooster/';
$localPPB = 'http://localhost/bestpayingsites/ppbooster/';

//spm pages
$downloadPage = '?action=download&id=vipuser';
$membersPage = 'members';
$forgotPage = 'members/?action=forgot';
$adminPage = 'admin';

$sitePages = '<p align="center"><b>Site Pages</b></p>';

$nus = array(
    'live' => array(
        'Main Site' => '<a href="'.$siteNUS.'" target="_blank">'.$siteNUS.'</a>',
        'Download Page' => '<a href="'.$siteNUS.$downloadPage.'" target="_blank">'.$siteNUS.$downloadPage.'</a>',
        'Members Login' => '<a href="'.$siteNUS.$membersPage.'" target="_blank">'.$siteNUS.$membersPage.'</a>',
        'Forgot Password' => '<a href="'.$siteNUS.$forgotPage.'" target="_blank">'.$siteNUS.$forgotPage.'</a>',
        'Admin Login' => '<a href="'.$siteNUS.$adminPage.'" target="_blank">'.$siteNUS.$adminPage.'</a>'
    ),
    'local' => array(
        'Main Site' => '<a href="'.$localNUS.'" target="_blank">'.$localNUS.'</a>',
        'Download Page' => '<a href="'.$localNUS.$downloadPage.'" target="_blank">'.$localNUS.$downloadPage.'</a>',
        'Members Login' => '<a href="'.$localNUS.$membersPage.'" target="_blank">'.$localNUS.$membersPage.'</a>',
        'Forgot Password' => '<a href="'.$localNUS.$forgotPage.'" target="_blank">'.$localNUS.$forgotPage.'</a>',
        'Admin Login' => '<a href="'.$localNUS.$adminPage.'" target="_blank">'.$localNUS.$adminPage.'</a>'
    ),
);

$bps = array(
    'live' => array(
        'Main Site' => '<a href="'.$siteBPS.'" target="_blank">'.$siteBPS.'</a>',
        'Download Page' => '<a href="'.$siteBPS.$downloadPage.'" target="_blank">'.$siteBPS.$downloadPage.'</a>',
        'Members Login' => '<a href="'.$siteBPS.$membersPage.'" target="_blank">'.$siteBPS.$membersPage.'</a>',
        'Forgot Password' => '<a href="'.$siteBPS.$forgotPage.'" target="_blank">'.$siteBPS.$forgotPage.'</a>',
        'Admin Login' => '<a href="'.$siteBPS.$adminPage.'" target="_blank">'.$siteBPS.$adminPage.'</a>'
    ),
    'local' => array(
        'Main Site' => '<a href="'.$localBPS.'" target="_blank">'.$localBPS.'</a>',
        'Download Page' => '<a href="'.$localBPS.$downloadPage.'" target="_blank">'.$localBPS.$downloadPage.'</a>',
        'Members Login' => '<a href="'.$localBPS.$membersPage.'" target="_blank">'.$localBPS.$membersPage.'</a>',
        'Forgot Password' => '<a href="'.$localBPS.$forgotPage.'" target="_blank">'.$localBPS.$forgotPage.'</a>',
        'Admin Login' => '<a href="'.$localBPS.$adminPage.'" target="_blank">'.$localBPS.$adminPage.'</a>'
    ),
); 

$ppb = array(
    'live' => array(
        'Main Site' => '<a href="'.$sitePPB.'" target="_blank">'.$sitePPB.'</a>',
        'Download Page' => '<a href="'.$sitePPB.$downloadPage.'" target="_blank">'.$sitePPB.$downloadPage.'</a>',
		'FAQ Page ' => '<a href="'.$siteBPS.'?action=faq" target="_blank">'.$siteBPS.'?action=faq</a>'
    ),
    'local' => array(
        'Main Site' => '<a href="'.$localPPB.'" target="_blank">'.$localPPB.'</a>',
        'Download Page' => '<a href="'.$localPPB.$downloadPage.'" target="_blank">'.$localPPB.$downloadPage.'</a>',
		'FAQ Page ' => '<a href="'.$localBPS.'?action=faq" target="_blank">'.$localBPS.'?action=faq</a>'
    ),
);

$spm = array(
    'live' => array(
        'Main Site' => '<a href="'.$siteSPM.'" target="_blank">'.$siteSPM.'</a>',
        'Download Page' => '<a href="'.$siteSPM.$downloadPage.'" target="_blank">'.$siteSPM.$downloadPage.'</a>',
        'Members Login' => '<a href="'.$siteSPM.$membersPage.'" target="_blank">'.$siteSPM.$membersPage.'</a>',
        'Forgot Password' => '<a href="'.$siteSPM.$forgotPage.'" target="_blank">'.$siteSPM.$forgotPage.'</a>',
        'Admin Login' => '<a href="'.$siteSPM.$adminPage.'" target="_blank">'.$siteSPM.$adminPage.'</a>'
    ),
    'local' => array(
        'Main Site' => '<a href="'.$localSPM.'" target="_blank">'.$localSPM.'</a>',
        'Download Page' => '<a href="'.$localSPM.$downloadPage.'" target="_blank">'.$localSPM.$downloadPage.'</a>',
        'Members Login' => '<a href="'.$localSPM.$membersPage.'" target="_blank">'.$localSPM.$membersPage.'</a>',
        'Forgot Password' => '<a href="'.$localSPM.$forgotPage.'" target="_blank">'.$localSPM.$forgotPage.'</a>',
        'Admin Login' => '<a href="'.$localSPM.$adminPage.'" target="_blank">'.$localSPM.$adminPage.'</a>'
    ),
); 
?> 
<center>


    
    <table>
    <tr valign="top">
        <td>
            <div class="contentBox">
                <h2>NUS - live</h2>
                <?
                foreach($nus['live'] as $siteTitle => $siteURL) {
                    echo '<p>'.$siteTitle.'<br />'.$siteURL.'</p>';
                }
                ?>

                <p align="center"><b>Site Pages</b></p>

                <p>PTC Mini-Sites Sales Page<br />
                <a href="<?=$siteNUS?>minisite" target="_blank"><?=$siteNUS?>minisite</a></p>
		
                <p>Neobux Basics DL Page<br />
                <a href="<?=$siteNUS?>basics" target="_blank"><?=$siteNUS?>basics</a></p>
                
                <p>Blog Posts<br />
                <a href="<?=$siteNUS?>?action=posts" target="_blank"><?=$siteNUS?>?action=posts</a></p>
                
                <p>FAQ Page<br />
                <a href="<?=$siteNUS?>?action=faq" target="_blank"><?=$siteNUS?>?action=faq</a></p>
            </div>
	</td>
	<td width="15px"></td>
	<td>
            <div class="contentBox">
                <h2>NUS - localhost</h2>
                <?
                foreach($nus['local'] as $siteTitle => $siteURL) {
                     echo '<p>'.$siteTitle.'<br />'.$siteURL.'</p>';
                }
                
                echo $sitePages;
                ?>
                
                <p>PTC Mini-Sites Sales Page<br />
                <a href="<?=$localNUS?>minisite" target=_blank><?=$localNUS?>minisite</a></p>
                
                <p>Neobux Basics DL Page<br />
                <a href="<?=$localNUS?>basics" target=_blank><?=$localNUS?>basics</a></p>
                 
                <p>Blog Posts<br />
                <a href="<?=$localNUS?>?action=posts" target=_blank><?=$localNUS?>?action=posts</a></p>
                
                <p>FAQ Page<br />
                <a href="<?=$localNUS?>?action=faq" target="_blank"><?=$localNUS?>?action=faq</a></p>
            </div>
	</td>
    </tr>
    <tr>
        <td>
            <div class="contentBox">
                <h2>EPS - live</h2>
                <?
                foreach($bps['live'] as $siteTitle => $siteURL) {
                     echo '<p>'.$siteTitle.'<br />'.$siteURL.'</p>';
                }
                
                echo $sitePages;
                ?>
                
                <p>PTC Mini Sites<br />
                <a href="<?=$siteBPS?>site" target=_blank><?=$siteBPS?>site</a></p>
                
                <p>Catalog Page<br />
                <a href="<?=$siteBPS?>site/catalog" target="_blank"><?=$siteBPS?>site/catalog</a></p>

                <p>Bonus Downloads<br />
                <a href="<?=$siteBPS?>?action=bonus" target="_blank"><?=$siteBPS?>?action=bonus</a></p>	
                
                <p>F.A.Q. <br />
                <a href="<?=$sitePPB?>?action=faq" target="_blank"><?=$sitePPB?>?action=faq</a></p>

                <p>Contact Form <br />
                <a href="<?=$sitePPB?>?action=contact" target="_blank"><?=$sitePPB?>?action=contact</a></p>
            </div>
        </td>
        <td width="15px"></td>
        <td>
            <div class="contentBox">
                <h2>EPS - localhost</h2>
                <?
                foreach($bps['local'] as $siteTitle => $siteURL) {
                    echo '<p>'.$siteTitle.'<br />'.$siteURL.'</p>';
                }
                 
                echo $sitePages;
                ?>
                                
                <p>PTC Mini Sites<br />
                <a href="<?=$localBPS?>site" target="_blank"><?=$localBPS?>site</a></p>

                <p>Catalog Page<br />
                <a href="<?=$localBPS?>site/catalog" target="_blank"><?=$localBPS?>site/catalog</a></p>

                <p>Bonus Downloads<br />
                <a href="<?=$localBPS?>?action=bonus" target="_blank"><?=$localBPS?>?action=bonus</a></p>
                
                <p>F.A.Q. <br />
                <a href="<?=$localPPB?>?action=faq" target="_blank"><?=$localPPB?>?action=faq</a></p>

                <p>Contact Form <br />
                <a href="<?=$localPPB?>?action=contact" target="_blank"><?=$localPPB?>?action=contact</a></p>
            </div>
        </td>
    </tr>
    
    <tr valign="top">
		<td>
            <div class="contentBox">
                <h2>PP Booster - live</h2>
                <?
                foreach($ppb['live'] as $siteTitle => $siteURL) {
                    echo '<p>'.$siteTitle.'<br />'.$siteURL.'</p>';
                }

                ?>
             
            </div>
        </td>
        <td width="15px"></td>
        <td>
            <div class="contentBox">
                <h2>PP Booster - local</h2>
                <?
                foreach($ppb['local'] as $siteTitle => $siteURL) {
                    echo '<p>'.$siteTitle.'<br />'.$siteURL.'</p>';
                }

              
                ?>

              
            </div>
		</td>
    </tr>
	
	<tr>
		<td>
            <div class="contentBox">
                <h2>Real Translators Job - Landing Page</h2>
            
                <p>Live</p>

                <p><a href="<?=$siteBPS?>?action=real-translator-jobs" target="_blank"><?=$siteBPS?>?action=real-translator-jobs</a></p>	
            
                <p>Localhost</p>
                    
                 <p><a href="<?=$localBPS?>?action=real-translator-jobs" target="_blank"><?=$localBPS?>?action=real-translator-jobs</a></p>           
            </div>
		</td>
		 <td width="15px"></td>
		 <td>
            <div class="contentBox">
                <h2>Get Cash For Surveys - Landing Page</h2>
            
                <p>Live</p>

                <p><a href="<?=$siteBPS?>?action=get-cash-for-surveys" target="_blank"><?=$siteBPS?>?action=get-cash-for-surveys</a></p>	
            
                <p>Localhost</p>
                    
                 <p><a href="<?=$localBPS?>?action=get-cash-for-surveys" target="_blank"><?=$localBPS?>?action=get-cash-for-surveys</a></p>           
            </div>
            </td>
	</tr>
    
   
</table>
    
    <table>
        <tr>
            <td>
            <div class="contentBox">
                <h2>Extreme Tracking Links</h2>
            
                <p>NUS</p>

                <p><a href="http://extremetracking.com/open;geo?login=richptc" target="_blank">http://extremetracking.com/open;geo?login=richptc</a></p>	
            
                <p>CodeGeass</p>
                    
                 <p><a href="http://extremetracking.com/open?login=geass" target="_blank">http://extremetracking.com/open?login=geass</a></p>           
            </div>
            </td>
        </tr>
        
    </table>
</center>