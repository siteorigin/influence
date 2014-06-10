<?php
/**
 * The Template for displaying all single posts.
 *
 * @package influence
 * @since influence 1.0
 * @license GPL 2.0
 */

get_header(); ?>

<section id="primary" class="content-area">

	<div id="content" class="site-content" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; // end of the loop. ?>

	</div><!-- #content .site-content -->

</section><!-- #primary .content-area -->

<?php get_sidebar() ?>

<?php get_footer(); ?>