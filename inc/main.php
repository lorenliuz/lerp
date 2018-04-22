<?php

$theme = wp_get_theme();

define('LERP_VERSION', $theme->get( 'Version' ), true);
define('LERP_NAME', $theme->get( 'Name' ), true);


if ( !function_exists('lerp_setup') ) {

    /**
     * 设置主题的默认值
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */

    function lerp_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on lerp, use a find and replace
         * to change 'lerp' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'lerp', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );


    }


}