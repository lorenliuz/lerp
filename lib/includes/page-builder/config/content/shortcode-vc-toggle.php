<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once vc_path_dir( 'CONFIG_DIR', 'content/vc-custom-heading-element.php' );
$cta_custom_heading = vc_map_integrate_shortcode( vc_custom_heading_element_params(), 'custom_', __( 'Heading', 'page_builder' ), array(
	'exclude' => array(
		'source',
		'text',
		'css',
		'link',
	),
), array(
	'element' => 'use_custom_heading',
	'value' => 'true',
) );

$params = array_merge( array(
	array(
		'type' => 'textfield',
		'holder' => 'h4',
		'class' => 'vc_toggle_title',
		'heading' => __( 'Toggle title', 'page_builder' ),
		'param_name' => 'title',
		'value' => __( 'Toggle title', 'page_builder' ),
		'description' => __( 'Enter title of toggle block.', 'page_builder' ),
		'edit_field_class' => 'vc_col-sm-9',
	),
	array(
		'type' => 'checkbox',
		'heading' => __( 'Use custom font?', 'page_builder' ),
		'param_name' => 'use_custom_heading',
		'description' => __( 'Enable Google fonts.', 'page_builder' ),
		'edit_field_class' => 'vc_col-sm-3',
	),
	array(
		'type' => 'textarea_html',
		'holder' => 'div',
		'class' => 'vc_toggle_content',
		'heading' => __( 'Toggle content', 'page_builder' ),
		'param_name' => 'content',
		'value' => __( '<p>Toggle content goes here, click edit button to change this text.</p>', 'page_builder' ),
		'description' => __( 'Toggle block content.', 'page_builder' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Style', 'page_builder' ),
		'param_name' => 'style',
		'value' => getVcShared( 'toggle styles' ),
		'description' => __( 'Select toggle design style.', 'page_builder' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Icon color', 'page_builder' ),
		'param_name' => 'color',
		'value' => array( __( 'Default', 'page_builder' ) => 'default' ) + getVcShared( 'colors' ),
		'description' => __( 'Select icon color.', 'page_builder' ),
		'param_holder_class' => 'vc_colored-dropdown',
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Size', 'page_builder' ),
		'param_name' => 'size',
		'value' => array_diff_key( getVcShared( 'sizes' ), array( 'Mini' => '' ) ),
		'std' => 'md',
		'description' => __( 'Select toggle size', 'page_builder' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => __( 'Default state', 'page_builder' ),
		'param_name' => 'open',
		'value' => array(
			__( 'Closed', 'page_builder' ) => 'false',
			__( 'Open', 'page_builder' ) => 'true',
		),
		'description' => __( 'Select "Open" if you want toggle to be open by default.', 'page_builder' ),
	),
	vc_map_add_css_animation(),
	array(
		'type' => 'el_id',
		'heading' => __( 'Element ID', 'page_builder' ),
		'param_name' => 'el_id',
		'description' => sprintf( __( 'Enter optional ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'page_builder' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . __( 'link', 'page_builder' ) . '</a>' ),
	),
	array(
		'type' => 'textfield',
		'heading' => __( 'Extra class name', 'page_builder' ),
		'param_name' => 'el_class',
		'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
	),
), $cta_custom_heading, array(
	array(
		'type' => 'css_editor',
		'heading' => __( 'CSS box', 'page_builder' ),
		'param_name' => 'css',
		'group' => __( 'Design Options', 'page_builder' ),
	),
) );

return array(
	'name' => __( 'FAQ', 'page_builder' ),
	'base' => 'vc_toggle',
	'icon' => 'icon-wpb-toggle-small-expand',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Toggle element for Q&A block', 'page_builder' ),
	'params' => $params,
	'js_view' => 'VcToggleView',
);
