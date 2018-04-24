<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Old Post Carousel', 'page_builder' ),
	'base' => 'vc_carousel',
	'content_element' => false,
	'deprecated' => '4.4',
	'class' => '',
	'icon' => 'icon-wpb-vc_carousel',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Animated carousel with posts', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'loop',
			'heading' => __( 'Carousel content', 'page_builder' ),
			'param_name' => 'posts_query',
			'value' => 'size:10|order_by:date',
			'settings' => array(
				'size' => array(
					'hidden' => false,
					'value' => 10,
				),
				'order_by' => array( 'value' => 'date' ),
			),
			'description' => __( 'Create WordPress loop, to populate content from your site.', 'page_builder' ),
		),
		array(
			'type' => 'sorted_list',
			'heading' => __( 'Teaser layout', 'page_builder' ),
			'param_name' => 'layout',
			'description' => __( 'Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overrriden on post to post basis.', 'page_builder' ),
			'value' => 'title,image,text',
			'options' => array(
				array(
					'image',
					__( 'Thumbnail', 'page_builder' ),
					vc_layout_sub_controls(),
				),
				array(
					'title',
					__( 'Title', 'page_builder' ),
					vc_layout_sub_controls(),
				),
				array(
					'text',
					__( 'Text', 'page_builder' ),
					array(
						array(
							'excerpt',
							__( 'Teaser/Excerpt', 'page_builder' ),
						),
						array(
							'text',
							__( 'Full content', 'page_builder' ),
						),
					),
				),
				array(
					'link',
					__( 'Read more link', 'page_builder' ),
				),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Link target', 'page_builder' ),
			'param_name' => 'link_target',
			'value' => vc_target_param_list(),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Thumbnail size', 'page_builder' ),
			'param_name' => 'thumb_size',
			'value' => 'thumbnail',
			'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Slider speed', 'page_builder' ),
			'param_name' => 'speed',
			'value' => '5000',
			'description' => __( 'Duration of animation between slides (in ms).', 'page_builder' ),
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
			'description' => __( 'If "YES" pagination control will be removed', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Hide prev/next buttons', 'page_builder' ),
			'param_name' => 'hide_prev_next_buttons',
			'description' => __( 'If "YES" prev/next control will be removed', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Partial view', 'page_builder' ),
			'param_name' => 'partial_view',
			'description' => __( 'If "YES" part of the next slide will be visible on the right side', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Slider loop', 'page_builder' ),
			'param_name' => 'wrap',
			'description' => __( 'Enable slider loop mode.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'page_builder' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
	),
);
