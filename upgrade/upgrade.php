<?php

function influence_supporters_upgrade_content($content){
	$content['premium_title'] = __('Upgrade To Influence Plus', 'influence');
	$content['premium_summary'] = __("If you've enjoyed using Influence, you're going to love Influence Plus. It's a robust upgrade to Influence that gives you some useful features. It's a free upgrade, so don't miss out.", 'influence');

	$content['premium_video_poster'] = get_template_directory_uri().'/upgrade/poster.jpg';

	// We're offering the premium version as a free download.
	$content['free_download'] = true;

	$content['buy_url'] = 'http://siteorigin.localhost/?attachment_id=4&action=popup';
	$content['premium_video_poster'] = get_template_directory_uri().'/upgrade/poster.jpg';
	// $content['premium_video_id'] = '74123479';

	$content['features'] = array();

	$content['features'][] = array(
		'heading' => __('Remove Attribution Links', 'influence'),
		'content' => __('Influence Plus gives you the option to easily remove the "Powered by WordPress, Theme by SiteOrigin" text from your footer. ', 'influence'),
		'image' => get_template_directory_uri().'/upgrade/teasers/attribution.png',
	);

	$content['features'][] = array(
		'heading' => __("Retina Logo", 'influence'),
		'content' => __("No one wants a fuzzy logo. Influence Plus lets you upload a second, double-size logo that's only displayed to users with retina screens.", 'influence'),
		'image' => get_template_directory_uri().'/upgrade/teasers/retina-logo.png',
	);

	$content['features'][] = array(
		'heading' => __('Customizer Integration', 'influence'),
		'content' => __("Make Vantage your own with customizer integration. Change fonts, colors and more all using the live-updating WordPress customizer.", 'influence'),
		'image' => get_template_directory_uri().'/upgrade/teasers/customizer.png',
	);

	$content['features'][] = array(
		'heading' => __('Newsletter Updates', 'influence'),
		'content' => __("All you need to do to receive Influence Plus is sign up to our newsletter. We use this to announce all our new free theme and plugin releases, so it's a double win.", 'influence'),
	);

	return $content;
}
add_filter('siteorigin_premium_content', 'influence_supporters_upgrade_content');