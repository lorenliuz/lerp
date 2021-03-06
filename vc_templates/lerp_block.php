<?php

global $lerp_vc_block;
$lerp_vc_block = true;

$id = $inside_column = '';

extract(shortcode_atts(array(
    'id' => '',
    'inside_column' => '',
), $atts));

$id = apply_filters('wpml_object_id', $id, 'post', true);
$the_content = get_post_field('post_content', $id);

if ( class_exists('Vc_Base') ) {
    $vc = new Vc_Base();
    $vc->addShortcodesCustomCss($id);
}

if ( $inside_column === 'yes' ) {
    $the_content = str_replace('vc_row ', 'vc_row_inner ', $the_content);
    $the_content = str_replace('vc_row]', 'vc_row_inner]', $the_content);
} else {
    $the_content = $the_content;
}

echo lerp_remove_wpautop($the_content);
$lerp_vc_block = false;
