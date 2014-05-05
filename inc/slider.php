<?php

function influence_display_slider($code){
	if( !is_front_page() || siteorigin_setting('home_displays') != 'slider' ) return $code;

	ob_start();

	$slider = siteorigin_setting('home_slider');
	if( !empty($slider['frames']) ) {
		the_widget('SiteOrigin_Widget_Slider_Widget', $slider);
	}
	else {
		get_template_part('demo/slider');
	}

	$ob_value = ob_get_clean();
	if(!empty($ob_value)) $ob_value = '<div id="under-masthead-slider">'.$ob_value.'</div>';

	return $ob_value;
}
add_filter('influence_after_header', 'influence_display_slider');

function influence_display_slider_demo($code) {
	if( !is_front_page() || siteorigin_setting('home_displays') != 'demo' ) return $code;

	ob_start();
	get_template_part('demo/slider');
	$ob_value = ob_get_clean();
	if(!empty($ob_value)) $ob_value = '<div id="under-masthead-slider">'.$ob_value.'</div>';

	return $ob_value;
}
add_filter('influence_after_header', 'influence_display_slider_demo');

/**
 * Enqueue scripts and styles for the demo slider if we're using it.
 */
function influence_enqueue_slider_demo_scripts(){
	if( !is_front_page() || siteorigin_setting('home_displays') != 'demo' ) return;

	if( wp_script_is('sow-slider-slider', 'registered') ) {
		// Use teh default scripts from the slider widget plugin
		wp_enqueue_style('sow-slider-slider');
		wp_enqueue_script('sow-slider-slider-cycle2');
		if( wp_is_mobile() ) wp_enqueue_script('sow-slider-slider-cycle2-swipe');
		wp_enqueue_script('sow-slider-slider');
	}
	else {
		// Use the bundled scripts
		wp_enqueue_style('influence-sow-slider-slider', get_template_directory_uri().'/demo/slider-css/slider.css', array(), SITEORIGIN_THEME_VERSION);
		wp_enqueue_script('influence-sow-slider-slider-cycle2', get_template_directory_uri().'/demo/slider-js/jquery.cycle.js', array('jquery'), SITEORIGIN_THEME_VERSION);
		if( wp_is_mobile() ) wp_enqueue_script('influence-sow-slider-slider-cycle2-swipe', get_template_directory_uri().'/slider-js/jquery.cycle.swipe.js', array('jquery'), SITEORIGIN_THEME_VERSION);
		wp_enqueue_script('influence-sow-slider-slider', get_template_directory_uri().'/demo/slider-js/slider.js', array('jquery'), SITEORIGIN_THEME_VERSION);
	}
}
add_action('wp_enqueue_scripts', 'influence_enqueue_slider_demo_scripts', 15);