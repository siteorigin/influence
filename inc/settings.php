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
	siteorigin_settings_add_section( 'logo', __('Logo', 'influence') );
	siteorigin_settings_add_section( 'general', __('General', 'influence') );
	siteorigin_settings_add_section( 'home', __('Home Page', 'influence') );
	siteorigin_settings_add_section( 'layout', __('Layout', 'influence') );

	/**
	 * Logo Settings
	 */
	
	siteorigin_settings_add_field( 'logo', 'logo', 'media', __('Logo', 'influence'), array(
		'choose' => __('Choose Image', 'influence'),
		'update' => __('Set Logo', 'influence'),
	) );

	siteorigin_settings_add_teaser( 'logo', 'retina_logo', __('Retina Logo', 'influence'), array(
		'choose' => __('Choose Image', 'influence'),
		'update' => __('Set Logo', 'influence'),
		'description' => __('A double sized logo used on retina devices.', 'influence'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/retina-logo.png',
	) );

	siteorigin_settings_add_field( 'logo', 'scale', 'checkbox', __('Scale Logo on Scroll', 'influence'), array(
		'description' => __('Scale down the logo when scrolling down the screen.', 'influence'),
	) );

	siteorigin_settings_add_field( 'logo', 'site_description', 'checkbox', __('Site Description', 'influence'), array(
		'description' => __('Display your site description under your logo.', 'influence')
	) );

	/**
	 * General settings
	 */

	siteorigin_settings_add_teaser( 'general', 'attribution', __('Attribution Link', 'influence'), array(
		'description' => __('Remove the SiteOrigin link from your footer.', 'influence'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/attribution.png',
	) );

	siteorigin_settings_add_field( 'general', 'menu_text', 'text', __('Menu Text', 'influence'), array(
		'description' => __('The text displayed as your menu button.', 'influence')
	) );
	
	/**
	 * Home Page
	 */

	siteorigin_settings_add_field( 'home', 'slider_shortcode_new', 'text', __('Home Slider', 'influence'), array(
		'options' => array(
			'' => __('None', 'influence'),
			'[home_slider_demo]' => __('Demo Slider', 'influence'),
			'[home_slider_widget]' => __('Slider Widget', 'influence'),
		),
		'description' => __('Enter the shortcode that displays the slider on the home page.', 'influence'),
	) );

	siteorigin_settings_add_field( 'home', 'menu_overlaps', 'checkbox', __('Menu Overlaps Slider', 'influence'), array(
		'description' => __('Should the menu overlap the home page slider.', 'influence')
	) );

	siteorigin_settings_add_field( 'home', 'slider', 'widget', __('Home Slider', 'influence'), array(
		'widget_class' => 'SiteOrigin_Widget_Slider_Widget',
		'bundle_widget' => 'so-slider-widget',
		'plugin' => 'so-widgets-bundle',
		'plugin_name' => __('SiteOrigin Widgets Bundle', 'influence'),
		'description' => __('Build a slider from your own images and videos.', 'influence'),
	) );

	siteorigin_settings_add_teaser( 'home', 'slider_shortcode', __('Home Shortcode', 'influence'), array(
		'description' => sprintf(
			__('Use a shortcode for your home page slider. Allows you to use alternative sliders.', 'influence'),
			'http://wordpress.org/plugins/ml-slider/'
		),
	) );

	siteorigin_settings_add_field( 'home', 'slider_margin', 'checkbox', __( 'Slider Margin', 'influence' ), array(
		'description' => __('Add a margin below the home page slider', 'influence'),
	) );

	/**
	 * Layout Settings
	 */

	siteorigin_settings_add_field( 'layout', 'responsive', 'checkbox', __('Responsive Layout', 'influence'), array(
		'description' => __('Scale your layout for small screen devices.', 'influence')
	) );

	siteorigin_settings_add_field( 'layout', 'viewport', 'number', __('Mobile Viewport Size', 'influence'), array(
		'description' => __('Choose the width of the viewport for mobile devices when responsive is disabled.', 'influence')
	) );
	
}
add_action('siteorigin_settings_init', 'influence_theme_settings');


function influence_theme_settings_fix(){
	siteorigin_settings_remove_field('home', 'slider_shortcode');
}
add_action('siteorigin_settings_init', 'influence_theme_settings_fix', 20);

/**
 * Setup theme default settings.
 * 
 * @param $defaults
 * @return mixed
 * @since influence 1.0
 */
function influence_theme_setting_defaults($defaults){
	$defaults['logo_logo'] = false;
	$defaults['logo_retina_logo'] = false;
	$defaults['logo_scale'] = true;
	$defaults['logo_site_description'] = false;

	$defaults['general_attribution'] = true;
	$defaults['general_menu_text'] = __('Menu', 'influence');

	$defaults['home_slider_shortcode_new'] = '[home_slider_demo]';
	$defaults['home_displays'] = 'demo';
	$defaults['home_menu_overlaps'] = true;
	$defaults['home_slider'] = false;
	$defaults['home_slider_shortcode'] = false;
	$defaults['home_slider_margin'] = true;

	$defaults['layout_responsive'] = true;
	$defaults['layout_viewport'] = 1200;

	// Now, lets transfer the old settings into the defaults of the new settings
	$settings = get_option('influence_theme_settings', array() );
	if(!empty($settings['home_displays']) ) {
		if( $settings['home_displays'] == 'demo' ) $defaults['home_slider_shortcode_new'] = '[home_slider_demo]';
		else if( $settings['home_displays'] == 'slider' ) $defaults['home_slider_shortcode_new'] = '[home_slider_widget]';
		else if( $settings['home_displays'] == 'shortcode' ) $defaults['home_slider_shortcode_new'] = isset( $settings['home_slider_shortcode'] ) ? $settings['home_slider_shortcode'] : '';
	}

	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'influence_theme_setting_defaults');

function influence_siteorigin_settings_page_icon($icon){
	return get_template_directory_uri().'/images/settings-icon.png';
}
add_filter('siteorigin_settings_page_icon', 'influence_siteorigin_settings_page_icon');

// Add a filter to add slider options
add_filter('siteorigin_setting_options_home_slider_shortcode_new', 'siteorigin_settings_add_slider_options');