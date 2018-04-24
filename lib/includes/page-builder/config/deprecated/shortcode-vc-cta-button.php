<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$colors_arr = vc_colors_arr();
$icons_arr = vc_icons_arr();
$size_arr = vc_size_arr();
return array(
	'name' => __( 'Old Call to Action', 'page_builder' ),
	'base' => 'vc_cta_button',
	'icon' => 'icon-wpb-call-to-action',
	'deprecated' => '4.5',
	'content_element' => false,
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Catch visitors attention with CTA block', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textarea',
			'admin_label' => true,
			'heading' => __( 'Text', 'page_builder' ),
			'param_name' => 'call_text',
			'value' => __( 'Click edit button to change this text.', 'page_builder' ),
			'description' => __( 'Enter text content.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Text on the button', 'page_builder' ),
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
				'callback' => 'vc_cta_button_param_target_callback',
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
			'heading' => __( 'Button icon', 'page_builder' ),
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
			'type' => 'dropdown',
			'heading' => __( 'Button position', 'page_builder' ),
			'param_name' => 'position',
			'value' => array(
				__( 'Right', 'page_builder' ) => 'cta_align_right',
				__( 'Left', 'page_builder' ) => 'cta_align_left',
				__( 'Bottom', 'page_builder' ) => 'cta_align_bottom',
			),
			'description' => __( 'Select button alignment.', 'page_builder' ),
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'page_builder' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
	),
	'js_view' => 'VcCallToActionView',
);
