<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Pie Chart', 'page_builder' ),
	'base' => 'vc_pie',
	'class' => '',
	'icon' => 'icon-wpb-vc_pie',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Animated pie chart', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Value', 'page_builder' ),
			'param_name' => 'value',
			'description' => __( 'Enter value for graph (Note: choose range from 0 to 100).', 'page_builder' ),
			'value' => '50',
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Label value', 'page_builder' ),
			'param_name' => 'label_value',
			'description' => __( 'Enter label for pie chart (Note: leaving empty will set value from "Value" field).', 'page_builder' ),
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Units', 'page_builder' ),
			'param_name' => 'units',
			'description' => __( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Color', 'page_builder' ),
			'param_name' => 'color',
			'value' => getVcShared( 'colors-dashed' ) + array( __( 'Custom', 'page_builder' ) => 'custom' ),
			'description' => __( 'Select pie chart color.', 'page_builder' ),
			'admin_label' => true,
			'param_holder_class' => 'vc_colored-dropdown',
			'std' => 'grey',
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Custom color', 'page_builder' ),
			'param_name' => 'custom_color',
			'description' => __( 'Select custom color.', 'page_builder' ),
			'dependency' => array(
				'element' => 'color',
				'value' => array( 'custom' ),
			),
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
