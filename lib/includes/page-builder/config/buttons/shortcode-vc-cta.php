<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/* Call to action
 * @since 4.5
 */
require_once vc_path_dir( 'CONFIG_DIR', 'content/vc-custom-heading-element.php' );
$h2_custom_heading = vc_map_integrate_shortcode( vc_custom_heading_element_params(), 'h2_', __( 'Heading', 'page_builder' ), array(
	'exclude' => array(
		'source',
		'text',
		'css',
	),
), array(
	'element' => 'use_custom_fonts_h2',
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
$h4_custom_heading = vc_map_integrate_shortcode( vc_custom_heading_element_params(), 'h4_', __( 'Subheading', 'page_builder' ), array(
	'exclude' => array(
		'source',
		'text',
		'css',
	),
), array(
	'element' => 'use_custom_fonts_h4',
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
		'type' => 'textfield',
		'heading' => __( 'Heading', 'page_builder' ),
		'admin_label' => true,
		'param_name' => 'h2',
		'value' => __( 'Hey! I am first heading line feel free to change me', 'page_builder' ),
		'description' => __( 'Enter text for heading line.', 'page_builder' ),
		'edit_field_class' => 'vc_col-sm-9',
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Use custom font?', 'page_builder' ),
		'param_name' => 'use_custom_fonts_h2',
		'description' => __( 'Enable Google fonts.', 'page_builder' ),
		'edit_field_class' => 'vc_col-sm-3',
	),

), $h2_custom_heading, array(
	array(
		'type' => 'textfield',
		'heading' => __( 'Subheading', 'page_builder' ),
		'param_name' => 'h4',
		'value' => '',
		'description' => __( 'Enter text for subheading line.', 'page_builder' ),
		'edit_field_class' => 'vc_col-sm-9',
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Use custom font?', 'page_builder' ),
		'param_name' => 'use_custom_fonts_h4',
		'description' => __( 'Enable custom font option.', 'page_builder' ),
		'edit_field_class' => 'vc_col-sm-3',
	),
), $h4_custom_heading, array(
	array(
		'type' => 'dropdown',
		'heading' => __( 'Text alignment', 'page_builder' ),
		'param_name' => 'txt_align',
		'value' => getVcShared( 'text align' ),
		// default left
		'description' => __( 'Select text alignment in "Call to Action" block.', 'page_builder' ),
	),
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
		'description' => __( 'Select call to action shape.', 'page_builder' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Style', 'page_builder' ),
		'param_name' => 'style',
		'value' => array(
			__( 'Classic', 'page_builder' ) => 'classic',
			__( 'Flat', 'page_builder' ) => 'flat',
			__( 'Outline', 'page_builder' ) => 'outline',
			__( '3d', 'page_builder' ) => '3d',
			__( 'Custom', 'page_builder' ) => 'custom',
		),
		'std' => 'classic',
		'description' => __( 'Select call to action display style.', 'page_builder' ),
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Background color', 'page_builder' ),
		'param_name' => 'custom_background',
		'description' => __( 'Select custom background color.', 'page_builder' ),
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'custom' ),
		),
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type' => 'colorpicker',
		'heading' => __( 'Text color', 'page_builder' ),
		'param_name' => 'custom_text',
		'description' => __( 'Select custom text color.', 'page_builder' ),
		'dependency' => array(
			'element' => 'style',
			'value' => array( 'custom' ),
		),
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Color', 'page_builder' ),
		'param_name' => 'color',
		'value' => array( __( 'Classic', 'page_builder' ) => 'classic' ) + getVcShared( 'colors-dashed' ),
		'std' => 'classic',
		'description' => __( 'Select color schema.', 'page_builder' ),
		'param_holder_class' => 'vc_colored-dropdown vc_cta3-colored-dropdown',
		'dependency' => array(
			'element' => 'style',
			'value_not_equal_to' => array( 'custom' ),
		),
	),
	array(
		'type' => 'textarea_html',
		'heading' => __( 'Text', 'page_builder' ),
		'param_name' => 'content',
		'value' => __( 'I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'page_builder' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Width', 'page_builder' ),
		'param_name' => 'el_width',
		'value' => array(
			'100%' => '',
			'90%' => 'xl',
			'80%' => 'lg',
			'70%' => 'md',
			'60%' => 'sm',
			'50%' => 'xs',
		),
		'description' => __( 'Select call to action width (percentage).', 'page_builder' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Add button', 'page_builder' ) . '?',
		'description' => __( 'Add button for call to action.', 'page_builder' ),
		'param_name' => 'add_button',
		'value' => array(
			__( 'No', 'page_builder' ) => '',
			__( 'Top', 'page_builder' ) => 'top',
			__( 'Bottom', 'page_builder' ) => 'bottom',
			__( 'Left', 'page_builder' ) => 'left',
			__( 'Right', 'page_builder' ) => 'right',
		),
	),
), vc_map_integrate_shortcode( 'vc_btn', 'btn_', __( 'Button', 'page_builder' ), array(
	'exclude' => array( 'css' ),
), array(
	'element' => 'add_button',
	'not_empty' => true,
) ), array(
	array(
		'type' => 'dropdown',
		'heading' => __( 'Add icon?', 'page_builder' ),
		'description' => __( 'Add icon for call to action.', 'page_builder' ),
		'param_name' => 'add_icon',
		'value' => array(
			__( 'No', 'page_builder' ) => '',
			__( 'Top', 'page_builder' ) => 'top',
			__( 'Bottom', 'page_builder' ) => 'bottom',
			__( 'Left', 'page_builder' ) => 'left',
			__( 'Right', 'page_builder' ) => 'right',
		),
	),
	array(
		'type' => 'checkbox',
		'param_name' => 'i_on_border',
		'heading' => __( 'Place icon on border?', 'page_builder' ),
		'description' => __( 'Display icon on call to action element border.', 'page_builder' ),
		'group' => __( 'Icon', 'page_builder' ),
		'dependency' => array(
			'element' => 'add_icon',
			'not_empty' => true,
		),
	),
), vc_map_integrate_shortcode( 'vc_icon', 'i_', __( 'Icon', 'page_builder' ), array(
	'exclude' => array(
		'align',
		'css',
	),
), array(
	'element' => 'add_icon',
	'not_empty' => true,
) ), array(
	/// cta3
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
	'name' => __( 'Call to Action', 'page_builder' ),
	'base' => 'vc_cta',
	'icon' => 'icon-wpb-call-to-action',
	'category' => array( __( 'Content', 'page_builder' ) ),
	'description' => __( 'Catch visitors attention with CTA block', 'page_builder' ),
	'since' => '4.5',
	'params' => $params,
	'js_view' => 'VcCallToActionView3',
);
