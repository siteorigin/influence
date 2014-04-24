<?php
/**
 * Configure theme settings.
 *
 * @package effortless
 * @since effortless 1.0
 * @license GPL 2.0
 */

/**
 * Setup theme settings.
 * 
 * @since effortless 1.0
 */
function effortless_theme_settings(){
	siteorigin_settings_add_section( 'general', __('General', 'effortless') );
	siteorigin_settings_add_section( 'home', __('Home Page', 'effortless') );
	siteorigin_settings_add_section( 'layout', __('Layout', 'effortless') );

	/**
	 * General Settings
	 */
	
	siteorigin_settings_add_field( 'general', 'logo', 'media', __('Logo', 'effortless'), array(
		'choose' => __('Choose Image', 'effortless'),
		'update' => __('Set Logo', 'effortless'),
	) );

	siteorigin_settings_add_field( 'general', 'site_description', 'checkbox', __('Site Description', 'effortless'), array(
		'description' => __('Display your site description under your logo.', 'effortless')
	) );
	
	siteorigin_settings_add_teaser( 'general', 'ajax_comments', __('Ajax Comments', 'effortless'), array(
		'description' => __('Keep your conversations flowing with ajax comments.', 'effortless')
	) );

	/**
	 * Home Page
	 */

	siteorigin_settings_add_field( 'home', 'slider', 'widget', __('Home Page Slider', 'effortless'), array(
		'widget_class' => 'SiteOrigin_Widget_Slider_Widget',
		'plugin' => 'so-slider-widget',
		'plugin_name' => __('SiteOrigin Slider Widget', 'effortless'),
	) );

	/**
	 * Layout Settings
	 */

	siteorigin_settings_add_field('layout', 'responsive', 'checkbox', __('Responsive Layout', 'effortless'), array(
		'description' => __('Scale your layout for small screen devices.', 'effortless')
	));
	
	siteorigin_settings_add_teaser('layout', 'responsive_menu', __('Responsive Menu', 'effortless'), array(
		'description' => __('Use a special responsive menu for small screen devices.', 'effortless')
	));
}
add_action('admin_init', 'effortless_theme_settings');

/**
 * Setup theme default settings.
 * 
 * @param $defaults
 * @return mixed
 * @since effortless 1.0
 */
function effortless_theme_setting_defaults($defaults){
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
add_filter('siteorigin_theme_default_settings', 'effortless_theme_setting_defaults');