<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Section', 'page_builder' ),
	'is_container' => true,
	'icon' => 'vc_icon-vc-section',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'page_builder' ),
	'as_parent' => array(
		'only' => 'vc_row',
	),
	'as_child' => array(
		'only' => '', // Only root
	),
	'class' => 'vc_main-sortable-element',
	'description' => __( 'Group multiple rows in section', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Section stretch', 'page_builder' ),
			'param_name' => 'full_width',
			'value' => array(
				__( 'Default', 'page_builder' ) => '',
				__( 'Stretch section', 'page_builder' ) => 'stretch_row',
				__( 'Stretch section and content', 'page_builder' ) => 'stretch_row_content',
			),
			'description' => __( 'Select stretching options for section and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Full height section?', 'page_builder' ),
			'param_name' => 'full_height',
			'description' => __( 'If checked section will be set to full height.', 'page_builder' ),
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
			'description' => __( 'Select content position within section.', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Use video background?', 'page_builder' ),
			'param_name' => 'video_bg',
			'description' => __( 'If checked, video will be used as section background.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'YouTube link', 'page_builder' ),
			'param_name' => 'video_bg_url',
			'value' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
			// default video url
			'description' => __( 'Add YouTube link.', 'page_builder' ),
			'dependency' => array(
				'element' => 'video_bg',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Parallax', 'page_builder' ),
			'param_name' => 'video_bg_parallax',
			'value' => array(
				__( 'None', 'page_builder' ) => '',
				__( 'Simple', 'page_builder' ) => 'content-moving',
				__( 'With fade', 'page_builder' ) => 'content-moving-fade',
			),
			'description' => __( 'Add parallax type background for section.', 'page_builder' ),
			'dependency' => array(
				'element' => 'video_bg',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Parallax', 'page_builder' ),
			'param_name' => 'parallax',
			'value' => array(
				__( 'None', 'page_builder' ) => '',
				__( 'Simple', 'page_builder' ) => 'content-moving',
				__( 'With fade', 'page_builder' ) => 'content-moving-fade',
			),
			'description' => __( 'Add parallax type background for section (Note: If no image is specified, parallax will use background image from Design Options).', 'page_builder' ),
			'dependency' => array(
				'element' => 'video_bg',
				'is_empty' => true,
			),
		),
		array(
			'type' => 'attach_image',
			'heading' => __( 'Image', 'page_builder' ),
			'param_name' => 'parallax_image',
			'value' => '',
			'description' => __( 'Select image from media library.', 'page_builder' ),
			'dependency' => array(
				'element' => 'parallax',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Parallax speed', 'page_builder' ),
			'param_name' => 'parallax_speed_video',
			'value' => '1.5',
			'description' => __( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'page_builder' ),
			'dependency' => array(
				'element' => 'video_bg_parallax',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Parallax speed', 'page_builder' ),
			'param_name' => 'parallax_speed_bg',
			'value' => '1.5',
			'description' => __( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'page_builder' ),
			'dependency' => array(
				'element' => 'parallax',
				'not_empty' => true,
			),
		),
		vc_map_add_css_animation( false ),
		array(
			'type' => 'el_id',
			'heading' => __( 'Section ID', 'page_builder' ),
			'param_name' => 'el_id',
			'description' => sprintf( __( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'page_builder' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Disable section', 'page_builder' ),
			'param_name' => 'disable_element',
			// Inner param name.
			'description' => __( 'If checked the section won\'t be visible on the public side of your website. You can switch it back any time.', 'page_builder' ),
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
	'js_view' => 'VcSectionView',
);
