<?php
/**
 * Integrates this theme with SiteOrigin panels page builder.
 * 
 * @package influence
 * @since 1.0
 * @license GPL 2.0
 */

/**
 * Adds default page layouts
 *
 * @param $layouts
 */
function influence_prebuilt_page_layouts($layouts){
	return $layouts;
}
add_filter('siteorigin_panels_prebuilt_layouts', 'influence_prebuilt_page_layouts');

/**
 * Configure the SiteOrigin page builder settings.
 * 
 * @param $settings
 * @return mixed
 */
function influence_panels_settings($settings){
	$settings['home-page'] = true;
	return $settings;
}
add_filter('siteorigin_panels_settings', 'influence_panels_settings');