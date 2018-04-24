<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/* Call to action
 * @since 4.5
 */
require_once vc_path_dir( 'CONFIG_DIR', 'content/vc-custom-heading-element.php' );
$h2_custom_heading = vc_map_integrate_shortcode( vc_custom_heading_element_params(), 'primary_title_', __( 'Primary Title', 'page_builder' ), array(
	'exclude' => array(
		'source',
		'text',
		'css',
	),
), array(
	'element' => 'use_custom_fonts_primary_title',
	'value' => 'true',
) );

// This is needed to remove custom heading _tag and _align options.
if ( is_array( $h2_custom_heading ) && ! empty( $h2_custom_heading ) ) {
	foreach ( $h2_custom_heading as $key => $param ) {
		if ( is_array( $param ) && isset( $param['type'] ) && 'font_container' === $param['type'] ) {
			$h2_custom_heading[ $key ]['value'] = '';
			if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
				$sub_key = array_search( 'tag', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['tag'] ) ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields']['tag'] );
				}
				$sub_key = array_search( 'text_align', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['text_align'] ) ) {
					unset( $h2_custom_heading[ $key ]['settings']['fields']['text_align'] );
				}
			}
		}
	}
}
$h4_custom_heading = vc_map_integrate_shortcode( vc_custom_heading_element_params(), 'hover_title_', __( 'Hover Title', 'page_builder' ), array(
	'exclude' => array(
		'source',
		'text',
		'css',
	),
), array(
	'element' => 'use_custom_fonts_hover_title',
	'value' => 'true',
) );

// This is needed to remove custom heading _tag and _align options.
if ( is_array( $h4_custom_heading ) && ! empty( $h4_custom_heading ) ) {
	foreach ( $h4_custom_heading as $key => $param ) {
		if ( is_array( $param ) && isset( $param['type'] ) && 'font_container' === $param['type'] ) {
			$h4_custom_heading[ $key ]['value'] = '';
			if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
				$sub_key = array_search( 'tag', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['tag'] ) ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields']['tag'] );
				}
				$sub_key = array_search( 'text_align', $param['settings']['fields'] );
				if ( false !== $sub_key ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
				} elseif ( isset( $param['settings']['fields']['text_align'] ) ) {
					unset( $h4_custom_heading[ $key ]['settings']['fields']['text_align'] );
				}
			}
		}
	}
}
$params = array_merge( array(
	array(
		'type' => 'attach_image',
		'heading' => __( 'Image', 'page_builder' ),
		'param_name' => 'image',
		'value' => '',
		'description' => __( 'Select image from media library.', 'page_builder' ),
		'admin_label' => true,
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Primary title', 'page_builder' ),
		'admin_label' => true,
		'param_name' => 'primary_title',
		'value' => __( 'Hover Box Element', 'page_builder' ),
		'description' => __( 'Enter text for heading line.', 'page_builder' ),
		'edit_field_class' => 'vc_col-sm-9',
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Use custom font?', 'page_builder' ),
		'param_name' => 'use_custom_fonts_primary_title',
		'description' => __( 'Enable Google fonts.', 'page_builder' ),
		'edit_field_class' => 'vc_col-sm-3',
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Primary title alignment', 'page_builder' ),
		'param_name' => 'primary_align',
		'value' => getVcShared( 'text align' ),
		'std' => 'center',
		'description' => __( 'Select text alignment for primary title.', 'page_builder' ),
	),
), $h2_custom_heading, array(
	array(
		'type' => 'textfield',
		'heading' => __( 'Hover title', 'page_builder' ),
		'param_name' => 'hover_title',
		'value' => 'Hover Box Element',
		'description' => __( 'Hover Box Element', 'page_builder' ),
		'group' => __( 'Hover Block', 'page_builder' ),
		'edit_field_class' => 'vc_col-sm-9',
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Use custom font?', 'page_builder' ),
		'param_name' => 'use_custom_fonts_hover_title',
		'description' => __( 'Enable custom font option.', 'page_builder' ),
		'group' => __( 'Hover Block', 'page_builder' ),
		'edit_field_class' => 'vc_col-sm-3',
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Hover title alignment', 'page_builder' ),
		'param_name' => 'hover_align',
		'value' => getVcShared( 'text align' ),
		'std' => 'center',
		'group' => __( 'Hover Block', 'page_builder' ),
		'description' => __( 'Select text alignment for hovered title.', 'page_builder' ),
	),
	array(
		'type' => 'textarea_html',
		'heading' => __( 'Hover text', 'page_builder' ),
		'param_name' => 'content',
		'value' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'page_builder' ),
		'group' => __( 'Hover Block', 'page_builder' ),
		'description' => __( 'Hover part text.', 'page_builder' ),
	),
), $h4_custom_heading, array(
	array(
		'type' => 'dropdown',
		'heading' => __( 'Shape', 'page_builder' ),
		'param_name' => 'shape',
		'std' => 'rounded',
		'value' => array(
			__( 'Square', 'page_builder' ) => 'square',
			__( 'Rounded', 'page_builder' ) => 'rounded',
			__( 'Round', 'page_builder' ) => 'round',
		),
		'description' => __( 'Select block shape.', 'page_builder' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Background Color', 'page_builder' ),
		'param_name' => 'hover_background_color',
		'value' => getVcShared( 'colors-dashed' ) + array( __( 'Custom', 'page_builder' ) => 'custom' ),
		'description' => __( 'Select color schema.', 'page_builder' ),
		'std' => 'grey',
		'group' => __( 'Hover Block', 'page_builder' ),
		'param_holder_class' => 'vc_colored-dropdown vc_cta3-colored-dropdown',
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Background color', 'page_builder' ),
		'param_name' => 'hover_custom_background',
		'description' => __( 'Select custom background color.', 'page_builder' ),
		'group' => __( 'Hover Block', 'page_builder' ),
		'dependency' => array(
			'element' => 'hover_background_color',
			'value' => array( 'custom' ),
		),
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Width', 'page_builder' ),
		'param_name' => 'el_width',
		'value' => array(
			'100%' => '100',
			'90%' => '90',
			'80%' => '80',
			'70%' => '70',
			'60%' => '60',
			'50%' => '50',
			'40%' => '40',
			'30%' => '30',
			'20%' => '20',
			'10%' => '10',
		),
		'description' => __( 'Select block width (percentage).', 'page_builder' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Alignment', 'page_builder' ),
		'param_name' => 'align',
		'description' => __( 'Select block alignment.', 'page_builder' ),
		'value' => array(
			__( 'Left', 'page_builder' ) => 'left',
			__( 'Right', 'page_builder' ) => 'right',
			__( 'Center', 'page_builder' ) => 'center',
		),
		'std' => 'center',
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Add button', 'page_builder' ) . '?',
		'description' => __( 'Add button for call to action.', 'page_builder' ),
		'group' => __( 'Hover Block', 'page_builder' ),
		'param_name' => 'hover_add_button',
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Reverse blocks', 'page_builder' ),
		'param_name' => 'reverse',
		'description' => __( 'Reverse hover and primary block.', 'page_builder' ),
	),
), vc_map_integrate_shortcode( 'vc_btn', 'hover_btn_', __( 'Hover Button', 'page_builder' ), array(
	'exclude' => array( 'css' ),
), array(
	'element' => 'hover_add_button',
	'not_empty' => true,
) ), array(
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
) );

return array(
	'name' => __( 'Hover Box', 'page_builder' ),
	'base' => 'vc_cta',
	'icon' => 'vc_icon-vc-hoverbox',
	'category' => array( __( 'Content', 'page_builder' ) ),
	'description' => __( 'Animated flip box with image and text', 'page_builder' ),
	'params' => $params,
);
