<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Gitem_Animated_Block' );

global $vc_gitem_add_link_param;
$vc_gitem_add_link_param = apply_filters( 'vc_gitem_add_link_param', array(
	'type' => 'dropdown',
	'heading' => __( 'Add link', 'page_builder' ),
	'param_name' => 'link',
	'value' => array(
		__( 'None', 'page_builder' ) => 'none',
		__( 'Post link', 'page_builder' ) => 'post_link',
		__( 'Post author', 'page_builder' ) => 'post_author',
		__( 'Large image', 'page_builder' ) => 'image',
		__( 'Large image (prettyPhoto)', 'page_builder' ) => 'image_lightbox',
		__( 'Custom', 'page_builder' ) => 'custom',
	),
	'description' => __( 'Select link option.', 'page_builder' ),
) );
$zone_params = array(
	$vc_gitem_add_link_param,
	array(
		'type' => 'vc_link',
		'heading' => __( 'URL (Link)', 'page_builder' ),
		'param_name' => 'url',
		'dependency' => array(
			'element' => 'link',
			'value' => array( 'custom' ),
		),
		'description' => __( 'Add custom link.', 'page_builder' ),
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Use featured image on background?', 'page_builder' ),
		'param_name' => 'featured_image',
		'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		'description' => __( 'Note: Featured image overwrites background image and color from "Design Options".', 'page_builder' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Image size', 'page_builder' ),
		'param_name' => 'img_size',
		'value' => 'large',
		'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'page_builder' ),
		'dependency' => array(
			'element' => 'featured_image',
			'not_empty' => true,
		),
	),
	array(
		'type' => 'css_editor',
		'heading' => __( 'CSS box', 'page_builder' ),
		'param_name' => 'css',
		'group' => __( 'Design Options', 'page_builder' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Extra class name', 'page_builder' ),
		'param_name' => 'el_class',
		'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
	),
);
$post_data_params = array(
	$vc_gitem_add_link_param,
	array(
		'type' => 'vc_link',
		'heading' => __( 'URL (Link)', 'page_builder' ),
		'param_name' => 'url',
		'dependency' => array(
			'element' => 'link',
			'value' => array( 'custom' ),
		),
		'description' => __( 'Add custom link.', 'page_builder' ),
	),
	array(
		'type' => 'css_editor',
		'heading' => __( 'CSS box', 'page_builder' ),
		'param_name' => 'css',
		'group' => __( 'Design Options', 'page_builder' ),
	),
);
$custom_fonts_params = array(
	array(
		'type' => 'font_container',
		'param_name' => 'font_container',
		'value' => '',
		'settings' => array(
			'fields' => array(
				'tag' => 'div', // default value h2
				'text_align',
				'tag_description' => __( 'Select element tag.', 'page_builder' ),
				'text_align_description' => __( 'Select text alignment.', 'page_builder' ),
				'font_size_description' => __( 'Enter font size.', 'page_builder' ),
				'line_height_description' => __( 'Enter line height.', 'page_builder' ),
				'color_description' => __( 'Select color for your element.', 'page_builder' ),
			),
		),
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Use custom fonts?', 'page_builder' ),
		'param_name' => 'use_custom_fonts',
		'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		'description' => __( 'Enable Google fonts.', 'page_builder' ),
	),
	array(
		'type' => 'font_container',
		'param_name' => 'block_container',
		'value' => '',
		'settings' => array(
			'fields' => array(
				'font_size',
				'line_height',
				'color',
				'tag_description' => __( 'Select element tag.', 'page_builder' ),
				'text_align_description' => __( 'Select text alignment.', 'page_builder' ),
				'font_size_description' => __( 'Enter font size.', 'page_builder' ),
				'line_height_description' => __( 'Enter line height.', 'page_builder' ),
				'color_description' => __( 'Select color for your element.', 'page_builder' ),
			),
		),
		'group' => __( 'Custom fonts', 'page_builder' ),
		'dependency' => array(
			'element' => 'use_custom_fonts',
			'value' => array( 'yes' ),
		),
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Yes theme default font family?', 'page_builder' ),
		'param_name' => 'use_theme_fonts',
		'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		'description' => __( 'Yes font family from the theme.', 'page_builder' ),
		'group' => __( 'Custom fonts', 'page_builder' ),
		'dependency' => array(
			'element' => 'use_custom_fonts',
			'value' => array( 'yes' ),
		),
	),
	array(
		'type' => 'google_fonts',
		'param_name' => 'google_fonts',
		'value' => '',
		// Not recommended, this will override 'settings'. 'font_family:'.rawurlencode('Exo:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic').'|font_style:'.rawurlencode('900 bold italic:900:italic'),
		'settings' => array(
			'fields' => array(
				// Default font style. Name:weight:style, example: "800 bold regular:800:normal"
				'font_family_description' => __( 'Select font family.', 'page_builder' ),
				'font_style_description' => __( 'Select font styling.', 'page_builder' ),
			),
		),
		'group' => __( 'Custom fonts', 'page_builder' ),
		'dependency' => array(
			'element' => 'use_theme_fonts',
			'value_not_equal_to' => 'yes',
		),
	),
);
$list = array(
	'vc_gitem' => array(
		'name' => __( 'Grid Item', 'page_builder' ),
		'base' => 'vc_gitem',
		'is_container' => true,
		'icon' => 'icon-wpb-gitem',
		'content_element' => false,
		'show_settings_on_create' => false,
		'category' => __( 'Content', 'page_builder' ),
		'description' => __( 'Main grid item', 'page_builder' ),
		'params' => array(
			array(
				'type' => 'css_editor',
				'heading' => __( 'CSS box', 'page_builder' ),
				'param_name' => 'css',
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'page_builder' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
			),
		),
		'js_view' => 'VcGitemView',
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_animated_block' => array(
		'base' => 'vc_gitem_animated_block',
		'name' => __( 'A/B block', 'page_builder' ),
		'content_element' => false,
		'is_container' => true,
		'show_settings_on_create' => false,
		'icon' => 'icon-wpb-gitem-block',
		'category' => __( 'Content', 'page_builder' ),
		'controls' => array(),
		'as_parent' => array( 'only' => array( 'vc_gitem_zone_a', 'vc_gitem_zone_b' ) ),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __( 'Animation', 'page_builder' ),
				'param_name' => 'animation',
				'value' => WPBakeryShortCode_VC_Gitem_Animated_Block::animations(),
			),
		),
		'js_view' => 'VcGitemAnimatedBlockView',
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_zone' => array(
		'name' => __( 'Zone', 'page_builder' ),
		'base' => 'vc_gitem_zone',
		'content_element' => false,
		'is_container' => true,
		'show_settings_on_create' => false,
		'icon' => 'icon-wpb-gitem-zone',
		'category' => __( 'Content', 'page_builder' ),
		'controls' => array( 'edit' ),
		'as_parent' => array( 'only' => 'vc_gitem_row' ),
		'js_view' => 'VcGitemZoneView',
		'params' => $zone_params,
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_zone_a' => array(
		'name' => __( 'Normal', 'page_builder' ),
		'base' => 'vc_gitem_zone_a',
		'content_element' => false,
		'is_container' => true,
		'show_settings_on_create' => false,
		'icon' => 'icon-wpb-gitem-zone',
		'category' => __( 'Content', 'page_builder' ),
		'controls' => array( 'edit' ),
		'as_parent' => array( 'only' => 'vc_gitem_row' ),
		'js_view' => 'VcGitemZoneView',
		'params' => array_merge( array(
			array(
				'type' => 'dropdown',
				'heading' => __( 'Height mode', 'page_builder' ),
				'param_name' => 'height_mode',
				'value' => array(
					'1:1' => '1-1',
					__( 'Original', 'page_builder' ) => 'original',
					'4:3' => '4-3',
					'3:4' => '3-4',
					'16:9' => '16-9',
					'9:16' => '9-16',
					__( 'Custom', 'page_builder' ) => 'custom',
				),
				'description' => __( 'Sizing proportions for height and width. Select "Original" to scale image without cropping.', 'page_builder' ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Height', 'page_builder' ),
				'param_name' => 'height',
				'dependency' => array(
					'element' => 'height_mode',
					'value' => array( 'custom' ),
				),
				'description' => __( 'Enter custom height.', 'page_builder' ),
			),
		), $zone_params ),
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_zone_b' => array(
		'name' => __( 'Hover', 'page_builder' ),
		'base' => 'vc_gitem_zone_b',
		'content_element' => false,
		'is_container' => true,
		'show_settings_on_create' => false,
		'icon' => 'icon-wpb-gitem-zone',
		'category' => __( 'Content', 'page_builder' ),
		'controls' => array( 'edit' ),
		'as_parent' => array( 'only' => 'vc_gitem_row' ),
		'js_view' => 'VcGitemZoneView',
		'params' => $zone_params,
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_zone_c' => array(
		'name' => __( 'Additional', 'page_builder' ),
		'base' => 'vc_gitem_zone_c',
		'content_element' => false,
		'is_container' => true,
		'show_settings_on_create' => false,
		'icon' => 'icon-wpb-gitem-zone',
		'category' => __( 'Content', 'page_builder' ),
		'controls' => array( 'move', 'delete', 'edit' ),
		'as_parent' => array( 'only' => 'vc_gitem_row' ),
		'js_view' => 'VcGitemZoneCView',
		'params' => array(
			array(
				'type' => 'css_editor',
				'heading' => __( 'CSS box', 'page_builder' ),
				'param_name' => 'css',
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'page_builder' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
			),
		),
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_row' => array(
		'name' => __( 'Row', 'page_builder' ),
		'base' => 'vc_gitem_row',
		'content_element' => false,
		'is_container' => true,
		'icon' => 'icon-wpb-row',
		'weight' => 1000,
		'show_settings_on_create' => false,
		'controls' => array( 'layout', 'delete' ),
		'allowed_container_element' => 'vc_gitem_col',
		'category' => __( 'Content', 'page_builder' ),
		'description' => __( 'Place content elements inside the row', 'page_builder' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'page_builder' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
			),
		),
		'js_view' => 'VcGitemRowView',
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_col' => array(
		'name' => __( 'Column', 'page_builder' ),
		'base' => 'vc_gitem_col',
		'icon' => 'icon-wpb-row',
		'weight' => 1000,
		'is_container' => true,
		'allowed_container_element' => false,
		'content_element' => false,
		'controls' => array( 'edit' ),
		'description' => __( 'Place content elements inside the column', 'page_builder' ),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __( 'Width', 'page_builder' ),
				'param_name' => 'width',
				'value' => array(
					__( '1 column - 1/12', 'page_builder' ) => '1/12',
					__( '2 columns - 1/6', 'page_builder' ) => '1/6',
					__( '3 columns - 1/4', 'page_builder' ) => '1/4',
					__( '4 columns - 1/3', 'page_builder' ) => '1/3',
					__( '5 columns - 5/12', 'page_builder' ) => '5/12',
					__( '6 columns - 1/2', 'page_builder' ) => '1/2',
					__( '7 columns - 7/12', 'page_builder' ) => '7/12',
					__( '8 columns - 2/3', 'page_builder' ) => '2/3',
					__( '9 columns - 3/4', 'page_builder' ) => '3/4',
					__( '10 columns - 5/6', 'page_builder' ) => '5/6',
					__( '11 columns - 11/12', 'page_builder' ) => '11/12',
					__( '12 columns - 1/1', 'page_builder' ) => '1/1',
				),
				'description' => __( 'Select column width.', 'page_builder' ),
				'std' => '1/1',
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Use featured image on background?', 'page_builder' ),
				'param_name' => 'featured_image',
				'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
				'description' => __( 'Note: Featured image overwrites background image and color from "Design Options".', 'page_builder' ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Image size', 'page_builder' ),
				'param_name' => 'img_size',
				'value' => 'large',
				'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'page_builder' ),
				'dependency' => array(
					'element' => 'featured_image',
					'not_empty' => true,
				),
			),
			array(
				'type' => 'css_editor',
				'heading' => __( 'CSS box', 'page_builder' ),
				'param_name' => 'css',
				'group' => __( 'Design Options', 'page_builder' ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'page_builder' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
			),
		),
		'js_view' => 'VcGitemColView',
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	/*'vc_gitem_post_data' => array(
		'name' => __( 'Post data', 'page_builder' ),
		'base' => 'vc_gitem_post_data',
		'content_element' => false,
		'category' => __( 'Post', 'page_builder' ),
		'params' => array_merge( array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Post data source', 'page_builder' ),
				'param_name' => 'data_source',
				'value' => 'ID',
			)
		), $post_data_params, $custom_fonts_params, array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'page_builder' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
			),
		) ),
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),*/
	'vc_gitem_post_title' => array(
		'name' => __( 'Post Title', 'page_builder' ),
		'base' => 'vc_gitem_post_title',
		'icon' => 'vc_icon-vc-gitem-post-title',
		'category' => __( 'Post', 'page_builder' ),
		'description' => __( 'Title of current post', 'page_builder' ),
		'params' => array_merge( $post_data_params, $custom_fonts_params, array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'page_builder' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
			),
		) ),
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_post_excerpt' => array(
		'name' => __( 'Post Excerpt', 'page_builder' ),
		'base' => 'vc_gitem_post_excerpt',
		'icon' => 'vc_icon-vc-gitem-post-excerpt',
		'category' => __( 'Post', 'page_builder' ),
		'description' => __( 'Excerpt or manual excerpt', 'page_builder' ),
		'params' => array_merge( $post_data_params, $custom_fonts_params, array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'page_builder' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
			),
		) ),
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_post_author' => array(
		'name' => __( 'Post Author', 'page_builder' ),
		'base' => 'vc_gitem_post_author',
		'icon' => 'vc_icon-vc-gitem-post-author', // @todo change icon ?
		'category' => __( 'Post', 'page_builder' ),
		'description' => __( 'Author of current post', 'page_builder' ),
		'params' => array_merge( array(
			array(
				'type' => 'checkbox',
				'heading' => __( 'Add link', 'page_builder' ),
				'param_name' => 'link',
				'value' => '',
				'description' => __( 'Add link to author?', 'page_builder' ),
			),
			array(
				'type' => 'css_editor',
				'heading' => __( 'CSS box', 'page_builder' ),
				'param_name' => 'css',
				'group' => __( 'Design Options', 'page_builder' ),
			),
		), $custom_fonts_params, array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'page_builder' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
			),
		) ),
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_post_categories' => array(
		'name' => __( 'Post Categories', 'page_builder' ),
		'base' => 'vc_gitem_post_categories',
		'icon' => 'vc_icon-vc-gitem-post-categories', // @todo change icon ?
		'category' => __( 'Post', 'page_builder' ),
		'description' => __( 'Categories of current post', 'page_builder' ),
		'params' => array(
			array(
				'type' => 'checkbox',
				'heading' => __( 'Add link', 'page_builder' ),
				'param_name' => 'link',
				'value' => '',
				'description' => __( 'Add link to category?', 'page_builder' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Style', 'page_builder' ),
				'param_name' => 'category_style',
				'value' => array(
					__( 'None', 'page_builder' ) => ' ',
					__( 'Comma', 'page_builder' ) => ', ',
					__( 'Rounded', 'page_builder' ) => 'filled vc_grid-filter-filled-round-all',
					__( 'Less Rounded', 'page_builder' ) => 'filled vc_grid-filter-filled-rounded-all',
					__( 'Border', 'page_builder' ) => 'bordered',
					__( 'Rounded Border', 'page_builder' ) => 'bordered-rounded vc_grid-filter-filled-round-all',
					__( 'Less Rounded Border', 'page_builder' ) => 'bordered-rounded-less vc_grid-filter-filled-rounded-all',
				),
				'description' => __( 'Select category display style.', 'page_builder' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Color', 'page_builder' ),
				'param_name' => 'category_color',
				'value' => getVcShared( 'colors' ),
				'std' => 'grey',
				'param_holder_class' => 'vc_colored-dropdown',
				'dependency' => array(
					'element' => 'category_style',
					'value_not_equal_to' => array( ' ', ', ' ),
				),
				'description' => __( 'Select category color.', 'page_builder' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Category size', 'page_builder' ),
				'param_name' => 'category_size',
				'value' => getVcShared( 'sizes' ),
				'std' => 'md',
				'description' => __( 'Select category size.', 'page_builder' ),
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
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_image' => array(
		'name' => __( 'Post Image', 'page_builder' ),
		'base' => 'vc_gitem_image',
		'icon' => 'vc_icon-vc-gitem-image',
		'category' => __( 'Post', 'page_builder' ),
		'description' => __( 'Featured image', 'page_builder' ),
		'params' => array(
			$vc_gitem_add_link_param,
			array(
				'type' => 'vc_link',
				'heading' => __( 'URL (Link)', 'page_builder' ),
				'param_name' => 'url',
				'dependency' => array(
					'element' => 'link',
					'value' => array( 'custom' ),
				),
				'description' => __( 'Add custom link.', 'page_builder' ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Image size', 'page_builder' ),
				'param_name' => 'img_size',
				'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)). Leave parameter empty to use "thumbnail" by default.', 'page_builder' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Image alignment', 'page_builder' ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Left', 'page_builder' ) => '',
					__( 'Right', 'page_builder' ) => 'right',
					__( 'Center', 'page_builder' ) => 'center',
				),
				'description' => __( 'Select image alignment.', 'page_builder' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Image style', 'page_builder' ),
				'param_name' => 'style',
				'value' => getVcShared( 'single image styles' ),
				'description' => __( 'Select image display style.', 'page_builder' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Border color', 'page_builder' ),
				'param_name' => 'border_color',
				'value' => getVcShared( 'colors' ),
				'std' => 'grey',
				'dependency' => array(
					'element' => 'style',
					'value' => array(
						'vc_box_border',
						'vc_box_border_circle',
						'vc_box_outline',
						'vc_box_outline_circle',
					),
				),
				'description' => __( 'Border color.', 'page_builder' ),
				'param_holder_class' => 'vc_colored-dropdown',
			),
			vc_map_add_css_animation(),
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
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_post_date' => array(
		'name' => __( 'Post Date', 'page_builder' ),
		'base' => 'vc_gitem_post_date',
		'icon' => 'vc_icon-vc-gitem-post-date',
		'category' => __( 'Post', 'page_builder' ),
		'description' => __( 'Post publish date', 'page_builder' ),
		'params' => array_merge( $post_data_params, $custom_fonts_params, array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'page_builder' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
			),
		) ),
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
	'vc_gitem_post_meta' => array(
		'name' => __( 'Custom Field', 'page_builder' ),
		'base' => 'vc_gitem_post_meta',
		'icon' => 'vc_icon-vc-gitem-post-meta',
		'category' => array(
			__( 'Elements', 'page_builder' )
		),
		'description' => __( 'Custom fields data from meta values of the post.', 'page_builder' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Field key name', 'page_builder' ),
				'param_name' => 'key',
				'description' => __( 'Enter custom field name to retrieve meta data value.', 'page_builder' ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Label', 'page_builder' ),
				'param_name' => 'label',
				'description' => __( 'Enter label to display before key value.', 'page_builder' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Alignment', 'page_builder' ),
				'param_name' => 'align',
				'value' => array(
					__( 'Left', 'page_builder' ) => 'left',
					__( 'Right', 'page_builder' ) => 'right',
					__( 'Center', 'page_builder' ) => 'center',
					__( 'Justify', 'page_builder' ) => 'justify',
				),
				'description' => __( 'Select alignment.', 'page_builder' ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'page_builder' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
			),
		),
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
);
$shortcode_vc_column_text = WPBMap::getShortCode( 'vc_column_text' );
if ( is_array( $shortcode_vc_column_text ) && isset( $shortcode_vc_column_text['base'] ) ) {
	$list['vc_column_text'] = $shortcode_vc_column_text;
	$list['vc_column_text']['post_type'] = Vc_Grid_Item_Editor::postType();
	$remove = array( 'el_id' );
	foreach ( $list['vc_column_text']['params'] as $k => $v ) {
		if ( in_array( $v['param_name'], $remove ) ) {
			unset( $list['vc_column_text']['params'][ $k ] );
		}
	}
}
$shortcode_vc_separator = WPBMap::getShortCode( 'vc_separator' );
if ( is_array( $shortcode_vc_separator ) && isset( $shortcode_vc_separator['base'] ) ) {
	$list['vc_separator'] = $shortcode_vc_separator;
	$list['vc_separator']['post_type'] = Vc_Grid_Item_Editor::postType();
	$remove = array( 'el_id' );
	foreach ( $list['vc_separator']['params'] as $k => $v ) {
		if ( in_array( $v['param_name'], $remove ) ) {
			unset( $list['vc_separator']['params'][ $k ] );
		}
	}
}
$shortcode_vc_text_separator = WPBMap::getShortCode( 'vc_text_separator' );
if ( is_array( $shortcode_vc_text_separator ) && isset( $shortcode_vc_text_separator['base'] ) ) {
	$list['vc_text_separator'] = $shortcode_vc_text_separator;
	$list['vc_text_separator']['post_type'] = Vc_Grid_Item_Editor::postType();

	$remove = array( 'el_id' );
	foreach ( $list['vc_text_separator']['params'] as $k => $v ) {
		if ( in_array( $v['param_name'], $remove ) ) {
			unset( $list['vc_text_separator']['params'][ $k ] );
		}
	}
}
$shortcode_vc_icon = WPBMap::getShortCode( 'vc_icon' );
if ( is_array( $shortcode_vc_icon ) && isset( $shortcode_vc_icon['base'] ) ) {
	$list['vc_icon'] = $shortcode_vc_icon;
	$list['vc_icon']['post_type'] = Vc_Grid_Item_Editor::postType();
	$list['vc_icon']['params'] = vc_map_integrate_shortcode( 'vc_icon', '', '', array( 'exclude' => array( 'link', 'el_id' ) ) );
}
$list['vc_single_image'] = array(
	'name' => __( 'Single Image', 'page_builder' ),
	'base' => 'vc_single_image',
	'icon' => 'icon-wpb-single-image',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Simple image with CSS animation', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Image source', 'page_builder' ),
			'param_name' => 'source',
			'value' => array(
				__( 'Media library', 'page_builder' ) => 'media_library',
				__( 'External link', 'page_builder' ) => 'external_link',
			),
			'std' => 'media_library',
			'description' => __( 'Select image source.', 'page_builder' ),
		),
		array(
			'type' => 'attach_image',
			'heading' => __( 'Image', 'page_builder' ),
			'param_name' => 'image',
			'value' => '',
			'description' => __( 'Select image from media library.', 'page_builder' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'media_library',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'External link', 'page_builder' ),
			'param_name' => 'custom_src',
			'description' => __( 'Select external link.', 'page_builder' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'external_link',
			),
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'textfield',
			'heading' => __( 'Image size', 'page_builder' ),
			'param_name' => 'img_size',
			'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)). Leave parameter empty to use "thumbnail" by default.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Image alignment', 'page_builder' ),
			'param_name' => 'alignment',
			'value' => array(
				__( 'Left', 'page_builder' ) => '',
				__( 'Right', 'page_builder' ) => 'right',
				__( 'Center', 'page_builder' ) => 'center',
			),
			'description' => __( 'Select image alignment.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Image style', 'page_builder' ),
			'param_name' => 'style',
			'value' => getVcShared( 'single image styles' ),
			'description' => __( 'Select image display style.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Border color', 'page_builder' ),
			'param_name' => 'border_color',
			'value' => getVcShared( 'colors' ),
			'std' => 'grey',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'vc_box_border', 'vc_box_border_circle', 'vc_box_outline', 'vc_box_outline_circle' ),
			),
			'description' => __( 'Border color.', 'page_builder' ),
			'param_holder_class' => 'vc_colored-dropdown',
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
	'post_type' => Vc_Grid_Item_Editor::postType(),
);
$shortcode_vc_button2 = WPBMap::getShortCode( 'vc_button2' );
if ( is_array( $shortcode_vc_button2 ) && isset( $shortcode_vc_button2['base'] ) ) {
	$list['vc_button2'] = $shortcode_vc_button2;
	$list['vc_button2']['post_type'] = Vc_Grid_Item_Editor::postType();
}

$shortcode_vc_btn = WPBMap::getShortCode( 'vc_btn' );
if ( is_array( $shortcode_vc_btn ) && isset( $shortcode_vc_btn['base'] ) ) {
	$list['vc_btn'] = $shortcode_vc_btn;
	$list['vc_btn']['post_type'] = Vc_Grid_Item_Editor::postType();
	unset( $list['vc_btn']['params'][1] );
	$remove = array( 'el_id' );
	foreach ( $list['vc_btn']['params'] as $k => $v ) {
		if ( in_array( $v['param_name'], $remove ) ) {
			unset( $list['vc_btn']['params'][ $k ] );
		}
	}
}
$shortcode_vc_custom_heading = WPBMap::getShortCode( 'vc_custom_heading' );
if ( is_array( $shortcode_vc_custom_heading ) && isset( $shortcode_vc_custom_heading['base'] ) ) {
	$list['vc_custom_heading'] = $shortcode_vc_custom_heading;
	$list['vc_custom_heading']['post_type'] = Vc_Grid_Item_Editor::postType();

	$remove = array( 'link', 'source', 'el_id' );
	foreach ( $list['vc_custom_heading']['params'] as $k => $v ) {
		if ( in_array( $v['param_name'], $remove ) ) {
			unset( $list['vc_custom_heading']['params'][ $k ] );
		}

		// text depends on source. remove dependency so text is always saved
		if ( 'text' === $v['param_name'] ) {
			unset( $list['vc_custom_heading']['params'][ $k ]['dependency'] );
		}
	}
}
$shortcode_vc_empty_space = WPBMap::getShortCode( 'vc_empty_space' );
if ( is_array( $shortcode_vc_empty_space ) && isset( $shortcode_vc_empty_space['base'] ) ) {
	$list['vc_empty_space'] = $shortcode_vc_empty_space;
	$list['vc_empty_space']['post_type'] = Vc_Grid_Item_Editor::postType();
	$remove = array( 'el_id' );
	foreach ( $list['vc_empty_space']['params'] as $k => $v ) {
		if ( in_array( $v['param_name'], $remove ) ) {
			unset( $list['vc_empty_space']['params'][ $k ] );
		}
	}
}
foreach ( array( 'vc_icon', 'vc_button2', 'vc_btn', 'vc_custom_heading', 'vc_single_image' ) as $key ) {
	if ( isset( $list[ $key ] ) ) {
		if ( ! isset( $list[ $key ]['params'] ) ) {
			$list[ $key ]['params'] = array();
		}
		if ( 'vc_button2' === $key ) {
			// change settings for vc_link in dropdown. Add dependency.
			$list[ $key ]['params'][0] = array(
				'type' => 'vc_link',
				'heading' => __( 'URL (Link)', 'page_builder' ),
				'param_name' => 'url',
				'dependency' => array(
					'element' => 'link',
					'value' => array( 'custom' ),
				),
				'description' => __( 'Add custom link.', 'page_builder' ),
			);
		} else {
			array_unshift( $list[ $key ]['params'], array(
				'type' => 'vc_link',
				'heading' => __( 'URL (Link)', 'page_builder' ),
				'param_name' => 'url',
				'dependency' => array(
					'element' => 'link',
					'value' => array( 'custom' ),
				),
				'description' => __( 'Add custom link.', 'page_builder' ),
			) );
		}
		// Add link dropdown
		array_unshift( $list[ $key ]['params'], $vc_gitem_add_link_param );
	}
}
foreach ( $list as $key => $value ) {
	if ( isset( $list[ $key ]['params'] ) ) {
		$list[ $key ]['params'] = array_values( $list[ $key ]['params'] );
	}
}

return $list;
