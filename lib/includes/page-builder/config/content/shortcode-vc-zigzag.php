<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'ZigZag Separator', 'page_builder' ),
	'base' => 'vc_zigzag',
	'icon' => 'vc_icon-vc-zigzag',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Horizontal zigzag separator line', 'page_builder' ),
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
			'type' => 'colorpicker',
			'heading' => __( 'Custom Color', 'page_builder' ),
			'param_name' => 'custom_color',
			'description' => __( 'Select color for your element.', 'page_builder' ),
			'dependency' => array(
				'element' => 'color',
				'value' => array( 'custom' ),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Alignment', 'page_builder' ),
			'param_name' => 'align',
			'value' => array(
				__( 'Center', 'page_builder' ) => 'center',
				__( 'Left', 'page_builder' ) => 'left',
				__( 'Right', 'page_builder' ) => 'right',
			),
			'description' => __( 'Select separator alignment.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Element width', 'page_builder' ),
			'param_name' => 'el_width',
			'value' => array(
				'100%' => '100',
				'90%' => '90',
				'80%' => '80',
				'70%' => '70',
				'60%' => '60',
				'50%' => '50',
				'40%' => '40',
				'30%' => '30',
				'20%' => '20',
				'10%' => '10',
			),
			'description' => __( 'Select separator width (percentage).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Border width', 'page_builder' ),
			'param_name' => 'el_border_width',
			'std' => '12',
			'value' => array(
				__( 'Extra small', 'page_builder' ) => '8',
				__( 'Small', 'page_builder' ) => '10',
				__( 'Medium', 'page_builder' ) => '12',
				__( 'Large', 'page_builder' ) => '15',
				__( 'Extra large', 'page_builder' ) => '20',
			),
			'description' => __( 'Select separator border width.', 'page_builder' ),
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
