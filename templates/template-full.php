<?php
/**
 * This template displays full width pages.
 *
 * @package influence
 * @since influence 1.0
 * @license GPL 2.0
 * 
 * Template Name: Full Width Page
 */

get_header(); ?>

<section id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content .site-content -->
</section><!-- #primary .content-area -->

<?php get_footer(); ?>