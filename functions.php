<?php
/**
 * influence functions and definitions
 *
 * @package influence
 * @since influence 1.0
 * @license GPL 2.0
 */

define( 'SITEORIGIN_THEME_VERSION', 'dev' );
define( 'SITEORIGIN_THEME_JS_PREFIX', '' );
define( 'SITEORIGIN_THEME_CSS_PREFIX', '' );

// Include all the SiteOrigin extras
include get_template_directory() . '/inc/webfonts/webfonts.php';
include get_template_directory() . '/inc/settings/settings.php';

if( ! function_exists( 'influence_plus_init' ) ) {
	include get_template_directory() . '/inc/customizer/customizer.php';
	include get_template_directory() . '/inc/customizer.php';
}

// Load the theme specific files
include get_template_directory() . '/inc/slider.php';
include get_template_directory() . '/inc/panels.php';
include get_template_directory() . '/inc/settings.php';
include get_template_directory() . '/inc/extras.php';
include get_template_directory() . '/inc/template-tags.php';
include get_template_directory() . '/inc/formats.php';

include get_template_directory() . '/inc/legacy.php';

if ( ! function_exists( 'influence_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since influence 1.0
 */
function influence_setup() {
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 900;
	
	// Make the theme translatable
	load_theme_textdomain( 'influence', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'influence' ),
	) );

	add_theme_support( 'siteorigin-panels', array(
		'home-page' => true,
		'home-page-default' => 'basic-home-page',
		'home-template' => 'templates/template-full-no-title.php',
	) );

	// Enable support for Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	set_post_thumbnail_size( 1000, 1000, false );
	add_image_size( 'thumbnail-retina', 1000, 1000, false);

	add_theme_support( 'custom-logo' );

	if ( ! function_exists( 'siteorigin_panels_render' ) ) {
		// Only include panels lite if the panels plugin doesn't exist
		include get_template_directory() . '/inc/panels-lite/panels-lite.php';
	}

	add_theme_support( 'siteorigin-premium-teaser', array(
		'customizer' => true,
		'settings' => true,
	) );

	add_theme_support( "title-tag" );

	// Let's add the default webfont.
	siteorigin_webfonts_add_font( 'Montserrat' );
}
endif; // influence_setup
add_action( 'after_setup_theme', 'influence_setup' );

/**
 * Add support for SiteOrigin Premium functionality.
 */
function influence_siteorigin_premium_support() {
	// This theme supports the no attribution addon.
	add_theme_support( 'siteorigin-premium-no-attribution', array(
		'filter'  => 'influence_credits_siteorigin',
		'enabled' => siteorigin_setting( 'display_attribution' ),
		'siteorigin_setting' => 'display_attribution'
	) );

	// This theme supports the ajax comments addon.
	add_theme_support( 'siteorigin-premium-ajax-comments', array(
		'enabled' => siteorigin_setting( 'comments_ajax' ),
		'siteorigin_setting' => 'comments_ajax'
	) );
}
add_action( 'after_setup_theme', 'influence_siteorigin_premium_support' );

/**
 * Setup the WordPress core custom background feature.
 * 
 * @since influence 1.0
 */
function influence_register_custom_background() {
	$args = array(
		'default-image' => get_template_directory_uri().'/images/background.png' ,
		'default-color' => 'f2f2f2',
	);

	$args = apply_filters( 'influence_custom_background_args', $args );
	add_theme_support( 'custom-background', $args );
}
add_action( 'after_setup_theme', 'influence_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since influence 1.0
 */
function influence_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'influence' ),
		'id' => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Menu Sidebar', 'influence' ),
		'id' => 'sidebar-menu',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer', 'influence' ),
		'id' => 'sidebar-footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'influence_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function influence_scripts() {
	wp_enqueue_style( 'influence-style', get_stylesheet_uri() );

	$js_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'influence-fitvids', get_template_directory_uri().'/js/jquery.fitvids' . $js_suffix . '.js' , array('jquery'), '1.0' );
	wp_enqueue_script( 'influence-main', get_template_directory_uri().'/js/jquery.theme-main' . $js_suffix . '.js' , array('jquery'), SITEORIGIN_THEME_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation' . $js_suffix . '.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'influence_scripts' );

/**
 * Enqueue the gravity forms specific CSS.
 */
function influence_gravity_forms_enqueue(){
	wp_enqueue_style( 'influence-gravity', get_template_directory_uri() . '/css/gravity.css', array( ), SITEORIGIN_THEME_VERSION );
}
add_action( 'gform_register_init_scripts', 'influence_gravity_forms_enqueue' );

/**
 * Add custom body classes.
 *
 * @param $classes
 *
 * @return array
 * @package influence
 * @since 1.0
 */
function influence_body_class( $classes ) {
	if ( siteorigin_setting( 'layout_responsive' ) ) $classes[] = 'responsive';
	if ( wp_is_mobile() ) $classes[] = 'mobile-device';
	if ( is_front_page() && siteorigin_setting( 'home_menu_overlaps' ) ) $classes[] = 'menu-overlap';

	if ( is_active_sidebar( 'sidebar-main' ) ) $classes[] = 'has-main-sidebar';


	return $classes;
}
add_filter( 'body_class', 'influence_body_class' );

/**
 * Add scripts for some backwards compatibility with IE
 */
function influence_wp_head() {
	?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
	<![endif]-->
	<?php
}
add_action( 'wp_head', 'influence_wp_head' );

/**
 * Remove the label from the comment form text field
 *
 * @param $form
 *
 * @return mixed
 */
function influence_filter_comment_form( $form ) {
	$form['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" rows="8" aria-required="true"></textarea></p>' ;
	return $form;
}
add_filter( 'comment_form_defaults', 'influence_filter_comment_form' );

/**
 * Add the viewport header for mobile devices.
 */
function influence_viewport_header() {
	if ( siteorigin_setting( 'layout_responsive' ) ) {
		?><meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" /><?php
	}
	else {
		?><meta name="viewport" content="width=<?php echo intval( siteorigin_setting( 'layout_viewport' ) ) ?>px" /><?php
	}
}
add_action( 'wp_head', 'influence_viewport_header' );

/**
 * Change the name of Influence Premium.
 *
 * @return string
 */
function influence_premium_version_name() {
	return __( 'Influence Plus', 'influence' );
}
add_filter( 'siteorigin_premium_theme_name', 'influence_premium_version_name' );
