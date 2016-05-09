<?php

/**
 * Add a font to the font register.
 *
 * @param $name
 * @param array $weights
 */
function siteorigin_webfonts_add_font( $name, $weights = array() ){
	global $siteorigin_webfonts_fonts;
	if( empty( $siteorigin_webfonts_fonts ) ) $siteorigin_webfonts_fonts = array();

	if( empty( $siteorigin_webfonts_fonts[$name] ) ) {
		$siteorigin_webfonts_fonts[$name] = (array) $weights;
	}
	else {
		$siteorigin_webfonts_fonts[$name] = array_merge( $siteorigin_webfonts_fonts[$name], (array) $weights );
		$siteorigin_webfonts_fonts[$name] = array_unique( $siteorigin_webfonts_fonts[$name] );
	}
}

/**
 * Remove a webfont from the font register.
 *
 * @param $name
 */
function siteorigin_webfonts_remove_font( $name ) {
	global $siteorigin_webfonts_fonts;
	unset( $siteorigin_webfonts_fonts[$name] );
}

/**
 * Enqueue the Google web fonts.
 */
function siteorigin_webfonts_enqueue(){
	global $siteorigin_webfonts_fonts;
	if( empty( $siteorigin_webfonts_fonts ) ) return;

	$family = array();
	foreach($siteorigin_webfonts_fonts as $name => $weights) {

		if( !empty($weights) ) {
			$family[] = $name . ':' . implode(',', $weights);
		}
		else {
			$family[] = $name;
		}
	}

	wp_enqueue_style(
		'siteorigin-google-web-fonts',
		add_query_arg('family', implode( '|', $family ), '//fonts.googleapis.com/css')
	);
}
add_action('wp_enqueue_scripts', 'siteorigin_webfonts_enqueue');