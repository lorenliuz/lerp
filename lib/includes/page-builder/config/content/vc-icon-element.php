<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

function vc_icon_element_params() {
	return array(
		'name' => __( 'Icon', 'page_builder' ),
		'base' => 'vc_icon',
		'icon' => 'icon-wpb-vc_icon',
		'category' => __( 'Content', 'page_builder' ),
		'description' => __( 'Eye catching icons from libraries', 'page_builder' ),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __( 'Icon library', 'page_builder' ),
				'value' => array(
					__( 'Font Awesome', 'page_builder' ) => 'fontawesome',
					__( 'Open Iconic', 'page_builder' ) => 'openiconic',
					__( 'Typicons', 'page_builder' ) => 'typicons',
					__( 'Entypo', 'page_builder' ) => 'entypo',
					__( 'Linecons', 'page_builder' ) => 'linecons',
					__( 'Mono Social', 'page_builder' ) => 'monosocial',
					__( 'Material', 'page_builder' ) => 'material',
				),
				'admin_label' => true,
				'param_name' => 'type',
				'description' => __( 'Select icon library.', 'page_builder' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'page_builder' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-adjust',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'fontawesome',
				),
				'description' => __( 'Select icon from library.', 'page_builder' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'page_builder' ),
				'param_name' => 'icon_openiconic',
				'value' => 'vc-oi vc-oi-dial',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'openiconic',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'openiconic',
				),
				'description' => __( 'Select icon from library.', 'page_builder' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'page_builder' ),
				'param_name' => 'icon_typicons',
				'value' => 'typcn typcn-adjust-brightness',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'typicons',
				),
				'description' => __( 'Select icon from library.', 'page_builder' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'page_builder' ),
				'param_name' => 'icon_entypo',
				'value' => 'entypo-icon entypo-icon-note',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'page_builder' ),
				'param_name' => 'icon_linecons',
				'value' => 'vc_li vc_li-heart',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'linecons',
				),
				'description' => __( 'Select icon from library.', 'page_builder' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'page_builder' ),
				'param_name' => 'icon_monosocial',
				'value' => 'vc-mono vc-mono-fivehundredpx',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'monosocial',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'monosocial',
				),
				'description' => __( 'Select icon from library.', 'page_builder' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => __( 'Icon', 'page_builder' ),
				'param_name' => 'icon_material',
				'value' => 'vc-material vc-material-cake',
				// default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'material',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'material',
				),
				'description' => __( 'Select icon from library.', 'page_builder' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Icon color', 'page_builder' ),
				'param_name' => 'color',
				'value' => array_merge( getVcShared( 'colors' ), array( __( 'Custom color', 'page_builder' ) => 'custom' ) ),
				'description' => __( 'Select icon color.', 'page_builder' ),
				'param_holder_class' => 'vc_colored-dropdown',
			),
			array(
				'type' => 'colorpicker',
				'heading' => __( 'Custom color', 'page_builder' ),
				'param_name' => 'custom_color',
				'description' => __( 'Select custom icon color.', 'page_builder' ),
				'dependency' => array(
					'element' => 'color',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Background shape', 'page_builder' ),
				'param_name' => 'background_style',
				'value' => array(
					__( 'None', 'page_builder' ) => '',
					__( 'Circle', 'page_builder' ) => 'rounded',
					__( 'Square', 'page_builder' ) => 'boxed',
					__( 'Rounded', 'page_builder' ) => 'rounded-less',
					__( 'Outline Circle', 'page_builder' ) => 'rounded-outline',
					__( 'Outline Square', 'page_builder' ) => 'boxed-outline',
					__( 'Outline Rounded', 'page_builder' ) => 'rounded-less-outline',
				),
				'description' => __( 'Select background shape and style for icon.', 'page_builder' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Background color', 'page_builder' ),
				'param_name' => 'background_color',
				'value' => array_merge( getVcShared( 'colors' ), array( __( 'Custom color', 'page_builder' ) => 'custom' ) ),
				'std' => 'grey',
				'description' => __( 'Select background color for icon.', 'page_builder' ),
				'param_holder_class' => 'vc_colored-dropdown',
				'dependency' => array(
					'element' => 'background_style',
					'not_empty' => true,
				),
			),
			array(
				'type' => 'colorpicker',
				'heading' => __( 'Custom background color', 'page_builder' ),
				'param_name' => 'custom_background_color',
				'description' => __( 'Select custom icon background color.', 'page_builder' ),
				'dependency' => array(
					'element' => 'background_color',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Size', 'page_builder' ),
				'param_name' => 'size',
				'value' => array_merge( getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
				'std' => 'md',
				'description' => __( 'Icon size.', 'page_builder' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Icon alignment', 'page_builder' ),
				'param_name' => 'align',
				'value' => array(
					__( 'Left', 'page_builder' ) => 'left',
					__( 'Right', 'page_builder' ) => 'right',
					__( 'Center', 'page_builder' ) => 'center',
				),
				'description' => __( 'Select icon alignment.', 'page_builder' ),
			),
			array(
				'type' => 'vc_link',
				'heading' => __( 'URL (Link)', 'page_builder' ),
				'param_name' => 'link',
				'description' => __( 'Add link to icon.', 'page_builder' ),
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
		'js_view' => 'VcIconElementView_Backend',
	);
}
