<?php
/**
 * The Template for displaying all single posts.
 *
 * @package influence
 * @since influence 1.0
 * @license GPL 2.0
 */

get_header(); ?>

<div id="primary" class="content-area">

	<div id="content" class="site-content" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

	<?php endwhile; // end of the loop. ?>

	</div><!-- #content .site-content -->

</div><!-- #primary .content-area -->

<?php get_footer(); ?>