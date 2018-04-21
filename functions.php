<?php

$ok_php = true;
if ( function_exists('phpversion') ) {
    $php_version = phpversion();
    if ( version_compare($php_version, '7.4.0') < 0 ) $ok_php = false;
}

if ( !$ok_php && !is_admin() ) {
    $title = esc_html__('PHP版本过低', 'lerp');
    $html = '<h2>' . esc_html__('OMG, PHP版本太低了', 'lerp') . '</h2>';
//    $html .= '<p>' .  esc_html__('我们已经编码了用现代技术运行的非代码主题，并且我们决定不支持PHP版本5.2 .x，因为我们想挑战我们的客户采取什么对他们的利益是最好的。通过运行过时的PHP版本5.2，您的服务器将容易受到攻击，因为它不再支持，最后一次更新是在06 2011年1月完成的。所以请让您的主机免费更新一个更新的PHP版本。您还可以查阅WordPress .Org HTTPS://WordPress .Org/Abut/Realthss/PrimeSt/这篇文章。', 'lerp') . '</p>';

    wp_die($html, $title, array('response' => 403));
}