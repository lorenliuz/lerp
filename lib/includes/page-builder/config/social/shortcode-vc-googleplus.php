<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Google+ Button', 'page_builder' ),
	'base' => 'vc_googleplus',
	'icon' => 'icon-wpb-application-plus',
	'category' => __( 'Social', 'page_builder' ),
	'description' => __( 'Recommend on Google', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Button size', 'page_builder' ),
			'param_name' => 'type',
			'admin_label' => true,
			'value' => array(
				__( 'Standard', 'page_builder' ) => 'standard',
				__( 'Small', 'page_builder' ) => 'small',
				__( 'Medium', 'page_builder' ) => 'medium',
				__( 'Tall', 'page_builder' ) => 'tall',
			),
			'description' => __( 'Select button size.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Annotation', 'page_builder' ),
			'param_name' => 'annotation',
			'admin_label' => true,
			'value' => array(
				__( 'Bubble', 'page_builder' ) => 'bubble',
				__( 'Inline', 'page_builder' ) => 'inline',
				__( 'None', 'page_builder' ) => 'none',
			),
			'std' => 'bubble',
			'description' => __( 'Select type of annotation.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Width', 'page_builder' ),
			'param_name' => 'widget_width',
			'dependency' => array(
				'element' => 'annotation',
				'value' => array( 'inline' ),
			),
			'description' => __( 'Minimum width of 120px to display. If annotation is set to "inline", this parameter sets the width in pixels to use for button and its inline annotation. Default width is 450px.', 'page_builder' ),
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
