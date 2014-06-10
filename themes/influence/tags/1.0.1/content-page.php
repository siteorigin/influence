<?php
/**
 * Displays a single page
 *
 * @package influence
 * @since influence 1.0
 * @license GPL 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

	<?php if( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'influence' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
				<?php the_post_thumbnail() ?>
			</a>
		</div>
	<?php endif; ?>


	<div class="post-text">

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'influence' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'influence' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

		<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
			<div id="single-comments-wrapper">
				<?php comments_template( '', true ); ?>
			</div><!-- #single-comments-wrapper -->
		<?php endif; ?>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
