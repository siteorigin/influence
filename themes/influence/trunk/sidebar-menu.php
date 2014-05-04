<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package influence
 * @since influence 1.0
 * @license GPL 2.0
 */
?>

<div id="main-menu">

	<a href="#" class="main-menu-close"><?php _e('Close', 'influence') ?></a>

	<div class="menu">
		<?php wp_nav_menu( array('theme_location' => 'primary') ) ?>
	</div>

	<div class="widgets">
		<?php dynamic_sidebar( 'sidebar-menu' ) ?>
	</div>

</div>