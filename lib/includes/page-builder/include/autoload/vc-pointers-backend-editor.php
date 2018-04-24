<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Add WP ui pointers to backend editor.
 */
function vc_add_admin_pointer() {
	if ( is_admin() ) {
		foreach ( vc_editor_post_types() as $post_type ) {
			add_filter( 'vc_ui-pointers-' . $post_type, 'vc_backend_editor_register_pointer' );
		}
	}
}

add_action( 'admin_init', 'vc_add_admin_pointer' );

function vc_backend_editor_register_pointer( $pointers ) {
	$screen = get_current_screen();
	if ( 'add' === $screen->action ) {
		$pointers['vc_pointers_backend_editor'] = array(
			'name' => 'vcPointerController',
			'messages' => array(
				array(
					'target' => '.composer-switch',
					'options' => array(
						'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
							__( 'Welcome to WPBakery Page Builder', 'page_builder' ),
							__( 'Choose Backend or Frontend editor.', 'page_builder' )
						),
						'position' => array(
							'edge' => 'left',
							'align' => 'center',
						),
						'buttonsEvent' => 'vcPointersEditorsTourEvents',
					),
				),
				array(
					'target' => '#vc_templates-editor-button, #vc-templatera-editor-button',
					'options' => array(
						'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
							__( 'Add Elements', 'page_builder' ),
							__( 'Add new element or start with a template.', 'page_builder' )
						),
						'position' => array(
							'edge' => 'left',
							'align' => 'center',
						),
						'buttonsEvent' => 'vcPointersEditorsTourEvents',
					),
					'closeEvent' => 'shortcodes:vc_row:add',
					'showEvent' => 'backendEditor.show',
				),
				array(
					'target' => '[data-vc-control="add"]:first',
					'options' => array(
						'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
							__( 'Rows and Columns', 'page_builder' ),
							__( 'This is a row container. Divide it into columns and style it. You can add elements into columns.', 'page_builder' )
						),
						'position' => array(
							'edge' => 'left',
							'align' => 'center',
						),
						'buttonsEvent' => 'vcPointersEditorsTourEvents',
					),
					'closeEvent' => 'click #wpb_visual_composer',
					'showEvent' => 'shortcodeView:ready',
				),
				array(
					'target' => '.wpb_column_container:first .wpb_content_element:first .vc_controls-cc',
					'options' => array(
						'content' => sprintf( '<h3> %s </h3> <p> %s <br/><br/> %s</p>',
							__( 'Control Elements', 'page_builder' ),
							__( 'You can edit your element at any time and drag it around your layout.', 'page_builder' ),
							sprintf( __( 'P.S. Learn more at our <a href="%s" target="_blank">Knowledge Base</a>.', 'page_builder' ), 'http://kb.wpbakery.com' )
						),
						'position' => array(
							'edge' => 'left',
							'align' => 'center',
						),
						'buttonsEvent' => 'vcPointersEditorsTourEvents',
					),
					'showCallback' => 'vcPointersShowOnContentElementControls',
					'closeEvent' => 'click #wpb_visual_composer',
				),
			),
		);
	}

	return $pointers;
}
