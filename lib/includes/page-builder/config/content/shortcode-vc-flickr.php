<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'base' => 'vc_flickr',
	'name' => __( 'Flickr Widget', 'page_builder' ),
	'icon' => 'icon-wpb-flickr',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Image feed from Flickr account', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Flickr ID', 'page_builder' ),
			'param_name' => 'flickr_id',
			'value' => '95572727@N00',
			'admin_label' => true,
			'description' => sprintf( __( 'To find your flickID visit %s.', 'page_builder' ), '<a href="http://idgettr.com/" target="_blank">idGettr</a>' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Number of photos', 'page_builder' ),
			'param_name' => 'count',
			'value' => array(
				9,
				8,
				7,
				6,
				5,
				4,
				3,
				2,
				1,
			),
			'description' => __( 'Select number of photos to display.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Type', 'page_builder' ),
			'param_name' => 'type',
			'value' => array(
				__( 'User', 'page_builder' ) => 'user',
				__( 'Group', 'page_builder' ) => 'group',
			),
			'description' => __( 'Select photo stream type.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Display order', 'page_builder' ),
			'param_name' => 'display',
			'value' => array(
				__( 'Latest first', 'page_builder' ) => 'latest',
				__( 'Random', 'page_builder' ) => 'random',
			),
			'description' => __( 'Select photo display order.', 'page_builder' ),
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
