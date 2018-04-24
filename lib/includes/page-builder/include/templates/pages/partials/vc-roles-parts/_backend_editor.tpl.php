<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
vc_include_template( 'pages/partials/vc-roles-parts/_part.tpl.php', array(
	'part' => $part,
	'role' => $role,
	'params_prefix' => 'vc_roles[' . $role . '][' . $part . ']',
	'controller' => vc_role_access()->who( $role )->part( $part ),
	// 'custom_value' => array(true, 'default'),
		'capabilities' => array(
			array( 'disabled_ce_editor', __( 'Disable Classic editor', 'page_builder' ) ),
		),
		'options' => array(
		array( true, __( 'Enabled', 'page_builder' ) ),
		array( 'default', __( 'Enabled and default', 'page_builder' ) ),
		array( false, __( 'Disabled', 'page_builder' ) ),
		),
		'main_label' => __( 'Backend editor', 'page_builder' ),
		'custom_label' => __( 'Backend editor', 'page_builder' ),
) );
