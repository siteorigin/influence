<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package effortless
 * @since effortless 1.0
 * @license GPL 2.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="container">

			<div id="footer-widgets">
				<?php dynamic_sidebar( 'sidebar-footer' ) ?>
			</div><!-- #footer-widgets -->

			<div id="site-info">
				<?php do_action( 'effortless_credits' ); ?>
				<?php echo apply_filters( 'effortless_credits_siteorigin', sprintf( __( 'Theme by %1$s.', 'effortless' ), '<a href="http://siteorigin.com/" rel="designer">SiteOrigin</a>' ) ); ?>
			</div><!-- .site-info -->

		</div>

	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<div id="main-menu">

	<a href="#" class="main-menu-close"><?php _e('Close', 'effortless') ?></a>

	<div class="menu">
		<?php wp_nav_menu(array('theme_location' => 'primary')) ?>
	</div>

	<div class="widgets">
		<?php dynamic_sidebar( 'sidebar-main' ) ?>
	</div>

</div>

<?php wp_footer(); ?>

</body>
</html>