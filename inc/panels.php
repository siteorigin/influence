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
	$layouts['basic-home'] = array (
		'name' => __('Basic Home Page', 'influence'),
		'widgets' =>
			array (
				0 =>
					array (
						'features' =>
							array (
								0 =>
									array (
										'container_color' => '',
										'icon' => 'fontawesome-bullhorn',
										'icon_color' => '',
										'icon_image' => '',
										'title' => 'Lorem Ipsum Dolor',
										'text' => 'Curabitur fermentum arcu et elit lacinia rutrum. Mauris viverra mi sit amet nisi laoreet, nec luctus nulla scelerisque. Curabitur bibendum nec lacus at mattis. Ut vitae egestas tortor. Vivamus ex augue, tincidunt eu mauris in, semper molestie massa.',
										'more_text' => '',
										'more_url' => '',
									),
								1 =>
									array (
										'container_color' => '',
										'icon' => 'fontawesome-user',
										'icon_color' => '',
										'icon_image' => '',
										'title' => 'Lorem Ipsum Dolor',
										'text' => 'Curabitur fermentum arcu et elit lacinia rutrum. Mauris viverra mi sit amet nisi laoreet, nec luctus nulla scelerisque. Curabitur bibendum nec lacus at mattis. Ut vitae egestas tortor. Vivamus ex augue, tincidunt eu mauris in, semper molestie massa.',
										'more_text' => '',
										'more_url' => '',
									),
								2 =>
									array (
										'container_color' => '',
										'icon' => 'fontawesome-anchor',
										'icon_color' => '',
										'icon_image' => '',
										'title' => 'Lorem Ipsum Dolor',
										'text' => 'Curabitur fermentum arcu et elit lacinia rutrum. Mauris viverra mi sit amet nisi laoreet, nec luctus nulla scelerisque. Curabitur bibendum nec lacus at mattis. Ut vitae egestas tortor. Vivamus ex augue, tincidunt eu mauris in, semper molestie massa.',
										'more_text' => '',
										'more_url' => '',
									),
							),
						'container_shape' => 'rounded-hex',
						'container_size' => '84',
						'icon_size' => '24',
						'per_row' => '3',
						'responsive' => '1',
						'title_link' => '',
						'icon_link' => '',
						'new_window' => '',
						'info' =>
							array (
								'grid' => '0',
								'cell' => '0',
								'id' => '0',
								'class' => 'SiteOrigin_Widget_Features_Widget',
							),
					),
				1 =>
					array (
						'title' => 'Curabitur Bibendum Nec Lacus ',
						'sub_title' => 'Vivamus ex augue, tincidunt eu mauris in, semper molestie massa.',
						'design' =>
							array (
								'background_color' => '',
								'border_color' => '',
							),
						'button' =>
							array (
								'text' => 'More Info',
								'url' => '#',
								'button_icon' =>
									array (
										'icon_selected' => '',
										'icon_color' => '',
										'icon' => '',
									),
								'design' =>
									array (
										'align' => 'center',
										'theme' => 'atom',
										'button_color' => '',
										'text_color' => '',
										'hover' => '1',
										'font_size' => '1',
										'rounding' => '0.25',
										'padding' => '1',
									),
								'attributes' =>
									array (
										'id' => '',
										'title' => '',
										'onclick' => '',
									),
								'new_window' => '',
							),
						'info' =>
							array (
								'grid' => '0',
								'cell' => '0',
								'id' => '1',
								'class' => 'SiteOrigin_Widget_Cta_Widget',
							),
					),
				2 =>
					array (
						'title' => '',
						'text' => 'Cras et iaculis arcu. Etiam semper dictum est, quis placerat nisi consequat eu. Morbi id lacinia turpis. Curabitur fermentum arcu et elit lacinia rutrum. Mauris viverra mi sit amet nisi laoreet, nec luctus nulla scelerisque. Curabitur bibendum nec lacus at mattis. Ut vitae egestas tortor. Vivamus ex augue, tincidunt eu mauris in, semper molestie massa.

Nunc nec auctor risus. Donec mollis mi a finibus fermentum. Suspendisse ac ornare turpis. Integer mollis eros a dapibus congue. Vestibulum eu vulputate magna. Nulla urna odio, tincidunt quis est et, mattis volutpat enim. Cras mollis orci massa, id pellentesque felis sodales at. Aenean risus est, rhoncus a enim sit amet, auctor cursus augue.',
						'filter' => '1',
						'info' =>
							array (
								'grid' => '1',
								'cell' => '0',
								'id' => '2',
								'class' => 'WP_Widget_Text',
							),
					),
				3 =>
					array (
						'image' => false,
						'size' => 'large',
						'title' => '',
						'alt' => '',
						'url' => '',
						'bound' => '1',
						'new_window' => '',
						'info' =>
							array (
								'grid' => '1',
								'cell' => '1',
								'id' => '3',
								'class' => 'SiteOrigin_Widget_Image_Widget',
							),
					),
			),
		'grids' =>
			array (
				0 =>
					array (
						'cells' => '1',
					),
				1 =>
					array (
						'cells' => '2',
					),
			),
		'grid_cells' =>
			array (
				0 =>
					array (
						'weight' => '1',
						'grid' => '0',
					),
				1 =>
					array (
						'weight' => '0.5',
						'grid' => '1',
					),
				2 =>
					array (
						'weight' => '0.5',
						'grid' => '1',
					),
			),
	);

	return $layouts;
}
add_filter('siteorigin_panels_prebuilt_layouts', 'influence_prebuilt_page_layouts');

/**
 * Display a special form for missing widgets.
 *
 * @param $widget
 * @param $instance
 *
 * @return string
 */
function influence_missing_widget_forms($form, $widget, $instance){


	if( preg_match('/SiteOrigin_Widget_([A-Za-z]+)_Widget/', $widget, $matches) ) {
		$form = '<div class="panels-missing-widget-form"><p>'
			. __('This widget uses the <strong>SiteOrigin Widgets Bundle</strong> plugin. A free plugin that gives you a lot of widgets to use in your Page Builder pages.', 'influence')
			. '</p>'
			. '<p><a href="' . siteorigin_plugin_activation_install_url( 'so-widgets-bundle', __('SiteOrigin Widgets Bundle', 'influence') ) . '" class="button-primary" target="_blank">' . __('Install Plugin', 'influence') . '</a> '
		    . '<span class="description" style="display:inline-block; margin-left: 1em;">'.__('Free', 'influence').'</span>'
			.'</div>';
	}

	return $form;
}
add_filter('siteorigin_panels_missing_widget_form', 'influence_missing_widget_forms', 10, 3);

/**
 * Add the title and description for any known missing widgets.
 *
 * @param $widget
 * @param $data
 *
 * @return array
 */
function influence_missing_widget_data($data, $widget){

	switch($widget) {
		case 'SiteOrigin_Widget_Features_Widget' :
			$data = array(
				'title' => __('Features', 'influence'),
				'description' => __('Display a list of features and icons.', 'influence'),
			);
			break;
	}

	return $data;
}
add_filter('siteorigin_panels_missing_widget_data', 'influence_missing_widget_data', 10, 2);