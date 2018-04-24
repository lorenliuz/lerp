<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Line Chart', 'page_builder' ),
	'base' => 'vc_line_chart',
	'class' => '',
	'icon' => 'icon-wpb-vc-line-chart',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Line and Bar charts', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
			'admin_label' => true,
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Design', 'page_builder' ),
			'param_name' => 'type',
			'value' => array(
				__( 'Line', 'page_builder' ) => 'line',
				__( 'Bar', 'page_builder' ) => 'bar',
			),
			'std' => 'bar',
			'description' => __( 'Select type of chart.', 'page_builder' ),
			'admin_label' => true,
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'page_builder' ),
			'description' => __( 'Select chart color style.', 'page_builder' ),
			'param_name' => 'style',
			'value' => array(
				__( 'Flat', 'page_builder' ) => 'flat',
				__( 'Modern', 'page_builder' ) => 'modern',
				__( 'Custom', 'page_builder' ) => 'custom',
			),
			'dependency' => array(
				'callback' => 'vcChartCustomColorDependency',
			),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Show legend?', 'page_builder' ),
			'param_name' => 'legend',
			'description' => __( 'If checked, chart will have legend.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
			'std' => 'yes',
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Show hover values?', 'page_builder' ),
			'param_name' => 'tooltips',
			'description' => __( 'If checked, chart will show values on hover.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
			'std' => 'yes',
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'X-axis values', 'page_builder' ),
			'param_name' => 'x_values',
			'description' => __( 'Enter values for axis (Note: separate values with ";").', 'page_builder' ),
			'value' => 'JAN; FEB; MAR; APR; MAY; JUN; JUL; AUG',
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Values', 'page_builder' ),
			'param_name' => 'values',
			'value' => urlencode( json_encode( array(
				array(
					'title' => __( 'One', 'page_builder' ),
					'y_values' => '10; 15; 20; 25; 27; 25; 23; 25',
					'color' => 'blue',
				),
				array(
					'title' => __( 'Two', 'page_builder' ),
					'y_values' => '25; 18; 16; 17; 20; 25; 30; 35',
					'color' => 'pink',
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Title', 'page_builder' ),
					'param_name' => 'title',
					'description' => __( 'Enter title for chart dataset.', 'page_builder' ),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Y-axis values', 'page_builder' ),
					'param_name' => 'y_values',
					'description' => __( 'Enter values for axis (Note: separate values with ";").', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Color', 'page_builder' ),
					'param_name' => 'color',
					'value' => getVcShared( 'colors-dashed' ),
					'description' => __( 'Select chart color.', 'page_builder' ),
					'param_holder_class' => 'vc_colored-dropdown',
				),
				array(
					'type' => 'colorpicker',
					'heading' => __( 'Custom color', 'page_builder' ),
					'param_name' => 'custom_color',
					'description' => __( 'Select custom chart color.', 'page_builder' ),
				),
			),
			'callbacks' => array(
				'after_add' => 'vcChartParamAfterAddCallback',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Animation', 'page_builder' ),
			'description' => __( 'Select animation style.', 'page_builder' ),
			'param_name' => 'animation',
			'value' => getVcShared( 'animation styles' ),
			'std' => 'easeinOutCubic',
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
