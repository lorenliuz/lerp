<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
vc_include_template( 'pages/partials/vc-roles-parts/_part.tpl.php', array(
	'part' => $part,
	'role' => $role,
	'params_prefix' => 'vc_roles[' . $role . '][' . $part . ']',
	'controller' => vc_role_access()->who( $role )->part( $part ),
	'custom_value' => 'custom',
	'capabilities' => WPBMap::getSortedAllShortCodes(),
	'ignore_capabilities' => array(
		'vc_gitem',
		'vc_gitem_animated_block',
		'vc_gitem_zone',
		'vc_gitem_zone_a',
		'vc_gitem_zone_b',
		'vc_gitem_zone_c',
		'vc_column',
		'vc_row_inner',
		'vc_column_inner',
		'vc_posts_grid',
	),
	'categories' => WPBMap::getCategories(),
	'cap_types' => array(
		array( 'all', __( 'All', 'page_builder' ) ),
		array( 'edit', __( 'Edit', 'page_builder' ) ),
	),
	'item_header_name' => __( 'Element', 'page_builder' ),
	'options' => array(
		array( true, __( 'All', 'page_builder' ) ),
		array( 'edit', __( 'Edit only', 'page_builder' ) ),
		array( 'custom', __( 'Custom', 'page_builder' ) ),
	),
	'main_label' => __( 'Elements', 'page_builder' ),
	'custom_label' => __( 'Elements', 'page_builder' ),
	'description' => __( 'Control user access to content elements.', 'page_builder' ),
	'use_table' => true,
) );
