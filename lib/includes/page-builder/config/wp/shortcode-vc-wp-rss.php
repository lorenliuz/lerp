<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => 'WP ' . __( 'RSS' ),
	'base' => 'vc_wp_rss',
	'icon' => 'icon-wpb-wp',
	'category' => __( 'WordPress Widgets', 'page_builder' ),
	'class' => 'wpb_vc_wp_widget',
	'weight' => - 50,
	'description' => __( 'Entries from any RSS or Atom feed', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'RSS feed URL', 'page_builder' ),
			'param_name' => 'url',
			'description' => __( 'Enter the RSS feed URL.', 'page_builder' ),
			'admin_label' => true,
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Items', 'page_builder' ),
			'param_name' => 'items',
			'value' => array(
				__( '10 - Default', 'page_builder' ) => 10,
				1,
				2,
				3,
				4,
				5,
				6,
				7,
				8,
				9,
				10,
				11,
				12,
				13,
				14,
				15,
				16,
				17,
				18,
				19,
				20,
			),
			'description' => __( 'Select how many items to display.', 'page_builder' ),
			'admin_label' => true,
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Options', 'page_builder' ),
			'param_name' => 'options',
			'value' => array(
				__( 'Item content', 'page_builder' ) => 'show_summary',
				__( 'Display item author if available?', 'page_builder' ) => 'show_author',
				__( 'Display item date?', 'page_builder' ) => 'show_date',
			),
			'description' => __( 'Select display options for RSS feeds.', 'page_builder' ),
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
