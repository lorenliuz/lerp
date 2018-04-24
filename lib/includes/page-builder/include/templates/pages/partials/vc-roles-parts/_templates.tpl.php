<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
vc_include_template( 'pages/partials/vc-roles-parts/_part.tpl.php', array(
	'part' => $part,
	'role' => $role,
	'params_prefix' => 'vc_roles[' . $role . '][' . $part . ']',
	'controller' => vc_role_access()->who( $role )->part( $part ),
	'options' => array(
		array( true, __( 'All', 'page_builder' ) ),
		array( 'add', __( 'Apply templates only', 'page_builder' ) ),
		array( false, __( 'Disabled', 'page_builder' ) ),
	),
	'main_label' => __( 'Templates', 'page_builder' ),
	'description' => __( 'Control access rights to templates and predefined templates. Note: "Apply templates only" restricts users from saving new templates and deleting existing.', 'page_builder' ),
) );
