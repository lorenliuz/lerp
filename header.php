<?php
/**
 * 主题header
 *
 * 包含了包含内容的css
 *
 * @package lerp
 */
?>

<!DOCTYPE html>
<html class="<?php echo esc_attr($html_class); ?>" <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>">
    <?php if ( wp_is_mobile() ): ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <?php else: ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php endif; ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


