<?php
$siteNinja = 'https://CodeLikeANinja.com/';
$localNinja = 'http://CodeLikeANinja.test/'; 
?>

<center>
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
 

<p>Live<br /></p>

<p>Main Page<br />
<a target="_BLANK" href="<?=$siteNinja?>"><?=$siteNinja?></a>
</p>

<p>Splash Page<br />
<a target="_BLANK" href="<?=$siteNinja?>splash/?campaign="><?=$siteNinja?>splash/?campaign=</a></p>
 

		</div>
	</td>
	</tr>
</table>
</center>