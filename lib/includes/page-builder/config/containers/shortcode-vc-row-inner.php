<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Inner Row', 'page_builder' ),
	//Inner Row
	'content_element' => false,
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'weight' => 1000,
	'show_settings_on_create' => false,
	'description' => __( 'Place content elements inside the inner row', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'el_id',
			'heading' => __( 'Row ID', 'page_builder' ),
			'param_name' => 'el_id',
			'description' => sprintf( __( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'page_builder' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . __( 'link', 'page_builder' ) . '</a>' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Equal height', 'page_builder' ),
			'param_name' => 'equal_height',
			'description' => __( 'If checked columns will be set to equal height.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Content position', 'page_builder' ),
			'param_name' => 'content_placement',
			'value' => array(
				__( 'Default', 'page_builder' ) => '',
				__( 'Top', 'page_builder' ) => 'top',
				__( 'Middle', 'page_builder' ) => 'middle',
				__( 'Bottom', 'page_builder' ) => 'bottom',
			),
			'description' => __( 'Select content position within columns.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Columns gap', 'page_builder' ),
			'param_name' => 'gap',
			'value' => array(
				'0px' => '0',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'std' => '0',
			'description' => __( 'Select gap between columns in row.', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Disable row', 'page_builder' ),
			'param_name' => 'disable_element',
			// Inner param name.
			'description' => __( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
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
	'js_view' => 'VcRowView',
);
