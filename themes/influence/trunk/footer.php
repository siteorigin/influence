<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package influence
 * @since influence 1.0
 * @license GPL 2.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="container">

			<div id="footer-widgets">
				<?php dynamic_sidebar( 'sidebar-footer' ) ?>
			</div><!-- #footer-widgets -->

			<?php $credits = apply_filters( 'influence_credits_siteorigin', sprintf( __( 'Theme by %1$s.', 'influence' ), '<a href="http://siteorigin.com/" rel="designer">SiteOrigin</a>' ) ); ?>

			<?php if( !empty($credits) ) : ?>
				<div id="site-info">
					<?php
					do_action( 'influence_credits' );
					echo $credits;
					?>
				</div><!-- .site-info -->
			<?php endif; ?>

		</div>

	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php get_sidebar('menu') ?>

<?php wp_footer(); ?>

</body>
</html>