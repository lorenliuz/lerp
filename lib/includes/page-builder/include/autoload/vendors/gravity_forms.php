<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * @since 4.4 vendors initialization moved to hooks in autoload/vendors.
 *
 * Used to add gravity forms shortcode into WPBakery Page Builder
 */
add_action( 'plugins_loaded', 'vc_init_vendor_gravity_forms' );
function vc_init_vendor_gravity_forms() {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
	if ( is_plugin_active( 'gravityforms/gravityforms.php' ) || class_exists( 'RGForms' ) || class_exists( 'RGFormsModel' ) ) {
		// Call on map
		add_action( 'vc_after_init', 'vc_vendor_gravityforms_load' );
	} // if gravityforms active
}

function vc_vendor_gravityforms_load() {
	$gravity_forms_array[ __( 'No Gravity forms found.', 'page_builder' ) ] = '';
	if ( class_exists( 'RGFormsModel' ) ) {
		$gravity_forms = RGFormsModel::get_forms( 1, 'title' );
		if ( $gravity_forms ) {
			$gravity_forms_array = array( __( 'Select a form to display.', 'page_builder' ) => '' );
			foreach ( $gravity_forms as $gravity_form ) {
				$gravity_forms_array[ $gravity_form->title ] = $gravity_form->id;
			}
		}
	}
	vc_map( array(
		'name' => __( 'Gravity Form', 'page_builder' ),
		'base' => 'gravityform',
		'icon' => 'icon-wpb-vc_gravityform',
		'category' => __( 'Content', 'page_builder' ),
		'description' => __( 'Place Gravity form', 'page_builder' ),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __( 'Form', 'page_builder' ),
				'param_name' => 'id',
				'value' => $gravity_forms_array,
				'save_always' => true,
				'description' => __( 'Select a form to add it to your post or page.', 'page_builder' ),
				'admin_label' => true,
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Display Form Title', 'page_builder' ),
				'param_name' => 'title',
				'value' => array(
					__( 'No', 'page_builder' ) => 'false',
					__( 'Yes', 'page_builder' ) => 'true',
				),
				'save_always' => true,
				'description' => __( 'Would you like to display the forms title?', 'page_builder' ),
				'dependency' => array(
					'element' => 'id',
					'not_empty' => true,
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Display Form Description', 'page_builder' ),
				'param_name' => 'description',
				'value' => array(
					__( 'No', 'page_builder' ) => 'false',
					__( 'Yes', 'page_builder' ) => 'true',
				),
				'save_always' => true,
				'description' => __( 'Would you like to display the forms description?', 'page_builder' ),
				'dependency' => array(
					'element' => 'id',
					'not_empty' => true,
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Enable AJAX?', 'page_builder' ),
				'param_name' => 'ajax',
				'value' => array(
					__( 'No', 'page_builder' ) => 'false',
					__( 'Yes', 'page_builder' ) => 'true',
				),
				'save_always' => true,
				'description' => __( 'Enable AJAX submission?', 'page_builder' ),
				'dependency' => array(
					'element' => 'id',
					'not_empty' => true,
				),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Tab Index', 'page_builder' ),
				'param_name' => 'tabindex',
				'description' => __( '(Optional) Specify the starting tab index for the fields of this form. Leave blank if you\'re not sure what this is.',
				'page_builder' ),
				'dependency' => array(
					'element' => 'id',
					'not_empty' => true,
				),
			),
		),
	) );
}
