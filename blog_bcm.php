<?
function displayLinks ($array) {
	foreach($array as $name => $val) {
		$display .= '<p><a href="'.$val['url'].'" target="_blank">'.$val['display'].'</a></p>';
	}
	return $display;
}

$printify = array(
	'my_store' => array (
		'display' => 'My store',
		'url' => 'https://printify.com/app/store/products/1'
	),
	'add_item' => array (
		'display' => 'Add new item',
		'url' => 'https://printify.com/app/products'
	),
	'add_favorite' => array (
		'display' => 'Add favorited item',
		'url' => 'https://printify.com/app/favorite-products'
	),
	'my_orders' => array (
		'display' => 'My orders',
		'url' => 'https://printify.com/app/orders/1'
	),	
);


$printify2 = array(
	'my_store' => array (
		'display' => 'My store',
		'url' => 'https://printify.com/app/store/products/2'
	),
	'add_item' => array (
		'display' => 'Add new item',
		'url' => 'https://printify.com/app/products'
	),
	'add_favorite' => array (
		'display' => 'Add favorited item',
		'url' => 'https://printify.com/app/favorite-products'
	),
	'my_orders' => array (
		'display' => 'My orders',
		'url' => 'https://printify.com/app/orders/2'
	),	
);

$etsy = array(
	'my_store' => array (
		'display' => 'My Store',
		'url' => 'https://www.etsy.com/shop/ConfuciusStore'
	),
	'my_listings' => array (
		'display' => 'My listings',
		'url' => 'https://www.etsy.com/your/shops/ConfuciusStore/tools/listings/stats:true'
	),
	'my_stats' => array (
		'display' => 'My stats',
		'url' => 'https://www.etsy.com/your/shops/me/stats?ref=seller-platform-mcnav'
	),	
	'shitting_profiles' => array (
		'display' => 'Shitting profiles',
		'url' => 'https://www.etsy.com/your/shops/ConfuciusStore/tools/shipping-profiles'
	),		
);


$etsy2 = array(
	'my_store' => array (
		'display' => 'My Store',
		'url' => 'https://www.etsy.com/shop/AnimeEmpireShop'
	),
	'my_listings' => array (
		'display' => 'My listings',
		'url' => 'https://www.etsy.com/your/shops/AnimeEmpireShop/tools/listings/stats:true'
	),
	'my_stats' => array (
		'display' => 'My stats',
		'url' => 'https://www.etsy.com/your/shops/me/stats?ref=seller-platform-mcnav'
	),	
	'shitting_profiles' => array (
		'display' => 'Shitting profiles',
		'url' => 'https://www.etsy.com/your/shops/AnimeEmpireShop/tools/shipping-profiles'
	),		
);

?>

<center>
<table>
    <tr valign="top">
        <td>
            <div class="contentBox">
			ConfuciusStore
			<?
				echo displayLinks($etsy);
			?>
			</div>
		</td>
		<td>
            <div class="contentBox">
			AnimeEmpireShop
			<?
				echo displayLinks($etsy2);
			?>
			</div>
		</td>
		<td>
			<div class="contentBox">
				Printify Store 1
				<?
				echo displayLinks($printify);
				?>
			</div>
		</td>
		<td>
			<div class="contentBox">
				Printify Store 2
				<?
				echo displayLinks($printify2);
				?>
			</div>
		</td>
	</tr>
</table>

<p>&nbsp;</p>

<table>
    <tr valign="top">
        <td>
            <div class="contentBox">
			<p>Anime Localhost</p>
			
			<p><a href="http://localhost/AnimeFanservice.org/" target="_blank">Home page</a></p>
			
			<p><a href="http://localhost/AnimeFanservice.org/contents-for-power-force-fanfiction/" target="_blank">Fanfiction - Power Force</a></p>
			
			<p><a href="http://localhost/AnimeFanservice.org/contents-for-demon-slayer-fanfiction/" target="_blank">Fanfiction - Demon Slayer</a></p>
			
			<p><a href="http://localhost/AnimeFanservice.org/wp-admin/edit.php" target="_BLANK">Anime Posts List</a></p>
			
			<p>BCM Localhost</p>
			
			<p><a href="http://localhost/BCM/wlm/" target="_BLANK">http://localhost/BCM/wlm/</a></p>
			
			<p><a href="http://localhost/BCM/white-is-right/edit.php" target="_BLANK">http://localhost/BCM/white-is-right/edit.php</a></p>

			<p><a href="http://localhost/BCM/white-is-right/edit.php?post_type=wlm" target="_BLANK">http://.../white-is-right/edit.php?post_type=wlm</a></p>

			</div>
		</td>
		<td>
			<div class="contentBox">
			<p>Anime Live</p>
		
			<p><a href="https://AnimeFanservice.org/" target="_blank">Home page</a></p>
			
			<p><a href="https://AnimeFanservice.org/fanfiction/" target="_blank">Fanfiction - Power Force</a></p>
			
			<p><a href="https://AnimeFanservice.org/table-of-contents-for-demon-slayer-fanfiction/" target="_blank">Fanfiction - Demon Slayer</a></p>
			
			<p><a href="https://AnimeFanservice.org/AnimeFanservice.org/wp-admin/edit.php" target="_BLANK">Anime Posts List</a></p>
			
			<p>BCM Live</p>
			
			<p><a href="https://blackcrimesmatters.com/wlm/" target="_BLANK">https://blackcrimesmatters.com/wlm/</a></p>
			
			<p><a href="https://blackcrimesmatters.com/black-is-whack" target="_BLANK">https://blackcrimesmatters.com/black-is-whack</a></p>
			
			</div>
		</td>
		<td>
			Make IG posts
			<p><a href="https://www.instagram.com/blackcrimesmatters/" target="_BLANK">https://www.instagram.com/blackcrimesmatters/</a></p>
			
			<p><a href="https://hootsuite.com/dashboard#/planner" target="_BLANK">https://hootsuite.com/dashboard#/planner</a></p>
			
			<p><a href="https://www.instagram.com/blackcrimesmatters/saved/" target="_BLANK">https://www.instagram.com/blackcrimesmatters/saved/</a></p>
			
		</td>
	</tr>
</table>
</center>