<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Image Carousel', 'page_builder' ),
	'base' => 'vc_images_carousel',
	'icon' => 'icon-wpb-images-carousel',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Animated carousel with images', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'attach_images',
			'heading' => __( 'Images', 'page_builder' ),
			'param_name' => 'images',
			'value' => '',
			'description' => __( 'Select images from media library.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Carousel size', 'page_builder' ),
			'param_name' => 'img_size',
			'value' => 'thumbnail',
			'description' => __( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size. If used slides per view, this will be used to define carousel wrapper size.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'On click action', 'page_builder' ),
			'param_name' => 'onclick',
			'value' => array(
				__( 'Open prettyPhoto', 'page_builder' ) => 'link_image',
				__( 'None', 'page_builder' ) => 'link_no',
				__( 'Open custom links', 'page_builder' ) => 'custom_link',
			),
			'description' => __( 'Select action for click event.', 'page_builder' ),
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
			'description' => __( 'Select how to open custom links.', 'page_builder' ),
			'dependency' => array(
				'element' => 'onclick',
				'value' => array( 'custom_link' ),
			),
			'value' => vc_target_param_list(),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Slider orientation', 'page_builder' ),
			'param_name' => 'mode',
			'value' => array(
				__( 'Horizontal', 'page_builder' ) => 'horizontal',
				__( 'Vertical', 'page_builder' ) => 'vertical',
			),
			'description' => __( 'Select slider position (Note: this affects swiping orientation).', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Slider speed', 'page_builder' ),
			'param_name' => 'speed',
			'value' => '5000',
			'description' => __( 'Duration of animation between slides (in ms).', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Slides per view', 'page_builder' ),
			'param_name' => 'slides_per_view',
			'value' => '1',
			'description' => __( 'Enter number of slides to display at the same time.', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Slider autoplay', 'page_builder' ),
			'param_name' => 'autoplay',
			'description' => __( 'Enable autoplay mode.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Hide pagination control', 'page_builder' ),
			'param_name' => 'hide_pagination_control',
			'description' => __( 'If checked, pagination controls will be hidden.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Hide prev/next buttons', 'page_builder' ),
			'param_name' => 'hide_prev_next_buttons',
			'description' => __( 'If checked, prev/next buttons will be hidden.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Partial view', 'page_builder' ),
			'param_name' => 'partial_view',
			'description' => __( 'If checked, part of the next slide will be visible.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Slider loop', 'page_builder' ),
			'param_name' => 'wrap',
			'description' => __( 'Enable slider loop mode.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
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
