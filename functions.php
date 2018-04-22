<?php

add_action('init', 'lerp_sessions');

if ( !function_exists('lerp_sessions') ) {
    /**
     * Setup.
     */
    function lerp_sessions()
    {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            if ( session_id() == '' && session_status() == PHP_SESSION_NONE && !is_admin() ) {
                if ( !headers_sent() ) {
                    session_start();
                    session_name('lerp_session');
                }
            }
        } else {
            if ( session_id() == '' && !is_admin() ) {
                if ( !headers_sent() ) {
                    session_start();
                    session_name('lerp_session');
                }
            }
        }
    }
}


/**
 * lerp functions and definitions
 *
 * @package lerp
 */

$ok_php = true;
if ( function_exists('phpversion') ) {
    $php_version = phpversion();
    if ( version_compare($php_version, '5.3.0') < 0 ) $ok_php = false;
}
if ( !$ok_php && !is_admin() ) {
    $title = esc_html__('PHP版本过低', 'lerp');
    $html = '<h2>' . esc_html__('OMG, PHP版本太低了', 'lerp') . '</h2>';
    $html .= '<p>' . sprintf(wp_kses('Lerp主题采用了最新的技术，并且不再支持PHP 5.2.x。%s通过运行过时的PHP版本5.2，您的服务器将容易受到攻击。',
            'lerp'),
            '</p><p>') . '</p>';

    wp_die($html, $title, array('response' => 403));
}


/**
 * Load the main functions.
 */
require_once get_template_directory() . '/inc/main.php';


/**
 * Load the admin functions.
 */
require_once get_template_directory() . '/inc/admin.php';


/**
 * Load the lerp export file.
 */
require_once get_template_directory() . '/inc/export/lerp-export.php';

/**
 * Font system.
 */
require_once get_template_directory() . '/inc/font-system/font-system.php';

/**
 * Update helpers.
 */
require_once get_template_directory() . '/inc/update-helpers.php';

/**
 * Ajax system.
 */
require_once get_template_directory() . '/inc/admin-pages/ajax.php';

/**
 * Notification system.
 */
require_once get_template_directory() . '/inc/admin-pages/notifications.php';


/**
 * Required: set 'ot_theme_mode' filter to true.
 */
require_once get_template_directory() . '/inc/theme-options/assets/theme-mode/functions.php';

/**
 * Required: include OptionTree.
 */
load_template( get_template_directory() . '/inc/theme-options/ot-loader.php' );

/**
 * Load the theme options.
 */
require_once get_template_directory() . '/inc/theme-options/assets/theme-mode/theme-options.php';

/**
 * Load the main functions.
 */
require_once get_template_directory() . '/inc/performance.php';

/**

 * Load the theme meta boxes.
 */
require_once get_template_directory() . '/inc/theme-options/assets/theme-mode/meta-boxes.php';











