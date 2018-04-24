<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/* Message box 2
---------------------------------------------------------- */
$pixel_icons = vc_pixel_icons();
$custom_colors = array(
	__( 'Informational', 'page_builder' ) => 'info',
	__( 'Warning', 'page_builder' ) => 'warning',
	__( 'Success', 'page_builder' ) => 'success',
	__( 'Error', 'page_builder' ) => 'danger',
	__( 'Informational Classic', 'page_builder' ) => 'alert-info',
	__( 'Warning Classic', 'page_builder' ) => 'alert-warning',
	__( 'Success Classic', 'page_builder' ) => 'alert-success',
	__( 'Error Classic', 'page_builder' ) => 'alert-danger',
);

return array(
	'name' => __( 'Message Box', 'page_builder' ),
	'base' => 'vc_message',
	'icon' => 'icon-wpb-information-white',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Notification box', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'params_preset',
			'heading' => __( 'Message Box Presets', 'page_builder' ),
			'param_name' => 'color',
			// due to backward compatibility, really it is message_box_type
			'value' => '',
			'options' => array(
				array(
					'label' => __( 'Custom', 'page_builder' ),
					'value' => '',
					'params' => array(),
				),
				array(
					'label' => __( 'Informational', 'page_builder' ),
					'value' => 'info',
					'params' => array(
						'message_box_color' => 'info',
						'icon_type' => 'fontawesome',
						'icon_fontawesome' => 'fa fa-info-circle',
					),
				),
				array(
					'label' => __( 'Warning', 'page_builder' ),
					'value' => 'warning',
					'params' => array(
						'message_box_color' => 'warning',
						'icon_type' => 'fontawesome',
						'icon_fontawesome' => 'fa fa-exclamation-triangle',
					),
				),
				array(
					'label' => __( 'Success', 'page_builder' ),
					'value' => 'success',
					'params' => array(
						'message_box_color' => 'success',
						'icon_type' => 'fontawesome',
						'icon_fontawesome' => 'fa fa-check',
					),
				),
				array(
					'label' => __( 'Error', 'page_builder' ),
					'value' => 'danger',
					'params' => array(
						'message_box_color' => 'danger',
						'icon_type' => 'fontawesome',
						'icon_fontawesome' => 'fa fa-times',
					),
				),
				array(
					'label' => __( 'Informational Classic', 'page_builder' ),
					'value' => 'alert-info',
					// due to backward compatibility
					'params' => array(
						'message_box_color' => 'alert-info',
						'icon_type' => 'pixelicons',
						'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-info',
					),
				),
				array(
					'label' => __( 'Warning Classic', 'page_builder' ),
					'value' => 'alert-warning',
					// due to backward compatibility
					'params' => array(
						'message_box_color' => 'alert-warning',
						'icon_type' => 'pixelicons',
						'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-alert',
					),
				),
				array(
					'label' => __( 'Success Classic', 'page_builder' ),
					'value' => 'alert-success',
					// due to backward compatibility
					'params' => array(
						'message_box_color' => 'alert-success',
						'icon_type' => 'pixelicons',
						'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-tick',
					),
				),
				array(
					'label' => __( 'Error Classic', 'page_builder' ),
					'value' => 'alert-danger',
					// due to backward compatibility
					'params' => array(
						'message_box_color' => 'alert-danger',
						'icon_type' => 'pixelicons',
						'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-explanation',
					),
				),
			),
			'description' => __( 'Select predefined message box design or choose "Custom" for custom styling.', 'page_builder' ),
			'param_holder_class' => 'vc_message-type vc_colored-dropdown',
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'page_builder' ),
			'param_name' => 'message_box_style',
			'value' => getVcShared( 'message_box_styles' ),
			'description' => __( 'Select message box design style.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Shape', 'page_builder' ),
			'param_name' => 'style',
			// due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Square', 'page_builder' ) => 'square',
				__( 'Rounded', 'page_builder' ) => 'rounded',
				__( 'Round', 'page_builder' ) => 'round',
			),
			'description' => __( 'Select message box shape.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Color', 'page_builder' ),
			'param_name' => 'message_box_color',
			'value' => $custom_colors + getVcShared( 'colors' ),
			'description' => __( 'Select message box color.', 'page_builder' ),
			'param_holder_class' => 'vc_message-type vc_colored-dropdown',
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon library', 'page_builder' ),
			'value' => array(
				__( 'Font Awesome', 'page_builder' ) => 'fontawesome',
				__( 'Open Iconic', 'page_builder' ) => 'openiconic',
				__( 'Typicons', 'page_builder' ) => 'typicons',
				__( 'Entypo', 'page_builder' ) => 'entypo',
				__( 'Linecons', 'page_builder' ) => 'linecons',
				__( 'Pixel', 'page_builder' ) => 'pixelicons',
				__( 'Mono Social', 'page_builder' ) => 'monosocial',
			),
			'param_name' => 'icon_type',
			'description' => __( 'Select icon library.', 'page_builder' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'page_builder' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'fontawesome',
			),
			'description' => __( 'Select icon from library.', 'page_builder' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'page_builder' ),
			'param_name' => 'icon_openiconic',
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'openiconic',
			),
			'description' => __( 'Select icon from library.', 'page_builder' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'page_builder' ),
			'param_name' => 'icon_typicons',
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
			'description' => __( 'Select icon from library.', 'page_builder' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'page_builder' ),
			'param_name' => 'icon_entypo',
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'page_builder' ),
			'param_name' => 'icon_linecons',
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'linecons',
			),
			'description' => __( 'Select icon from library.', 'page_builder' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'page_builder' ),
			'param_name' => 'icon_pixelicons',
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'pixelicons',
				'source' => $pixel_icons,
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'pixelicons',
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
				'element' => 'icon_type',
				'value' => 'monosocial',
			),
			'description' => __( 'Select icon from library.', 'page_builder' ),
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'class' => 'messagebox_text',
			'heading' => __( 'Message text', 'page_builder' ),
			'param_name' => 'content',
			'value' => __( '<p>I am message box. Click edit button to change this text.</p>', 'page_builder' ),
		),
		vc_map_add_css_animation( false ),
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
	'js_view' => 'VcMessageView_Backend',
);
