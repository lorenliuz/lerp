<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Accordion', 'page_builder' ),
	'base' => 'vc_tta_accordion',
	'icon' => 'icon-wpb-ui-accordion',
	'is_container' => true,
	'show_settings_on_create' => false,
	'as_parent' => array(
		'only' => 'vc_tta_section',
	),
	'category' => __( 'Content', 'page_builder' ),
	'description' => __( 'Collapsible content panels', 'page_builder' ),
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
			'description' => __( 'Select accordion display style.', 'page_builder' ),
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
			'description' => __( 'Select accordion shape.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'color',
			'value' => getVcShared( 'colors-dashed' ),
			'std' => 'grey',
			'heading' => __( 'Color', 'page_builder' ),
			'description' => __( 'Select accordion color.', 'page_builder' ),
			'param_holder_class' => 'vc_colored-dropdown',
		),
		array(
			'type' => 'checkbox',
			'param_name' => 'no_fill',
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
			'description' => __( 'Select accordion spacing.', 'page_builder' ),
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
			'description' => __( 'Select accordion gap.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'c_align',
			'value' => array(
				__( 'Left', 'page_builder' ) => 'left',
				__( 'Right', 'page_builder' ) => 'right',
				__( 'Center', 'page_builder' ) => 'center',
			),
			'heading' => __( 'Alignment', 'page_builder' ),
			'description' => __( 'Select accordion section title alignment.', 'page_builder' ),
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
			'description' => __( 'Select auto rotate for accordion in seconds (Note: disabled by default).', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'param_name' => 'collapsible_all',
			'heading' => __( 'Allow collapse all?', 'page_builder' ),
			'description' => __( 'Allow collapse all accordion sections.', 'page_builder' ),
		),
		// Control Icons
		array(
			'type' => 'dropdown',
			'param_name' => 'c_icon',
			'value' => array(
				__( 'None', 'page_builder' ) => '',
				__( 'Chevron', 'page_builder' ) => 'chevron',
				__( 'Plus', 'page_builder' ) => 'plus',
				__( 'Triangle', 'page_builder' ) => 'triangle',
			),
			'std' => 'plus',
			'heading' => __( 'Icon', 'page_builder' ),
			'description' => __( 'Select accordion navigation icon.', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'c_position',
			'value' => array(
				__( 'Left', 'page_builder' ) => 'left',
				__( 'Right', 'page_builder' ) => 'right',
			),
			'dependency' => array(
				'element' => 'c_icon',
				'not_empty' => true,
			),
			'heading' => __( 'Position', 'page_builder' ),
			'description' => __( 'Select accordion navigation icon position.', 'page_builder' ),
		),
		// Control Icons END
		array(
			'type' => 'textfield',
			'param_name' => 'active_section',
			'heading' => __( 'Active section', 'page_builder' ),
			'value' => 1,
			'description' => __( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'page_builder' ),
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
	'js_view' => 'VcBackendTtaAccordionView',
	'custom_markup' => '
<div class="vc_tta-container" data-vc-action="collapseAll">
	<div class="vc_general vc_tta vc_tta-accordion vc_tta-color-backend-accordion-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-controls-align-left vc_tta-gap-2">
	   <div class="vc_tta-panels vc_clearfix {{container-class}}">
	      {{ content }}
	      <div class="vc_tta-panel vc_tta-section-append">
	         <div class="vc_tta-panel-heading">
	            <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
	               <a href="javascript:;" aria-expanded="false" class="vc_tta-backend-add-control">
	                   <span class="vc_tta-title-text">' . __( 'Add Section', 'page_builder' ) . '</span>
	                    <i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
					</a>
	            </h4>
	         </div>
	      </div>
	   </div>
	</div>
</div>',
	'default_content' => '[vc_tta_section title="' . sprintf( '%s %d', __( 'Section', 'page_builder' ), 1 ) . '"][/vc_tta_section][vc_tta_section title="' . sprintf( '%s %d', __( 'Section', 'page_builder' ), 2 ) . '"][/vc_tta_section]',
);
