<?php

add_action('init', 'lerp_sessions');
if ( ! function_exists( 'lerp_sessions' ) ) :
/**
 * Setup.
 * @since Lerp 1.5.1
 */
function lerp_sessions() {
	if ( version_compare(phpversion(), '5.4.0', '>=') ) {
		if ( session_id() == '' && session_status() == PHP_SESSION_NONE && !is_admin() ) {
			if ( ! headers_sent() ) {
				session_start();
				session_name( 'lerp_session' );
			}
		}
	} else {
		if ( session_id() == '' && !is_admin() ) {
			if ( ! headers_sent() ) {
				session_start();
				session_name( 'lerp_session' );
			}
		}
	}
}
endif; //lerp_sessions

define("ITEM_ID", "13373220");
define("ENVATO_KEY", "5OAZOzhz4IGXSkE7BLmT5UQ7kjALip11");

/**
 * lerp functions and definitions
 *
 * @package lerp
 */

$ok_php = true;
if ( function_exists( 'phpversion' ) ) {
	$php_version = phpversion();
	if (version_compare($php_version,'5.3.0') < 0) $ok_php = false;
}
if (!$ok_php && !is_admin()) {
	$title = esc_html__( 'PHP version obsolete','lerp' );
	$html = '<h2>' . esc_html__( 'Ooops, obsolete PHP version' ,'lerp' ) . '</h2>';
	$html .= '<p>' . sprintf( wp_kses( 'We have coded the Lerp theme to run with modern technology and we have decided not to support the PHP version 5.2.x just because we want to challenge our customer to adopt what\'s best for their interests.%sBy running obsolete version of PHP like 5.2 your server will be vulnerable to attacks since it\'s not longer supported and the last update was done the 06 January 2011.%sSo please ask your host to update to a newer PHP version for FREE.%sYou can also check for reference this post of WordPress.org <a href="https://wordpress.org/about/requirements/">https://wordpress.org/about/requirements/</a>' ,'lerp', array('a' => 'href') ), '</p><p>', '</p><p>', '</p><p>') . '</p>';

	wp_die( $html, $title, array('response' => 403) );
}


/**
 * Load the main functions.
 */
require_once get_template_directory() . '/core/inc/main.php';

/**
 * Load envato-toolkit
 */
//require_once get_template_directory() . '/core/inc/envato-toolkit/init.php';

/**
 * Load the admin functions.
 */
require_once get_template_directory() . '/core/inc/admin.php';

/**
 * Load the lerp export file.
 */
require_once get_template_directory() . '/core/inc/export/lerp_export.php';

/**
 * Font system.
 */
require_once get_template_directory() . '/core/font-system/font-system.php';

/**
* Update helpers.
*/
require_once get_template_directory() . '/core/inc/update-helpers.php';

/**
* Ajax system.
*/
require_once get_template_directory() . '/core/inc/admin-pages/ajax.php';

/**
* Notification system.
*/
require_once get_template_directory() . '/core/inc/admin-pages/notifications.php';

/**
* Communication system.
*/
require_once get_template_directory() . '/core/inc/admin-pages/communication.php';

/**
* Patch system.
*/
require_once get_template_directory() . '/core/inc/admin-pages/patches.php';

/**
 * Load the color system.
 */
require_once get_template_directory() . '/core/inc/colors.php';

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
require_once get_template_directory() . '/core/theme-options/assets/theme-mode/functions.php';

/**
 * Required: include OptionTree.
 */
load_template( get_template_directory() . '/core/theme-options/ot-loader.php' );

/**
 * Load the theme options.
 */
require_once get_template_directory() . '/core/theme-options/assets/theme-mode/theme-options.php';

/**
 * Load the main functions.
 */
require_once get_template_directory() . '/core/inc/performance.php';

/**

 * Load the theme meta boxes.
 */
require_once get_template_directory() . '/core/theme-options/assets/theme-mode/meta-boxes.php';

/**
 * Load TGM plugins activation.
 */
require_once get_template_directory() . '/core/plugins_activation/init.php';

/**
 * Load the media enhanced function.
 */
require_once( ABSPATH . WPINC . '/class-oembed.php' );
require_once get_template_directory() . '/core/inc/media-enhanced.php';

/**
 * Load the bootstrap navwalker.
 */
require_once get_template_directory() . '/core/inc/wp-bootstrap-navwalker.php';

/**
 * Load the bootstrap navwalker.
 */
require_once get_template_directory() . '/core/inc/lerp-comment-walker.php';

/**
 * Load menu builder.
 */
if ($ok_php) require_once get_template_directory() . '/partials/menus.php';

/**
 * Load header builder.
 */
if ($ok_php) require_once get_template_directory() . '/partials/headers.php';

/**
 * Load elements partial.
 */
if ($ok_php) require_once get_template_directory() . '/partials/elements.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/core/inc/template-tags.php';

/**
 * Helpers functions.
 */
require_once get_template_directory() . '/core/inc/helpers.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/core/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require_once get_template_directory() . '/core/inc/jetpack.php';

/**
 * Load gallery functions
 */
require_once get_template_directory() . '/core/inc/galleries.php';

add_action( 'after_setup_theme', 'lerp_related_post_call' );
if ( ! function_exists( 'lerp_related_post_call' ) ) :
/**
 * @since Lerp 1.5.0
 * Additional post type for related posts plugin
 */
function lerp_related_post_call() {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'related-posts-for-wp/related-posts-for-wp.php' ) ) {
		require_once get_template_directory() . '/core/inc/related-posts.php';
	}
}
endif;
