<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$colors_arr = vc_colors_arr();
$size_arr = vc_size_arr();
$icons_arr = vc_icons_arr();
return array(
	'name' => __( 'Old Button', 'page_builder' ) . ' 1',
	'base' => 'vc_button',
	'icon' => 'icon-wpb-ui-button',
	'category' => __( 'Content', 'page_builder' ),
	'deprecated' => '4.5',
	'content_element' => false,
	'description' => __( 'Eye catching button', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Text', 'page_builder' ),
			'holder' => 'button',
			'class' => 'wpb_button',
			'param_name' => 'title',
			'value' => __( 'Text on the button', 'page_builder' ),
			'description' => __( 'Enter text on the button.', 'page_builder' ),
		),
		array(
			'type' => 'href',
			'heading' => __( 'URL (Link)', 'page_builder' ),
			'param_name' => 'href',
			'description' => __( 'Enter button link.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Target', 'page_builder' ),
			'param_name' => 'target',
			'value' => vc_target_param_list(),
			'dependency' => array(
				'element' => 'href',
				'not_empty' => true,
				'callback' => 'vc_button_param_target_callback',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Color', 'page_builder' ),
			'param_name' => 'color',
			'value' => $colors_arr,
			'description' => __( 'Select button color.', 'page_builder' ),
			'param_holder_class' => 'vc_colored-dropdown',
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon', 'page_builder' ),
			'param_name' => 'icon',
			'value' => $icons_arr,
			'description' => __( 'Select icon to display on button.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'page_builder' ),
			'param_name' => 'size',
			'value' => $size_arr,
			'description' => __( 'Select button size.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'page_builder' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
	),
	'js_view' => 'VcButtonView',
);
