<?php
/**
 * Displays 
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

		<?php if( get_the_title() ) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'influence' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( '' ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'influence' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

		<div class="entry-meta">
			<?php if( !is_singular() && ( preg_match( '/<!--more(.*?)?-->/', $post->post_content ) || empty($post->post_title) ) ) : ?>
				<div class="continue-reading"><a href="<?php the_permalink() ?>"><?php _e('Continue Reading <span class="meta-nav">&rarr;</span>', 'influence') ?></a></div>
			<?php else : ?>
				<div class="taxonomy">
					<?php
					the_tags( '<div class="tags"><span class="influence-icon-ribbon"></span>', ', ', '</div>' );
					if( influence_categorized_blog() ) the_terms( get_the_ID(), 'category', '<div class="categories"><span class="influence-icon-layers"></span>', ', ', '</div>' );
					?>
				</div>
			<?php endif; ?>

			<div class="posted-on"><?php influence_posted_on(); ?></div>
		</div><!-- .entry-meta -->

		<?php if( is_single() ) : ?>
			<?php if ( comments_open() || '0' != get_comments_number() ) : ?>

				<div id="single-comments-wrapper">
					<?php comments_template( '', true ); ?>
				</div><!-- #single-comments-wrapper -->

			<?php endif; ?>

			<?php influence_content_nav( 'nav-below' ); ?>
		<?php endif; ?>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
