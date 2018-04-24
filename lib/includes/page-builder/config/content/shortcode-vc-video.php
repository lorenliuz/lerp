<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Video Player', 'page_builder' ),
	'base' => 'vc_video',
	'icon' => 'icon-wpb-film-youtube',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Embed YouTube/Vimeo player', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Video link', 'page_builder' ),
			'param_name' => 'link',
			'value' => 'https://vimeo.com/51589652',
			'admin_label' => true,
			'description' => sprintf( __( 'Enter link to video (Note: read more about available formats at WordPress <a href="%s" target="_blank">codex page</a>).', 'page_builder' ), 'http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Video width', 'page_builder' ),
			'param_name' => 'el_width',
			'value' => array(
				'100%' => '100',
				'90%' => '90',
				'80%' => '80',
				'70%' => '70',
				'60%' => '60',
				'50%' => '50',
				'40%' => '40',
				'30%' => '30',
				'20%' => '20',
				'10%' => '10',
			),
			'description' => __( 'Select video width (percentage).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Video aspect ration', 'page_builder' ),
			'param_name' => 'el_aspect',
			'value' => array(
				'16:9' => '169',
				'4:3' => '43',
				'2.35:1' => '235',
			),
			'description' => __( 'Select video aspect ratio.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Alignment', 'page_builder' ),
			'param_name' => 'align',
			'description' => __( 'Select video alignment.', 'page_builder' ),
			'value' => array(
				__( 'Left', 'page_builder' ) => 'left',
				__( 'Right', 'page_builder' ) => 'right',
				__( 'Center', 'page_builder' ) => 'center',
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
