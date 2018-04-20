<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!--    <link rel="stylesheet" href="--><?php //echo get_template_directory_uri() ?><!--/assets/css/plugins.css" />-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css?v=2.1.5" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/plugins/index/css/index.css?v=2.1.5" />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-loader bg-dark3">
    <div class="v-center t-center">
        <div class="spinner">
            <div class="spinner__item1 bg-white"></div>
            <div class="spinner__item2 bg-white"></div>
            <div class="spinner__item3 bg-white"></div>
            <div class="spinner__item4 bg-white"></div>
        </div>
    </div>
</div>
