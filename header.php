<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package effortless
 * @since effortless 1.0
 * @license GPL 2.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
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
						<?php effortless_display_logo(); ?>
					</a>
				</h1>

				<?php if(siteorigin_setting('general_site_description')) : ?>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif ?>

			</div>

			<nav role="navigation" class="site-navigation main-navigation primary">

				<h1 class="assistive-text"><?php _e( 'Menu', 'effortless' ); ?></h1>

				<a href="#" id="main-menu-button">
					<span class="icon"></span>
					<?php _e('Menu', 'effortless') ?>
				</a>

				<?php // wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

			</nav><!-- .site-navigation .main-navigation -->
		</div>

	</header><!-- #masthead .site-header -->

	<?php echo apply_filters('effortless_after_header', ''); ?>

	<div id="main" class="site-main">
