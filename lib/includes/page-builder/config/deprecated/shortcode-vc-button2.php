<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Old Button', 'page_builder' ) . ' 2',
	'base' => 'vc_button2',
	'icon' => 'icon-wpb-ui-button',
	'deprecated' => '4.5',
	'content_element' => false,
	'category' => array(
		__( 'Content', 'page_builder' ),
	),
	'description' => __( 'Eye catching button', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'vc_link',
			'heading' => __( 'URL (Link)', 'page_builder' ),
			'param_name' => 'link',
			'description' => __( 'Add link to button.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Text', 'page_builder' ),
			'holder' => 'button',
			'class' => 'vc_btn',
			'param_name' => 'title',
			'value' => __( 'Text on the button', 'page_builder' ),
			'description' => __( 'Enter text on the button.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Alignment', 'page_builder' ),
			'param_name' => 'align',
			'value' => array(
				__( 'Inline', 'page_builder' ) => 'inline',
				__( 'Left', 'page_builder' ) => 'left',
				__( 'Center', 'page_builder' ) => 'center',
				__( 'Right', 'page_builder' ) => 'right',
			),
			'description' => __( 'Select button alignment.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Shape', 'page_builder' ),
			'param_name' => 'style',
			'value' => getVcShared( 'button styles' ),
			'description' => __( 'Select button display style and shape.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Color', 'page_builder' ),
			'param_name' => 'color',
			'value' => getVcShared( 'colors' ),
			'description' => __( 'Select button color.', 'page_builder' ),
			'param_holder_class' => 'vc_colored-dropdown',
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'page_builder' ),
			'param_name' => 'size',
			'value' => getVcShared( 'sizes' ),
			'std' => 'md',
			'description' => __( 'Select button size.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'page_builder' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
	),
	'js_view' => 'VcButton2View',
);
