<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package influence
 * @since influence 1.0
 * @license GPL 2.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

	<?php do_action( 'before' ); ?>

	<header id="masthead" class="site-header has-shadow" role="banner">

		<div class="container">

			<div class="hgroup">

				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php influence_display_logo(); ?>
					</a>
				</h1>

				<?php if(siteorigin_setting('logo_site_description')) : ?>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif ?>

			</div>

			<?php if( siteorigin_setting('general_menu_text') ) : ?>

				<nav role="navigation" class="site-navigation main-navigation primary">

					<h1 class="assistive-text"><?php _e( 'Menu', 'influence' ); ?></h1>

					<a href="#" class="main-menu-button">
						<i class="influence-icon-menu-icon"></i>
						<?php echo siteorigin_setting('general_menu_text') ?>
					</a>

				</nav><!-- .site-navigation .main-navigation -->

			<?php endif; ?>

		</div>

	</header><!-- #masthead .site-header -->

	<?php
	$after_header = apply_filters('influence_after_header', '');

	if( empty($after_header) || !siteorigin_setting('home_menu_overlaps') ) {
		// We'll use a sentinel to take up space
		influence_site_header_sentinel();
		echo $after_header;
	}
	else {
		echo $after_header;
	}
	?>

	<div id="main" class="site-main">
