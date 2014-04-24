<?php

function effortless_display_slider($code){
	if( !is_front_page() ) return $code;

	ob_start();

	?><div id="under-masthead-slider"><?php

	$slider = siteorigin_setting('home_slider');
	if( empty($slider) || !class_exists('SiteOrigin_Widget_Slider_Widget') ) {
		get_template_part('demo/slider');
	}
	else {
		the_widget('SiteOrigin_Widget_Slider_Widget', $slider);
	}

	?></div><?php

	return ob_get_clean();
}
add_filter('effortless_after_header', 'effortless_display_slider');