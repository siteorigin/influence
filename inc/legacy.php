<?php

function influence_add_legacy_settings_page(){
	add_theme_page(
		__( 'Theme Settings', 'influence' ),
		__( 'Theme Settings', 'influence' ),
		'manage_options',
		'influence-legacy-settings',
		'influence_legacy_settings_page'
	);
}
add_action( 'admin_menu', 'influence_add_legacy_settings_page' );

function influence_legacy_settings_page(){
	?>
	<div class="wrap">
		<h2><?php _e( 'Influence Settings Have Moved', 'influence' ) ?></h2>
		<p>
			<?php _e( 'Our theme settings now take advantage of the WordPress customizer.', 'influence' ); ?>
			<?php _e( 'Navigate to <strong>Appearance > Customize > Theme Settings</strong> to access theme settings.', 'influence' ); ?>
		</p>
	</div>
	<?php
}

if( !function_exists( 'siteorigin_settings_add_field' ) ) {
	function siteorigin_settings_add_field( $section, $id, $type, $label = null, $args = array(), $after = false ){
		SiteOrigin_Settings::single()->add_field( $section, $id, $type, $label, $args, $after);
	}
}

if( !function_exists( 'siteorigin_settings_add_section' ) ) {
	function siteorigin_settings_add_section( $id, $title, $after = false ){
		SiteOrigin_Settings::single()->add_section( $id, $title, $after );
	}
}