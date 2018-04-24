<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Progress Bar', 'page_builder' ),
	'base' => 'vc_progress_bar',
	'icon' => 'icon-wpb-graph',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Animated progress bar', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'param_group',
			'heading' => __( 'Values', 'page_builder' ),
			'param_name' => 'values',
			'description' => __( 'Enter values for graph - value, title and color.', 'page_builder' ),
			'value' => urlencode( json_encode( array(
				array(
					'label' => __( 'Development', 'page_builder' ),
					'value' => '90',
				),
				array(
					'label' => __( 'Design', 'page_builder' ),
					'value' => '80',
				),
				array(
					'label' => __( 'Marketing', 'page_builder' ),
					'value' => '70',
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Label', 'page_builder' ),
					'param_name' => 'label',
					'description' => __( 'Enter text used as title of bar.', 'page_builder' ),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Value', 'page_builder' ),
					'param_name' => 'value',
					'description' => __( 'Enter value of bar.', 'page_builder' ),
					'admin_label' => true,
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Color', 'page_builder' ),
					'param_name' => 'color',
					'value' => array(
							__( 'Default', 'page_builder' ) => '',
						) + array(
							__( 'Classic Grey', 'page_builder' ) => 'bar_grey',
							__( 'Classic Blue', 'page_builder' ) => 'bar_blue',
							__( 'Classic Turquoise', 'page_builder' ) => 'bar_turquoise',
							__( 'Classic Green', 'page_builder' ) => 'bar_green',
							__( 'Classic Orange', 'page_builder' ) => 'bar_orange',
							__( 'Classic Red', 'page_builder' ) => 'bar_red',
							__( 'Classic Black', 'page_builder' ) => 'bar_black',
						) + getVcShared( 'colors-dashed' ) + array(
							__( 'Custom Color', 'page_builder' ) => 'custom',
						),
					'description' => __( 'Select single bar background color.', 'page_builder' ),
					'admin_label' => true,
					'param_holder_class' => 'vc_colored-dropdown',
				),
				array(
					'type' => 'colorpicker',
					'heading' => __( 'Custom color', 'page_builder' ),
					'param_name' => 'customcolor',
					'description' => __( 'Select custom single bar background color.', 'page_builder' ),
					'dependency' => array(
						'element' => 'color',
						'value' => array( 'custom' ),
					),
				),
				array(
					'type' => 'colorpicker',
					'heading' => __( 'Custom text color', 'page_builder' ),
					'param_name' => 'customtxtcolor',
					'description' => __( 'Select custom single bar text color.', 'page_builder' ),
					'dependency' => array(
						'element' => 'color',
						'value' => array( 'custom' ),
					),
				),
			),
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
			'param_name' => 'bgcolor',
			'value' => array(
					__( 'Classic Grey', 'page_builder' ) => 'bar_grey',
					__( 'Classic Blue', 'page_builder' ) => 'bar_blue',
					__( 'Classic Turquoise', 'page_builder' ) => 'bar_turquoise',
					__( 'Classic Green', 'page_builder' ) => 'bar_green',
					__( 'Classic Orange', 'page_builder' ) => 'bar_orange',
					__( 'Classic Red', 'page_builder' ) => 'bar_red',
					__( 'Classic Black', 'page_builder' ) => 'bar_black',
				) + getVcShared( 'colors-dashed' ) + array(
					__( 'Custom Color', 'page_builder' ) => 'custom',
				),
			'description' => __( 'Select bar background color.', 'page_builder' ),
			'admin_label' => true,
			'param_holder_class' => 'vc_colored-dropdown',
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Bar custom background color', 'page_builder' ),
			'param_name' => 'custombgcolor',
			'description' => __( 'Select custom background color for bars.', 'page_builder' ),
			'dependency' => array(
				'element' => 'bgcolor',
				'value' => array( 'custom' ),
			),
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Bar custom text color', 'page_builder' ),
			'param_name' => 'customtxtcolor',
			'description' => __( 'Select custom text color for bars.', 'page_builder' ),
			'dependency' => array(
				'element' => 'bgcolor',
				'value' => array( 'custom' ),
			),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Options', 'page_builder' ),
			'param_name' => 'options',
			'value' => array(
				__( 'Add stripes', 'page_builder' ) => 'striped',
				__( 'Add animation (Note: visible only with striped bar).', 'page_builder' ) => 'animated',
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
