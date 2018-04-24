<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => 'WP ' . __( 'Recent Posts' ),
	'base' => 'vc_wp_posts',
	'icon' => 'icon-wpb-wp',
	'category' => __( 'WordPress Widgets', 'page_builder' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'The most recent posts on your site', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'page_builder' ),
			'value' => __( 'Recent Posts' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of posts', 'page_builder' ),
			'description' => __( 'Enter number of posts to display.', 'page_builder' ),
			'param_name' => 'number',
			'value' => 5,
			'admin_label' => true,
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Display post date?', 'page_builder' ),
			'param_name' => 'show_date',
			'value' => array( __( 'Yes', 'page_builder' ) => true ),
			'description' => __( 'If checked, date will be displayed.', 'page_builder' ),
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
