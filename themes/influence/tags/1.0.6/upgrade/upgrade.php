<?php

function influence_upgrade_content($content){
	$content['premium_title'] = __('Upgrade To Influence Plus', 'influence');
	$content['premium_summary'] = __("If you've enjoyed using Influence, you're going to love Influence Plus. It's a robust upgrade to Influence that gives you some useful features. It's a free upgrade, so don't miss out.", 'influence');

	$content['premium_video_poster'] = get_template_directory_uri().'/upgrade/poster.jpg';

	// We're offering the premium version as a free download.
	$content['free_download'] = true;
	$content['buy_url'] = 'http://siteorigin.com/theme/influence/?action=plus';
	$content['premium_video_poster'] = get_template_directory_uri().'/upgrade/poster.jpg';
	$content['premium_video_id'] = '102844186';

	$content['features'] = array();

	$content['features'][] = array(
		'heading' => __('Remove Attribution Links', 'influence'),
		'content' => __('Influence Plus gives you the option to easily remove the "Powered by WordPress, Theme by SiteOrigin" text from your footer. ', 'influence'),
		'image' => get_template_directory_uri().'/upgrade/teasers/attribution.png',
	);

	$content['features'][] = array(
		'heading' => __("Retina Logo", 'influence'),
		'content' => __("Make sure your logo is sharp on retina devices. Influence Plus lets you upload a second, double-size logo that's only displayed to users with retina screens.", 'influence'),
		'image' => get_template_directory_uri().'/upgrade/teasers/retina-logo.png',
	);

	$content['features'][] = array(
		'heading' => __('Customizer Integration', 'influence'),
		'content' => __("Make Influence your own with customizer integration. Change fonts, colors and more all using the live-updating WordPress customizer.", 'influence'),
		'image' => get_template_directory_uri().'/upgrade/teasers/customizer.png',
	);

	$content['features'][] = array(
		'heading' => __('Page Sliders', 'influence'),
		'content' => __("Add big, beautiful sliders to all your pages in the same way you use them on your home page.", 'influence'),
	);

	$content['features'][] = array(
		'heading' => __('Newsletter Updates', 'influence'),
		'content' => __("All you need to do to receive Influence Plus is sign up to our newsletter. We use this to announce all our new free theme and plugin releases, so it's a double win.", 'influence'),
	);

	$content['testimonials'] = array(
		array(
			'gravatar' => '2e885cf9dcd4d9d9559deb0405b2c76f',
			'name' => 'Devin Walker',
			'content' => __("Great attention to detail, especially on the navigation.", 'influence'),
		),
	);

	return $content;
}
add_filter('siteorigin_premium_content', 'influence_upgrade_content');

function influence_add_page_meta_boxes(){
	if( defined('SITEORIGIN_IS_PREMIUM') ) return;

	// If the user is using Influence Plus, then that will handle this metabox instead.
	add_meta_box(
		'influence-slider',
		__('Influence Page Slider', 'influence'),
		'influence_display_page_slider_meta_box',
		'page',
		'side'
	);
}
add_action('add_meta_boxes', 'influence_add_page_meta_boxes');

function influence_display_page_slider_meta_box(){
	?>
	<p>
		<?php
		printf(
			__('Available in %sInfluence Plus%s', 'influence'),
			'<a href="' . admin_url('themes.php?page=premium_upgrade') . '" style="padding: 2px 6px; background: #4F6920; border-radius: 2px; color: white; text-decoration: none">',
			'</a>'
		)
		?>
		<small class="description" style="display: block">
			<?php _e('Display a slider on your pages like you do on the home page.', 'influence') ?>
		</small>
	</p>
	<?php
}