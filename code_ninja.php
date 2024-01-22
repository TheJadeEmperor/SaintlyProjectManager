<?php
$siteNinja = 'https://CodeLikeANinja.com/';
$localNinja = 'http://CodeLikeANinja.test/'; 


$scamLocal = 'http://localhost//SusanZhuangLies/';
$scamSite = 'https://susanzhuanglies.com/';
?>

<center>

<table>
    <tr valign="top">
        <td align="left">
            <div class="contentBox">
            <p>Scam Susan<br /></p>
 
            <a target="_BLANK" href="<?=$scamLocal?>"><?=$scamLocal?></a>
            </p>
            </div>
        </td>
        <td>
            <div class="contentBox">
            <p>Scam Susan<br /></p>
 
 <a target="_BLANK" href="<?=$scamSite?>"><?=$scamSite?></a>
            </div>
        </td>
</tr>
</table>

    <table>
    <tr valign="top">
        <td>
            <div class="contentBox">

<p>Localhost<br /></p>

<p>Main Page<br />
<a target="_BLANK" href="<?=$localNinja?>"><?=$localNinja?></a>
</p>

<p>Splash Page<br />
<a target="_BLANK" href="<?=$localNinja?>splash/?campaign="><?=$localNinja?>splash/?campaign=</a></p>

<p>Admin Page<br />
<a target="_BLANK" href="<?=$localNinja?>admin"><?=$localNinja?>admin</a>
</p>

		</div>
	</td>
    <td>

    <p>Live<br /></p>

<p>Main Page<br />
<a target="_BLANK" href="<?=$siteNinja?>"><?=$siteNinja?></a>
</p>

<p>Splash Page<br />
<a target="_BLANK" href="<?=$siteNinja?>splash/?campaign="><?=$siteNinja?>splash/?campaign=</a></p>

<p>Admin Page<br />
<a target="_BLANK" href="<?=$siteNinja?>admin"><?=$siteNinja?>admin</a>
</p>

</td>
	</tr>
</table>
</center>