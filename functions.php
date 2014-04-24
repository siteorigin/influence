<?php
/**
 * effortless functions and definitions
 *
 * @package effortless
 * @since effortless 1.0
 * @license GPL 2.0
 */

define('SITEORIGIN_THEME_VERSION', 'trunk');
define('SITEORIGIN_THEME_ENDPOINT', 'http://siteorigin.localhost');

if( file_exists( get_template_directory() . '/premium/functions.php' ) ){
	include get_template_directory() . '/premium/functions.php';
}

// Include all the SiteOrigin extras
include get_template_directory() . '/extras/settings/settings.php';
include get_template_directory() . '/extras/adminbar/adminbar.php';
include get_template_directory() . '/extras/plugin-activation/plugin-activation.php';

// Load the theme specific files
include get_template_directory() . '/inc/slider.php';
include get_template_directory() . '/inc/panels.php';
include get_template_directory() . '/inc/settings.php';
include get_template_directory() . '/inc/extras.php';
include get_template_directory() . '/inc/template-tags.php';
include get_template_directory() . '/inc/gallery.php';

if ( ! function_exists( 'effortless_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since effortless 1.0
 */
function effortless_setup() {
	// Initialize SiteOrigin settings
	siteorigin_settings_init();

	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 900;
	
	// Make the theme translatable
	load_theme_textdomain( 'effortless', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'effortless' ),
	) );

	// Enable support for Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	set_post_thumbnail_size(1000, 480, true);
	add_image_size('effortless-slide', 960, 480, true);

	if( !defined('SITEORIGIN_PANELS_VERSION') && !siteorigin_plugin_activation_is_activating('siteorigin-panels') ){
		// Only include panels lite if the panels plugin doesn't exist
		include get_template_directory() . '/extras/panels-lite/panels-lite.php';
	}
}
endif; // effortless_setup
add_action( 'after_setup_theme', 'effortless_setup' );

/**
 * Setup the WordPress core custom background feature.
 * 
 * @since effortless 1.0
 */
function effortless_register_custom_background() {
	$args = array(
		'default-image' => get_template_directory_uri().'/images/background.png' ,
		'default-color' => 'ffffff',
	);

	$args = apply_filters( 'effortless_custom_background_args', $args );
	add_theme_support( 'custom-background', $args );
}
add_action( 'after_setup_theme', 'effortless_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since effortless 1.0
 */
function effortless_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'effortless' ),
		'id' => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer', 'effortless' ),
		'id' => 'sidebar-footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'effortless_widgets_init' );

/**
 * Register all the bundled scripts
 */
function effortless_register_scripts(){
	wp_register_script( 'effortless-fitvids' , get_template_directory_uri().'/js/jquery.fitvids.js' , array('jquery'), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'effortless_register_scripts' , 5);

/**
 * Enqueue scripts and styles
 */
function effortless_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'effortless-main' , get_template_directory_uri().'/js/jquery.theme-main.js' , array('jquery', 'effortless-fitvids'), SITEORIGIN_THEME_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'effortless_scripts' );

/**
 * Add custom body classes.
 * 
 * @param $classes
 * @package effortless
 * @since 1.0
 */
function effortless_body_class($classes){
	if(siteorigin_setting('layout_responsive')) $classes[] = 'responsive';
	return $classes;
}
add_filter('body_class', 'effortless_body_class');

function effortless_wp_head(){
	?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
	<![endif]-->
	<?php
}
add_action('wp_head', 'effortless_wp_head');

function effortless_filter_comment_form($form){
	$form['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" rows="8" aria-required="true"></textarea></p>' ;
	return $form;
}
add_filter( 'comment_form_defaults', 'effortless_filter_comment_form' );