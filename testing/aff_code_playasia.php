<?php
function pa_convert_link( $_link )
{
	$parts = parse_url( $_link );

	$query = Array();
	parse_str( $parts[ 'query' ], $query );
	$query[ 'tagid' ] = 4453755;
	$query = http_build_query( $query );

	$_link = "$parts[scheme]://$parts[host]$parts[path]?$query";
	if ( isset( $parts[ 'fragment' ] ) )
		$_link .= "#$parts[fragment]";


	return $_link;
}

$url = 'https://www.play-asia.com/psn-card-20-usd-playstation-network-us/13/703y12/';
echo pa_convert_link($url);
?>