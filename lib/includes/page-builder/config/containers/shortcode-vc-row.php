<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Row', 'page_builder' ),
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'page_builder' ),
	'class' => 'vc_main-sortable-element',
	'description' => __( 'Place content elements inside the row', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Row stretch', 'page_builder' ),
			'param_name' => 'full_width',
			'value' => array(
				__( 'Default', 'page_builder' ) => '',
				__( 'Stretch row', 'page_builder' ) => 'stretch_row',
				__( 'Stretch row and content', 'page_builder' ) => 'stretch_row_content',
				__( 'Stretch row and content (no paddings)', 'page_builder' ) => 'stretch_row_content_no_spaces',
			),
			'description' => __( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'page_builder' ),
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
			'heading' => __( 'Full height row?', 'page_builder' ),
			'param_name' => 'full_height',
			'description' => __( 'If checked row will be set to full height.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Columns position', 'page_builder' ),
			'param_name' => 'columns_placement',
			'value' => array(
				__( 'Middle', 'page_builder' ) => 'middle',
				__( 'Top', 'page_builder' ) => 'top',
				__( 'Bottom', 'page_builder' ) => 'bottom',
				__( 'Stretch', 'page_builder' ) => 'stretch',
			),
			'description' => __( 'Select columns position within row.', 'page_builder' ),
			'dependency' => array(
				'element' => 'full_height',
				'not_empty' => true,
			),
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
			'type' => 'checkbox',
			'heading' => __( 'Use video background?', 'page_builder' ),
			'param_name' => 'video_bg',
			'description' => __( 'If checked, video will be used as row background.', 'page_builder' ),
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
			'description' => __( 'Add parallax type background for row.', 'page_builder' ),
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
			'description' => __( 'Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'page_builder' ),
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
			'heading' => __( 'Row ID', 'page_builder' ),
			'param_name' => 'el_id',
			'description' => sprintf( __( 'Enter row ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'page_builder' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
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
