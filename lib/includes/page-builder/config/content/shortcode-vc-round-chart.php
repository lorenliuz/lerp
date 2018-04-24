<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Round Chart', 'page_builder' ),
	'base' => 'vc_round_chart',
	'class' => '',
	'icon' => 'icon-wpb-vc-round-chart',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Pie and Doughnut charts', 'page_builder' ),
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
				__( 'Pie', 'page_builder' ) => 'pie',
				__( 'Doughnut', 'page_builder' ) => 'doughnut',
			),
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
			'type' => 'dropdown',
			'heading' => __( 'Gap', 'page_builder' ),
			'param_name' => 'stroke_width',
			'value' => array(
				0 => 0,
				1 => 1,
				2 => 2,
				5 => 5,
			),
			'description' => __( 'Select gap size.', 'page_builder' ),
			'std' => 2,
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Outline color', 'page_builder' ),
			'param_name' => 'stroke_color',
			'value' => getVcShared( 'colors-dashed' ) + array( __( 'Custom', 'page_builder' ) => 'custom' ),
			'description' => __( 'Select outline color.', 'page_builder' ),
			'param_holder_class' => 'vc_colored-dropdown',
			'std' => 'white',
			'dependency' => array(
				'element' => 'stroke_width',
				'value_not_equal_to' => '0',
			),
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Custom outline color', 'page_builder' ),
			'param_name' => 'custom_stroke_color',
			'description' => __( 'Select custom outline color.', 'page_builder' ),
			'dependency' => array(
				'element' => 'stroke_color',
				'value' => array( 'custom' ),
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
			'type' => 'param_group',
			'heading' => __( 'Values', 'page_builder' ),
			'param_name' => 'values',
			'value' => urlencode( json_encode( array(
				array(
					'title' => __( 'One', 'page_builder' ),
					'value' => '60',
					'color' => 'blue',
				),
				array(
					'title' => __( 'Two', 'page_builder' ),
					'value' => '40',
					'color' => 'pink',
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Title', 'page_builder' ),
					'param_name' => 'title',
					'description' => __( 'Enter title for chart area.', 'page_builder' ),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Value', 'page_builder' ),
					'param_name' => 'value',
					'description' => __( 'Enter value for area.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Color', 'page_builder' ),
					'param_name' => 'color',
					'value' => getVcShared( 'colors-dashed' ),
					'description' => __( 'Select area color.', 'page_builder' ),
					'param_holder_class' => 'vc_colored-dropdown',
				),
				array(
					'type' => 'colorpicker',
					'heading' => __( 'Custom color', 'page_builder' ),
					'param_name' => 'custom_color',
					'description' => __( 'Select custom area color.', 'page_builder' ),
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
