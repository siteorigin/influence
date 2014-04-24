<?php
/**
 * Integrates this theme with SiteOrigin panels page builder.
 * 
 * @package effortless
 * @since 1.0
 * @license GPL 2.0
 */

/**
 * Adds default page layouts
 *
 * @param $layouts
 */
function effortless_prebuilt_page_layouts($layouts){
	return $layouts;
}
add_filter('siteorigin_panels_prebuilt_layouts', 'effortless_prebuilt_page_layouts');

/**
 * Configure the SiteOrigin page builder settings.
 * 
 * @param $settings
 * @return mixed
 */
function effortless_panels_settings($settings){
	$settings['home-page'] = true;
	return $settings;
}
add_filter('siteorigin_panels_settings', 'effortless_panels_settings');