<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

function vc_custom_heading_element_params() {
	return array(
		'name' => __( 'Custom Heading', 'page_builder' ),
		'base' => 'vc_custom_heading',
		'icon' => 'icon-wpb-ui-custom_heading',
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'page_builder' ),
		'description' => __( 'Text with Google fonts', 'page_builder' ),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __( 'Text source', 'page_builder' ),
				'param_name' => 'source',
				'value' => array(
					__( 'Custom text', 'page_builder' ) => '',
					__( 'Post or Page Title', 'page_builder' ) => 'post_title',
				),
				'std' => '',
				'description' => __( 'Select text source.', 'page_builder' ),
			),
			array(
				'type' => 'textarea',
				'heading' => __( 'Text', 'page_builder' ),
				'param_name' => 'text',
				'admin_label' => true,
				'value' => __( 'This is custom heading element', 'page_builder' ),
				'description' => __( 'Note: If you are using non-latin characters be sure to activate them under Settings/WPBakery Page Builder/General Settings.', 'page_builder' ),
				'dependency' => array(
					'element' => 'source',
					'is_empty' => true,
				),
			),
			array(
				'type' => 'vc_link',
				'heading' => __( 'URL (Link)', 'page_builder' ),
				'param_name' => 'link',
				'description' => __( 'Add link to custom heading.', 'page_builder' ),
				// compatible with btn2 and converted from href{btn1}
			),
			array(
				'type' => 'font_container',
				'param_name' => 'font_container',
				'value' => 'tag:h2|text_align:left',
				'settings' => array(
					'fields' => array(
						'tag' => 'h2',
						// default value h2
						'text_align',
						'font_size',
						'line_height',
						'color',
						'tag_description' => __( 'Select element tag.', 'page_builder' ),
						'text_align_description' => __( 'Select text alignment.', 'page_builder' ),
						'font_size_description' => __( 'Enter font size.', 'page_builder' ),
						'line_height_description' => __( 'Enter line height.', 'page_builder' ),
						'color_description' => __( 'Select heading color.', 'page_builder' ),
					),
				),
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Use theme default font family?', 'page_builder' ),
				'param_name' => 'use_theme_fonts',
				'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
				'description' => __( 'Use font family from the theme.', 'page_builder' ),
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts',
				'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings' => array(
					'fields' => array(
						'font_family_description' => __( 'Select font family.', 'page_builder' ),
						'font_style_description' => __( 'Select font styling.', 'page_builder' ),
					),
				),
				'dependency' => array(
					'element' => 'use_theme_fonts',
					'value_not_equal_to' => 'yes',
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
}
