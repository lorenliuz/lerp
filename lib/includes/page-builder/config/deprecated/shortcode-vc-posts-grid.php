<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$vc_layout_sub_controls = array(
	array(
		'link_post',
		__( 'Link to post', 'page_builder' ),
	),
	array(
		'no_link',
		__( 'No link', 'page_builder' ),
	),
	array(
		'link_image',
		__( 'Link to bigger image', 'page_builder' ),
	),
);
return array(
	'name' => __( 'Old Posts Grid', 'page_builder' ),
	'base' => 'vc_posts_grid',
	'content_element' => false,
	'deprecated' => '4.4',
	'icon' => 'icon-wpb-application-icon-large',
	'description' => __( 'Posts in grid view', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'loop',
			'heading' => __( 'Grids content', 'page_builder' ),
			'param_name' => 'loop',
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
			'type' => 'dropdown',
			'heading' => __( 'Columns count', 'page_builder' ),
			'param_name' => 'grid_columns_count',
			'value' => array(
				6,
				4,
				3,
				2,
				1,
			),
			'std' => 3,
			'admin_label' => true,
			'description' => __( 'Select columns count.', 'page_builder' ),
		),
		array(
			'type' => 'sorted_list',
			'heading' => __( 'Teaser layout', 'page_builder' ),
			'param_name' => 'grid_layout',
			'description' => __( 'Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overrriden on post to post basis.', 'page_builder' ),
			'value' => 'title,image,text',
			'options' => array(
				array(
					'image',
					__( 'Thumbnail', 'page_builder' ),
					$vc_layout_sub_controls,
				),
				array(
					'title',
					__( 'Title', 'page_builder' ),
					$vc_layout_sub_controls,
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
			'param_name' => 'grid_link_target',
			'value' => vc_target_param_list(),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Show filter', 'page_builder' ),
			'param_name' => 'filter',
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
			'description' => __( 'Select to add animated category filter to your posts grid.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Layout mode', 'page_builder' ),
			'param_name' => 'grid_layout_mode',
			'value' => array(
				__( 'Fit rows', 'page_builder' ) => 'fitRows',
				__( 'Masonry', 'page_builder' ) => 'masonry',
			),
			'description' => __( 'Teaser layout template.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Thumbnail size', 'page_builder' ),
			'param_name' => 'grid_thumb_size',
			'value' => 'thumbnail',
			'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'page_builder' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
	),
);
