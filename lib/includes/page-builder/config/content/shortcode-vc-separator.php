<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Separator', 'page_builder' ),
	'base' => 'vc_separator',
	'icon' => 'icon-wpb-ui-separator',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Horizontal separator line', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Color', 'page_builder' ),
			'param_name' => 'color',
			'value' => array_merge( getVcShared( 'colors' ), array( __( 'Custom color', 'page_builder' ) => 'custom' ) ),
			'std' => 'grey',
			'description' => __( 'Select color of separator.', 'page_builder' ),
			'param_holder_class' => 'vc_colored-dropdown',
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Alignment', 'page_builder' ),
			'param_name' => 'align',
			'value' => array(
				__( 'Center', 'page_builder' ) => 'align_center',
				__( 'Left', 'page_builder' ) => 'align_left',
				__( 'Right', 'page_builder' ) => 'align_right',
			),
			'description' => __( 'Select separator alignment.', 'page_builder' ),
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Custom Border Color', 'page_builder' ),
			'param_name' => 'accent_color',
			'description' => __( 'Select border color for your element.', 'page_builder' ),
			'dependency' => array(
				'element' => 'color',
				'value' => array( 'custom' ),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'page_builder' ),
			'param_name' => 'style',
			'value' => getVcShared( 'separator styles' ),
			'description' => __( 'Separator display style.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Border width', 'page_builder' ),
			'param_name' => 'border_width',
			'value' => getVcShared( 'separator border widths' ),
			'description' => __( 'Select border width (pixels).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Element width', 'page_builder' ),
			'param_name' => 'el_width',
			'value' => getVcShared( 'separator widths' ),
			'description' => __( 'Select separator width (percentage).', 'page_builder' ),
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'el_id',
			'heading' => __( 'Element ID', 'page_builder' ),
			'param_name' => 'el_id',
			'description' => sprintf( __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'page_builder' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'page_builder' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'page_builder' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'page_builder' ),
		),
	),
);
