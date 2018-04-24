<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Tabs', 'page_builder' ),
	'base' => 'vc_tta_tabs',
	'icon' => 'icon-wpb-ui-tab-content',
	'is_container' => true,
	'show_settings_on_create' => false,
	'as_parent' => array(
		'only' => 'vc_tta_section',
	),
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Tabbed content', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'param_name' => 'title',
			'heading' => __( 'Widget title', 'page_builder' ),
			'description' => __( 'Enter text used as widget title (Note: located above content element).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'style',
			'value' => array(
				__( 'Classic', 'page_builder' ) => 'classic',
				__( 'Modern', 'page_builder' ) => 'modern',
				__( 'Flat', 'page_builder' ) => 'flat',
				__( 'Outline', 'page_builder' ) => 'outline',
			),
			'heading' => __( 'Style', 'page_builder' ),
			'description' => __( 'Select tabs display style.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'shape',
			'value' => array(
				__( 'Rounded', 'page_builder' ) => 'rounded',
				__( 'Square', 'page_builder' ) => 'square',
				__( 'Round', 'page_builder' ) => 'round',
			),
			'heading' => __( 'Shape', 'page_builder' ),
			'description' => __( 'Select tabs shape.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'color',
			'heading' => __( 'Color', 'page_builder' ),
			'description' => __( 'Select tabs color.', 'page_builder' ),
			'value' => getVcShared( 'colors-dashed' ),
			'std' => 'grey',
			'param_holder_class' => 'vc_colored-dropdown',
		),
		array(
			'type' => 'checkbox',
			'param_name' => 'no_fill_content_area',
			'heading' => __( 'Do not fill content area?', 'page_builder' ),
			'description' => __( 'Do not fill content area with color.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'spacing',
			'value' => array(
				__( 'None', 'page_builder' ) => '',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'heading' => __( 'Spacing', 'page_builder' ),
			'description' => __( 'Select tabs spacing.', 'page_builder' ),
			'std' => '1',
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'gap',
			'value' => array(
				__( 'None', 'page_builder' ) => '',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'heading' => __( 'Gap', 'page_builder' ),
			'description' => __( 'Select tabs gap.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'tab_position',
			'value' => array(
				__( 'Top', 'page_builder' ) => 'top',
				__( 'Bottom', 'page_builder' ) => 'bottom',
			),
			'heading' => __( 'Position', 'page_builder' ),
			'description' => __( 'Select tabs navigation position.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'alignment',
			'value' => array(
				__( 'Left', 'page_builder' ) => 'left',
				__( 'Right', 'page_builder' ) => 'right',
				__( 'Center', 'page_builder' ) => 'center',
			),
			'heading' => __( 'Alignment', 'page_builder' ),
			'description' => __( 'Select tabs section title alignment.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'autoplay',
			'value' => array(
				__( 'None', 'page_builder' ) => 'none',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'10' => '10',
				'20' => '20',
				'30' => '30',
				'40' => '40',
				'50' => '50',
				'60' => '60',
			),
			'std' => 'none',
			'heading' => __( 'Autoplay', 'page_builder' ),
			'description' => __( 'Select auto rotate for tabs in seconds (Note: disabled by default).', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'param_name' => 'active_section',
			'heading' => __( 'Active section', 'page_builder' ),
			'value' => 1,
			'description' => __( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'pagination_style',
			'value' => array(
				__( 'None', 'page_builder' ) => '',
				__( 'Square Dots', 'page_builder' ) => 'outline-square',
				__( 'Radio Dots', 'page_builder' ) => 'outline-round',
				__( 'Point Dots', 'page_builder' ) => 'flat-round',
				__( 'Fill Square Dots', 'page_builder' ) => 'flat-square',
				__( 'Rounded Fill Square Dots', 'page_builder' ) => 'flat-rounded',
			),
			'heading' => __( 'Pagination style', 'page_builder' ),
			'description' => __( 'Select pagination style.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'pagination_color',
			'value' => getVcShared( 'colors-dashed' ),
			'heading' => __( 'Pagination color', 'page_builder' ),
			'description' => __( 'Select pagination color.', 'page_builder' ),
			'param_holder_class' => 'vc_colored-dropdown',
			'std' => 'grey',
			'dependency' => array(
				'element' => 'pagination_style',
				'not_empty' => true,
			),
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
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'page_builder' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'page_builder' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'page_builder' ),
		),
	),
	'js_view' => 'VcBackendTtaTabsView',
	'custom_markup' => '
<div class="vc_tta-container" data-vc-action="collapse">
	<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
		<div class="vc_tta-tabs-container">'
	                   . '<ul class="vc_tta-tabs-list">'
	                   . '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
	                   . '</ul>
		</div>
		<div class="vc_tta-panels vc_clearfix {{container-class}}">
		  {{ content }}
		</div>
	</div>
</div>',
	'default_content' => '
[vc_tta_section title="' . sprintf( '%s %d', __( 'Tab', 'page_builder' ), 1 ) . '"][/vc_tta_section]
[vc_tta_section title="' . sprintf( '%s %d', __( 'Tab', 'page_builder' ), 2 ) . '"][/vc_tta_section]
	',
	'admin_enqueue_js' => array(
		vc_asset_url( 'lib/vc_tabs/vc-tabs.min.js' ),
	),
);
