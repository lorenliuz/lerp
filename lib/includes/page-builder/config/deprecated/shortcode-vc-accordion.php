<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Old Accordion', 'page_builder' ),
	'base' => 'vc_accordion',
	'show_settings_on_create' => false,
	'is_container' => true,
	'icon' => 'icon-wpb-ui-accordion',
	'deprecated' => '4.6',
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Collapsible content panels', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Active section', 'page_builder' ),
			'param_name' => 'active_tab',
			'value' => 1,
			'description' => __( 'Enter section number to be active on load or enter "false" to collapse all sections.', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Allow collapse all sections?', 'page_builder' ),
			'param_name' => 'collapsible',
			'description' => __( 'If checked, it is allowed to collapse all sections.', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Disable keyboard interactions?', 'page_builder' ),
			'param_name' => 'disable_keyboard',
			'description' => __( 'If checked, disables keyboard arrow interactions (Keys: Left, Up, Right, Down, Space).', 'page_builder' ),
			'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'page_builder' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
	),
	'custom_markup' => '
<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
%content%
</div>
<div class="tab_controls">
    <a class="add_tab" title="' . __( 'Add section', 'page_builder' ) . '"><span class="vc_icon"></span> <span class="tab-label">' . __( 'Add section', 'page_builder' ) . '</span></a>
</div>
',
	'default_content' => '
    [vc_accordion_tab title="' . __( 'Section 1', 'page_builder' ) . '"][/vc_accordion_tab]
    [vc_accordion_tab title="' . __( 'Section 2', 'page_builder' ) . '"][/vc_accordion_tab]
',
	'js_view' => 'VcAccordionView',
);
