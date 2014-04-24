<?php

function influence_supporters_upgrade_content($content){
	$content['premium_title'] = __('Upgrade To influence Premium', 'influence');
	$content['premium_summary'] = __("If you've enjoyed using influence, you're going to love influence Premium. It's a robust upgrade to influence that gives you some useful features. You choose the price, so you can decide what it's worth to give your site a professional edge.", 'influence');

	// This is just a supporters pack
	$content['supporters'] = true;

	$content['buy_url'] = 'http://siteorigin.localhost/?attachment_id=4&action=popup';
	$content['premium_video_poster'] = get_template_directory_uri().'/upgrade/poster.jpg';
	$content['premium_video_id'] = '74123479';

	$content['features'] = array();

	$content['features'][] = array(
		'heading' => __('Remove Attribution Links', 'influence'),
		'content' => __('influence premium gives you the option to easily remove the "Powered by WordPress, Theme by SiteOrigin" text from your footer. ', 'influence'),
		// 'image' => get_template_directory_uri().'/upgrade/teasers/attribution.png',
	);

	$content['features'][] = array(
		'heading' => __("Retina Logo", 'influence'),
		'content' => __("No one wants a fuzzy logo. influence Premium lets you upload a second, double-size logo that's only displayed to users with retina screens.", 'influence'),
		// 'image' => get_template_directory_uri().'/upgrade/teasers/retina-logo.png',
	);

	return $content;
}
add_filter('siteorigin_premium_content', 'influence_supporters_upgrade_content');