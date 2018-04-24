<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Old Tabs', 'page_builder' ),
	'base' => 'vc_tabs',
	'show_settings_on_create' => false,
	'is_container' => true,
	'icon' => 'icon-wpb-ui-tab-content',
	'category' => __( 'Content', 'page_builder' ),
	'deprecated' => '4.6',
	'description' => __( 'Tabbed content', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'page_builder' ),
			'param_name' => 'title',
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Auto rotate', 'page_builder' ),
			'param_name' => 'interval',
			'value' => array(
				__( 'Disable', 'page_builder' ) => 0,
				3,
				5,
				10,
				15,
			),
			'std' => 0,
			'description' => __( 'Auto rotate tabs each X seconds.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'page_builder' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
	),
	'custom_markup' => '
<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
<ul class="tabs_controls">
</ul>
%content%
</div>',
	'default_content' => '
[vc_tab title="' . __( 'Tab 1', 'page_builder' ) . '" tab_id=""][/vc_tab]
[vc_tab title="' . __( 'Tab 2', 'page_builder' ) . '" tab_id=""][/vc_tab]
',
	'js_view' => 'VcTabsView',
);
