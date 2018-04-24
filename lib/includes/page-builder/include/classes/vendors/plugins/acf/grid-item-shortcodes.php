<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$groups = function_exists( 'acf_get_field_groups' ) ? acf_get_field_groups() : apply_filters( 'acf/get_field_groups', array() );
$groups_param_values = $fields_params = array();
foreach ( $groups as $group ) {
	$id = isset( $group['id'] ) ? 'id' : ( isset( $group['ID'] ) ? 'ID' : 'id' );
	$groups_param_values[ $group['title'] ] = $group[ $id ];
	$fields = function_exists( 'acf_get_fields' ) ? acf_get_fields( $group[ $id ] ) : apply_filters( 'acf/field_group/get_fields', array(), $group[ $id ] );
	$fields_param_value = array();
	foreach ( (array) $fields as $field ) {
		$fields_param_value[ $field['label'] ] = (string) $field['key'];
	}
	$fields_params[] = array(
		'type' => 'dropdown',
		'heading' => __( 'Field name', 'page_builder' ),
		'param_name' => 'field_from_' . $group[ $id ],
		'value' => $fields_param_value,
		'save_always' => true,
		'description' => __( 'Select field from group.', 'page_builder' ),
		'dependency' => array(
			'element' => 'field_group',
			'value' => array( (string) $group[ $id ] ),
		),
	);
}

return array(
	'vc_gitem_acf' => array(
		'name' => __( 'Advanced Custom Field', 'page_builder' ),
		'base' => 'vc_gitem_acf',
		'icon' => 'vc_icon-acf',
		'category' => __( 'Content', 'page_builder' ),
		'description' => __( 'Advanced Custom Field', 'page_builder' ),
		'php_class_name' => 'Vc_Gitem_Acf_Shortcode',
		'params' => array_merge(
			array(
				array(
					'type' => 'dropdown',
					'heading' => __( 'Field group', 'page_builder' ),
					'param_name' => 'field_group',
					'value' => $groups_param_values,
					'save_always' => true,
					'description' => __( 'Select field group.', 'page_builder' ),
				),
			), $fields_params,
			array(
				array(
					'type' => 'checkbox',
					'heading' => __( 'Show label', 'page_builder' ),
					'param_name' => 'show_label',
					'value' => array( __( 'Yes', 'page_builder' ) => 'yes' ),
					'description' => __( 'Enter label to display before key value.', 'page_builder' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Align', 'page_builder' ),
					'param_name' => 'align',
					'value' => array(
						__( 'left', 'page_builder' ) => 'left',
						__( 'right', 'page_builder' ) => 'right',
						__( 'center', 'page_builder' ) => 'center',
						__( 'justify', 'page_builder' ) => 'justify',
					),
					'description' => __( 'Select alignment.', 'page_builder' ),
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'page_builder' ),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
				),
			)
		),
		'post_type' => Vc_Grid_Item_Editor::postType(),
	),
);
