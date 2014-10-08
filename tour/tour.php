<?php

function influence_tour_content($tour){
	$tour = array();

	$tour[] = array(
		'title' => __( 'Welcome to Influence', 'influence' ),
		'content' => __( "Influence is our clean, modern blogging theme that'll help you influence the world with your message. It has integration with several plugins that also make it a great choice as a business theme. This guide will help you get Influence up and running in no time.", 'influence' ),
		'image' => get_template_directory_uri() . '/tour/steps/logo.png',
	);

	$tour[] = array(
		'title' => __( 'Upload Your Logo', 'influence' ),
		'content' => __( 'The first step to making your site uniquely your own is to upload your custom logo. Choose a logo image below, and it will replace the plain-text site title. Any size will work, but we recommend that you use a smaller version of your logo.', 'influence' ),
		'image' => get_template_directory_uri() . '/tour/steps/upload-logo.jpg',
		'setting' => 'logo_logo',
	);

	$tour[] = array(
		'title' => __( 'Upload Your Retina Logo', 'influence' ),
		'content' => __( 'A retina logo is a double-sized version of your standard logo. Vantage displays this version of your logo to users with high pixel density displays. Currently, these are most common on mobile devices, but they are starting to infiltrate desktop devices too.', 'influence' ),
		'image' => get_template_directory_uri() . '/tour/steps/upload-logo-retina.jpg',
		'setting' => 'logo_retina_logo',
	);

	$tour[] = array(
		'title' => __( 'Change the Slider', 'influence' ),
		'content' => __( "The home page slider is a great place to show off your images or branding message. It supports most popular slider plugins. Enter the shortcode of the slider you're trying to add or select it from the dropdown list. If you select Slider Widget, you'll be able to build your slider in the theme settings by navigating to Appearance > Theme Settings, under the Home Page tab.", 'influence' ),
		'image' => get_template_directory_uri() . '/tour/steps/slider.jpg',
		'setting' => 'home_slider_shortcode_new',
	);

	$tour[] = array(
		'title' => __( 'Remove SiteOrigin Attribution Link', 'influence' ),
		'content' => __( "This setting lets you toggle the Theme By SiteOrigin link in your site's footer. If you're after a more professional look, it could be worth removing. We do, however, appreciate any users that decide to leave it in.", 'influence' ),
		'image' => get_template_directory_uri() . '/tour/steps/attribution.png',
		'setting' => 'general_attribution',
	);

	$tour[] = array(
		'title' => __( 'Change the Menu Text', 'influence' ),
		'content' => __( "The simple, one button menu is a key feature of Influence. Make this your own by changing the text that Influence displays.", 'influence' ),
		'image' => get_template_directory_uri() . '/tour/steps/menu-text.jpg',
		'setting' => 'general_menu_text',
	);

	if( ! function_exists('siteorigin_panels_render') ) {
		// Only include this step of the tour if Page Builder is not enabled.
		$tour[] = array(
			'title' => __( 'Install Page Builder', 'influence' ),
			'content' => __( "Page Builder is the easiest way to create a site that makes you proud. Navigate to Appearance > Home Page in your WordPress admin to install it. After you've installed it, you will be able to create columnized pages using your widgets.", 'influence' ),
			'image' => get_template_directory_uri() . '/tour/steps/page-builder.jpg',
			'action' => array(
				'text' => __( 'Install Page Builder', 'influence' ),
				'href' => function_exists('siteorigin_plugin_activation_install_url') ?  siteorigin_plugin_activation_install_url( 'siteorigin-panels', __('Page Builder', 'siteorigin') ) : '#',
			),
			'video' => 101728633,
		);
	}

	if( ! class_exists('SiteOrigin_Widgets_Bundle') ) {
		// Only include this step of the tour if Page Builder is not enabled.
		$tour[] = array(
			'title' => __( 'Install the Widgets Bundle', 'influence' ),
			'content' => __( "The SiteOrigin Widgets Bundle gives you several widgets that you can add to your home page. These include buttons, sliders, images, price tables and more.", 'influence' ),
			'image' => get_template_directory_uri() . '/tour/steps/widget-bundle.jpg',
			'action' => array(
				'text' => __( 'Install Widgets Bundle', 'influence' ),
				'href' => function_exists('siteorigin_plugin_activation_install_url') ?  siteorigin_plugin_activation_install_url( 'so-widgets-bundle', __('Widgets Bundle', 'siteorigin') ) : '#',
			),
			'video' => 102103379,
		);
	}

	$tour[] = array(
		'title' => __( 'Additional Settings', 'influence' ),
		'content' => __( "There are a lot of additional settings that we haven't covered in this brief tour. Navigate to Appearance > Theme Settings at any time to take a look. You'll be amazed at what you can accomplish with a few clicks.", 'influence' ),
		'image' => get_template_directory_uri() . '/tour/steps/theme-settings.png',
	);

	if( !defined('SITEORIGIN_IS_PREMIUM') ) {
		$tour[] = array(
			'title'   => __( 'Check Out Influence Plus', 'influence' ),
			'content' => __( "You may have noticed that some settings and features are only available in Influence Plus. It's a free upgrade that gives you access to a lot of extra features. Take a look to see if this is something you might find useful.", 'influence' ),
			'image'   => get_template_directory_uri() . '/tour/steps/influence-plus.jpg',
			'action' => array(
				'text' => __( 'More About Influence Plus', 'influence' ),
				'href' => admin_url('themes.php?page=premium_upgrade'),
			),
			'video' => 102844186,
		);
	}

	$tour[] = array(
		'title' => __( 'Customize the Design', 'influence' ),
		'content' => __( "Once you're done setting up Influence the way you like it, you can head over to the customizer to change how your site looks. Influence Plus has a lot of extra customization options.", 'influence' ),
		'image' => get_template_directory_uri() . '/tour/steps/customize.jpg',
		'action' => array(
			'text' => __( 'Customize Design', 'influence' ),
			'href' => admin_url('customize.php'),
		),
	);

	return $tour;
}
add_filter('siteorigin_settings_tour_content', 'influence_tour_content');