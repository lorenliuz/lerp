<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Old Section', 'page_builder' ),
	'base' => 'vc_accordion_tab',
	'allowed_container_element' => 'vc_row',
	'is_container' => true,
	'deprecated' => '4.6',
	'content_element' => false,
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'page_builder' ),
			'param_name' => 'title',
			'value' => __( 'Section', 'page_builder' ),
			'description' => __( 'Enter accordion section title.', 'page_builder' ),
		),
		array(
			'type' => 'el_id',
			'heading' => __( 'Section ID', 'page_builder' ),
			'param_name' => 'el_id',
			'description' => sprintf( __( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'page_builder' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . __( 'link', 'page_builder' ) . '</a>' ),
		),
	),
	'js_view' => 'VcAccordionTabView',
);
