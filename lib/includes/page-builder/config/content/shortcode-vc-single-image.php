<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
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
				__( 'Featured Image', 'page_builder' ) => 'featured_image',
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
			'admin_label' => true,
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
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Image size', 'page_builder' ),
			'param_name' => 'img_size',
			'value' => 'thumbnail',
			'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'page_builder' ),
			'dependency' => array(
				'element' => 'source',
				'value' => array(
					'media_library',
					'featured_image',
				),
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
			'type' => 'textfield',
			'heading' => __( 'Caption', 'page_builder' ),
			'param_name' => 'caption',
			'description' => __( 'Enter text for image caption.', 'page_builder' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'external_link',
			),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Add caption?', 'page_builder' ),
			'param_name' => 'add_caption',
			'description' => __( 'Add image caption.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
			'dependency' => array(
				'element' => 'source',
				'value' => array(
					'media_library',
					'featured_image',
				),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Image alignment', 'page_builder' ),
			'param_name' => 'alignment',
			'value' => array(
				__( 'Left', 'page_builder' ) => 'left',
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
			'dependency' => array(
				'element' => 'source',
				'value' => array(
					'media_library',
					'featured_image',
				),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Image style', 'page_builder' ),
			'param_name' => 'external_style',
			'value' => getVcShared( 'single image external styles' ),
			'description' => __( 'Select image display style.', 'page_builder' ),
			'dependency' => array(
				'element' => 'source',
				'value' => 'external_link',
			),
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
					'vc_box_border_circle_2',
					'vc_box_outline_circle_2',
				),
			),
			'description' => __( 'Border color.', 'page_builder' ),
			'param_holder_class' => 'vc_colored-dropdown',
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Border color', 'page_builder' ),
			'param_name' => 'external_border_color',
			'value' => getVcShared( 'colors' ),
			'std' => 'grey',
			'dependency' => array(
				'element' => 'external_style',
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
		array(
			'type' => 'dropdown',
			'heading' => __( 'On click action', 'page_builder' ),
			'param_name' => 'onclick',
			'value' => array(
				__( 'None', 'page_builder' ) => '',
				__( 'Link to large image', 'page_builder' ) => 'img_link_large',
				__( 'Open prettyPhoto', 'page_builder' ) => 'link_image',
				__( 'Open custom link', 'page_builder' ) => 'custom_link',
				__( 'Zoom', 'page_builder' ) => 'zoom',
			),
			'description' => __( 'Select action for click action.', 'page_builder' ),
			'std' => '',
		),
		array(
			'type' => 'href',
			'heading' => __( 'Image link', 'page_builder' ),
			'param_name' => 'link',
			'description' => __( 'Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'page_builder' ),
			'dependency' => array(
				'element' => 'onclick',
				'value' => 'custom_link',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Link Target', 'page_builder' ),
			'param_name' => 'img_link_target',
			'value' => vc_target_param_list(),
			'dependency' => array(
				'element' => 'onclick',
				'value' => array(
					'custom_link',
					'img_link_large',
				),
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
		// backward compatibility. since 4.6
		array(
			'type' => 'hidden',
			'param_name' => 'img_link_large',
		),
	),
);
