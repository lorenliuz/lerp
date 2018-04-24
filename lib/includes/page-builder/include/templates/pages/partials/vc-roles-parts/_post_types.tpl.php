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

	'capabilities' => $vc_role->getPostTypes(),
	'options' => array(
		array( true, __( 'Pages only', 'page_builder' ) ),
		array( 'custom', __( 'Custom', 'page_builder' ) ),
		array( false, __( 'Disabled', 'page_builder' ) ),
	),
	'main_label' => __( 'Post types', 'page_builder' ),
	'custom_label' => __( 'Post types', 'page_builder' ),
	'description' => __( 'Enable WPBakery Page Builder for pages, posts and custom post types. Note: By default WPBakery Page Builder is available for pages only.', 'page_builder' ),
) );
