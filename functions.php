<?php

$ok_php = true;
if ( function_exists('phpversion') ) {
    $php_version = phpversion();
    if ( version_compare($php_version, '5.2.0') < 0 ) $ok_php = false;
}

if ( !$ok_php && !is_admin() ) {
    $title = esc_html__('PHP版本过低', 'lerp');
    $html = '<h2>' . esc_html__('OMG, PHP版本太低了', 'lerp') . '</h2>';
    $html .= '<p>' . sprintf(wp_kses('Lerp主题采用了最新的技术，并且不再支持PHP 5.2.x。%s通过运行过时的PHP版本5.2，您的服务器将容易受到攻击。',
            'lerp'),
            '</p><p>') . '</p>';

    wp_die($html, $title, array('response' => 403));
}