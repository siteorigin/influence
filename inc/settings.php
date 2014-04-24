<?php
/**
 * Configure theme settings.
 *
 * @package influence
 * @since influence 1.0
 * @license GPL 2.0
 */

/**
 * Setup theme settings.
 * 
 * @since influence 1.0
 */
function influence_theme_settings(){
	siteorigin_settings_add_section( 'general', __('General', 'influence') );
	siteorigin_settings_add_section( 'home', __('Home Page', 'influence') );
	siteorigin_settings_add_section( 'layout', __('Layout', 'influence') );

	/**
	 * General Settings
	 */
	
	siteorigin_settings_add_field( 'general', 'logo', 'media', __('Logo', 'influence'), array(
		'choose' => __('Choose Image', 'influence'),
		'update' => __('Set Logo', 'influence'),
	) );

	siteorigin_settings_add_field( 'general', 'site_description', 'checkbox', __('Site Description', 'influence'), array(
		'description' => __('Display your site description under your logo.', 'influence')
	) );
	
	siteorigin_settings_add_teaser( 'general', 'ajax_comments', __('Ajax Comments', 'influence'), array(
		'description' => __('Keep your conversations flowing with ajax comments.', 'influence')
	) );

	/**
	 * Home Page
	 */

	siteorigin_settings_add_field( 'home', 'slider', 'widget', __('Home Page Slider', 'influence'), array(
		'widget_class' => 'SiteOrigin_Widget_Slider_Widget',
		'plugin' => 'so-slider-widget',
		'plugin_name' => __('SiteOrigin Slider Widget', 'influence'),
	) );

	/**
	 * Layout Settings
	 */

	siteorigin_settings_add_field('layout', 'responsive', 'checkbox', __('Responsive Layout', 'influence'), array(
		'description' => __('Scale your layout for small screen devices.', 'influence')
	));
	
	siteorigin_settings_add_teaser('layout', 'responsive_menu', __('Responsive Menu', 'influence'), array(
		'description' => __('Use a special responsive menu for small screen devices.', 'influence')
	));
}
add_action('admin_init', 'influence_theme_settings');

/**
 * Setup theme default settings.
 * 
 * @param $defaults
 * @return mixed
 * @since influence 1.0
 */
function influence_theme_setting_defaults($defaults){
	$defaults['general_logo'] = array(
		get_template_directory_uri().'/demo/logo.png',
		35,
		192,
	);
	$defaults['general_ajax_comments'] = false;
	$defaults['general_site_description'] = false;

	$defaults['home_slider'] = false;

	$defaults['layout_responsive'] = true;
	$defaults['layout_responsive_menu'] = true;

	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'influence_theme_setting_defaults');