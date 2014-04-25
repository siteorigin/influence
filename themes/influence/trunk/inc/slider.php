<?php

function influence_display_slider($code){
	if( !is_front_page() ) return $code;

	ob_start();

	$slider = siteorigin_setting('home_slider');
	if( empty($slider) || !class_exists('SiteOrigin_Widget_Slider_Widget') ) {
		get_template_part('demo/slider');
	}
	elseif( !empty($slider['frames']) ) {
		the_widget('SiteOrigin_Widget_Slider_Widget', $slider);
	}

	$ob_value = ob_get_clean();
	if(!empty($ob_value)) $ob_value = '<div id="under-masthead-slider">'.$ob_value.'</div>';

	return $ob_value;
}
add_filter('influence_after_header', 'influence_display_slider');