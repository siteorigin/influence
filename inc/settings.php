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

	siteorigin_settings_add_teaser( 'general', 'retina_logo', __('Retina Logo', 'influence'), array(
		'choose' => __('Choose Image', 'influence'),
		'update' => __('Set Logo', 'influence'),
	) );

	siteorigin_settings_add_field( 'general', 'site_description', 'checkbox', __('Site Description', 'influence'), array(
		'description' => __('Display your site description under your logo.', 'influence')
	) );

	siteorigin_settings_add_teaser( 'general', 'attribution', __('Attribution Link', 'influence'), array(
		'description' => __('Remove the "Theme By SiteOrigin" text from your footer.', 'influence'),
	) );

	siteorigin_settings_add_field( 'general', 'menu_text', 'text', __('Menu Text', 'influence'), array(
		'description' => __('The text displayed as your menu button.', 'influence')
	) );
	
	/**
	 * Home Page
	 */

	siteorigin_settings_add_field( 'home', 'displays', 'select', __('Home Slider Area', 'influence'), array(
		'options' => array(
			'' => __('None', 'influence'),
			'demo' => __('Demo Slider', 'influence'),
			'slider' => __('Home Slider', 'influence'),
			'shortcode' => __('Home Shortcode', 'influence'),
		),
		'default' => 'demo',
		'description' => __('Choose what your home slider area displays.', 'influence'),
	) );

	siteorigin_settings_add_field( 'home', 'menu_overlaps', 'checkbox', __('Menu Overlaps Slider', 'influence'), array(
		'description' => __('Should the menu overlap the home page slider.', 'influence')
	) );

	siteorigin_settings_add_field( 'home', 'slider', 'widget', __('Home Slider', 'influence'), array(
		'widget_class' => 'SiteOrigin_Widget_Slider_Widget',
		'plugin' => 'so-slider-widget',
		'plugin_name' => __('SiteOrigin Slider Widget', 'influence'),
	) );

	siteorigin_settings_add_teaser( 'home', 'slider_shortcode', __('Home Shortcode', 'influence'), array(
		'description' => sprintf(
			__('Use a shortcode for your home page slider. Allows you to use alternative sliders like <a href="%s" target="_blank">MetaSlider</a> or <a href="%s" target="_blank">Slider Revolution</a>.', 'influence'),
			'http://wordpress.org/plugins/ml-slider/',
			'http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380?ref=SiteOrigin'
		),
	) );

	/**
	 * Layout Settings
	 */

	siteorigin_settings_add_field('layout', 'responsive', 'checkbox', __('Responsive Layout', 'influence'), array(
		'description' => __('Scale your layout for small screen devices.', 'influence')
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
	$defaults['general_attribution'] = true;
	$defaults['general_menu_text'] = __('Menu', 'influence');

	$defaults['home_displays'] = 'demo';
	$defaults['home_menu_overlaps'] = true;
	$defaults['home_slider'] = false;
	$defaults['home_slider_shortcode'] = false;

	$defaults['layout_responsive'] = true;
	$defaults['layout_responsive_menu'] = true;

	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'influence_theme_setting_defaults');