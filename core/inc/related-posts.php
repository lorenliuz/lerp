<?php

/**
 * @return array
 */
function lerp_get_related_post_types() {
	$args                      = array(
		'public'   => true,
		'_builtin' => false
	);
	$output                    = 'names'; // names or objects, note names is the default
	$operator                  = 'and'; // 'and' or 'or'
	$get_post_types            = get_post_types( $args, $output, $operator );
	$lerp_related_post_types = array();
	if ( ( $key = array_search( 'lerpblock', $get_post_types ) ) !== false ) {
		unset( $get_post_types[ $key ] );
	}
	$lerp_related_post_types[] = 'post';
	$lerp_related_post_types[] = 'page';
	foreach ( $get_post_types as $key => $value ) {
		$lerp_related_post_types[] = $key;
	}
	return $lerp_related_post_types;
}

/**
 * @param array $post_types
 *
 * @return array
 */
function lerp_rp4wp_filter_supported_post_types( $post_types ) {
	return lerp_get_related_post_types();
}
add_filter( 'rp4wp_supported_post_types', 'lerp_rp4wp_filter_supported_post_types' );

function lerp_rp4wp_alter_settings( $sections ) {
	unset( $sections['styling'] );
	unset( $sections['general']['fields']['heading_text'] );
	unset( $sections['general']['fields']['excerpt_length'] );
	unset( $sections['misc']['fields']['show_love'] );
	return $sections;
}
add_filter( 'rp4wp_settings_sections', 'lerp_rp4wp_alter_settings' );

// Don't automatically append posts
add_filter( 'rp4wp_append_content', '__return_false' );

// Don't append CSS, theme will handle CSS
add_filter( 'rp4wp_disable_css', '__return_true' );

