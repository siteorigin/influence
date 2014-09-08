<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package influence
 * @since influence 1.0
 * @license GPL 2.0
 */
?>

<?php if( is_active_sidebar('sidebar-main') ) : ?>

	<div id="secondary">

		<div class="widgets">
			<?php dynamic_sidebar( 'sidebar-main' ) ?>
		</div>

	</div>

<?php endif; ?>