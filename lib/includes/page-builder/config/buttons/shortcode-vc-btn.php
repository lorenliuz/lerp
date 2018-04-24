<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * New button implementation
 * array_merge is needed due to merging other shortcode data into params.
 * @since 4.5
 */

$pixel_icons = vc_pixel_icons();
require_once vc_path_dir( 'CONFIG_DIR', 'content/vc-icon-element.php' );

$icons_params = vc_map_integrate_shortcode( vc_icon_element_params(), 'i_', '', array(
	'include_only_regex' => '/^(type|icon_\w*)/',
	// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
), array(
	'element' => 'add_icon',
	'value' => 'true',
) );
// populate integrated vc_icons params.
if ( is_array( $icons_params ) && ! empty( $icons_params ) ) {
	foreach ( $icons_params as $key => $param ) {
		if ( is_array( $param ) && ! empty( $param ) ) {
			if ( 'i_type' === $param['param_name'] ) {
				// append pixelicons to dropdown
				$icons_params[ $key ]['value'][ __( 'Pixel', 'page_builder' ) ] = 'pixelicons';
			}
			if ( isset( $param['admin_label'] ) ) {
				// remove admin label
				unset( $icons_params[ $key ]['admin_label'] );
			}
		}
	}
}
$params = array_merge( array(
	array(
		'type' => 'textfield',
		'heading' => __( 'Text', 'page_builder' ),
		'param_name' => 'title',
		// fully compatible to btn1 and btn2
		'value' => __( 'Text on the button', 'page_builder' ),
	),
	array(
		'type' => 'vc_link',
		'heading' => __( 'URL (Link)', 'page_builder' ),
		'param_name' => 'link',
		'description' => __( 'Add link to button.', 'page_builder' ),
		// compatible with btn2 and converted from href{btn1}
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Style', 'page_builder' ),
		'description' => __( 'Select button display style.', 'page_builder' ),
		'param_name' => 'style',
		// partly compatible with btn2, need to be converted shape+style from btn2 and btn1
		'value' => array(
			__( 'Modern', 'page_builder' ) => 'modern',
			__( 'Classic', 'page_builder' ) => 'classic',
			__( 'Flat', 'page_builder' ) => 'flat',
			__( 'Outline', 'page_builder' ) => 'outline',
			__( '3d', 'page_builder' ) => '3d',
			__( 'Custom', 'page_builder' ) => 'custom',
			__( 'Outline custom', 'page_builder' ) => 'outline-custom',
			__( 'Gradient', 'page_builder' ) => 'gradient',
			__( 'Gradient Custom', 'page_builder' ) => 'gradient-custom',
		),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Gradient Color 1', 'page_builder' ),
		'param_name' => 'gradient_color_1',
		'description' => __( 'Select first color for gradient.', 'page_builder' ),
		'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
		'value' => getVcShared( 'colors-dashed' ),
		'std' => 'turquoise',
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'gradient' ),
		),
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Gradient Color 2', 'page_builder' ),
		'param_name' => 'gradient_color_2',
		'description' => __( 'Select second color for gradient.', 'page_builder' ),
		'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
		'value' => getVcShared( 'colors-dashed' ),
		'std' => 'blue',
		// must have default color grey
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'gradient' ),
		),
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Gradient Color 1', 'page_builder' ),
		'param_name' => 'gradient_custom_color_1',
		'description' => __( 'Select first color for gradient.', 'page_builder' ),
		'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
		'value' => '#dd3333',
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'gradient-custom' ),
		),
		'edit_field_class' => 'vc_col-sm-4',
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Gradient Color 2', 'page_builder' ),
		'param_name' => 'gradient_custom_color_2',
		'description' => __( 'Select second color for gradient.', 'page_builder' ),
		'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
		'value' => '#eeee22',
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'gradient-custom' ),
		),
		'edit_field_class' => 'vc_col-sm-4',
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Button Text Color', 'page_builder' ),
		'param_name' => 'gradient_text_color',
		'description' => __( 'Select button text color.', 'page_builder' ),
		'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
		'value' => '#ffffff',
		// must have default color grey
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'gradient-custom' ),
		),
		'edit_field_class' => 'vc_col-sm-4',
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Background', 'page_builder' ),
		'param_name' => 'custom_background',
		'description' => __( 'Select custom background color for your element.', 'page_builder' ),
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'custom' ),
		),
		'edit_field_class' => 'vc_col-sm-6',
		'std' => '#ededed',
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Text', 'page_builder' ),
		'param_name' => 'custom_text',
		'description' => __( 'Select custom text color for your element.', 'page_builder' ),
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'custom' ),
		),
		'edit_field_class' => 'vc_col-sm-6',
		'std' => '#666',
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Outline and Text', 'page_builder' ),
		'param_name' => 'outline_custom_color',
		'description' => __( 'Select outline and text color for your element.', 'page_builder' ),
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'outline-custom' ),
		),
		'edit_field_class' => 'vc_col-sm-4',
		'std' => '#666',
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Hover background', 'page_builder' ),
		'param_name' => 'outline_custom_hover_background',
		'description' => __( 'Select hover background color for your element.', 'page_builder' ),
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'outline-custom' ),
		),
		'edit_field_class' => 'vc_col-sm-4',
		'std' => '#666',
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Hover text', 'page_builder' ),
		'param_name' => 'outline_custom_hover_text',
		'description' => __( 'Select hover text color for your element.', 'page_builder' ),
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'outline-custom' ),
		),
		'edit_field_class' => 'vc_col-sm-4',
		'std' => '#fff',
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Shape', 'page_builder' ),
		'description' => __( 'Select button shape.', 'page_builder' ),
		'param_name' => 'shape',
		// need to be converted
		'value' => array(
			__( 'Rounded', 'page_builder' ) => 'rounded',
			__( 'Square', 'page_builder' ) => 'square',
			__( 'Round', 'page_builder' ) => 'round',
		),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Color', 'page_builder' ),
		'param_name' => 'color',
		'description' => __( 'Select button color.', 'page_builder' ),
		// compatible with btn2, need to be converted from btn1
		'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
		'value' => array(
				// Btn1 Colors
				__( 'Classic Grey', 'page_builder' ) => 'default',
				__( 'Classic Blue', 'page_builder' ) => 'primary',
				__( 'Classic Turquoise', 'page_builder' ) => 'info',
				__( 'Classic Green', 'page_builder' ) => 'success',
				__( 'Classic Orange', 'page_builder' ) => 'warning',
				__( 'Classic Red', 'page_builder' ) => 'danger',
				__( 'Classic Black', 'page_builder' ) => 'inverse',
				// + Btn2 Colors (default color set)
			) + getVcShared( 'colors-dashed' ),
		'std' => 'grey',
		// must have default color grey
		'dependency' => array(
			'element' => 'style',
			'value_not_equal_to' => array(
				'custom',
				'outline-custom',
				'gradient',
				'gradient-custom',
			),
		),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Size', 'page_builder' ),
		'param_name' => 'size',
		'description' => __( 'Select button display size.', 'page_builder' ),
		// compatible with btn2, default md, but need to be converted from btn1 to btn2
		'std' => 'md',
		'value' => getVcShared( 'sizes' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Alignment', 'page_builder' ),
		'param_name' => 'align',
		'description' => __( 'Select button alignment.', 'page_builder' ),
		// compatible with btn2, default left to be compatible with btn1
		'value' => array(
			__( 'Inline', 'page_builder' ) => 'inline',
			// default as well
			__( 'Left', 'page_builder' ) => 'left',
			// default as well
			__( 'Right', 'page_builder' ) => 'right',
			__( 'Center', 'page_builder' ) => 'center',
		),
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Set full width button?', 'page_builder' ),
		'param_name' => 'button_block',
		'dependency' => array(
			'element' => 'align',
			'value_not_equal_to' => 'inline',
		),
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Add icon?', 'page_builder' ),
		'param_name' => 'add_icon',
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Icon Alignment', 'page_builder' ),
		'description' => __( 'Select icon alignment.', 'page_builder' ),
		'param_name' => 'i_align',
		'value' => array(
			__( 'Left', 'page_builder' ) => 'left',
			// default as well
			__( 'Right', 'page_builder' ) => 'right',
		),
		'dependency' => array(
			'element' => 'add_icon',
			'value' => 'true',
		),
	),
), $icons_params, array(
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'page_builder' ),
			'param_name' => 'i_icon_pixelicons',
			'value' => 'vc_pixel_icon vc_pixel_icon-alert',
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'pixelicons',
				'source' => $pixel_icons,
			),
			'dependency' => array(
				'element' => 'i_type',
				'value' => 'pixelicons',
			),
			'description' => __( 'Select icon from library.', 'page_builder' ),
		),
	), array(
		vc_map_add_css_animation( true ),
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
			'type' => 'checkbox',
			'heading' => __( 'Advanced on click action', 'page_builder' ),
			'param_name' => 'custom_onclick',
			'description' => __( 'Insert inline onclick javascript action.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'On click code', 'page_builder' ),
			'param_name' => 'custom_onclick_code',
			'description' => __( 'Enter onclick action code.', 'page_builder' ),
			'dependency' => array(
				'element' => 'custom_onclick',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'page_builder' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'page_builder' ),
		),
	)
);
/**
 * @class WPBakeryShortCode_VC_Btn
 */
return array(
	'name' => __( 'Button', 'page_builder' ),
	'base' => 'vc_btn',
	'icon' => 'icon-wpb-ui-button',
	'category' => array(
		__( 'Content', 'page_builder' ),
	),
	'description' => __( 'Eye catching button', 'page_builder' ),
	'params' => $params,
	'js_view' => 'VcButton3View',
	'custom_markup' => '{{title}}<div class="vc_btn3-container"><button class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-shape-{{ params.shape }} vc_btn3-style-{{ params.style }} vc_btn3-color-{{ params.color }}">{{{ params.title }}}</button></div>',
);
