<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Posts Slider', 'page_builder' ),
	'base' => 'vc_posts_slider',
	'icon' => 'icon-wpb-slideshow',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Slider with WP Posts', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Slider type', 'page_builder' ),
			'param_name' => 'type',
			'admin_label' => true,
			'value' => array(
				__( 'Flex slider fade', 'page_builder' ) => 'flexslider_fade',
				__( 'Flex slider slide', 'page_builder' ) => 'flexslider_slide',
				__( 'Nivo slider', 'page_builder' ) => 'nivo',
			),
			'description' => __( 'Select slider type.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Slider count', 'page_builder' ),
			'param_name' => 'count',
			'value' => 3,
			'description' => __( 'Enter number of slides to display (Note: Enter "All" to display all slides).', 'page_builder' ),
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
		),
		array(
			'type' => 'posttypes',
			'heading' => __( 'Post types', 'page_builder' ),
			'param_name' => 'posttypes',
			'description' => __( 'Select source for slider.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Description', 'page_builder' ),
			'param_name' => 'slides_content',
			'value' => array(
				__( 'No description', 'page_builder' ) => '',
				__( 'Teaser (Excerpt)', 'page_builder' ) => 'teaser',
			),
			'description' => __( 'Select source to use for description (Note: some sliders do not support it).', 'page_builder' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'flexslider_fade',
					'flexslider_slide',
				),
			),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Output post title?', 'page_builder' ),
			'param_name' => 'slides_title',
			'description' => __( 'If selected, title will be printed before the teaser text.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => true ),
			'dependency' => array(
				'element' => 'slides_content',
				'value' => array( 'teaser' ),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Link', 'page_builder' ),
			'param_name' => 'link',
			'value' => array(
				__( 'Link to post', 'page_builder' ) => 'link_post',
				__( 'Link to bigger image', 'page_builder' ) => 'link_image',
				__( 'Open custom links', 'page_builder' ) => 'custom_link',
				__( 'No link', 'page_builder' ) => 'link_no',
			),
			'description' => __( 'Link type.', 'page_builder' ),
		),
		array(
			'type' => 'exploded_textarea_safe',
			'heading' => __( 'Custom links', 'page_builder' ),
			'param_name' => 'custom_links',
			'value' => site_url() . '/',
			'dependency' => array(
				'element' => 'link',
				'value' => 'custom_link',
			),
			'description' => __( 'Enter links for each slide here. Divide links with linebreaks (Enter).', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Thumbnail size', 'page_builder' ),
			'param_name' => 'thumb_size',
			'value' => 'medium',
			'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Post/Page IDs', 'page_builder' ),
			'param_name' => 'posts_in',
			'description' => __( 'Enter page/posts IDs to display only those records (Note: separate values by commas (,)). Use this field in conjunction with "Post types" field.', 'page_builder' ),
		),
		array(
			'type' => 'exploded_textarea_safe',
			'heading' => __( 'Categories', 'page_builder' ),
			'param_name' => 'categories',
			'description' => __( 'Enter categories by names to narrow output (Note: only listed categories will be displayed, divide categories with linebreak (Enter)).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'page_builder' ),
			'param_name' => 'orderby',
			'value' => array(
				'',
				__( 'Date', 'page_builder' ) => 'date',
				__( 'ID', 'page_builder' ) => 'ID',
				__( 'Author', 'page_builder' ) => 'author',
				__( 'Title', 'page_builder' ) => 'title',
				__( 'Modified', 'page_builder' ) => 'modified',
				__( 'Random', 'page_builder' ) => 'rand',
				__( 'Comment count', 'page_builder' ) => 'comment_count',
				__( 'Menu order', 'page_builder' ) => 'menu_order',
			),
			'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'page_builder' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Sort order', 'page_builder' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Descending', 'page_builder' ) => 'DESC',
				__( 'Ascending', 'page_builder' ) => 'ASC',
			),
			'description' => sprintf( __( 'Select ascending or descending order. More at %s.', 'page_builder' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
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
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'page_builder' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'page_builder' ),
		),
	),
);
