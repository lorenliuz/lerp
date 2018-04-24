<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( vc_frontend_editor()->inlineEnabled() ) {
	vc_include_template( 'pages/partials/vc-roles-parts/_part.tpl.php', array(
		'part' => $part,
		'role' => $role,
		'params_prefix' => 'vc_roles[' . $role . '][' . $part . ']',
		'controller' => vc_role_access()->who( $role )->part( $part ),
		'custom_value' => 'custom',
		'options' => array(
			array( true, __( 'Enabled', 'page_builder' ) ),
			array( false, __( 'Disabled', 'page_builder' ) ),
		),
		'main_label' => __( 'Frontend editor', 'page_builder' ),
		'custom_label' => __( 'Frontend editor', 'page_builder' ),
	) );
}

