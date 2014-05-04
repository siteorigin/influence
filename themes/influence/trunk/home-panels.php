<?php
/**
 * The template for displaying the home page panel. Requires SiteOrigin page builder plugin.
 *
 * @package influence
 * @since influence 1.0
 * @see http://siteorigin.com/page-builder/
 * @license GPL 2.0
 */

get_header(); ?>

<section id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<div class="entry-content">
			<?php if(function_exists('siteorigin_panels_render')) echo siteorigin_panels_render('home'); ?>
		</div>
	</div><!-- #content .site-content -->
</section><!-- #primary .content-area -->

<?php get_footer(); ?>