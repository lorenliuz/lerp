<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Old Call to Action Button', 'page_builder' ) . ' 2',
	'base' => 'vc_cta_button2',
	'icon' => 'icon-wpb-call-to-action',
	'deprecated' => '4.5',
	'content_element' => false,
	'category' => array( __( 'Content', 'page_builder' ) ),
	'description' => __( 'Catch visitors attention with CTA block', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Heading', 'page_builder' ),
			'admin_label' => true,
			'param_name' => 'h2',
			'value' => __( 'Hey! I am first heading line feel free to change me', 'page_builder' ),
			'description' => __( 'Enter text for heading line.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Subheading', 'page_builder' ),
			'param_name' => 'h4',
			'value' => '',
			'description' => __( 'Enter text for subheading line.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Shape', 'page_builder' ),
			'param_name' => 'style',
			'value' => getVcShared( 'cta styles' ),
			'description' => __( 'Select display shape and style.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Width', 'page_builder' ),
			'param_name' => 'el_width',
			'value' => getVcShared( 'cta widths' ),
			'description' => __( 'Select element width (percentage).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Text alignment', 'page_builder' ),
			'param_name' => 'txt_align',
			'value' => getVcShared( 'text align' ),
			'description' => __( 'Select text alignment in "Call to Action" block.', 'page_builder' ),
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Background color', 'page_builder' ),
			'param_name' => 'accent_color',
			'description' => __( 'Select background color.', 'page_builder' ),
		),
		array(
			'type' => 'textarea_html',
			'heading' => __( 'Text', 'page_builder' ),
			'param_name' => 'content',
			'value' => __( 'I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'page_builder' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'URL (Link)', 'page_builder' ),
			'param_name' => 'link',
			'description' => __( 'Add link to button (Important: adding link automatically adds button).', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Text on the button', 'page_builder' ),
			'param_name' => 'title',
			'value' => __( 'Text on the button', 'page_builder' ),
			'description' => __( 'Add text on the button.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Shape', 'page_builder' ),
			'param_name' => 'btn_style',
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
			'type' => 'dropdown',
			'heading' => __( 'Button position', 'page_builder' ),
			'param_name' => 'position',
			'value' => array(
				__( 'Right', 'page_builder' ) => 'right',
				__( 'Left', 'page_builder' ) => 'left',
				__( 'Bottom', 'page_builder' ) => 'bottom',
			),
			'description' => __( 'Select button alignment.', 'page_builder' ),
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'page_builder' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
	),
);
