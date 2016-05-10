<?php

function influence_display_slider($code){
	$slider_shortcode = siteorigin_setting('home_slider_shortcode_new');
	if( !is_front_page() || empty($slider_shortcode) ) return $code;

	preg_match_all('/\[(\[?)(home_slider_demo|home_slider_widget)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)/s', $slider_shortcode, $matches);

	ob_start();
	if( empty( $matches[2] ) ) {
		echo do_shortcode( $slider_shortcode );
	}
	else {
		$widget = siteorigin_setting( 'home_slider' );
		if( !empty($widget['frames']) && class_exists( 'SiteOrigin_Widget_Slider_Widget' ) ) {
			the_widget('SiteOrigin_Widget_Slider_Widget', $widget);
		}
		else if( $matches[2][0] === 'home_slider_demo' ) {
			get_template_part('demo/slider');
		}
	}
	$ob_value = ob_get_clean();
	if(!empty($ob_value)) $ob_value = '<div id="under-masthead-slider" ' . ( siteorigin_setting('home_slider_margin') ? '' : 'class="remove-bottom-margin"' ) . '>'.$ob_value.'</div>';

	return $ob_value;
}
add_filter('influence_after_header', 'influence_display_slider');

/**
 * Enqueue scripts and styles for the demo slider if we're using it.
 */
function influence_enqueue_slider_demo_scripts(){
	$slider_shortcode = siteorigin_setting('home_slider_shortcode_new');
	$widget = siteorigin_setting( 'home_slider' );
	if( !is_front_page() || empty($slider_shortcode) ) return;

	// Check if we're actually using the home page demo
	if( strpos($slider_shortcode, 'home_slider_demo') === false || !empty( $widget['frames'] ) ) return;

	// Use the bundled scripts
	wp_enqueue_style('influence-sow-slider-slider', get_template_directory_uri().'/demo/slider-css/slider.css', array(), SITEORIGIN_THEME_VERSION);
	wp_enqueue_script('influence-sow-slider-slider-cycle2', get_template_directory_uri().'/demo/slider-js/jquery.cycle' . SITEORIGIN_THEME_JS_PREFIX . '.js', array('jquery'), SITEORIGIN_THEME_VERSION);
	if( wp_is_mobile() ) wp_enqueue_script('influence-sow-slider-slider-cycle2-swipe', get_template_directory_uri().'/slider-js/jquery.cycle.swipe' . SITEORIGIN_THEME_JS_PREFIX . '.js', array('jquery'), SITEORIGIN_THEME_VERSION);
	wp_enqueue_script('influence-sow-slider-slider', get_template_directory_uri().'/demo/slider-js/slider' . SITEORIGIN_THEME_JS_PREFIX . '.js', array('jquery'), SITEORIGIN_THEME_VERSION);
}
add_action('wp_enqueue_scripts', 'influence_enqueue_slider_demo_scripts', 15);