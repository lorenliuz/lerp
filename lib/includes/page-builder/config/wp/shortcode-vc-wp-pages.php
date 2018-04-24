<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => 'WP ' . __( 'Pages' ),
	'base' => 'vc_wp_pages',
	'icon' => 'icon-wpb-wp',
	'category' => __( 'WordPress Widgets', 'page_builder' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Your sites WordPress Pages', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'page_builder' ),
			'value' => __( 'Pages' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'page_builder' ),
			'param_name' => 'sortby',
			'value' => array(
				__( 'Page title', 'page_builder' ) => 'post_title',
				__( 'Page order', 'page_builder' ) => 'menu_order',
				__( 'Page ID', 'page_builder' ) => 'ID',
			),
			'description' => __( 'Select how to sort pages.', 'page_builder' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Exclude', 'page_builder' ),
			'param_name' => 'exclude',
			'description' => __( 'Enter page IDs to be excluded (Note: separate values by commas (,)).', 'page_builder' ),
			'admin_label' => true,
		),
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
	),
);
