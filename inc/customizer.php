<?php

function influence_plus_customizer_init(){
	$sections = apply_filters( 'influence_plus_customizer_sections', array(
		'influence_general' => array(
			'title' => __('General', 'influence'),
			'priority' => 25,
		),
		'influence_fonts' => array(
			'title' => __('Fonts', 'influence'),
			'priority' => 30,
		),
		'influence_menu' => array(
			'title' => __('Menu Bar', 'influence'),
			'priority' => 40,
		),
		'influence_page' => array(
			'title' => __('Page', 'influence'),
			'priority' => 45,
		),
		'influence_sidebar' => array(
			'title' => __('Sidebar Menu', 'influence'),
			'priority' => 50,
		),
		'influence_footer' => array(
			'title' => __('Footer', 'influence'),
			'priority' => 100,
		),
	) );
	$settings = apply_filters( 'influence_plus_customizer_settings', array(
		'influence_general' => array(
			'site_width' => array(
				'type' => 'measurement',
				'title' => __('Site Max Width', 'influence'),
				'callback' => 'influence_plus_change_site_width',
				'default' => 1000,
			),
			'site_width_sidebar' => array(
				'type' => 'measurement',
				'title' => __('Site Max Width With Sidebar', 'influence'),
				'callback' => 'influence_plus_change_site_width',
				'default' => 1200,
			),
		),
		'influence_fonts' => array(
			'body_font' => array(
				'type' => 'font',
				'title' => __('Body Font', 'influence'),
				'default' => 'Helvetica Neue',
				'selector' => 'body,button,input,select,textarea',
			),
			'heading_font' => array(
				'type' => 'font',
				'title' => __('Heading Font', 'influence'),
				'default' => 'Montserrat',
				'selector' => 'h1,h2,h3,h4,h5,h6',
			),
		),
		'influence_menu' => array(
			'background' => array(
				'type' => 'color',
				'title' => __('Background', 'influence'),
				'default' => '#FFFFFF',
				'callback' => 'influence_plus_menu_bar_color',
			),
			'link' => array(
				'type' => 'color',
				'title' => __('Menu Link Color', 'influence'),
				'default' => '#333230',
				'selector' => '.main-navigation a.main-menu-button',
				'property' => 'color',
			),
			'site_title' => array(
				'type' => 'color',
				'title' => __('Site Title Color', 'influence'),
				'default' => '#444444',
				'selector' => '.site-header .site-title',
				'property' => 'color',
			),
			'site_description' => array(
				'type' => 'color',
				'title' => __('Site Description Color', 'influence'),
				'default' => '#333333',
				'selector' => '.site-header .site-description',
				'property' => 'color',
			),
		),
		'influence_page' => array(
			'background' => array(
				'type' => 'color',
				'title' => __('Background', 'influence'),
				'default' => '#FBFBFB',
				'selector' => 'article.entry',
				'property' => 'background-color',
			),
			'background_image' => array(
				'type' => 'image',
				'title' => __('Background Image', 'influence'),
				'default' => false,
				'selector' => 'article.entry',
				'property' => 'background-image',
			),
		),
		'influence_sidebar' => array(
			'background' => array(
				'type' => 'color',
				'title' => __('Sidebar Background', 'influence'),
				'default' => '#22211f',
				'selector' => '#main-menu',
				'property' => 'background-color',
			),
			'background_image' => array(
				'type' => 'image',
				'title' => __('Sidebar Background Image', 'influence'),
				'default' => false,
				'selector' => '#main-menu',
				'property' => 'background-image',
			),
			'heading_color' => array(
				'type' => 'color',
				'title' => __('Widget Heading Color', 'influence'),
				'default' => '#ebe9e5',
				'selector' => '#main-menu .widgets aside.widget .widget-title',
				'property' => 'color',
			),
			'heading_size' => array(
				'type' => 'measurement',
				'title' => __('Widget Heading Size', 'influence'),
				'default' => 1.25,
				'unit' => 'em',
				'selector' => '#main-menu .widgets aside.widget .widget-title',
				'property' => 'font-size',
			),
			'text' => array(
				'type' => 'color',
				'title' => __('Widget Text', 'influence'),
				'default' => '#bab9b5',
				'selector' => '#main-menu .widgets aside.widget',
				'property' => 'color',
			),
			'links' => array(
				'type' => 'color',
				'title' => __('Widget and Menu Links', 'influence'),
				'default' => '#c8c6c3',
				'selector' => '#main-menu .menu ul li a, #main-menu .widgets aside.widget a',
				'property' => 'color',
			),
		),
		'influence_footer' => array(
			'background' => array(
				'type' => 'color',
				'title' => __('Footer Background', 'influence'),
				'default' => '#2d2c2c',
				'selector' => '#colophon',
				'property' => 'background-color',
			),
			'background_image' => array(
				'type' => 'image',
				'title' => __('Footer Background Image', 'influence'),
				'default' => false,
				'selector' => '#colophon',
				'property' => 'background-image',
			),
			'heading_color' => array(
				'type' => 'color',
				'title' => __('Heading Color', 'influence'),
				'default' => '#ebe9e5',
				'selector' => '#footer-widgets aside.widget .widget-title',
				'property' => 'color',
			),
			'heading_size' => array(
				'type' => 'measurement',
				'title' => __('Heading Size', 'influence'),
				'default' => 1.5,
				'unit' => 'em',
				'selector' => '#footer-widgets aside.widget .widget-title',
				'property' => 'font-size',
			),
			'text' => array(
				'type' => 'color',
				'title' => __('Text', 'influence'),
				'default' => '#bab9b5',
				'selector' => '#footer-widgets aside.widget',
				'property' => 'color',
			),
			'links' => array(
				'type' => 'color',
				'title' => __('Links', 'influence'),
				'default' => '#c8c6c3',
				'selector' => '#footer-widgets aside.widget a',
				'property' => 'color',
			),
		),
	) );
	global $siteorigin_influence_customizer;
	$siteorigin_influence_customizer = new SiteOrigin_Customizer_Helper($settings, $sections, 'influence', plugin_dir_url(__FILE__).'/customizer/');
}
add_action('init', 'influence_plus_customizer_init');

/**
 * @param WP_Customize_Manager $wp_customize
 */
function influence_customizer_register($wp_customize){
	global $siteorigin_influence_customizer;
	$siteorigin_influence_customizer->customize_register($wp_customize);
}
add_action( 'customize_register', 'influence_customizer_register', 15 );

/**
 * @param SiteOrigin_Customizer_CSS_Builder $builder
 * @param mixed $val
 * @param array $setting
 *
 * @return \SiteOrigin_Customizer_CSS_Builder
 */
function influence_plus_menu_bar_color($builder, $val, $setting){
	if(!empty($val) && $val != '#FFFFFF') {
		$rgb = $builder->hex2rgb($val);
		$color = 'rgba('.implode(',', $rgb).', 0.86)';
		$builder->add_raw_css('.site-header{ background-color: '.esc_html($val).'; background-color: '.$color.'}');
	}
	return $builder;
}

function influence_plus_change_site_width( $builder, $val, $setting ) {
	if( empty($val) ) return;
	switch ($setting['id']) {
		case 'influence_general_site_width' :
			if( $val != 1000 ) {
				$builder->add_raw_css('#main,.container{max-width:'.intval($val).'px}');
			}
			break;
		case 'influence_general_site_width_sidebar' :
			if( $val != 1200 ) {
				$builder->add_raw_css('body.has-main-sidebar #main,body.has-main-sidebar .container{max-width:'.intval($val).'px}');
			}
			break;
	}
}
/**
 * Display the styles
 */
function influence_customizer_style() {
	global $siteorigin_influence_customizer;
	$builder = $siteorigin_influence_customizer->create_css_builder();
	// Add any extra CSS customizations
	echo $builder->css();
}
add_action('wp_head', 'influence_customizer_style', 20);