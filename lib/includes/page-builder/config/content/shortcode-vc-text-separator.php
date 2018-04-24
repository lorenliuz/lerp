<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once 'vc-icon-element.php';
$icon_params = vc_icon_element_params();
/* Separator (Divider)
---------------------------------------------------------- */
$icons_params = vc_map_integrate_shortcode( $icon_params, 'i_', __( 'Icon', 'page_builder' ), array(
	'exclude' => array(
		'align',
		'css',
		'el_class',
		'el_id',
		'link',
		'css_animation',
	),
	// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
), array(
	'element' => 'add_icon',
	'value' => 'true',
) );

// populate integrated vc_icons params.
if ( is_array( $icons_params ) && ! empty( $icons_params ) ) {
	foreach ( $icons_params as $key => $param ) {
		if ( is_array( $param ) && ! empty( $param ) ) {
			if ( isset( $param['admin_label'] ) ) {
				// remove admin label
				unset( $icons_params[ $key ]['admin_label'] );
			}
		}
	}
}
return array(
	'name' => __( 'Separator with Text', 'page_builder' ),
	'base' => 'vc_text_separator',
	'icon' => 'icon-wpb-ui-separator-label',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Horizontal separator line with heading', 'page_builder' ),
	'params' => array_merge( array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'page_builder' ),
			'param_name' => 'title',
			'holder' => 'div',
			'value' => __( 'Title', 'page_builder' ),
			'description' => __( 'Add text to separator.', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Add icon?', 'page_builder' ),
			'param_name' => 'add_icon',
		),
	), $icons_params, array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Title position', 'page_builder' ),
			'param_name' => 'title_align',
			'value' => array(
				__( 'Center', 'page_builder' ) => 'separator_align_center',
				__( 'Left', 'page_builder' ) => 'separator_align_left',
				__( 'Right', 'page_builder' ) => 'separator_align_right',
			),
			'description' => __( 'Select title location.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Separator alignment', 'page_builder' ),
			'param_name' => 'align',
			'value' => array(
				__( 'Center', 'page_builder' ) => 'align_center',
				__( 'Left', 'page_builder' ) => 'align_left',
				__( 'Right', 'page_builder' ) => 'align_right',
			),
			'description' => __( 'Select separator alignment.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Color', 'page_builder' ),
			'param_name' => 'color',
			'value' => array_merge( getVcShared( 'colors' ), array( __( 'Custom color', 'page_builder' ) => 'custom' ) ),
			'std' => 'grey',
			'description' => __( 'Select color of separator.', 'page_builder' ),
			'param_holder_class' => 'vc_colored-dropdown',
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Custom Color', 'page_builder' ),
			'param_name' => 'accent_color',
			'description' => __( 'Custom separator color for your element.', 'page_builder' ),
			'dependency' => array(
				'element' => 'color',
				'value' => array( 'custom' ),
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'page_builder' ),
			'param_name' => 'style',
			'value' => getVcShared( 'separator styles' ),
			'description' => __( 'Separator display style.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Border width', 'page_builder' ),
			'param_name' => 'border_width',
			'value' => getVcShared( 'separator border widths' ),
			'description' => __( 'Select border width (pixels).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Element width', 'page_builder' ),
			'param_name' => 'el_width',
			'value' => getVcShared( 'separator widths' ),
			'description' => __( 'Separator element width in percents.', 'page_builder' ),
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
			'type' => 'hidden',
			'param_name' => 'layout',
			'value' => 'separator_with_text',
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'page_builder' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'page_builder' ),
		),
	) ),
	'js_view' => 'VcTextSeparatorView',
);
