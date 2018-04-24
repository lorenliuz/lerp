<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( 'vc_edit_form' === vc_post_param( 'action' ) && vc_verify_admin_nonce() ) {
	$link_category = array( __( 'All Links', 'page_builder' ) => '' );
	$link_cats = get_terms( 'link_category' );
	if ( is_array( $link_cats ) && ! empty( $link_cats ) ) {
		foreach ( $link_cats as $link_cat ) {
			if ( is_object( $link_cat ) && isset( $link_cat->name, $link_cat->term_id ) ) {
				$link_category[ $link_cat->name ] = $link_cat->term_id;
			}
		}
	}
} else {
	$link_category = array();
}

return array(
	'name' => 'WP ' . __( 'Links' ),
	'base' => 'vc_wp_links',
	'icon' => 'icon-wpb-wp',
	'category' => __( 'WordPress Widgets', 'page_builder' ),
	'class' => 'wpb_vc_wp_widget',
	'content_element' => (bool) get_option( 'link_manager_enabled' ),
	'weight' => - 50,
	'description' => __( 'Your blogroll', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Link Category', 'page_builder' ),
			'param_name' => 'category',
			'value' => $link_category,
			'admin_label' => true,
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'page_builder' ),
			'param_name' => 'orderby',
			'value' => array(
				__( 'Link title', 'page_builder' ) => 'name',
				__( 'Link rating', 'page_builder' ) => 'rating',
				__( 'Link ID', 'page_builder' ) => 'id',
				__( 'Random', 'page_builder' ) => 'rand',
			),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Options', 'page_builder' ),
			'param_name' => 'options',
			'value' => array(
				__( 'Show Link Image', 'page_builder' ) => 'images',
				__( 'Show Link Name', 'page_builder' ) => 'name',
				__( 'Show Link Description', 'page_builder' ) => 'description',
				__( 'Show Link Rating', 'page_builder' ) => 'rating',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Number of links to show', 'page_builder' ),
			'param_name' => 'limit',
			'value' => - 1,
		),
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
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
	),
);
