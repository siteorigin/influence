<?php
/**
 * Configure theme settings.
 *
 * @package influence
 * @since influence 1.0
 * @license GPL 2.0
 */

function influence_siteorigin_settings_localize( $loc ){
	$loc = array(
		'section_title' => __('Theme Settings', 'influence'),
		'section_description' => __('Settings for your theme', 'influence'),
		'premium_only' =>  __('Premium Only', 'influence'),
		'premium_url' => '#',

		// For the controls
		'variant' =>  __('Variant', 'influence'),
		'subset' =>  __('Subset', 'influence'),

		// For the premium upgrade modal
		'modal_title' => __('Vantage Premium Upgrade', 'influence'),
		'close' => __('Close', 'influence'),
	);

	return $loc;
}
add_filter( 'siteorigin_settings_localization', 'influence_siteorigin_settings_localize' );

/**
 * Setup theme settings.
 * 
 * @since influence 1.0
 */
function influence_theme_settings(){
	$settings = SiteOrigin_Settings::single();

	$settings->add_section( 'logo', __('Logo', 'influence') );
	$settings->add_section( 'general', __('General', 'influence') );
	$settings->add_section( 'home', __('Home Page', 'influence') );
	$settings->add_section( 'layout', __('Layout', 'influence') );

	/**
	 * Logo Settings
	 */
	$settings->add_field( 'logo', 'logo', 'media', __('Logo', 'influence'), array(
		'choose' => __('Choose Image', 'influence'),
		'update' => __('Set Logo', 'influence'),
	) );

	$settings->add_field( 'logo', 'retina_logo', 'media', __('Retina Logo', 'influence'), array(
		'choose' => __('Choose Image', 'influence'),
		'update' => __('Set Logo', 'influence'),
		'description' => __('A double sized logo used on retina devices.', 'influence'),
	) );

	$settings->add_field( 'logo', 'scale', 'checkbox', __('Scale Logo on Scroll', 'influence'), array(
		'description' => __('Scale down the logo when scrolling down the screen.', 'influence'),
	) );

	$settings->add_field( 'logo', 'site_description', 'checkbox', __('Site Description', 'influence'), array(
		'description' => __('Display your site description under your logo.', 'influence')
	) );

	/**
	 * General settings
	 */

	$settings->add_field( 'general', 'menu_text', 'text', __('Menu Text', 'influence'), array(
		'description' => __('The text displayed as your menu button.', 'influence')
	) );
	
	/**
	 * Home Page
	 */

	$settings->add_field( 'home', 'slider_shortcode_new', 'text', __('Home Slider', 'influence'), array(
		'options' => array(
			'' => __('None', 'influence'),
			'[home_slider_demo]' => __('Demo Slider', 'influence'),
			'[home_slider_widget]' => __('Slider Widget', 'influence'),
		),
		'description' => __('Enter the shortcode that displays the slider on the home page.', 'influence'),
	) );

	$settings->add_field( 'home', 'menu_overlaps', 'checkbox', __('Menu Overlaps Slider', 'influence'), array(
		'description' => __('Should the menu overlap the home page slider.', 'influence')
	) );

	$settings->add_field( 'home', 'slider', 'widget', __('Home Slider', 'influence'), array(
		'widget_class' => 'SiteOrigin_Widget_Slider_Widget',
		'bundle_widget' => 'slider',
		'plugin' => 'so-widgets-bundle',
		'plugin_name' => __('SiteOrigin Widgets Bundle', 'influence'),
		'description' => __('Build a slider from your own images and videos.', 'influence'),
	) );

	$settings->add_field( 'home', 'slider_margin', 'checkbox', __( 'Slider Margin', 'influence' ), array(
		'description' => __('Add a margin below the home page slider', 'influence'),
	) );

	/**
	 * Layout Settings
	 */

	$settings->add_field( 'layout', 'responsive', 'checkbox', __('Responsive Layout', 'influence'), array(
		'description' => __('Scale your layout for small screen devices.', 'influence')
	) );

	$settings->add_field( 'layout', 'viewport', 'number', __('Mobile Viewport Size', 'influence'), array(
		'description' => __('Choose the width of the viewport for mobile devices when responsive is disabled.', 'influence')
	) );
	
}
add_action('siteorigin_settings_init', 'influence_theme_settings');

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

	return $defaults;
}
add_filter('siteorigin_settings_defaults', 'influence_theme_setting_defaults');

// Add a filter to add slider options
add_filter('siteorigin_setting_options_home_slider_shortcode_new', 'siteorigin_settings_add_slider_options');

function influence_about_page_setup( $about ){
	$about['title_image'] = get_template_directory_uri() . '/admin/about/influence-logo.png';
	$about['title_image_2x'] = get_template_directory_uri() . '/admin/about/influence-logo-2x.png';

	$about['description'] = __( 'Influence is an elegant blogging theme that focused on your content. It offers a whole new level of attention to detail.', 'influence' );

	$about[ 'sections' ] = array(
		'free',
		'support',
		'page-builder',
		'github',
	);

	return $about;
}
add_filter( 'siteorigin_about_page', 'influence_about_page_setup' );