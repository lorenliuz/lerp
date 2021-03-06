<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * @var $tag - shortcode tag;
 */
return array(
	'name' => __( 'Inner Column', 'page_builder' ),
	'base' => 'vc_column_inner',
	'icon' => 'icon-wpb-row',
	'class' => '',
	'wrapper_class' => '',
	'controls' => 'full',
	'allowed_container_element' => false,
	'content_element' => false,
	'is_container' => true,
	'description' => __( 'Place content elements inside the inner column', 'page_builder' ),
	'params' => array(
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
			'value' => '',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'page_builder' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Width', 'page_builder' ),
			'param_name' => 'width',
			'value' => array(
				__( '1 column - 1/12', 'page_builder' ) => '1/12',
				__( '2 columns - 1/6', 'page_builder' ) => '1/6',
				__( '3 columns - 1/4', 'page_builder' ) => '1/4',
				__( '4 columns - 1/3', 'page_builder' ) => '1/3',
				__( '5 columns - 5/12', 'page_builder' ) => '5/12',
				__( '6 columns - 1/2', 'page_builder' ) => '1/2',
				__( '7 columns - 7/12', 'page_builder' ) => '7/12',
				__( '8 columns - 2/3', 'page_builder' ) => '2/3',
				__( '9 columns - 3/4', 'page_builder' ) => '3/4',
				__( '10 columns - 5/6', 'page_builder' ) => '5/6',
				__( '11 columns - 11/12', 'page_builder' ) => '11/12',
				__( '12 columns - 1/1', 'page_builder' ) => '1/1',
			),
			'group' => __( 'Responsive Options', 'page_builder' ),
			'description' => __( 'Select column width.', 'page_builder' ),
			'std' => '1/1',
		),
		array(
			'type' => 'column_offset',
			'heading' => __( 'Responsiveness', 'page_builder' ),
			'param_name' => 'offset',
			'group' => __( 'Responsive Options', 'page_builder' ),
			'description' => __( 'Adjust column for different screen sizes. Control width, offset and visibility settings.', 'page_builder' ),
		),
	),
	'js_view' => 'VcColumnView',
);
