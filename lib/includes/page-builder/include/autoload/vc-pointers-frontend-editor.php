<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Add WP ui pointers to backend editor.
 */
function vc_frontend_editor_pointer() {
	vc_is_frontend_editor() && add_filter( 'vc-ui-pointers', 'vc_frontend_editor_register_pointer' );
}

add_action( 'admin_init', 'vc_frontend_editor_pointer' );

function vc_frontend_editor_register_pointer( $pointers ) {
	global $post;
	if ( is_object( $post ) && ! strlen( $post->post_content ) ) {
		$pointers['vc_pointers_frontend_editor'] = array(
			'name' => 'vcPointerController',
			'messages' => array(
				array(
					'target' => '#vc_add-new-element',
					'options' => array(
						'content' => sprintf( '<h3> %s </h3> <p> %s </p>',
							__( 'Add Elements', 'page_builder' ),
							__( 'Add new element or start with a template.', 'page_builder' )
						),
						'position' => array(
							'edge' => 'top',
							'align' => 'left',
						),
						'buttonsEvent' => 'vcPointersEditorsTourEvents',
					),
					'closeEvent' => 'shortcodes:add',
				),
				array(
					'target' => '.vc_controls-out-tl:first',
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
					'closeCallback' => 'vcPointersCloseInIFrame',
					'showCallback' => 'vcPointersSetInIFrame',
				),
				array(
					'target' => '.vc_controls-cc:first',
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
					'closeCallback' => 'vcPointersCloseInIFrame',
					'showCallback' => 'vcPointersSetInIFrame',
				),
			),
		);
	}

	return $pointers;
}

// @todo check is this correct place (editable page)
function vc_page_editable_enqueue_pointer_scripts() {
	if ( vc_is_page_editable() ) {
		wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );
	}
}

add_action( 'wp_enqueue_scripts', 'vc_page_editable_enqueue_pointer_scripts' );
