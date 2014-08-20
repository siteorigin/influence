<?php
/**
 * Integrates this theme with SiteOrigin panels page builder.
 * 
 * @package influence
 * @since 1.0
 * @license GPL 2.0
 */

/**
 * Adds default page layouts
 *
 * @param $layouts
 */
function influence_prebuilt_page_layouts($layouts){
	return $layouts;
}
add_filter('siteorigin_panels_prebuilt_layouts', 'influence_prebuilt_page_layouts');


/**
 * Display the missing widgets
 *
 * @param $widget
 * @param $instance
 * @param $args
 *
 * @return string
 */
function influence_render_missing_widget($code, $widget, $args, $instance){

	if( preg_match('/SiteOrigin_Widget_([A-Za-z]+)_Widget/', $widget ) ) {
		ob_start();

		echo $args['before_widget'];


		switch( $widget ) {
			case 'SiteOrigin_Widget_Cta_Widget' :
				wp_enqueue_style('influence-demo-widget-cta');
				get_template_part('demo/widgets/cta');
				break;
		}


		echo $args['after_widget'];

		$code = ob_get_clean();
	}

	return $code;
}
add_filter('siteorigin_panels_missing_widget', 'influence_render_missing_widget', 10, 4);

/**
 * Display a special form for missing widgets.
 *
 * @param $widget
 * @param $instance
 *
 * @return string
 */
function influence_missing_widget_forms($form, $widget, $instance){


	if( preg_match('/SiteOrigin_Widget_([A-Za-z]+)_Widget/', $widget, $matches) ) {
		$form = '<div class="panels-missing-widget-form"><p>'
			. __('This widget uses the <strong>SiteOrigin Widgets Bundle</strong> plugin. A free plugin that gives you a lot of widgets to use in your Page Builder pages.', 'influence')
			. '</p>'
			. '<p><a href="' . siteorigin_plugin_activation_install_url( 'so-widgets-bundle', __('SiteOrigin Widgets Bundle', 'influence') ) . '" class="button-primary" target="_blank">' . __('Install Plugin', 'influence') . '</a> '
		    . '<span class="description" style="display:inline-block; margin-left: 1em;">'.__('Free', 'influence').'</span>'
			.'</div>';
	}

	return $form;
}
add_filter('siteorigin_panels_missing_widget_form', 'influence_missing_widget_forms', 10, 3);

/**
 * Add the title and description for any known missing widgets.
 *
 * @param $widget
 * @param $data
 *
 * @return array
 */
function influence_missing_widget_data($data, $widget){

	switch($widget) {
		case 'SiteOrigin_Widget_Features_Widget' :
			$data = array(
				'title' => __('Features', 'influence'),
				'description' => __('Display a list of features and icons.', 'influence'),
			);
			break;
	}

	return $data;
}
add_filter('siteorigin_panels_missing_widget_data', 'influence_missing_widget_data', 10, 2);