<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Image Gallery', 'page_builder' ),
	'base' => 'vc_gallery',
	'icon' => 'icon-wpb-images-stack',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Responsive image gallery', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Gallery type', 'page_builder' ),
			'param_name' => 'type',
			'value' => array(
				__( 'Flex slider fade', 'page_builder' ) => 'flexslider_fade',
				__( 'Flex slider slide', 'page_builder' ) => 'flexslider_slide',
				__( 'Nivo slider', 'page_builder' ) => 'nivo',
				__( 'Image grid', 'page_builder' ) => 'image_grid',
			),
			'description' => __( 'Select gallery type.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Auto rotate', 'page_builder' ),
			'param_name' => 'interval',
			'value' => array(
				3,
				5,
				10,
				15,
				__( 'Disable', 'page_builder' ) => 0,
			),
			'description' => __( 'Auto rotate slides each X seconds.', 'page_builder' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'flexslider_fade',
					'flexslider_slide',
					'nivo',
				),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Image source', 'page_builder' ),
			'param_name' => 'source',
			'value' => array(
				__( 'Media library', 'page_builder' ) => 'media_library',
				__( 'External links', 'page_builder' ) => 'external_link',
			),
			'std' => 'media_library',
			'description' => __( 'Select image source.', 'page_builder' ),
		),
		array(
			'type' => 'attach_images',
			'heading' => __( 'Images', 'page_builder' ),
			'param_name' => 'images',
			'value' => '',
			'description' => __( 'Select images from media library.', 'page_builder' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'media_library',
			),
		),
		array(
			'type' => 'exploded_textarea_safe',
			'heading' => __( 'External links', 'page_builder' ),
			'param_name' => 'custom_srcs',
			'description' => __( 'Enter external link for each gallery image (Note: divide links with linebreaks (Enter)).', 'page_builder' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'external_link',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Image size', 'page_builder' ),
			'param_name' => 'img_size',
			'value' => 'thumbnail',
			'description' => __( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'page_builder' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'media_library',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Image size', 'page_builder' ),
			'param_name' => 'external_img_size',
			'value' => '',
			'description' => __( 'Enter image size in pixels. Example: 200x100 (Width x Height).', 'page_builder' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'external_link',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'On click action', 'page_builder' ),
			'param_name' => 'onclick',
			'value' => array(
				__( 'None', 'page_builder' ) => '',
				__( 'Link to large image', 'page_builder' ) => 'img_link_large',
				__( 'Open prettyPhoto', 'page_builder' ) => 'link_image',
				__( 'Open custom link', 'page_builder' ) => 'custom_link',
			),
			'description' => __( 'Select action for click action.', 'page_builder' ),
			'std' => 'link_image',
		),
		array(
			'type' => 'exploded_textarea_safe',
			'heading' => __( 'Custom links', 'page_builder' ),
			'param_name' => 'custom_links',
			'description' => __( 'Enter links for each slide (Note: divide links with linebreaks (Enter)).', 'page_builder' ),
			'dependency' => array(
				'element' => 'onclick',
				'value' => array( 'custom_link' ),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Custom link target', 'page_builder' ),
			'param_name' => 'custom_links_target',
			'description' => __( 'Select where to open  custom links.', 'page_builder' ),
			'dependency' => array(
				'element' => 'onclick',
				'value' => array(
					'custom_link',
					'img_link_large',
				),
			),
			'value' => vc_target_param_list(),
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
