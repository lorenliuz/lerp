<?php

global $lerp_colors, $lerp_colors_w_transp;

$flat_lerp_colors = array();
if ( !empty($lerp_colors) ) {
    foreach ( $lerp_colors as $key => $value ) {
        $flat_lerp_colors[$value[1]] = $value[0];
    }
}

$units = array(
    '1/12' => '1',
    '2/12' => '2',
    '3/12' => '3',
    '4/12' => '4',
    '5/12' => '5',
    '6/12' => '6',
    '7/12' => '7',
    '8/12' => '8',
    '9/12' => '9',
    '10/12' => '10',
    '11/12' => '11',
    '12/12' => '12',
);

$size_arr = array(
    esc_html__('Standard', 'lerp') => '',
    esc_html__('Small', 'lerp') => 'btn-sm',
    esc_html__('Large', 'lerp') => 'btn-lg',
    esc_html__('Extra-Large', 'lerp') => 'btn-xl',
    esc_html__('Button link', 'lerp') => 'btn-link',
    esc_html__('Standard link', 'lerp') => 'link',
);

$icon_sizes = array(
    esc_html__('Standard', 'lerp') => '',
    esc_html__('2x', 'lerp') => 'fa-2x',
    esc_html__('3x', 'lerp') => 'fa-3x',
    esc_html__('4x', 'lerp') => 'fa-4x',
    esc_html__('5x', 'lerp') => 'fa-5x',
);

$heading_semantic = array(
    esc_html__('h1', 'lerp') => 'h1',
    esc_html__('h2', 'lerp') => 'h2',
    esc_html__('h3', 'lerp') => 'h3',
    esc_html__('h4', 'lerp') => 'h4',
    esc_html__('h5', 'lerp') => 'h5',
    esc_html__('h6', 'lerp') => 'h6',
    esc_html__('p', 'lerp') => 'p',
    esc_html__('div', 'lerp') => 'div'
);

$heading_size = array(
    esc_html__('Default CSS', 'lerp') => '',
    esc_html__('h1', 'lerp') => 'h1',
    esc_html__('h2', 'lerp') => 'h2',
    esc_html__('h3', 'lerp') => 'h3',
    esc_html__('h4', 'lerp') => 'h4',
    esc_html__('h5', 'lerp') => 'h5',
    esc_html__('h6', 'lerp') => 'h6',
);

$font_sizes = (function_exists('ot_get_option')) ? ot_get_option('_lerp_heading_font_sizes') : array();
if ( !empty($font_sizes) ) {
    foreach ( $font_sizes as $key => $value ) {
        $heading_size[$value['title']] = $value['_lerp_heading_font_size_unique_id'];
    }
}

$heading_size[esc_html__('BigText', 'lerp')] = 'bigtext';

$font_heights = (function_exists('ot_get_option')) ? ot_get_option('_lerp_heading_font_heights') : array();
$heading_height = array(
    esc_html__('Default CSS', 'lerp') => '',
);
if ( !empty($font_heights) ) {
    foreach ( $font_heights as $key => $value ) {
        $heading_height[$value['title']] = $value['_lerp_heading_font_height_unique_id'];
    }
}

$font_spacings = (function_exists('ot_get_option')) ? ot_get_option('_lerp_heading_font_spacings') : array();
$heading_space = array(
    esc_html__('Default CSS', 'lerp') => '',
);

$btn_letter_spacing = array(
    esc_html__('Letter Spacing 0', 'lerp') => 'lerp-fontspace-zero',
);

if ( !empty($font_spacings) ) {
    foreach ( $font_spacings as $key => $value ) {
        $btn_letter_spacing[$value['title']] = $heading_space[$value['title']] = $value['_lerp_heading_font_spacing_unique_id'];
    }
}

if ( isset($fonts) && is_array($fonts) ) {
    foreach ( $fonts as $key => $value ) {
        $heading_font[$value['title']] = $value['_lerp_font_group_unique_id'];
    }
}

$fonts = (function_exists('ot_get_option')) ? ot_get_option('_lerp_font_groups') : array();
$heading_font = array(
    esc_html__('Default CSS', 'lerp') => '',
);

if ( isset($fonts) && is_array($fonts) ) {
    foreach ( $fonts as $key => $value ) {
        $button_font[$value['title']] = $heading_font[$value['title']] = $value['_lerp_font_group_unique_id'];
    }
}

$heading_weight = array(
    esc_html__('Default CSS', 'lerp') => '',
    esc_html__('100', 'lerp') => 100,
    esc_html__('200', 'lerp') => 200,
    esc_html__('300', 'lerp') => 300,
    esc_html__('400', 'lerp') => 400,
    esc_html__('500', 'lerp') => 500,
    esc_html__('600', 'lerp') => 600,
    esc_html__('700', 'lerp') => 700,
    esc_html__('800', 'lerp') => 800,
    esc_html__('900', 'lerp') => 900,
);

$button_weight = array(
    esc_html__('100', 'lerp') => 100,
    esc_html__('200', 'lerp') => 200,
    esc_html__('300', 'lerp') => 300,
    esc_html__('400', 'lerp') => 400,
    esc_html__('500', 'lerp') => 500,
    esc_html__('600', 'lerp') => 600,
    esc_html__('700', 'lerp') => 700,
    esc_html__('800', 'lerp') => 800,
    esc_html__('900', 'lerp') => 900,
);

$target_arr = array(
    esc_html__('Same window', 'lerp') => '_self',
    esc_html__('New window', 'lerp') => "_blank"
);

$border_style = array(
    esc_html__('None', 'lerp') => '',
    esc_html__('Solid', 'lerp') => 'solid',
    esc_html__('Dotted', 'lerp') => 'dotted',
    esc_html__('Dashed', 'lerp') => 'dashed',
    esc_html__('Double', 'lerp') => 'double',
    esc_html__('Groove', 'lerp') => 'groove',
    esc_html__('Ridge', 'lerp') => 'ridge',
    esc_html__('Inset', 'lerp') => 'inset',
    esc_html__('Outset', 'lerp') => 'outset',
    esc_html__('Initial', 'lerp') => 'initial',
    esc_html__('Inherit', 'lerp') => 'inherit',
);

$add_css_animation = array(
    'type' => 'dropdown',
    'heading' => esc_html__('Animation', 'lerp'),
    'param_name' => 'css_animation',
    'admin_label' => true,
    'value' => array(
        esc_html__('No', 'lerp') => '',
        esc_html__('Opacity', 'lerp') => 'alpha-anim',
        esc_html__('Zoom in', 'lerp') => 'zoom-in',
        esc_html__('Zoom out', 'lerp') => 'zoom-out',
        esc_html__('Top to bottom', 'lerp') => 'top-t-bottom',
        esc_html__('Bottom to top', 'lerp') => 'bottom-t-top',
        esc_html__('Left to right', 'lerp') => 'left-t-right',
        esc_html__('Right to left', 'lerp') => 'right-t-left',
    ),
    'group' => esc_html__('Animation', 'lerp'),
    'description' => esc_html__('Specify the entrance animation.', 'lerp')
);

$add_animation_delay = array(
    'type' => 'dropdown',
    'heading' => esc_html__('Animation delay', 'lerp'),
    'param_name' => 'animation_delay',
    'value' => array(
        esc_html__('None', 'lerp') => '',
        esc_html__('ms 100', 'lerp') => 100,
        esc_html__('ms 200', 'lerp') => 200,
        esc_html__('ms 300', 'lerp') => 300,
        esc_html__('ms 400', 'lerp') => 400,
        esc_html__('ms 500', 'lerp') => 500,
        esc_html__('ms 600', 'lerp') => 600,
        esc_html__('ms 700', 'lerp') => 700,
        esc_html__('ms 800', 'lerp') => 800,
        esc_html__('ms 900', 'lerp') => 900,
        esc_html__('ms 1000', 'lerp') => 1000,
        esc_html__('ms 1100', 'lerp') => 1100,
        esc_html__('ms 1200', 'lerp') => 1200,
        esc_html__('ms 1300', 'lerp') => 1300,
        esc_html__('ms 1400', 'lerp') => 1400,
        esc_html__('ms 1500', 'lerp') => 1500,
        esc_html__('ms 1600', 'lerp') => 1600,
        esc_html__('ms 1700', 'lerp') => 1700,
        esc_html__('ms 1800', 'lerp') => 1800,
        esc_html__('ms 1900', 'lerp') => 1900,
        esc_html__('ms 2000', 'lerp') => 2000,
    ),
    'group' => esc_html__('Animation', 'lerp'),
    'description' => esc_html__('Specify the entrance animation delay in milliseconds.', 'lerp'),
    'admin_label' => true,
    'dependency' => array(
        'element' => 'css_animation',
        'not_empty' => true
    )
);

$add_animation_speed = array(
    'type' => 'dropdown',
    'heading' => esc_html__('Animation speed', 'lerp'),
    'param_name' => 'animation_speed',
    'admin_label' => true,
    'value' => array(
        esc_html__('Default (400)', 'lerp') => '',
        esc_html__('ms 100', 'lerp') => 100,
        esc_html__('ms 200', 'lerp') => 200,
        esc_html__('ms 300', 'lerp') => 300,
        esc_html__('ms 400', 'lerp') => 400,
        esc_html__('ms 500', 'lerp') => 500,
        esc_html__('ms 600', 'lerp') => 600,
        esc_html__('ms 700', 'lerp') => 700,
        esc_html__('ms 800', 'lerp') => 800,
        esc_html__('ms 900', 'lerp') => 900,
        esc_html__('ms 1000', 'lerp') => 1000,
    ),
    'group' => esc_html__('Animation', 'lerp'),
    'description' => esc_html__('Specify the entrance animation speed in milliseconds.', 'lerp'),
    'dependency' => array(
        'element' => 'css_animation',
        'not_empty' => true
    )
);

$add_background_repeat = array(
    'type' => 'dropdown',
    'heading' => '',
    'description' => wp_kses(__('Define the background repeat. <a href=\'http://www.w3schools.com/cssref/pr_background-repeat.asp\' target=\'_blank\'>Check this for reference</a>', 'lerp'), array('a' => array('href' => array(), 'target' => array()))),
    'param_name' => 'back_repeat',
    'param_holder_class' => 'background-image-settings',
    'value' => array(
        esc_html__('background-repeat', 'lerp') => '',
        esc_html__('No Repeat', 'lerp') => 'no-repeat',
        esc_html__('Repeat All', 'lerp') => 'repeat',
        esc_html__('Repeat Horizontally', 'lerp') => 'repeat-x',
        esc_html__('Repeat Vertically', 'lerp') => 'repeat-y',
        esc_html__('Inherit', 'lerp') => 'inherit'
    ),
    'dependency' => array(
        'element' => 'back_image',
        'not_empty' => true,
    ),
    "group" => esc_html__("Style", 'lerp')
);

$add_background_attachment = array(
    'type' => 'dropdown',
    'heading' => '',
    "description" => wp_kses(__("Define the background attachment. <a href='http://www.w3schools.com/cssref/pr_background-attachment.asp' target='_blank'>Check this for reference</a>", 'lerp'), array('a' => array('href' => array(), 'target' => array()))),
    'param_name' => 'back_attachment',
    'value' => array(
        esc_html__('background-attachment', 'lerp') => '',
        esc_html__('Fixed', 'lerp') => 'fixed',
        esc_html__('Scroll', 'lerp') => 'scroll',
        esc_html__('Inherit', 'lerp') => 'inherit'
    ),
    'dependency' => array(
        'element' => 'back_image',
        'not_empty' => true,
    ),
    "group" => esc_html__("Style", 'lerp')
);

$add_background_position = array(
    'type' => 'dropdown',
    'heading' => '',
    "description" => wp_kses(__("Define the background position. <a href='http://www.w3schools.com/cssref/pr_background-position.asp' target='_blank'>Check this for reference</a>", 'lerp'), array('a' => array('href' => array(), 'target' => array()))),
    'param_name' => 'back_position',
    'value' => array(
        esc_html__('background-position', 'lerp') => '',
        esc_html__('Left Top', 'lerp') => 'left top',
        esc_html__('Left Center', 'lerp') => 'left center',
        esc_html__('Left Bottom', 'lerp') => 'left bottom',
        esc_html__('Center Top', 'lerp') => 'center top',
        esc_html__('Center Center', 'lerp') => 'center center',
        esc_html__('Center Bottom', 'lerp') => 'center bottom',
        esc_html__('Right Top', 'lerp') => 'right top',
        esc_html__('Right Center', 'lerp') => 'right center',
        esc_html__('Right Bottom', 'lerp') => 'right bottom'
    ),
    'dependency' => array(
        'element' => 'back_image',
        'not_empty' => true,
    ),
    "group" => esc_html__("Style", 'lerp')
);

$add_background_size = array(
    'type' => 'textfield',
    'heading' => '',
    "description" => wp_kses(__("Define the background size (Default value is 'cover'). <a href='http://www.w3schools.com/cssref/css3_pr_background-size.asp' target='_blank'>Check this for reference</a>", 'lerp'), array('a' => array('href' => array(), 'target' => array()))),
    'param_name' => 'back_size',
    'dependency' => array(
        'element' => 'back_image',
        'not_empty' => true,
    ),
    "group" => esc_html__("Style", 'lerp')
);

vc_map(array(
    'name' => esc_html__('Section', 'lerp'),
    'base' => 'vc_section',
    'is_container' => true,
    'icon' => 'fa fa-marquee',
    'show_settings_on_create' => false,
    'category' => esc_html__('Content', 'lerp'),
    'as_parent' => array(
        'only' => 'vc_row',
    ),
    'as_child' => array(
        'only' => '', // Only root
    ),
    'class' => 'vc_main-sortable-element',
    'description' => esc_html__('Group multiple rows in section', 'lerp'),
    'params' => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Background color", 'lerp'),
            "param_name" => "back_color",
            "description" => esc_html__("Specify a background color for the row.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Automatic background", 'lerp'),
            "param_name" => "back_image_auto",
            "description" => esc_html__("Activate to pickup the background media from the category.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
            "group" => esc_html__("Style", 'lerp'),
        ),
        array(
            "type" => "media_element",
            "heading" => esc_html__("Background media", 'lerp'),
            "param_name" => "back_image",
            "value" => "",
            "description" => esc_html__("Specify a media from the Media Library.", 'lerp'),
            "group" => esc_html__("Style", 'lerp')
        ),
        $add_background_repeat,
        $add_background_attachment,
        $add_background_position,
        $add_background_size,
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Parallax", 'lerp'),
            "param_name" => "parallax",
            "description" => esc_html__("Activate the background Parallax effect. NB. Not available with Slides Scroll.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Style", 'lerp'),
            "dependency" => array(
                'element' => "back_image",
                'not_empty' => true
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Overlay color", 'lerp'),
            "param_name" => "overlay_color",
            "description" => esc_html__("Specify an overlay color for the background.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => '',
            "param_name" => "overlay_alpha",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 50,
            "description" => esc_html__("Set the transparency for the overlay.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Desktop", 'lerp'),
            "param_name" => "desktop_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in desktop layout mode (960px >).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Tablet", 'lerp'),
            "param_name" => "medium_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in tablet layout mode (570px > < 960px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Mobile", 'lerp'),
            "param_name" => "mobile_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in mobile layout mode (< 570px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp'),
            "group" => esc_html__("Extra", 'lerp')
        ),
    ),
    'js_view' => 'LerpSectionView',
));

vc_map(array(
    'name' => esc_html__('Row', 'lerp'),
    'base' => 'vc_row',
    'weight' => 1000,
    'php_class_name' => 'lerp_row',
    'is_container' => true,
    'icon' => 'fa fa-align-justify',
    'show_settings_on_create' => false,
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Row container element', 'lerp'),
    'params' => array(
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Container width", 'lerp'),
            "param_name" => "unlock_row",
            "description" => esc_html__("Define the width of the container.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
            "std" => 'yes',
            "group" => esc_html__("Aspect", 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Content width", 'lerp'),
            "param_name" => "unlock_row_content",
            "description" => esc_html__("Define the width of the content area.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
            "group" => esc_html__("Aspect", 'lerp'),
            'dependency' => array(
                'element' => 'unlock_row',
                'value' => 'yes'
            )
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Height", 'lerp'),
            "param_name" => "row_height_percent",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 0,
            "description" => wp_kses(__("Set the row height with a percent value.<br>NB. This value is including the top and bottom padding.", 'lerp'), array('br' => array())),
            "group" => esc_html__("Aspect", 'lerp'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__("Min height", 'lerp'),
            'param_name' => 'row_height_pixel',
            'description' => esc_html__("Insert the row minimum height in pixel.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Custom padding", 'lerp'),
            "param_name" => "override_padding",
            "description" => esc_html__('Activate this to define custom paddings.', 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            "value" => array(
                '' => 'yes'
            )
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Left and right padding", 'lerp'),
            "param_name" => "h_padding",
            "min" => 0,
            "max" => 7,
            "step" => 1,
            "value" => 2,
            "description" => esc_html__("Set the left and right padding.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            "dependency" => Array(
                'element' => "override_padding",
                'value' => array(
                    'yes'
                )
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Top padding", 'lerp'),
            "param_name" => "top_padding",
            "min" => 0,
            "max" => 7,
            "step" => 1,
            "value" => 2,
            "description" => esc_html__("Set the top padding.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            "dependency" => Array(
                'element' => "override_padding",
                'value' => array(
                    'yes'
                )
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Bottom padding", 'lerp'),
            "param_name" => "bottom_padding",
            "min" => 0,
            "max" => 7,
            "step" => 1,
            "value" => 2,
            "description" => esc_html__("Set the bottom padding.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            "dependency" => Array(
                'element' => "override_padding",
                'value' => array(
                    'yes'
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Background color", 'lerp'),
            "param_name" => "back_color",
            "description" => esc_html__("Specify a background color for the row.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Automatic background", 'lerp'),
            "param_name" => "back_image_auto",
            "description" => esc_html__("Activate to pickup the background media from the category.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
            "group" => esc_html__("Style", 'lerp'),
        ),
        array(
            "type" => "media_element",
            "heading" => esc_html__("Background media", 'lerp'),
            "param_name" => "back_image",
            "value" => "",
            "description" => esc_html__("Specify a media from the Media Library.", 'lerp'),
            "group" => esc_html__("Style", 'lerp')
        ),
        $add_background_repeat,
        $add_background_attachment,
        $add_background_position,
        $add_background_size,
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Parallax", 'lerp'),
            "param_name" => "parallax",
            "description" => esc_html__("Activate the background Parallax effect. NB. Not available with Slides Scroll.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Style", 'lerp'),
            "dependency" => array(
                'element' => "back_image",
                'not_empty' => true
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Ken Burns", 'lerp'),
            "param_name" => "kburns",
            "description" => esc_html__("Activate the background Ken Burns effect.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Style", 'lerp'),
            "dependency" => array(
                'element' => "back_image",
                'not_empty' => true
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Overlay color", 'lerp'),
            "param_name" => "overlay_color",
            "description" => esc_html__("Specify an overlay color for the background.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => '',
            "param_name" => "overlay_alpha",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 50,
            "description" => esc_html__("Set the transparency for the overlay.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Columns with equal height", 'lerp'),
            "param_name" => "equal_height",
            "description" => esc_html__("Activate this to have columns that are all equally tall, matching the height of the tallest.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Inner columns", 'lerp')
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Columns gap", 'lerp'),
            "param_name" => "gutter_size",
            "min" => 0,
            "max" => 4,
            "step" => 1,
            "value" => 3,
            "description" => esc_html__("Set the columns gap.", 'lerp'),
            "group" => esc_html__("Inner columns", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Content width", 'lerp'),
            "param_name" => "column_width_use_pixel",
            "edit_field_class" => 'vc_col-sm-12 vc_column row_height',
            "description" => 'Set this value if you want to constrain the column width.',
            "group" => esc_html__("Inner columns", 'lerp'),
            "value" => array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => '',
            "param_name" => "column_width_percent",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 100,
            "description" => esc_html__("Set the column width with a percent value.", 'lerp'),
            "group" => esc_html__("Inner columns", 'lerp'),
            'dependency' => array(
                'element' => 'column_width_use_pixel',
                'is_empty' => true,
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => '',
            'param_name' => 'column_width_pixel',
            'description' => esc_html__("Insert the column width in pixel.", 'lerp'),
            "group" => esc_html__("Inner columns", 'lerp'),
            'dependency' => array(
                'element' => 'column_width_use_pixel',
                'not_empty' => true
            )
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'lerp'),
            'param_name' => 'css',
            'group' => esc_html__('Custom', 'lerp')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border color", 'lerp'),
            "param_name" => "border_color",
            "description" => esc_html__("Specify a border color.", 'lerp'),
            "group" => esc_html__("Custom", 'lerp'),
            "value" => $lerp_colors_w_transp,
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border style", 'lerp'),
            "param_name" => "border_style",
            "description" => esc_html__("Specify a border style.", 'lerp'),
            "group" => esc_html__("Custom", 'lerp'),
            "value" => $border_style,
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Desktop", 'lerp'),
            "param_name" => "desktop_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in desktop layout mode (960px >).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Tablet", 'lerp'),
            "param_name" => "medium_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in tablet layout mode (570px > < 960px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Mobile", 'lerp'),
            "param_name" => "mobile_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in mobile layout mode (< 570px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Shift y-axis", 'lerp'),
            "param_name" => "shift_y",
            "min" => -5,
            "max" => 5,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set how much the element has to shift in the Y axis. This works on the margin-top property.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shift y-axis fixed", 'lerp'),
            "param_name" => "shift_y_fixed",
            "description" => esc_html__("Deactive shift-y responsiveness.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Custom z-index", 'lerp'),
            "param_name" => "z_index",
            "min" => 0,
            "max" => 10,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set a custom z-index to ensure the visibility of the element.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Sticky", 'lerp'),
            "param_name" => "sticky",
            "description" => esc_html__("Activate this to stick the element when scrolling.", 'lerp'),
            'group' => esc_html__('Extra', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp'),
            "group" => esc_html__("Extra", 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Section name', 'lerp'),
            'param_name' => 'row_name',
            'description' => esc_html__('Required for the onepage scroll, this gives the name to the section.', 'lerp'),
            "group" => esc_html__("Extra", 'lerp')
        ),
    ),
    'js_view' => 'LerpRowView'
));

vc_map(array(
    'name' => esc_html__('Row', 'lerp'),
    'base' => 'vc_row_inner',
    'php_class_name' => 'lerp_row_inner',
    'content_element' => false,
    'is_container' => true,
    'icon' => 'icon-wpb-row',
    'weight' => 1000,
    'show_settings_on_create' => false,
    'params' => array(
        array(
            "type" => "type_numeric_slider",
            'heading' => esc_html__("Height", 'lerp'),
            "param_name" => "row_inner_height_percent",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 0,
            "description" => wp_kses(__("Set the row height with a percent value.<br>NB. This value is relative to the row parent.", 'lerp'), array('br' => array())),
            "group" => esc_html__("Aspect", 'lerp'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__("Min height", 'lerp'),
            'param_name' => 'row_height_pixel',
            'description' => esc_html__("Insert the row minimum height in pixel.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Force width 100%", 'lerp'),
            "param_name" => "force_width_grid",
            "description" => wp_kses(__('Set this value if you need to force the width to 100%.<br>NB. This is needed only when all the columns are OFF-GRID.', 'lerp'), array('br' => array(), 'b' => array())),
            "group" => esc_html__("Aspect", 'lerp'),
            "value" => array(
                '' => 'yes'
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Background color", 'lerp'),
            "param_name" => "back_color",
            "description" => esc_html__("Specify a background color for the row.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            "type" => "media_element",
            "heading" => esc_html__("Background media", 'lerp'),
            "param_name" => "back_image",
            "value" => "",
            "description" => esc_html__("Specify a media from the Media Library.", 'lerp'),
            "group" => esc_html__("Style", 'lerp')
        ),
        $add_background_repeat,
        $add_background_attachment,
        $add_background_position,
        $add_background_size,
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Parallax", 'lerp'),
            "param_name" => "parallax",
            "description" => esc_html__("Activate the background Parallax effect. NB. Not available with Slides Scroll.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "dependency" => Array(
                'element' => "back_image",
                'not_empty' => true
            ),
            "group" => esc_html__("Style", 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Ken Burns", 'lerp'),
            "param_name" => "kburns",
            "description" => esc_html__("Activate the background Ken Burns effect.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Style", 'lerp'),
            "dependency" => array(
                'element' => "back_image",
                'not_empty' => true
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Overlay color", 'lerp'),
            "param_name" => "overlay_color",
            "description" => esc_html__("Specify an overlay color for the background.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => '',
            "param_name" => "overlay_alpha",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 50,
            "description" => esc_html__("Set the transparency for the overlay.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Columns with equal height", 'lerp'),
            "param_name" => "equal_height",
            "description" => esc_html__("Activate this to have columns that are all equally tall, matching the height of the tallest.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Inner columns", 'lerp')
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Columns gap", 'lerp'),
            "param_name" => "gutter_size",
            "min" => 0,
            "max" => 4,
            "step" => 1,
            "value" => 3,
            "description" => esc_html__("Set the columns gap.", 'lerp'),
            "group" => esc_html__("Inner columns", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Desktop", 'lerp'),
            "param_name" => "desktop_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in desktop layout mode (960px >).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Tablet", 'lerp'),
            "param_name" => "medium_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in tablet layout mode (570px > < 960px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Mobile", 'lerp'),
            "param_name" => "mobile_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in mobile layout mode (< 570px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Shift y-axis", 'lerp'),
            "param_name" => "shift_y",
            "min" => -5,
            "max" => 5,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set how much the element has to shift in the Y axis. This works on the margin-top property.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shift y-axis fixed", 'lerp'),
            "param_name" => "shift_y_fixed",
            "description" => esc_html__("Deactive shift-y responsiveness.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Custom z-index", 'lerp'),
            "param_name" => "z_index",
            "min" => 0,
            "max" => 10,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set a custom z-index to ensure the visibility of the element.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'lerp'),
            'param_name' => 'css',
            'group' => esc_html__('Custom', 'lerp')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border color", 'lerp'),
            "param_name" => "border_color",
            "description" => esc_html__("Specify a border color.", 'lerp'),
            "group" => esc_html__("Custom", 'lerp'),
            "value" => $lerp_colors_w_transp,
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border style", 'lerp'),
            "param_name" => "border_style",
            "description" => esc_html__("Specify a border style.", 'lerp'),
            "group" => esc_html__("Custom", 'lerp'),
            "value" => $border_style,
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Sticky", 'lerp'),
            "param_name" => "sticky",
            "description" => esc_html__("Activate this to stick the element when scrolling.", 'lerp'),
            'group' => esc_html__('Extra', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp'),
            "group" => esc_html__("Extra", 'lerp')
        ),
    ),
    'js_view' => 'LerpRowView'
));

vc_map(array(
    "name" => esc_html__("Column", 'lerp'),
    "base" => "vc_column",
    "is_container" => true,
    "content_element" => false,
    "params" => array(
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Content width", 'lerp'),
            "param_name" => "column_width_use_pixel",
            "edit_field_class" => 'vc_col-sm-12 vc_column row_height',
            "description" => 'Set this value if you want to constrain the column width.',
            "group" => esc_html__("Aspect", 'lerp'),
            "value" => array(
                '' => 'yes'
            )
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => '',
            "param_name" => "column_width_percent",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 100,
            "description" => esc_html__("Set the column width with a percent value.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            'dependency' => array(
                'element' => 'column_width_use_pixel',
                'is_empty' => true,
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => '',
            'param_name' => 'column_width_pixel',
            'description' => esc_html__("Insert the column width in pixel.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            'dependency' => array(
                'element' => 'column_width_use_pixel',
                'value' => 'yes'
            )
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Horizontal position", 'lerp'),
            "param_name" => "position_horizontal",
            "description" => esc_html__("Specify the horizontal position of the content if you have decreased the width value.", 'lerp'),
            "std" => 'center',
            "value" => array(
                'Left' => 'left',
                'Center' => 'center',
                'Right' => 'right'
            ),
            'group' => esc_html__('Aspect', 'lerp')
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Vertical position", 'lerp'),
            "param_name" => "position_vertical",
            "description" => esc_html__("Specify the vertical position of the content.", 'lerp'),
            "value" => array(
                'Top' => 'top',
                'Middle' => 'middle',
                'Bottom' => 'bottom'
            ),
            'group' => esc_html__('Aspect', 'lerp')
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text alignment", 'lerp'),
            "param_name" => "align_horizontal",
            "description" => esc_html__("Specify the alignment inside the content box.", 'lerp'),
            "value" => array(
                'Left' => 'align_left',
                'Center' => 'align_center',
                'Right' => 'align_right',
            ),
            'group' => esc_html__('Aspect', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Expand height to 100%", 'lerp'),
            "param_name" => "expand_height",
            "description" => esc_html__("Activate this to expand the height of the column to 100%, if you haven't activate the equal height row setting.", 'lerp'),
            'group' => esc_html__('Aspect', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Custom padding", 'lerp'),
            "param_name" => "override_padding",
            "description" => esc_html__('Activate this to define custom paddings.', 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            "value" => array(
                '' => 'yes'
            )
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Custom padding", 'lerp'),
            "param_name" => "column_padding",
            "min" => 0,
            "max" => 5,
            "step" => 1,
            "value" => 2,
            "description" => esc_html__("Set the column padding", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            "dependency" => Array(
                'element' => "override_padding",
                'value' => array(
                    'yes'
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Column text skin", 'lerp'),
            "param_name" => "style",
            "value" => array(
                esc_html__('Inherit', 'lerp') => '',
                esc_html__('Light', 'lerp') => 'light',
                esc_html__('Dark', 'lerp') => 'dark'
            ),
            'group' => esc_html__('Style', 'lerp'),
            "description" => esc_html__("Specify the text/skin color of the column.", 'lerp')
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Column font family", 'lerp'),
            "param_name" => "font_family",
            "description" => esc_html__("Specify the column font family.", 'lerp'),
            "value" => $heading_font,
            'std' => '',
            'group' => esc_html__('Style', 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Column custom background color", 'lerp'),
            "param_name" => "back_color",
            "description" => esc_html__("Specify a background color for the column.", 'lerp'),
            "value" => $lerp_colors,
            'group' => esc_html__('Style', 'lerp')
        ),
        array(
            "type" => "media_element",
            "heading" => esc_html__("Media", 'lerp'),
            "param_name" => "back_image",
            "value" => "",
            "description" => esc_html__("Specify a media from the Media Library.", 'lerp'),
            'group' => esc_html__('Style', 'lerp')
        ),
        $add_background_repeat,
        $add_background_attachment,
        $add_background_position,
        $add_background_size,
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Parallax", 'lerp'),
            "param_name" => "parallax",
            "description" => esc_html__("Activate the background Parallax effect. NB. Not available with Slides Scroll.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "dependency" => Array(
                'element' => "back_image",
                'not_empty' => true
            ),
            "group" => esc_html__("Style", 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Ken Burns", 'lerp'),
            "param_name" => "kburns",
            "description" => esc_html__("Activate the background Ken Burns effect.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "dependency" => Array(
                'element' => "back_image",
                'not_empty' => true
            ),
            "group" => esc_html__("Style", 'lerp')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Overlay color", 'lerp'),
            "param_name" => "overlay_color",
            "description" => esc_html__("Specify an overlay color for the background.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => '',
            "param_name" => "overlay_alpha",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 50,
            "description" => esc_html__("Set the transparency for the overlay.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Vertical gap", 'lerp'),
            "param_name" => "gutter_size",
            "min" => 0,
            "max" => 6,
            "step" => 1,
            "value" => 3,
            "description" => esc_html__("Set the vertical space between elements.", 'lerp'),
            "group" => esc_html__("Inner elements", 'lerp'),
        ),
        array(
            "type" => "css_editor",
            "heading" => esc_html__('Css', 'lerp'),
            "param_name" => "css",
            "group" => esc_html__('Custom', 'lerp')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border color", 'lerp'),
            "param_name" => "border_color",
            "description" => esc_html__("Specify a border color.", 'lerp'),
            "group" => esc_html__("Custom", 'lerp'),
            "value" => $lerp_colors_w_transp,
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border style", 'lerp'),
            "param_name" => "border_style",
            "description" => esc_html__("Specify a border style.", 'lerp'),
            "group" => esc_html__("Custom", 'lerp'),
            "value" => $border_style,
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Desktop", 'lerp'),
            "param_name" => "desktop_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in desktop layout mode (960px >).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Tablet", 'lerp'),
            "param_name" => "medium_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in tablet layout mode (570px > < 960px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "param_name" => "align_medium",
            "description" => esc_html__("Specify the text alignment inside the content box in tablet layout mode.", 'lerp'),
            "value" => array(
                'Text align (Inherit)' => '',
                'Left' => 'align_left_tablet',
                'Center' => 'align_center_tablet',
                'Right' => 'align_right_tablet',
            ),
            'group' => esc_html__('Responsive', 'lerp')
        ),
        array(
            "type" => "type_numeric_slider",
            "param_name" => "medium_width",
            "min" => 0,
            "max" => 7,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("COLUMN WIDTH. NB. If you change this value for one column you must specify a value for every column of the row.", 'lerp'),
            "group" => esc_html__("Responsive", 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Mobile", 'lerp'),
            "param_name" => "mobile_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in mobile layout mode (< 570px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "param_name" => "align_mobile",
            "description" => esc_html__("Specify the text alignment inside the content box in mobile layout mode.", 'lerp'),
            "value" => array(
                'Text align (Inherit)' => '',
                'Left' => 'align_left_mobile',
                'Center' => 'align_center_mobile',
                'Right' => 'align_right_mobile',
            ),
            'group' => esc_html__('Responsive', 'lerp')
        ),
        array(
            "type" => "type_numeric_slider",
            "param_name" => "mobile_width",
            "min" => 0,
            "max" => 7,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("COLUMN WIDTH. NB. If you change this value for one column you must specify a value for every column of the row.", 'lerp'),
            "group" => esc_html__("Responsive", 'lerp')
        ),
        array(
            "type" => "textfield",
            "param_name" => "mobile_height",
            "description" => esc_html__("MINIMUM HEIGHT. Insert the value in pixel.", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp')
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Shift x-axis", 'lerp'),
            "param_name" => "shift_x",
            "min" => -5,
            "max" => 5,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set how much the element has to shift in the X axis.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shift x-axis fixed", 'lerp'),
            "param_name" => "shift_x_fixed",
            "description" => esc_html__("Deactive shift-x responsiveness.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Shift y-axis", 'lerp'),
            "param_name" => "shift_y",
            "min" => -5,
            "max" => 5,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set how much the element has to shift in the Y axis. This works on the margin-top property.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shift y-axis fixed", 'lerp'),
            "param_name" => "shift_y_fixed",
            "description" => esc_html__("Deactive shift-y responsiveness.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Shift y-axis downward", 'lerp'),
            "param_name" => "shift_y_down",
            "min" => -5,
            "max" => 5,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set how much the element has to move toward the element below. This works on the margin-bottom property.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shift y-axis downward fixed", 'lerp'),
            "param_name" => "shift_y_down_fixed",
            "description" => esc_html__("Deactive shift-y responsiveness.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Custom z-index", 'lerp'),
            "param_name" => "z_index",
            "min" => 0,
            "max" => 10,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set a custom z-index to ensure the visibility of the element.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('Custom link', 'lerp'),
            'param_name' => 'link_to',
            'description' => esc_html__('Enter a custom link for the column.', 'lerp'),
            'group' => esc_html__('Extra', 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Sticky", 'lerp'),
            "param_name" => "sticky",
            "description" => esc_html__("Activate this to stick the element when scrolling.", 'lerp'),
            'group' => esc_html__('Extra', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Shadow", 'lerp'),
            "param_name" => "shadow",
            "description" => esc_html__("Activate this for the shadow effect.", 'lerp'),
            'group' => esc_html__('Extra', 'lerp'),
            "value" => array(
                esc_html__('None', 'lerp') => '',
                esc_html__('Extra Small', 'lerp') => 'xs',
                esc_html__('Small', 'lerp') => 'sm',
                esc_html__('Standard', 'lerp') => 'std',
                esc_html__('Large', 'lerp') => 'lg',
                esc_html__('Extra Large', 'lerp') => 'xl',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shadow Darker", 'lerp'),
            "param_name" => "shadow_darker",
            "description" => esc_html__("Activate this for the dark shadow effect.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Extra", 'lerp'),
            'dependency' => array(
                'element' => 'shadow',
                'not_empty' => true
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border radius", 'lerp'),
            "param_name" => "radius",
            "description" => esc_html__("Specify the border radius effect.", 'lerp'),
            'group' => esc_html__('Extra', 'lerp'),
            "value" => array(
                esc_html__('None', 'lerp') => '',
                esc_html__('Extra Small', 'lerp') => 'xs',
                esc_html__('Small', 'lerp') => 'sm',
                esc_html__('Standard', 'lerp') => 'std',
                esc_html__('Large', 'lerp') => 'lg',
                esc_html__('Extra Large', 'lerp') => 'xl',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class", 'lerp'),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'lerp'),
            'group' => esc_html__('Extra', 'lerp')
        ),
    ),
    "js_view" => 'LerpColumnView'
));

vc_map(array(
    "name" => esc_html__("Column", 'lerp'),
    "base" => "vc_column_inner",
    "class" => "",
    "icon" => "",
    "wrapper_class" => "",
    "controls" => "full",
    "allowed_container_element" => false,
    "content_element" => false,
    "is_container" => true,
    "params" => array(
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Content width", 'lerp'),
            "param_name" => "column_width_use_pixel",
            "edit_field_class" => 'vc_col-sm-12 vc_column row_height',
            "description" => 'Set this value if you want to constrain the column width.',
            "group" => esc_html__("Aspect", 'lerp'),
            "value" => array(
                '' => 'yes'
            )
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => '',
            "param_name" => "column_width_percent",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 100,
            "description" => esc_html__("Set the column width with a percent value.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            'dependency' => array(
                'element' => 'column_width_use_pixel',
                'is_empty' => true,
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => '',
            'param_name' => 'column_width_pixel',
            'description' => esc_html__("Insert the column width in pixel.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            'dependency' => array(
                'element' => 'column_width_use_pixel',
                'value' => 'yes'
            )
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Horizontal position", 'lerp'),
            "param_name" => "position_horizontal",
            "description" => esc_html__("Specify the horizontal position of the content if you have decreased the width value.", 'lerp'),
            "std" => 'center',
            "value" => array(
                'Left' => 'left',
                'Center' => 'center',
                'Right' => 'right'
            ),
            'group' => esc_html__('Aspect', 'lerp')
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Vertical position", 'lerp'),
            "param_name" => "position_vertical",
            "description" => esc_html__("Specify the vertical position of the content.", 'lerp'),
            "value" => array(
                'Top' => 'top',
                'Middle' => 'middle',
                'Bottom' => 'bottom'
            ),
            'group' => esc_html__('Aspect', 'lerp')
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text alignment", 'lerp'),
            "param_name" => "align_horizontal",
            "description" => esc_html__("Specify the alignment inside the content box.", 'lerp'),
            "value" => array(
                'Left' => 'align_left',
                'Center' => 'align_center',
                'Right' => 'align_right',
            ),
            'group' => esc_html__('Aspect', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Expand height to 100%", 'lerp'),
            "param_name" => "expand_height",
            "description" => esc_html__("Activate this to expand the height of the column to 100%, if you haven't activate the equal height row setting.", 'lerp'),
            'group' => esc_html__('Aspect', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Custom padding", 'lerp'),
            "param_name" => "override_padding",
            "description" => esc_html__('Activate this to define custom paddings.', 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            "value" => array(
                '' => 'yes'
            )
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Custom padding", 'lerp'),
            "param_name" => "column_padding",
            "min" => 0,
            "max" => 5,
            "step" => 1,
            "value" => 2,
            "description" => esc_html__("Set the column padding", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            "dependency" => Array(
                'element' => "override_padding",
                'value' => array(
                    'yes'
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Column text skin", 'lerp'),
            "param_name" => "style",
            "value" => array(
                esc_html__('Inherit', 'lerp') => '',
                esc_html__('Light', 'lerp') => 'light',
                esc_html__('Dark', 'lerp') => 'dark'
            ),
            'group' => esc_html__('Style', 'lerp'),
            "description" => esc_html__("Specify the text/skin color of the column.", 'lerp')
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Vertical gap", 'lerp'),
            "param_name" => "gutter_size",
            "min" => 0,
            "max" => 6,
            "step" => 1,
            "value" => 3,
            "description" => esc_html__("Set the vertical space between elements.", 'lerp'),
            "group" => esc_html__("Inner elements", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Column font family", 'lerp'),
            "param_name" => "font_family",
            "description" => esc_html__("Specify the column font family.", 'lerp'),
            "value" => $heading_font,
            'std' => '',
            'group' => esc_html__('Style', 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Column custom background color", 'lerp'),
            "param_name" => "back_color",
            "description" => esc_html__("Specify a background color for the column.", 'lerp'),
            "value" => $lerp_colors,
            'group' => esc_html__('Style', 'lerp')
        ),
        array(
            "type" => "media_element",
            "heading" => esc_html__("Media", 'lerp'),
            "param_name" => "back_image",
            "value" => "",
            "description" => esc_html__("Specify a media from the Media Library.", 'lerp'),
            'group' => esc_html__('Style', 'lerp')
        ),
        $add_background_repeat,
        $add_background_attachment,
        $add_background_position,
        $add_background_size,
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Parallax", 'lerp'),
            "param_name" => "parallax",
            "description" => esc_html__("Activate the background Parallax effect. NB. Not available with Slides Scroll.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "dependency" => Array(
                'element' => "back_image",
                'not_empty' => true
            ),
            "group" => esc_html__("Style", 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Ken Burns", 'lerp'),
            "param_name" => "kburns",
            "description" => esc_html__("Activate the background Ken Burns effect.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "dependency" => Array(
                'element' => "back_image",
                'not_empty' => true
            ),
            "group" => esc_html__("Style", 'lerp')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Overlay color", 'lerp'),
            "param_name" => "overlay_color",
            "description" => esc_html__("Specify an overlay color for the background.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => '',
            "param_name" => "overlay_alpha",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 50,
            "description" => esc_html__("Set the transparency for the overlay.", 'lerp'),
            "group" => esc_html__("Style", 'lerp'),
        ),
        array(
            "type" => "css_editor",
            "heading" => esc_html__('Css', 'lerp'),
            "param_name" => "css",
            "group" => esc_html__('Custom', 'lerp')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border color", 'lerp'),
            "param_name" => "border_color",
            "description" => esc_html__("Specify a border color.", 'lerp'),
            "group" => esc_html__("Custom", 'lerp'),
            "value" => $lerp_colors_w_transp,
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border style", 'lerp'),
            "param_name" => "border_style",
            "description" => esc_html__("Specify a border style.", 'lerp'),
            "group" => esc_html__("Custom", 'lerp'),
            "value" => $border_style,
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Desktop", 'lerp'),
            "param_name" => "desktop_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in desktop layout mode (960px >).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Tablet", 'lerp'),
            "param_name" => "medium_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in tablet layout mode (570px > < 960px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "param_name" => "align_medium",
            "description" => esc_html__("Specify the text alignment inside the content box in tablet layout mode.", 'lerp'),
            "value" => array(
                'Text align (Inherit)' => '',
                'Left' => 'align_left_tablet',
                'Center' => 'align_center_tablet',
                'Right' => 'align_right_tablet',
            ),
            'group' => esc_html__('Responsive', 'lerp')
        ),
        array(
            "type" => "type_numeric_slider",
            "param_name" => "medium_width",
            "min" => 0,
            "max" => 7,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("COLUMN WIDTH. NB. If you change this value for one column you must specify a value for every column of the row.", 'lerp'),
            "group" => esc_html__("Responsive", 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Mobile", 'lerp'),
            "param_name" => "mobile_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in mobile layout mode (< 570px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "param_name" => "align_mobile",
            "description" => esc_html__("Specify the text alignment inside the content box in mobile layout mode.", 'lerp'),
            "value" => array(
                'Text align (Inherit)' => '',
                'Left' => 'align_left_mobile',
                'Center' => 'align_center_mobile',
                'Right' => 'align_right_mobile',
            ),
            'group' => esc_html__('Responsive', 'lerp')
        ),
        array(
            "type" => "type_numeric_slider",
            "param_name" => "mobile_width",
            "min" => 0,
            "max" => 7,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("COLUMN WIDTH. NB. If you change this value for one column you must specify a value for every column of the row.", 'lerp'),
            "group" => esc_html__("Responsive", 'lerp')
        ),
        array(
            "type" => "textfield",
            "param_name" => "mobile_height",
            "description" => esc_html__("MINIMUM HEIGHT. Insert the value in pixel.", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp')
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Shift x-axis", 'lerp'),
            "param_name" => "shift_x",
            "min" => -5,
            "max" => 5,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set how much the element has to shift in the X axis.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shift x-axis fixed", 'lerp'),
            "param_name" => "shift_x_fixed",
            "description" => esc_html__("Deactive shift-x responsiveness.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Shift y-axis", 'lerp'),
            "param_name" => "shift_y",
            "min" => -5,
            "max" => 5,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set how much the element has to shift in the Y axis. This works on the margin-top property.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shift y-axis fixed", 'lerp'),
            "param_name" => "shift_y_fixed",
            "description" => esc_html__("Deactive shift-y responsiveness.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Downward off-grid", 'lerp'),
            "param_name" => "shift_y_down",
            "min" => -5,
            "max" => 5,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set how much the element has to move toward the element below.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Downward off-grid fixed", 'lerp'),
            "param_name" => "shift_y_down_fixed",
            "description" => esc_html__("Deactive shift-y responsiveness.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Custom z-index", 'lerp'),
            "param_name" => "z_index",
            "min" => 0,
            "max" => 10,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Set a custom z-index to ensure the visibility of the element.", 'lerp'),
            'group' => esc_html__('Off-grid', 'lerp')
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('Custom link', 'lerp'),
            'param_name' => 'link_to',
            'description' => esc_html__('Enter a custom link for the column.', 'lerp'),
            'group' => esc_html__('Extra', 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Sticky", 'lerp'),
            "param_name" => "sticky",
            "description" => esc_html__("Activate this to stick the element when scrolling.", 'lerp'),
            'group' => esc_html__('Extra', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Shadow", 'lerp'),
            "param_name" => "shadow",
            "description" => esc_html__("Activate this for the shadow effect.", 'lerp'),
            'group' => esc_html__('Extra', 'lerp'),
            "value" => array(
                esc_html__('None', 'lerp') => '',
                esc_html__('Extra Small', 'lerp') => 'xs',
                esc_html__('Small', 'lerp') => 'sm',
                esc_html__('Standard', 'lerp') => 'std',
                esc_html__('Large', 'lerp') => 'lg',
                esc_html__('Extra Large', 'lerp') => 'xl',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shadow Darker", 'lerp'),
            "param_name" => "shadow_darker",
            "description" => esc_html__("Activate this for the dark shadow effect.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Extra", 'lerp'),
            'dependency' => array(
                'element' => 'shadow',
                'not_empty' => true
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border radius", 'lerp'),
            "param_name" => "radius",
            "description" => esc_html__("Specify the border radius effect.", 'lerp'),
            'group' => esc_html__('Extra', 'lerp'),
            "value" => array(
                esc_html__('None', 'lerp') => '',
                esc_html__('Extra Small', 'lerp') => 'xs',
                esc_html__('Small', 'lerp') => 'sm',
                esc_html__('Standard', 'lerp') => 'std',
                esc_html__('Large', 'lerp') => 'lg',
                esc_html__('Extra Large', 'lerp') => 'xl',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class", 'lerp'),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'lerp'),
            'group' => esc_html__('Extra', 'lerp')
        ),
    ),
    "js_view" => 'LerpColumnView'
));

/* Gallery/Slideshow
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Media Gallery', 'lerp'),
    'base' => 'vc_gallery',
    'php_class_name' => 'lerp_generic_admin',
    'weight' => 102,
    'icon' => 'fa fa-th-large',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Isotope grid or carousel layout', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('小工具标题', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('输入将用作小工具标题的文本。 如果不需要标题，请留空。', 'lerp'),
            'group' => esc_html__('基本', 'lerp'),
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('小工具 ID', 'lerp'),
            'param_name' => 'el_id',
            'value' => (function_exists('big_rand')) ? big_rand() : rand(),
            'description' => esc_html__('这个值必须是唯一的。 在需要时更改它。', 'lerp'),
            'group' => esc_html__('基本', 'lerp')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Gallery module', 'lerp'),
            'param_name' => 'type',
            'value' => array(
                esc_html__('同位素', 'lerp') => 'isotope',
                esc_html__('旋转木马', 'lerp') => 'carousel',
                esc_html__('对齐的相册', 'lerp') => 'justified',
            ),
            'admin_label' => true,
            'description' => esc_html__('指定相册模块类型。', 'lerp'),
            'group' => esc_html__('基本', 'lerp')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('布局模式', 'lerp'),
            'param_name' => 'isotope_mode',
            'admin_label' => true,
            "description" => wp_kses(__("Specify the isotpe layout mode. <a href='http://isotope.metafizzy.co/layout-modes.html' target='_blank'>Check this for reference</a>", 'lerp'), array('a' => array('href' => array(), 'target' => array()))),
            "value" => array(
                esc_html__('Masonry', 'lerp') => 'masonry',
                esc_html__('Fit rows', 'lerp') => 'fitRows',
                esc_html__('Cells by row', 'lerp') => 'cellsByRow',
                esc_html__('垂直', 'lerp') => 'vertical',
                esc_html__('Packery', 'lerp') => 'packery',
            ),
            'group' => esc_html__('基本', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'isotope',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("随机顺序", 'lerp'),
            "param_name" => "random",
            "description" => esc_html__("激活它以获得媒体随机订单。", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("基本", 'lerp'),
        ),
        array(
            'type' => 'media_element',
            'heading' => esc_html__('Medias', 'lerp'),
            'param_name' => 'medias',
            'has_galleries' => true,
            "edit_field_class" => 'vc_col-sm-12 vc_column lerp_gallery',
            'value' => '',
            'description' => esc_html__('Specify images from Media Library.', 'lerp'),
            'group' => esc_html__('基本', 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Explode albums", 'lerp'),
            "param_name" => "explode_albums",
            "description" => esc_html__("Activate to treat gallery elements as single medias part of a unique gallery.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'group' => esc_html__('基本', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Style", 'lerp'),
            "param_name" => "style_preset",
            "description" => esc_html__("Select the visualization mode.", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => array(
                    'isotope',
                ),
            ),
            "value" => array(
                esc_html__('Masonry', 'lerp') => 'masonry',
                esc_html__('Metro', 'lerp') => 'metro',
            ),
            'group' => esc_html__('Module', 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Gallery background color", 'lerp'),
            "param_name" => "gallery_back_color",
            "description" => esc_html__("Specify a background color for the module.", 'lerp'),
            "class" => 'lerp_colors',
            "value" => $lerp_colors,
            'group' => esc_html__('Module', 'lerp'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number columns ( > 960px )', 'lerp'),
            'param_name' => 'carousel_lg',
            'value' => 3,
            'description' => esc_html__('Insert the numbers of columns for the viewport from 960px.', 'lerp'),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel'
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number columns ( > 570px and < 960px )', 'lerp'),
            'param_name' => 'carousel_md',
            'value' => 3,
            'description' => esc_html__('Insert the numbers of columns for the viewport from 570px to 960px.', 'lerp'),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel'
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number columns ( > 0px and < 570px )', 'lerp'),
            'param_name' => 'carousel_sm',
            'value' => 1,
            'description' => esc_html__('Insert the numbers of columns for the viewport from 0 to 570px.', 'lerp'),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel'
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Row height', 'lerp'),
            'param_name' => 'justify_row_height',
            'value' => 250,
            'description' => esc_html__('The preferred height of rows in pixel.', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => array(
                    'justified',
                ),
            ),
            'group' => esc_html__('Module', 'lerp'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Optional max row height', 'lerp'),
            'param_name' => 'justify_max_row_height',
            'value' => '',
            'description' => esc_html__('The preferred maximum height of rows in pixel. Note that with this option can crop the images if they need to be higher to be justified.', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => array(
                    'justified',
                ),
            ),
            'group' => esc_html__('Module', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Justify last row", 'lerp'),
            "param_name" => "justify_last_row",
            "description" => esc_html__("Decide to justify the last row, to hide it if it can't be justified or to align them to the left, center or right", 'lerp'),
            "value" => array(
                esc_html__('Default (no justisfied, left aligned)', 'lerp') => 'nojustify',
                esc_html__('Hide', 'lerp') => 'hide',
                esc_html__('Align to the center', 'lerp') => 'center',
                esc_html__('Align to the right', 'lerp') => 'right',
            ),
            "std" => "nojustify",
            'dependency' => array(
                'element' => 'type',
                'value' => array(
                    'justified',
                ),
            ),
            'group' => esc_html__('Module', 'lerp'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Thumbnail size', 'lerp'),
            'param_name' => 'thumb_size',
            'description' => esc_html__('Specify the aspect ratio for the media.', 'lerp'),
            "value" => array(
                esc_html__('Regular', 'lerp') => '',
                '1:1' => 'one-one',
                '2:1' => 'two-one',
                '3:2' => 'three-two',
                '4:3' => 'four-three',
                '10:3' => 'ten-three',
                '16:9' => 'sixteen-nine',
                '21:9' => 'twentyone-nine',
                '1:2' => 'one-two',
                '2:3' => 'two-three',
                '3:4' => 'three-four',
                '3:10' => 'three-ten',
                '9:16' => 'nine-sixteen',
            ),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Filtering", 'lerp'),
            "param_name" => "filtering",
            "description" => esc_html__("Activate this to add the isotope filtering.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => array('isotope', 'justified'),
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Filter skin", 'lerp'),
            "param_name" => "filter_style",
            "description" => esc_html__("Specify the filter skin color.", 'lerp'),
            "value" => array(
                esc_html__('Light', 'lerp') => 'light',
                esc_html__('Dark', 'lerp') => 'dark'
            ),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'isotope',
            ),
            'dependency' => array(
                'element' => 'filtering',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Filter menu color", 'lerp'),
            "param_name" => "filter_back_color",
            "description" => esc_html__("Specify a background color for the filter menu.", 'lerp'),
            "class" => 'lerp_colors',
            "value" => $lerp_colors,
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'isotope',
            ),
            'dependency' => array(
                'element' => 'filtering',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Filter menu full width", 'lerp'),
            "param_name" => "filtering_full_width",
            "description" => esc_html__("Activate this to force the full width of the filter.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'isotope',
            ),
            'dependency' => array(
                'element' => 'filtering',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Filter menu position", 'lerp'),
            "param_name" => "filtering_position",
            "description" => esc_html__("Specify the filter menu positioning.", 'lerp'),
            "value" => array(
                esc_html__('Left', 'lerp') => 'left',
                esc_html__('Center', 'lerp') => 'center',
                esc_html__('Right', 'lerp') => 'right',
            ),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'isotope',
            ),
            'dependency' => array(
                'element' => 'filtering',
                'value' => 'yes',
            )
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("'Show all' opposite", 'lerp'),
            "param_name" => "filter_all_opposite",
            "description" => esc_html__("Activate this to position the 'Show all' button opposite to the rest.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'isotope',
            ),
            'dependency' => array(
                'element' => 'filtering',
                'value' => 'yes',
            ),
            'dependency' => array(
                'element' => 'filtering_position',
                'value' => array(
                    'left',
                    'right'
                )
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Filter menu uppercase", 'lerp'),
            "param_name" => "filtering_uppercase",
            "description" => esc_html__("Activate this to have the filter menu in uppercase.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'isotope',
            ),
            'dependency' => array(
                'element' => 'filtering',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Filter menu mobile hidden", 'lerp'),
            "param_name" => "filter_mobile",
            "description" => esc_html__("Activate this to hide the filter menu in mobile mode.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'isotope',
            ),
            'dependency' => array(
                'element' => 'filtering',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Filter scroll", 'lerp'),
            "param_name" => "filter_scroll",
            "description" => esc_html__("Activate this to scroll to the  module when filtering.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'isotope',
            ),
            'dependency' => array(
                'element' => 'filtering',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Filter sticky", 'lerp'),
            "param_name" => "filter_sticky",
            "description" => esc_html__("Activate this to have a sticky filter menu when scrolling.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'isotope',
            ),
            'dependency' => array(
                'element' => 'filtering',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Items gap", 'lerp'),
            "param_name" => "gutter_size",
            "min" => 0,
            "max" => 6,
            "step" => 1,
            "value" => 3,
            "description" => esc_html__("Set the items gap.", 'lerp'),
            "group" => esc_html__("Module", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Inner module padding", 'lerp'),
            "param_name" => "inner_padding",
            "description" => esc_html__("Activate this to have an inner padding with the same size as the items gap.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => array(
                    'isotope',
                    'carousel',
                ),
            ),
        ),
        array(
            'type' => 'sorted_list',
            'heading' => esc_html__('Media', 'lerp'),
            'param_name' => 'media_items',
            'description' => esc_html__('Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overridden on post to post basis.', 'lerp'),
            'value' => 'media|lightbox|original,icon',
            "group" => esc_html__("Module", 'lerp'),
            'options' => array(
                array(
                    'media',
                    esc_html__('Media', 'lerp'),
                    array(
                        array(
                            'lightbox',
                            esc_html__('Lightbox', 'lerp')
                        ),
                        array(
                            'custom_link',
                            esc_html__('Custom link', 'lerp')
                        ),
                        array(
                            'nolink',
                            esc_html__('No link', 'lerp')
                        )
                    ),
                    array(
                        array(
                            'original',
                            esc_html__('Original', 'lerp')
                        ),
                        array(
                            'poster',
                            esc_html__('Poster', 'lerp')
                        )
                    )
                ),
                array(
                    'icon',
                    esc_html__('Icon', 'lerp'),
                    array(
                        array(
                            '',
                            esc_html__('Small', 'lerp')
                        ),
                        array(
                            'md',
                            esc_html__('Medium', 'lerp')
                        ),
                        array(
                            'lg',
                            esc_html__('Large', 'lerp')
                        ),
                        array(
                            'xl',
                            esc_html__('Extra Large', 'lerp')
                        )
                    ),
                ),
                array(
                    'title',
                    esc_html__('Title', 'lerp'),
                ),
                array(
                    'caption',
                    esc_html__('Caption', 'lerp'),
                ),
                array(
                    'description',
                    esc_html__('Description', 'lerp'),
                ),
                array(
                    'category',
                    esc_html__('Category', 'lerp'),
                ),
                array(
                    'spacer',
                    esc_html__('Spacer', 'lerp'),
                    array(
                        array(
                            'half',
                            esc_html__('0.5x', 'lerp')
                        ),
                        array(
                            'one',
                            esc_html__('1x', 'lerp')
                        ),
                        array(
                            'two',
                            esc_html__('2x', 'lerp')
                        )
                    )
                ),
                array(
                    'sep-one',
                    esc_html__('Separator One', 'lerp'),
                    array(
                        array(
                            'full',
                            esc_html__('Full width', 'lerp')
                        ),
                        array(
                            'reduced',
                            esc_html__('Reduced width', 'lerp')
                        )
                    )
                ),
                array(
                    'sep-two',
                    esc_html__('Separator Two', 'lerp'),
                    array(
                        array(
                            'full',
                            esc_html__('Full width', 'lerp')
                        ),
                        array(
                            'reduced',
                            esc_html__('Reduced width', 'lerp')
                        )
                    )
                ),
                array(
                    'team-social',
                    esc_html__('Team socials', 'lerp'),
                ),
            )
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Carousel items height", 'lerp'),
            "param_name" => "carousel_height",
            "description" => esc_html__("Specify the carousel items height.", 'lerp'),
            "value" => array(
                esc_html__('Auto', 'lerp') => '',
                esc_html__('Equal height', 'lerp') => 'equal',
            ),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'thumb_size',
                'value' => array(
                    '',
                    'one-one',
                    'two-one',
                    'three-two',
                    'four-three',
                    'ten-three',
                    'sixteen-nine',
                    'twentyone-nine',
                    'one-two',
                    'two-three',
                    'three-four',
                    'three-ten',
                    'nine-sixteen',
                ),
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Items vertical alignment", 'lerp'),
            "param_name" => "carousel_v_align",
            "description" => esc_html__("Specify the items vertical alignment.", 'lerp'),
            "value" => array(
                esc_html__('Top', 'lerp') => '',
                esc_html__('Middle', 'lerp') => 'middle',
                esc_html__('Bottom', 'lerp') => 'bottom'
            ),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
            'dependency' => array(
                'element' => 'carousel_height',
                'is_empty' => true,
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Transition type', 'lerp'),
            'param_name' => 'carousel_type',
            "value" => array(
                esc_html__('Slide', 'lerp') => '',
                esc_html__('Fade', 'lerp') => 'fade'
            ),
            'description' => esc_html__('Specify the transition type.', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
            'group' => esc_html__('Module', 'lerp')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Auto rotate slides', 'lerp'),
            'param_name' => 'carousel_interval',
            'value' => array(
                3000,
                5000,
                10000,
                15000,
                esc_html__('Disable', 'lerp') => 0
            ),
            'description' => esc_html__('Specify the automatic timeout between slides in milliseconds.', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
            'group' => esc_html__('Module', 'lerp')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Navigation speed', 'lerp'),
            'param_name' => 'carousel_navspeed',
            'value' => array(
                200,
                400,
                700,
                1000,
                esc_html__('Disable', 'lerp') => 0
            ),
            'std' => 400,
            'description' => esc_html__('Specify the navigation speed between slides in milliseconds.', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
            'group' => esc_html__('Module', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Loop", 'lerp'),
            "param_name" => "carousel_loop",
            "description" => esc_html__("Activate the loop option to make the carousel infinite.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Overflow visible", 'lerp'),
            "param_name" => "carousel_overflow",
            "description" => esc_html__("Activate this option to make the element overflow its container (get rid of the cropping area).", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Navigation", 'lerp'),
            "param_name" => "carousel_nav",
            "description" => esc_html__("Activate the navigation to show navigational arrows.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'carousel_overflow',
                'is_empty' => true,
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Mobile navigation", 'lerp'),
            "param_name" => "carousel_nav_mobile",
            "description" => esc_html__("Activate the navigation to show navigational arrows for mobile devices.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'carousel_overflow',
                'is_empty' => true,
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Navigation skin", 'lerp'),
            "param_name" => "carousel_nav_skin",
            "description" => esc_html__("Specify the navigation arrows skin.", 'lerp'),
            "value" => array(
                esc_html__('Light', 'lerp') => 'light',
                esc_html__('Dark', 'lerp') => 'dark'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'carousel_overflow',
                'is_empty' => true,
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Dots navigation", 'lerp'),
            "param_name" => "carousel_dots",
            "description" => esc_html__("Activate the dots navigation to show navigational dots in the bottom.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Dots Navigation Extra Top Space", 'lerp'),
            "param_name" => "carousel_dots_space",
            "description" => esc_html__("Activate this to add extra top space to the Navigation Dots.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'std' => '',
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'carousel_dots',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Mobile dots navigation", 'lerp'),
            "param_name" => "carousel_dots_mobile",
            "description" => esc_html__("Activate the dots navigation to show navigational dots in the bottom for mobile devices.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Dots navigation inside", 'lerp'),
            "param_name" => "carousel_dots_inside",
            "description" => esc_html__("Activate to have the dots navigation inside the carousel.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Autoheight", 'lerp'),
            "param_name" => "carousel_autoh",
            "description" => esc_html__("Activate to adjust the height automatically when possible.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'thumb_size',
                'value' => array(
                    '',
                    'one-one',
                    'two-one',
                    'three-two',
                    'four-three',
                    'ten-three',
                    'sixteen-nine',
                    'twentyone-nine',
                    'one-two',
                    'two-three',
                    'three-four',
                    'three-ten',
                    'nine-sixteen',
                ),
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Textual carousel ", 'lerp'),
            "param_name" => "carousel_textual",
            "description" => esc_html__("Activate this to have a carousel with only text.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Breakpoint - First step', 'lerp'),
            'param_name' => 'screen_lg',
            'value' => 1000,
            'description' => wp_kses(__('Insert the isotope large layout breakpoint in pixel.<br />NB. This is referring to the width of the isotope container, not to the window width.', 'lerp'), array('br' => array())),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => array(
                    'isotope',
                ),
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Breakpoint - Second step', 'lerp'),
            'param_name' => 'screen_md',
            'value' => 600,
            'description' => wp_kses(__('Insert the isotope medium layout breakpoint in pixel.<br />NB. This is referring to the width of the isotope container, not to the window width.', 'lerp'), array('br' => array())),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => array(
                    'isotope',
                ),
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Breakpoint - Third step', 'lerp'),
            'param_name' => 'screen_sm',
            'value' => 480,
            'description' => wp_kses(__('Insert the isotope small layout breakpoint in pixel.<br />NB. This is referring to the width of the isotope container, not to the window width.', 'lerp'), array('br' => array())),
            'group' => esc_html__('Module', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => array(
                    'isotope',
                ),
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Stage padding", 'lerp'),
            "description" => esc_html__("Activate this option to add left and right padding style onto stage-wrapper.", 'lerp'),
            "param_name" => "stage_padding",
            "min" => 0,
            "max" => 75,
            "step" => 5,
            "value" => 0,
            "group" => esc_html__("Module", 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => 'carousel',
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Block layout", 'lerp'),
            "param_name" => "single_text",
            "description" => esc_html__("Specify the text positioning inside the box.", 'lerp'),
            "value" => array(
                esc_html__('Content overlay', 'lerp') => 'overlay',
                esc_html__('Content under image', 'lerp') => 'under'
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => array(
                    'isotope', 'carousel'
                ),
            ),
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Width", 'lerp'),
            "param_name" => "single_width",
            "description" => esc_html__("Specify the box width.", 'lerp'),
            "value" => $units,
            "std" => "4",
            'dependency' => array(
                'element' => 'type',
                'value' => array(
                    'isotope',
                ),
            ),
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Height", 'lerp'),
            "param_name" => "single_height",
            "description" => esc_html__("Specify the box height.", 'lerp'),
            "value" => array(
                    esc_html__("Default", 'lerp') => ""
                ) + $units,
            "std" => "",
            'group' => esc_html__('Blocks', 'lerp'),
            'dependency' => array(
                'element' => 'type',
                'value' => array(
                    'isotope',
                ),
            ),
            'dependency' => array(
                'element' => 'style_preset',
                'value' => 'metro',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Media ratio', 'lerp'),
            'param_name' => 'images_size',
            'description' => esc_html__('Specify the aspect ratio for the media.', 'lerp'),
            "value" => array(
                esc_html__('Regular', 'lerp') => '',
                '1:1' => 'one-one',
                '2:1' => 'two-one',
                '3:2' => 'three-two',
                '4:3' => 'four-three',
                '10:3' => 'ten-three',
                '16:9' => 'sixteen-nine',
                '21:9' => 'twentyone-nine',
                '1:2' => 'one-two',
                '2:3' => 'two-three',
                '3:4' => 'three-four',
                '3:10' => 'three-ten',
                '9:16' => 'nine-sixteen',
            ),
            'group' => esc_html__('Blocks', 'lerp'),
            'dependency' => array(
                'element' => 'style_preset',
                'value' => 'masonry',
            ),
            'admin_label' => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Background color", 'lerp'),
            "param_name" => "single_back_color",
            "description" => esc_html__("Specify a background color for the box.", 'lerp'),
            "value" => $lerp_colors,
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Shape', 'lerp'),
            'param_name' => 'single_shape',
            'value' => array(
                esc_html__('Select…', 'lerp') => '',
                esc_html__('Rounded', 'lerp') => 'round',
                esc_html__('Circular', 'lerp') => 'circle'
            ),
            'description' => esc_html__('Specify one if you want to shape the block.', 'lerp'),
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border radius", 'lerp'),
            "param_name" => "radius",
            "description" => esc_html__("Specify the border radius effect.", 'lerp'),
            'group' => esc_html__('Blocks', 'lerp'),
            'std' => '',
            "value" => array(
                esc_html__('Extra Small', 'lerp') => 'xs',
                esc_html__('Small', 'lerp') => ' ',
                esc_html__('Standard', 'lerp') => 'std',
                esc_html__('Large', 'lerp') => 'lg',
                esc_html__('Extra Large', 'lerp') => 'xl',
            ),
            "std" => ' ',
            'dependency' => array(
                'element' => 'single_shape',
                'value' => 'round'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Skin", 'lerp'),
            "param_name" => "single_style",
            "description" => esc_html__("Specify the skin inside the content box.", 'lerp'),
            "value" => array(
                esc_html__('Light', 'lerp') => 'light',
                esc_html__('Dark', 'lerp') => 'dark'
            ),
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Overlay color", 'lerp'),
            "param_name" => "single_overlay_color",
            "description" => esc_html__("Specify a background color for the box.", 'lerp'),
            "value" => $lerp_colors,
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay coloration", 'lerp'),
            "param_name" => "single_overlay_coloration",
            "description" => wp_kses(__("Specify the coloration style for the overlay.<br />NB. For the gradient you can't customize the overlay color.", 'lerp'), array('br' => array())),
            "value" => array(
                esc_html__('Fully colored', 'lerp') => '',
                esc_html__('Gradient top', 'lerp') => 'top_gradient',
                esc_html__('Gradient bottom', 'lerp') => 'bottom_gradient',
            ),
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Overlay opacity", 'lerp'),
            "param_name" => "single_overlay_opacity",
            "min" => 1,
            "max" => 100,
            "step" => 1,
            "value" => 50,
            "description" => esc_html__("Set the overlay opacity.", 'lerp'),
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay text visibility", 'lerp'),
            "param_name" => "single_text_visible",
            "description" => esc_html__("Activate this to show the text as starting point.", 'lerp'),
            "value" => array(
                esc_html__('Hidden', 'lerp') => 'no',
                esc_html__('Visible', 'lerp') => 'yes',
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay text animation", 'lerp'),
            "param_name" => "single_text_anim",
            "description" => esc_html__("Activate this to animate the text on mouse over.", 'lerp'),
            "value" => array(
                esc_html__('Animated', 'lerp') => 'yes',
                esc_html__('Static', 'lerp') => 'no',
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay text animation type", 'lerp'),
            "param_name" => "single_text_anim_type",
            "description" => esc_html__("Specify the animation type.", 'lerp'),
            "value" => array(
                esc_html__('Opacity', 'lerp') => '',
                esc_html__('Bottom to top', 'lerp') => 'btt',
            ),
            "group" => esc_html__("Blocks", 'lerp'),
            'dependency' => array(
                'element' => 'single_text_anim',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay visibility", 'lerp'),
            "param_name" => "single_overlay_visible",
            "description" => esc_html__("Activate this to show the overlay as starting point.", 'lerp'),
            "value" => array(
                esc_html__('Hidden', 'lerp') => 'no',
                esc_html__('Visible', 'lerp') => 'yes',
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay animation", 'lerp'),
            "param_name" => "single_overlay_anim",
            "description" => esc_html__("Activate this to animate the overlay on mouse over.", 'lerp'),
            "value" => array(
                esc_html__('Animated', 'lerp') => 'yes',
                esc_html__('Static', 'lerp') => 'no',
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Image coloration", 'lerp'),
            "param_name" => "single_image_coloration",
            "description" => esc_html__("Specify the image coloration mode.", 'lerp'),
            "value" => array(
                esc_html__('Standard', 'lerp') => '',
                esc_html__('Desaturated', 'lerp') => 'desaturated',
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Image coloration animation", 'lerp'),
            "param_name" => "single_image_color_anim",
            "description" => esc_html__("Activate this to animate the image coloration on mouse over.", 'lerp'),
            "value" => array(
                esc_html__('Static', 'lerp') => '',
                esc_html__('Animated', 'lerp') => 'yes',
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Image animation", 'lerp'),
            "param_name" => "single_image_anim",
            "description" => esc_html__("Activate this to animate the image on mouse over.", 'lerp'),
            "value" => array(
                esc_html__('Animated', 'lerp') => 'yes',
                esc_html__('Static', 'lerp') => 'no',
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text horizontal alignment", 'lerp'),
            "param_name" => "single_h_align",
            "description" => esc_html__("Specify the horizontal alignment.", 'lerp'),
            "value" => array(
                esc_html__('Left', 'lerp') => 'left',
                esc_html__('Center', 'lerp') => 'center',
                esc_html__('Right', 'lerp') => 'right',
                esc_html__('Justify', 'lerp') => 'justify'
            ),
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Content vertical position", 'lerp'),
            "param_name" => "single_v_position",
            "description" => esc_html__("Specify the text vertical position.", 'lerp'),
            "value" => array(
                esc_html__('Middle', 'lerp') => '',
                esc_html__('Top', 'lerp') => 'top',
                esc_html__('Bottom', 'lerp') => 'bottom'
            ),
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Content dimension reduced", 'lerp'),
            "param_name" => "single_reduced",
            "description" => esc_html__("Specify the text reduction amount to shrink the overlay content dimension.", 'lerp'),
            "value" => array(
                esc_html__('100%', 'lerp') => '',
                esc_html__('75%', 'lerp') => 'three_quarter',
                esc_html__('50%', 'lerp') => 'half',
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Content dimension not reduced on mobile", 'lerp'),
            "param_name" => "single_reduced_mobile",
            "description" => esc_html__("Activate this to have 100% content wide on mobile devices.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Blocks", 'lerp'),
            'dependency' => array(
                'element' => 'single_reduced',
                'value' => array('three_quarter', 'half'),
            )
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Content horizontal position", 'lerp'),
            "param_name" => "single_h_position",
            "description" => esc_html__("Specify the text horizontal position.", 'lerp'),
            "value" => array(
                esc_html__('Left', 'lerp') => 'left',
                esc_html__('Center', 'lerp') => 'center',
                esc_html__('Right', 'lerp') => 'right'
            ),
            'group' => esc_html__('Blocks', 'lerp'),
            'dependency' => array(
                'element' => 'single_reduced',
                'not_empty' => true,
            )
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Padding around text", 'lerp'),
            "param_name" => "single_padding",
            "min" => 0,
            "max" => 5,
            "step" => 1,
            "value" => 2,
            "description" => esc_html__("Set the text padding", 'lerp'),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Reduce space between elements", 'lerp'),
            "param_name" => "single_text_reduced",
            "description" => esc_html__("Activate this to have less space between all the text elements inside the box.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Multiple click areas", 'lerp'),
            "param_name" => "single_elements_click",
            "description" => esc_html__("Activate this to make every single elements clickable instead of the whole block (when available).", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Blocks", 'lerp'),
            'dependency' => array(
                'element' => 'single_text',
                'value' => 'overlay',
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title text trasnform", 'lerp'),
            "param_name" => "single_title_transform",
            "description" => esc_html__("Specify the title text transformation.", 'lerp'),
            "value" => array(
                esc_html__('Default CSS', 'lerp') => '',
                esc_html__('Uppercase', 'lerp') => 'uppercase',
                esc_html__('Lowercase', 'lerp') => 'lowercase',
                esc_html__('Capitalize', 'lerp') => 'capitalize'
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title dimension", 'lerp'),
            "param_name" => "single_title_dimension",
            "description" => esc_html__("Specify the title dimension.", 'lerp'),
            "value" => $heading_size,
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title font family", 'lerp'),
            "param_name" => "single_title_family",
            "description" => esc_html__("Specify the title font family.", 'lerp'),
            "value" => $heading_font,
            'std' => '',
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title font weight", 'lerp'),
            "param_name" => "single_title_weight",
            "description" => esc_html__("Specify the title font weight.", 'lerp'),
            "value" => $heading_weight,
            'std' => '',
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title line height", 'lerp'),
            "param_name" => "single_title_height",
            "description" => esc_html__("Specify the title line height.", 'lerp'),
            "value" => $heading_height,
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title letter spacing", 'lerp'),
            "param_name" => "single_title_space",
            "description" => esc_html__("Specify the title letter spacing.", 'lerp'),
            "value" => $heading_space,
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'lerp'),
            'param_name' => 'single_icon',
            'description' => esc_html__('Specify icon from library.', 'lerp'),
            'value' => '',
            'settings' => array(
                'emptyIcon' => true,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 1100,
                // default 100, how many icons per/page to display
                'type' => 'lerp'
            ),
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('Custom link', 'lerp'),
            'param_name' => 'single_link',
            'description' => esc_html__('Enter the custom link for the item.', 'lerp'),
            'group' => esc_html__('Blocks', 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shadow", 'lerp'),
            "param_name" => "single_shadow",
            "description" => esc_html__("Activate this for the shadow effect.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Shadow type", 'lerp'),
            "param_name" => "shadow_weight",
            "description" => esc_html__("Specify the shadow option preset.", 'lerp'),
            "group" => esc_html__("Blocks", 'lerp'),
            "value" => array(
                esc_html__('None', 'lerp') => '',
                esc_html__('Extra Small', 'lerp') => 'xs',
                esc_html__('Small', 'lerp') => 'sm',
                esc_html__('Standard', 'lerp') => 'std',
                esc_html__('Large', 'lerp') => 'lg',
                esc_html__('Extra Large', 'lerp') => 'xl',
            ),
            'dependency' => array(
                'element' => 'single_shadow',
                'not_empty' => true
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shadow Darker", 'lerp'),
            "param_name" => "shadow_darker",
            "description" => esc_html__("Activate this for the dark shadow effect.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Blocks", 'lerp'),
            'dependency' => array(
                'element' => 'single_shadow',
                'not_empty' => true
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("No border", 'lerp'),
            "param_name" => "single_border",
            "description" => esc_html__("Activate this to remove the border around the block.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Blocks", 'lerp'),
        ),
        array_merge($add_css_animation, array(
            "group" => esc_html__("Blocks", 'lerp'),
            "param_name" => 'single_css_animation'
        )),
        array_merge($add_animation_speed, array(
            "group" => esc_html__("Blocks", 'lerp'),
            "param_name" => 'single_animation_speed',
            'dependency' => array(
                'element' => 'single_css_animation',
                'not_empty' => true
            )
        )),
        array_merge($add_animation_delay, array(
            "group" => esc_html__("Blocks", 'lerp'),
            "param_name" => 'single_animation_delay',
            'dependency' => array(
                'element' => 'single_css_animation',
                'not_empty' => true
            )
        )),
        array(
            'type' => 'lerp_items',
            'heading' => '',
            'param_name' => 'items',
            'description' => esc_html__('Enter text which will be used as widget title. Leave blank if no title is needed.', 'lerp'),
            'group' => esc_html__('Single block', 'lerp'),
            'dependency' => array(
                'element' => 'explode_albums',
                'is_empty' => true
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => 'Skin',
            'param_name' => 'lbox_skin',
            'value' => array(
                esc_html__('Dark', 'lerp') => '',
                esc_html__('Light', 'lerp') => 'white',
            ),
            'description' => esc_html__('Specify the lightbox skin color.', 'lerp'),
            'group' => esc_html__('Lightbox', 'lerp'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => 'Direction',
            'param_name' => 'lbox_dir',
            'value' => array(
                esc_html__('Horizontal', 'lerp') => '',
                esc_html__('Vertical', 'lerp') => 'vertical',
            ),
            'description' => esc_html__('Specify the lightbox sliding direction.', 'lerp'),
            'group' => esc_html__('Lightbox', 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Title", 'lerp'),
            "param_name" => "lbox_title",
            "description" => esc_html__("Activate this to add the media title.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Caption", 'lerp'),
            "param_name" => "lbox_caption",
            "description" => esc_html__("Activate this to add the media caption.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Social", 'lerp'),
            "param_name" => "lbox_social",
            "description" => esc_html__("Activate this for the social sharing buttons.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Deeplinking", 'lerp'),
            "param_name" => "lbox_deep",
            "description" => esc_html__("Activate this for the deeplinking of every slide.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("No thumbnails", 'lerp'),
            "param_name" => "lbox_no_tmb",
            "description" => esc_html__("Activate this for not showing the thumbnails.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("No arrows", 'lerp'),
            "param_name" => "lbox_no_arrows",
            "description" => esc_html__("Activate this for not showing the navigation arrows.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Remove double tap", 'lerp'),
            "param_name" => "no_double_tap",
            "description" => esc_html__("Remove the double tap action on mobile. This doesn't work with lightbox.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Mobile", 'lerp'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp'),
            'group' => esc_html__('Extra', 'lerp')
        )
    )
));

/* Text Block
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Text Block', 'lerp'),
    'base' => 'vc_column_text',
    'weight' => 98,
    'icon' => 'fa fa-font',
    'wrapper_class' => 'clearfix',
    'php_class_name' => 'lerp_generic_admin',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Basic block of text', 'lerp'),
    'params' => array(
        array(
            'type' => 'textarea_html',
            'holder' => 'div',
            'heading' => esc_html__('Text', 'lerp'),
            'param_name' => 'content',
            'value' => wp_kses(__('<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'lerp'), array('p' => array()))
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Text lead", 'lerp'),
            "param_name" => "text_lead",
            "description" => esc_html__("Transform the text to leading.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'lerp'),
            'param_name' => 'css',
            'group' => esc_html__('Custom', 'lerp')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border color", 'lerp'),
            "param_name" => "border_color",
            "description" => esc_html__("Specify a border color.", 'lerp'),
            "group" => esc_html__("Custom", 'lerp'),
            "value" => $lerp_colors_w_transp,
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border style", 'lerp'),
            "param_name" => "border_style",
            "description" => esc_html__("Specify a border style.", 'lerp'),
            "group" => esc_html__("Custom", 'lerp'),
            "value" => $border_style,
        ),
    ),
    'js_view' => 'LerpTextView'
));

/* Separator (Divider)
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Divider', 'lerp'),
    'base' => 'vc_separator',
    'weight' => 82,
    'icon' => 'fa fa-arrows-h',
    'show_settings_on_create' => true,
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Horizontal divider', 'lerp'),
    'params' => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Color", 'lerp'),
            "param_name" => "sep_color",
            "description" => esc_html__("Separator color.", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'lerp'),
            'param_name' => 'icon',
            'description' => esc_html__('Specify icon from library.', 'lerp'),
            'value' => '',
            'settings' => array(
                'emptyIcon' => true,
                'iconsPerPage' => 1100,
                'type' => 'lerp'
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon position', 'lerp'),
            'param_name' => 'icon_position',
            'value' => array(
                esc_html__('Center', 'lerp') => '',
                esc_html__('Left', 'lerp') => 'left',
                esc_html__('Right', 'lerp') => "right"
            ),
            'description' => esc_html__('Specify title location.', 'lerp')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'lerp'),
            'param_name' => 'type',
            'value' => getVcShared('separator styles'),
            'description' => esc_html__('Separator style.', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Custom width', 'lerp'),
            'param_name' => 'el_width',
            'description' => esc_html__('Insert the custom value in % or px.', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Custom thickness', 'lerp'),
            'param_name' => 'el_height',
            'description' => esc_html__('Insert the custom value in em or px. This option can\'t be used with the separator with the icon.', 'lerp'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Activate scroll to top', 'lerp'),
            'param_name' => 'scroll_top',
            'description' => esc_html__('Activate if you want the scroll top function with the icon.', 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'icon',
                'not_empty' => true
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('URL (Link)', 'lerp'),
            'param_name' => 'link',
            'description' => esc_html__('Separator link.', 'lerp'),
            'dependency' => array(
                'element' => 'icon',
                'not_empty' => true
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Desktop", 'lerp'),
            "param_name" => "desktop_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in desktop layout mode (960px >).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Tablet", 'lerp'),
            "param_name" => "medium_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in tablet layout mode (570px > < 960px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Mobile", 'lerp'),
            "param_name" => "mobile_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in mobile layout mode (< 570px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

/* Message box
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Message Box', 'lerp'),
    'base' => 'vc_message',
    'php_class_name' => 'lerp_message',
    'icon' => 'fa fa-info',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Notification element', 'lerp'),
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Message box type', 'lerp'),
            'param_name' => 'message_color',
            'admin_label' => true,
            'value' => $lerp_colors,
            'description' => esc_html__('Specify message type.', 'lerp'),
            'param_holder_class' => 'vc_message-type'
        ),
        array(
            'type' => 'textarea_html',
            'class' => 'messagebox_text',
            'param_name' => 'content',
            'heading' => esc_html__('Message text', 'lerp'),
            'value' => wp_kses(__('<p>I am message box. Click edit button to change this text.</p>', 'lerp'), array('p' => array()))
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    ),
));

/* Single image */
vc_map(array(
    'name' => esc_html__('Single Media', 'lerp'),
    'base' => 'vc_single_image',
    'icon' => 'fa fa-image',
    'weight' => 101,
    'php_class_name' => 'lerp_generic_admin',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Simple media item', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('Enter text which will be used as widget title. Leave blank if no title is needed.', 'lerp')
        ),
        array(
            "type" => "media_element",
            "heading" => esc_html__("Media", 'lerp'),
            "param_name" => "media",
            "value" => "",
            "description" => esc_html__("Specify a media from the Media Library.", 'lerp'),
            "admin_label" => true
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Caption", 'lerp'),
            "param_name" => "caption",
            "description" => 'Activate to have the caption under the image.',
            "value" => array(
                '' => 'yes'
            )
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Lightbox', 'lerp'),
            'param_name' => 'media_lightbox',
            'description' => esc_html__('Activate if you want to open the media in the lightbox.', 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            )
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Poster', 'lerp'),
            'param_name' => 'media_poster',
            'description' => esc_html__('Activate if you want to view the poster image instead (this is usefull for other media than images with the use of the lightbox).', 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            )
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('URL (Link)', 'lerp'),
            'param_name' => 'media_link',
            'description' => esc_html__('Enter URL if you want this image to have a link.', 'lerp'),
            'dependency' => array(
                'element' => 'media_link_large',
                'is_empty' => true,
            )
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Width", 'lerp'),
            "param_name" => "media_width_use_pixel",
            "description" => 'Set this value if you want to constrain the media width.',
            "group" => esc_html__("Aspect", 'lerp'),
            "value" => array(
                '' => 'yes'
            )
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => '',
            "param_name" => "media_width_percent",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 100,
            "description" => esc_html__("Set the media width with a percent value.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            'dependency' => array(
                'element' => 'media_width_use_pixel',
                'is_empty' => true,
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => '',
            'param_name' => 'media_width_pixel',
            'description' => esc_html__("Insert the media width in pixel.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            'dependency' => array(
                'element' => 'media_width_use_pixel',
                'value' => 'yes'
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Aspect ratio', 'lerp'),
            'param_name' => 'media_ratio',
            'description' => esc_html__('Specify the aspect ratio for the media.', 'lerp'),
            "value" => array(
                esc_html__('Regular', 'lerp') => '',
                esc_html__('1:1', 'lerp') => 'one-one',
                esc_html__('4:3', 'lerp') => 'four-three',
                esc_html__('3:2', 'lerp') => 'three-two',
                esc_html__('16:9', 'lerp') => 'sixteen-nine',
                esc_html__('21:9', 'lerp') => 'twentyone-nine',
                esc_html__('3:4', 'lerp') => 'three-four',
                esc_html__('2:3', 'lerp') => 'two-three',
                esc_html__('9:16', 'lerp') => 'nine-sixteen',
            ),
            'group' => esc_html__('Aspect', 'lerp'),
            'admin_label' => true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Alignment', 'lerp'),
            'param_name' => 'alignment',
            'value' => array(
                esc_html__('Align left', 'lerp') => '',
                esc_html__('Align right', 'lerp') => 'right',
                esc_html__('Align center', 'lerp') => 'center'
            ),
            'description' => esc_html__('Specify image alignment.', 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Shape', 'lerp'),
            'param_name' => 'shape',
            'value' => array(
                esc_html__('Select…', 'lerp') => '',
                esc_html__('Rounded', 'lerp') => 'img-round',
                esc_html__('Circular', 'lerp') => 'img-circle'
            ),
            'description' => esc_html__('Specify media shape.', 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Border radius", 'lerp'),
            "param_name" => "radius",
            "description" => esc_html__("Specify the border radius effect.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            "std" => "",
            "value" => array(
                esc_html__('Extra Small', 'lerp') => 'xs',
                esc_html__('Small', 'lerp') => ' ',
                esc_html__('Standard', 'lerp') => 'std',
                esc_html__('Large', 'lerp') => 'lg',
                esc_html__('Extra Large', 'lerp') => 'xl',
            ),
            "std" => ' ',
            'dependency' => array(
                'element' => 'shape',
                'value' => 'img-round'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Thumbnail border", 'lerp'),
            "param_name" => "border",
            "description" => 'Activate to have a border around like a thumbnail.',
            "group" => esc_html__("Aspect", 'lerp'),
            "value" => array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shadow", 'lerp'),
            "param_name" => "shadow",
            "description" => 'Activate this for the shadow effect.',
            "group" => esc_html__("Aspect", 'lerp'),
            "value" => array(
                '' => 'yes'
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Shadow type", 'lerp'),
            "param_name" => "shadow_weight",
            "description" => esc_html__("Specify the shadow option preset.", 'lerp'),
            "group" => esc_html__("Aspect", 'lerp'),
            "value" => array(
                esc_html__('None', 'lerp') => '',
                esc_html__('Extra Small', 'lerp') => 'xs',
                esc_html__('Small', 'lerp') => 'sm',
                esc_html__('Standard', 'lerp') => 'std',
                esc_html__('Large', 'lerp') => 'lg',
                esc_html__('Extra Large', 'lerp') => 'xl',
            ),
            'dependency' => array(
                'element' => 'shadow',
                'not_empty' => true
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Shadow Darker", 'lerp'),
            "param_name" => "shadow_darker",
            "description" => esc_html__("Activate this for the dark shadow effect.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Aspect", 'lerp'),
            'dependency' => array(
                'element' => 'shadow',
                'not_empty' => true
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Activate advanced preset", 'lerp'),
            "param_name" => "advanced",
            "description" => 'Activate if you want to have advanced options.',
            "group" => esc_html__("Aspect", 'lerp'),
            "value" => array(
                '' => 'yes'
            )
        ),
        array(
            'type' => 'sorted_list',
            'heading' => esc_html__('Media', 'lerp'),
            'param_name' => 'media_items',
            'description' => esc_html__('Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overridden on post to post basis.', 'lerp'),
            'value' => 'media',
            "group" => esc_html__("Advanced", 'lerp'),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            'options' => array(
                array(
                    'media',
                    esc_html__('Media', 'lerp'),
                    array(
                        array(
                            'original',
                            esc_html__('Original', 'lerp')
                        ),
                        array(
                            'poster',
                            esc_html__('Poster', 'lerp')
                        )
                    )
                ),
                array(
                    'icon',
                    esc_html__('Icon', 'lerp'),
                    array(
                        array(
                            '',
                            esc_html__('Small', 'lerp')
                        ),
                        array(
                            'md',
                            esc_html__('Medium', 'lerp')
                        ),
                        array(
                            'lg',
                            esc_html__('Large', 'lerp')
                        ),
                        array(
                            'xl',
                            esc_html__('Extra Large', 'lerp')
                        )
                    ),
                ),
                array(
                    'title',
                    esc_html__('Title', 'lerp'),
                ),
                array(
                    'caption',
                    esc_html__('Caption', 'lerp'),
                ),
                array(
                    'description',
                    esc_html__('Description', 'lerp'),
                ),
                array(
                    'spacer',
                    esc_html__('Spacer', 'lerp'),
                    array(
                        array(
                            'half',
                            esc_html__('0.5x', 'lerp')
                        ),
                        array(
                            'one',
                            esc_html__('1x', 'lerp')
                        ),
                        array(
                            'two',
                            esc_html__('2x', 'lerp')
                        )
                    )
                ),
                array(
                    'sep-one',
                    esc_html__('Separator One', 'lerp'),
                    array(
                        array(
                            'full',
                            esc_html__('Full width', 'lerp')
                        ),
                        array(
                            'reduced',
                            esc_html__('Reduced width', 'lerp')
                        )
                    )
                ),
                array(
                    'sep-two',
                    esc_html__('Separator Two', 'lerp'),
                    array(
                        array(
                            'full',
                            esc_html__('Full width', 'lerp')
                        ),
                        array(
                            'reduced',
                            esc_html__('Reduced width', 'lerp')
                        )
                    )
                ),
                array(
                    'team-social',
                    esc_html__('Team socials', 'lerp'),
                ),
            )
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Block layout", 'lerp'),
            "param_name" => "media_text",
            "description" => esc_html__("Specify the text positioning inside the box.", 'lerp'),
            "value" => array(
                esc_html__('Content overlay', 'lerp') => 'overlay',
                esc_html__('Content under image', 'lerp') => 'under'
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            'group' => esc_html__('Advanced', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Skin", 'lerp'),
            "param_name" => "media_style",
            "description" => esc_html__("Specify the skin inside the content box.", 'lerp'),
            "value" => array(
                esc_html__('Light', 'lerp') => 'light',
                esc_html__('Dark', 'lerp') => 'dark'
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            'group' => esc_html__('Advanced', 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Background color", 'lerp'),
            "param_name" => "media_back_color",
            "description" => esc_html__("Specify a background color for the box.", 'lerp'),
            "value" => $lerp_colors,
            'group' => esc_html__('Advanced', 'lerp'),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Overlay color", 'lerp'),
            "param_name" => "media_overlay_color",
            "description" => esc_html__("Specify a background color for the box.", 'lerp'),
            "value" => $lerp_colors,
            'group' => esc_html__('Advanced', 'lerp'),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay coloration", 'lerp'),
            "param_name" => "media_overlay_coloration",
            "description" => wp_kses(__("Specify the coloration style for the overlay.<br />NB. For the gradient you can't customize the overlay color.", 'lerp'), array('br' => array())),
            "value" => array(
                esc_html__('Fully colored', 'lerp') => '',
                esc_html__('Gradient top', 'lerp') => 'top_gradient',
                esc_html__('Gradient bottom', 'lerp') => 'bottom_gradient',
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            'group' => esc_html__('Advanced', 'lerp'),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Overlay opacity", 'lerp'),
            "param_name" => "media_overlay_opacity",
            "min" => 1,
            "max" => 100,
            "step" => 1,
            "value" => 50,
            "description" => esc_html__("Set the overlay opacity.", 'lerp'),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            'group' => esc_html__('Advanced', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay text visibility", 'lerp'),
            "param_name" => "media_text_visible",
            "description" => esc_html__("Activate this to show the text as starting point.", 'lerp'),
            "value" => array(
                esc_html__('Hidden', 'lerp') => 'no',
                esc_html__('Visible', 'lerp') => 'yes',
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay text animation", 'lerp'),
            "param_name" => "media_text_anim",
            "description" => esc_html__("Activate this to animate the text on mouse over.", 'lerp'),
            "value" => array(
                esc_html__('Animated', 'lerp') => 'yes',
                esc_html__('Static', 'lerp') => 'no',
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay text animation type", 'lerp'),
            "param_name" => "media_text_anim_type",
            "description" => esc_html__("Specify the animation type.", 'lerp'),
            "value" => array(
                esc_html__('Opacity', 'lerp') => '',
                esc_html__('Bottom to top', 'lerp') => 'btt',
            ),
            "group" => esc_html__("Advanced", 'lerp'),
            'dependency' => array(
                'element' => 'media_text_anim',
                'value' => 'yes',
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay visibility", 'lerp'),
            "param_name" => "media_overlay_visible",
            "description" => esc_html__("Activate this to show the overlay as starting point.", 'lerp'),
            "value" => array(
                esc_html__('Hidden', 'lerp') => 'no',
                esc_html__('Visible', 'lerp') => 'yes',
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Overlay animation", 'lerp'),
            "param_name" => "media_overlay_anim",
            "description" => esc_html__("Activate this to animate the overlay on mouse over.", 'lerp'),
            "value" => array(
                esc_html__('Animated', 'lerp') => 'yes',
                esc_html__('Static', 'lerp') => 'no',
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Image coloration", 'lerp'),
            "param_name" => "media_image_coloration",
            "description" => esc_html__("Specify the image coloration mode.", 'lerp'),
            "value" => array(
                esc_html__('Standard', 'lerp') => '',
                esc_html__('Desaturated', 'lerp') => 'desaturated',
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Image coloration animation", 'lerp'),
            "param_name" => "media_image_color_anim",
            "description" => esc_html__("Activate this to animate the image coloration on mouse over.", 'lerp'),
            "value" => array(
                esc_html__('Static', 'lerp') => '',
                esc_html__('Animated', 'lerp') => 'yes',
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Image animation", 'lerp'),
            "param_name" => "media_image_anim",
            "description" => esc_html__("Activate this to animate the image on mouse over.", 'lerp'),
            "value" => array(
                esc_html__('Animated', 'lerp') => 'yes',
                esc_html__('Static', 'lerp') => 'no',
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text horizontal alignment", 'lerp'),
            "param_name" => "media_h_align",
            "description" => esc_html__("Specify the horizontal alignment.", 'lerp'),
            "value" => array(
                esc_html__('Left', 'lerp') => 'left',
                esc_html__('Center', 'lerp') => 'center',
                esc_html__('Right', 'lerp') => 'right',
                esc_html__('Justify', 'lerp') => 'justify'
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            'group' => esc_html__('Advanced', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Content vertical position", 'lerp'),
            "param_name" => "media_v_position",
            "description" => esc_html__("Specify the text vertical position.", 'lerp'),
            "value" => array(
                esc_html__('Middle', 'lerp') => '',
                esc_html__('Top', 'lerp') => 'top',
                esc_html__('Bottom', 'lerp') => 'bottom'
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            'group' => esc_html__('Advanced', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Content dimension reduced", 'lerp'),
            "param_name" => "media_reduced",
            "description" => esc_html__("Specify the text reduction amount to shrink the overlay content dimension.", 'lerp'),
            "value" => array(
                esc_html__('100%', 'lerp') => '',
                esc_html__('75%', 'lerp') => 'three_quarter',
                esc_html__('50%', 'lerp') => 'half',
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Content horizontal position", 'lerp'),
            "param_name" => "media_h_position",
            "description" => esc_html__("Specify the text horizontal position.", 'lerp'),
            "value" => array(
                esc_html__('Left', 'lerp') => 'left',
                esc_html__('Center', 'lerp') => 'center',
                esc_html__('Right', 'lerp') => 'right'
            ),
            'group' => esc_html__('Advanced', 'lerp'),
            'dependency' => array(
                'element' => 'media_reduced',
                'not_empty' => true,
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Padding around text", 'lerp'),
            "param_name" => "media_padding",
            "min" => 0,
            "max" => 5,
            "step" => 1,
            "value" => 2,
            "description" => esc_html__("Set the text padding", 'lerp'),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Reduce space between elements", 'lerp'),
            "param_name" => "media_text_reduced",
            "description" => esc_html__("Activate this to have less space between all the text elements inside the box.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Multiple click areas", 'lerp'),
            "param_name" => "media_elements_click",
            "description" => esc_html__("Activate this to make every single elements clickable instead of the whole block (when available).", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
            'dependency' => array(
                'element' => 'media_text',
                'value' => 'overlay',
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title text transform", 'lerp'),
            "param_name" => "media_title_transform",
            "description" => esc_html__("Specify the title text transformation.", 'lerp'),
            "value" => array(
                esc_html__('Default CSS', 'lerp') => '',
                esc_html__('Uppercase', 'lerp') => 'uppercase',
                esc_html__('Lowercase', 'lerp') => 'lowercase',
                esc_html__('Capitalize', 'lerp') => 'capitalize'
            ),
            "group" => esc_html__("Advanced", 'lerp'),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title dimension", 'lerp'),
            "param_name" => "media_title_dimension",
            "description" => esc_html__("Specify the title dimension.", 'lerp'),
            "value" => $heading_size,
            "group" => esc_html__("Advanced", 'lerp'),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title font family", 'lerp'),
            "param_name" => "media_title_family",
            "description" => esc_html__("Specify the title font family.", 'lerp'),
            "value" => $heading_font,
            'std' => '',
            "group" => esc_html__("Advanced", 'lerp'),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title font weight", 'lerp'),
            "param_name" => "media_title_weight",
            "description" => esc_html__("Specify the title font weight.", 'lerp'),
            "value" => $heading_weight,
            'std' => '',
            "group" => esc_html__("Advanced", 'lerp'),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title line height", 'lerp'),
            "param_name" => "media_title_height",
            "description" => esc_html__("Specify the title line height.", 'lerp'),
            "value" => $heading_height,
            "group" => esc_html__("Advanced", 'lerp'),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title letter spacing", 'lerp'),
            "param_name" => "media_title_space",
            "description" => esc_html__("Specify the title letter spacing.", 'lerp'),
            "value" => $heading_space,
            "group" => esc_html__("Advanced", 'lerp'),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'lerp'),
            'param_name' => 'media_icon',
            'description' => esc_html__('Specify icon from library.', 'lerp'),
            'value' => '',
            'settings' => array(
                'emptyIcon' => true,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 1100,
                // default 100, how many icons per/page to display
                'type' => 'lerp'
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes'
            ),
            'group' => esc_html__('Advanced', 'lerp'),
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
        array(
            'type' => 'dropdown',
            'heading' => 'Skin',
            'param_name' => 'lbox_skin',
            'value' => array(
                esc_html__('Dark', 'lerp') => '',
                esc_html__('Light', 'lerp') => 'white',
            ),
            'description' => esc_html__('Specify the lightbox skin color.', 'lerp'),
            'group' => esc_html__('Lightbox', 'lerp'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => 'Direction',
            'param_name' => 'lbox_dir',
            'value' => array(
                esc_html__('Horizontal', 'lerp') => '',
                esc_html__('Vertical', 'lerp') => 'vertical',
            ),
            'description' => esc_html__('Specify the lightbox sliding direction.', 'lerp'),
            'group' => esc_html__('Lightbox', 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Title", 'lerp'),
            "param_name" => "lbox_title",
            "description" => esc_html__("Activate this to add the media title.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Caption", 'lerp'),
            "param_name" => "lbox_caption",
            "description" => esc_html__("Activate this to add the media caption.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Social", 'lerp'),
            "param_name" => "lbox_social",
            "description" => esc_html__("Activate this for the social sharing buttons.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Deeplinking", 'lerp'),
            "param_name" => "lbox_deep",
            "description" => esc_html__("Activate this for the deeplinking of every slide.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("No thumbnails", 'lerp'),
            "param_name" => "lbox_no_tmb",
            "description" => esc_html__("Activate this for not showing the thumbnails.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("No arrows", 'lerp'),
            "param_name" => "lbox_no_arrows",
            "description" => esc_html__("Activate this for not showing the navigation arrows.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Connect to other media in page", 'lerp'),
            "param_name" => "lbox_connected",
            "description" => esc_html__("Activate this to connect the lightbox with other medias in the same page with this option active.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Remove double tap", 'lerp'),
            "param_name" => "no_double_tap",
            "description" => esc_html__("Remove the double tap action on mobile.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'advanced',
                'value' => 'yes',
            ),
            "group" => esc_html__("Mobile", 'lerp'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            "group" => esc_html__("Extra", 'lerp'),
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        ),
    )
));

/* Tabs
 ---------------------------------------------------------- */
$tab_id_1 = time() . '-1-' . rand(0, 100);
$tab_id_2 = time() . '-2-' . rand(0, 100);
vc_map(array(
    "name" => esc_html__('Tabs', 'lerp'),
    'base' => 'vc_tabs',
    'show_settings_on_create' => false,
    'is_container' => true,
    'icon' => 'fa fa-folder',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Tabbed contents', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('Enter text which will be used as widget title. Leave blank if no title is needed.', 'lerp')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Vertical tabs', 'lerp'),
            'param_name' => 'vertical',
            'description' => esc_html__('Specify checkbox to allow all sections to be collapsible.', 'lerp'),
            'value' => array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('History (permalinks)', 'lerp'),
            'param_name' => 'history',
            'description' => esc_html__('Activate this to activate url history for tabs.', 'lerp'),
            'value' => array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            )
        ),
    ),
    'custom_markup' => '
<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
<ul class="tabs_controls">
</ul>
%content%
</div>',
    'default_content' => '
[vc_tab title="' . esc_html__('Tab 1', 'lerp') . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
[vc_tab title="' . esc_html__('Tab 2', 'lerp') . '" tab_id="' . $tab_id_2 . '"][/vc_tab]
',
    'js_view' => 'VcTabsView'
));

vc_map(array(
    'name' => esc_html__('Tab', 'lerp'),
    'base' => 'vc_tab',
    'allowed_container_element' => 'vc_row',
    'is_container' => true,
    'content_element' => false,
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('Tab title.', 'lerp')
        ),
        array(
            'type' => 'tab_id',
            'heading' => esc_html__('Tab ID', 'lerp'),
            'param_name' => "tab_id",
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Slug', 'lerp'),
            'param_name' => "slug",
            'description' => esc_html__('Custom value used for permalink. This value has to be unique.', 'lerp')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Remove top margin', 'lerp'),
            'param_name' => 'no_margin',
            'description' => esc_html__('Activate this to remove the top margin.', 'lerp'),
            'value' => array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            )
        ),
    ),
    'js_view' => 'VcTabView'
));

/* Accordion block
 ---------------------------------------------------------- */
$panel_id_1 = time() . '-1-' . rand(0, 100);
$panel_id_2 = time() . '-2-' . rand(0, 100);
vc_map(array(
    'name' => esc_html__('Accordion', 'lerp'),
    'base' => 'vc_accordion',
    'show_settings_on_create' => false,
    'is_container' => true,
    'icon' => 'fa fa-indent',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Collapsible panels', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('Enter text which will be used as widget title. Leave blank if no title is needed.', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Active section', 'lerp'),
            'param_name' => 'active_tab',
            'description' => esc_html__('Enter section number to be active on load.', 'lerp')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('History (permalinks)', 'lerp'),
            'param_name' => 'history',
            'description' => esc_html__('Activate this to activate url history for tabs.', 'lerp'),
            'value' => array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    ),
    'custom_markup' => '
<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
%content%
</div>
<div class="tab_controls">
    <a class="add_tab" title="' . esc_html__('Add section', 'lerp') . '"><span class="vc_icon"></span> <span class="tab-label">' . esc_html__('Add section', 'lerp') . '</span></a>
</div>
',
    'default_content' => '
    [vc_accordion_tab title="' . esc_html__('Section 1', 'lerp') . '" tab_id="' . $panel_id_1 . '"][/vc_accordion_tab]
    [vc_accordion_tab title="' . esc_html__('Section 2', 'lerp') . '" tab_id="' . $panel_id_2 . '"][/vc_accordion_tab]
',
    'js_view' => 'LerpPanelsView'
));
vc_map(array(
    'name' => esc_html__('Section', 'lerp'),
    'base' => 'vc_accordion_tab',
    'allowed_container_element' => 'vc_row',
    'is_container' => true,
    'content_element' => false,
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('Accordion section title.', 'lerp')
        ),
        array(
            'type' => 'tab_id',
            'heading' => esc_html__('Tab ID', 'lerp'),
            'param_name' => "tab_id",
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Slug', 'lerp'),
            'param_name' => "slug",
            'description' => esc_html__('Custom value used for permalink. This value has to be unique.', 'lerp')
        ),
    ),
    'js_view' => 'VcAccordionTabView'
));

/* Widgetised sidebar
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Widgetised Sidebar', 'lerp'),
    'base' => 'vc_widget_sidebar',
    'weight' => 70,
    'class' => 'wpb_widget_sidebar_widget',
    'icon' => 'fa fa-tags',
    'category' => esc_html__('Structure', 'lerp'),
    'description' => esc_html__('Place widgetised sidebar', 'lerp'),
    'params' => array(
        array(
            'type' => 'widgetised_sidebars',
            'heading' => esc_html__('Sidebar', 'lerp'),
            'param_name' => 'sidebar_id',
            'description' => esc_html__('Specify which widget area output.', 'lerp'),
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

/* Button
 ---------------------------------------------------------- */
$icons_arr = array(
    esc_html__('None', 'lerp') => 'none',
    esc_html__('Address book icon', 'lerp') => 'wpb_address_book',
    esc_html__('Alarm clock icon', 'lerp') => 'wpb_alarm_clock',
    esc_html__('Anchor icon', 'lerp') => 'wpb_anchor',
    esc_html__('Application Image icon', 'lerp') => 'wpb_application_image',
    esc_html__('Arrow icon', 'lerp') => 'wpb_arrow',
    esc_html__('Asterisk icon', 'lerp') => 'wpb_asterisk',
    esc_html__('Hammer icon', 'lerp') => 'wpb_hammer',
    esc_html__('Balloon icon', 'lerp') => 'wpb_balloon',
    esc_html__('Balloon Buzz icon', 'lerp') => 'wpb_balloon_buzz',
    esc_html__('Balloon Facebook icon', 'lerp') => 'wpb_balloon_facebook',
    esc_html__('Balloon Twitter icon', 'lerp') => 'wpb_balloon_twitter',
    esc_html__('Battery icon', 'lerp') => 'wpb_battery',
    esc_html__('Binocular icon', 'lerp') => 'wpb_binocular',
    esc_html__('Document Excel icon', 'lerp') => 'wpb_document_excel',
    esc_html__('Document Image icon', 'lerp') => 'wpb_document_image',
    esc_html__('Document Music icon', 'lerp') => 'wpb_document_music',
    esc_html__('Document Office icon', 'lerp') => 'wpb_document_office',
    esc_html__('Document PDF icon', 'lerp') => 'wpb_document_pdf',
    esc_html__('Document Powerpoint icon', 'lerp') => 'wpb_document_powerpoint',
    esc_html__('Document Word icon', 'lerp') => 'wpb_document_word',
    esc_html__('Bookmark icon', 'lerp') => 'wpb_bookmark',
    esc_html__('Camcorder icon', 'lerp') => 'wpb_camcorder',
    esc_html__('Camera icon', 'lerp') => 'wpb_camera',
    esc_html__('Chart icon', 'lerp') => 'wpb_chart',
    esc_html__('Chart pie icon', 'lerp') => 'wpb_chart_pie',
    esc_html__('Clock icon', 'lerp') => 'wpb_clock',
    esc_html__('Fire icon', 'lerp') => 'wpb_fire',
    esc_html__('Heart icon', 'lerp') => 'wpb_heart',
    esc_html__('Mail icon', 'lerp') => 'wpb_mail',
    esc_html__('Play icon', 'lerp') => 'wpb_play',
    esc_html__('Shield icon', 'lerp') => 'wpb_shield',
    esc_html__('Video icon', 'lerp') => "wpb_video"
);

vc_map(array(
    'name' => esc_html__('Button', 'lerp'),
    'base' => 'vc_button',
    'weight' => 97,
    'icon' => 'fa fa-external-link',
    'php_class_name' => 'lerp_generic_admin',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Button element', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text', 'lerp'),
            'admin_label' => true,
            'param_name' => 'content',
            'value' => esc_html__('Text on the button', 'lerp'),
            'description' => esc_html__('Text on the button.', 'lerp')
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('URL (Link)', 'lerp'),
            'param_name' => 'link',
            'description' => esc_html__('Button link.', 'lerp')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Button color", 'lerp'),
            "param_name" => "button_color",
            "description" => esc_html__("Specify button color.", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Size', 'lerp'),
            'param_name' => 'size',
            'value' => $size_arr,
            'admin_label' => true,
            'description' => esc_html__('Button size.', 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text size", 'lerp'),
            "param_name" => "btn_link_size",
            "description" => esc_html__("Specify text size.", 'lerp'),
            'std' => '',
            "value" => $heading_size,
            'dependency' => array(
                'element' => 'size',
                'value' => 'link',
            )
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Shape", 'lerp'),
            "param_name" => "radius",
            "description" => esc_html__("You can shape the button with the corners round, squared or circle.", 'lerp'),
            "value" => array(
                esc_html__('Default', 'lerp') => '',
                esc_html__('Round', 'lerp') => 'btn-round',
                esc_html__('Circle', 'lerp') => 'btn-circle',
                esc_html__('Square', 'lerp') => 'btn-square'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Border animation", 'lerp'),
            "param_name" => "border_animation",
            "description" => esc_html__("Specify a button border animation.", 'lerp'),
            "value" => array(
                esc_html__('None', 'lerp') => '',
                esc_html__('Ripple Out', 'lerp') => 'btn-ripple-out',
                esc_html__('Ripple In', 'lerp') => 'btn-ripple-in',
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Fluid', 'lerp'),
            'param_name' => 'wide',
            'description' => esc_html__('Fluid buttons has 100% width.', 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            )
        ),
        array(
            "type" => 'textfield',
            "heading" => esc_html__("Fixed width", 'lerp'),
            "param_name" => "width",
            "description" => esc_html__("Add a fixed width in pixel.", 'lerp'),
            'dependency' => array(
                'element' => 'wide',
                'is_empty' => true,
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Hover effect", 'lerp'),
            "param_name" => "hover_fx",
            "description" => esc_html__("Specify an effect on hover state.", 'lerp'),
            "value" => array(
                'Inherit' => '',
                'Outlined' => 'outlined',
                'Flat' => 'full-colored',
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Outlined inverse', 'lerp'),
            'param_name' => 'outline',
            'description' => esc_html__("Outlined buttons don't have a full background color. NB. This option is available only with Hover Effect > Outlined.", 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            )
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Skin text', 'lerp'),
            'param_name' => 'text_skin',
            'description' => esc_html__("Keep the text color as the skin. NB. This option works well with Hover Effect > Outlined.", 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Shadow', 'lerp'),
            'param_name' => 'shadow',
            'description' => esc_html__('Activate this for the shadow effect.', 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Shadow type", 'lerp'),
            "param_name" => "shadow_weight",
            "description" => esc_html__("Specify the shadow option preset.", 'lerp'),
            "value" => array(
                esc_html__('Extra Small', 'lerp') => '',
                esc_html__('Small', 'lerp') => 'sm',
                esc_html__('Standard', 'lerp') => 'std',
                esc_html__('Large', 'lerp') => 'lg',
                esc_html__('Extra Large', 'lerp') => 'xl',
            ),
            'dependency' => array(
                'element' => 'shadow',
                'not_empty' => true
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Custom typography', 'lerp'),
            'param_name' => 'custom_typo',
            'description' => esc_html__('Define custom font settings.', 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            )
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'font_family',
            'heading' => esc_html__('Font family', 'lerp'),
            'description' => esc_html__('Specify the buttons font family.', 'lerp'),
            'std' => '',
            'value' => $button_font,
            'dependency' => array(
                'element' => 'custom_typo',
                'not_empty' => true,
            )
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'font_weight',
            'heading' => esc_html__('Font weight', 'lerp'),
            'description' => esc_html__('Specify the buttons font weight.', 'lerp'),
            'std' => '',
            'value' => $button_weight,
            'dependency' => array(
                'element' => 'custom_typo',
                'not_empty' => true,
            )
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'text_transform',
            'heading' => esc_html__('Text transform', 'lerp'),
            'description' => esc_html__('Specify the buttons text transform.', 'lerp'),
            'std' => '',
            'value' => array(
                array(
                    'value' => '',
                    'label' => esc_html__('Initial', 'lerp'),
                ),
                array(
                    'value' => 'uppercase',
                    'label' => esc_html__('Uppercase', 'lerp'),
                ),
                array(
                    'value' => 'lowercase',
                    'label' => esc_html__('Lowercase', 'lerp'),
                ),
                array(
                    'value' => 'capitalize',
                    'label' => esc_html__('Capitalize', 'lerp'),
                ),
            ),
            'dependency' => array(
                'element' => 'custom_typo',
                'not_empty' => true,
            )
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'letter_spacing',
            'heading' => esc_html__('Letter spacing', 'lerp'),
            'description' => esc_html__('Specify the letter spacing value.', 'lerp'),
            'value' => $btn_letter_spacing,
            'dependency' => array(
                'element' => 'custom_typo',
                'not_empty' => true,
            )
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Italic text', 'lerp'),
            'param_name' => 'Italic',
            'description' => esc_html__('Button with italic text style.', 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            )
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Border width", 'lerp'),
            "param_name" => "border_width",
            "min" => 0,
            "max" => 5,
            "step" => 1,
            "value" => 0,
            "description" => esc_html__("Specify button border width in pixels.", 'lerp'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'lerp'),
            'param_name' => 'icon',
            'description' => esc_html__('Specify icon from library.', 'lerp'),
            'settings' => array(
                'emptyIcon' => true,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 1100,
                // default 100, how many icons per/page to display
                'type' => 'lerp'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Icon position", 'lerp'),
            "param_name" => "icon_position",
            "description" => esc_html__("Choose the position of the icon.", 'lerp'),
            "value" => array(
                esc_html__('Left', 'lerp') => 'left',
                esc_html__('Right', 'lerp') => 'right',
            ),
            'dependency' => array(
                'element' => 'icon',
                'not_empty' => true,
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Layout display', 'lerp'),
            'param_name' => 'display',
            'description' => esc_html__('Specify the display mode.', 'lerp'),
            "value" => array(
                esc_html__('Block', 'lerp') => '',
                esc_html__('Inline', 'lerp') => 'inline',
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Margin top', 'lerp'),
            'param_name' => 'top_margin',
            'description' => esc_html__('Activate to add the top margin.', 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'display',
                'not_empty' => true,
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Rel attribute', 'lerp'),
            'param_name' => 'rel',
            'description' => wp_kses(__('Here you can add value for the rel attribute.<br>Example values: <b%value>nofollow</b>, <b%value>lightbox</b>.', 'lerp'), array('br' => array(), 'b' => array()))
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('onClick', 'lerp'),
            'param_name' => 'onclick',
            'description' => esc_html__('Advanced JavaScript code for onClick action.', 'lerp')
        ),
        array(
            'type' => 'media_element',
            'heading' => esc_html__('Media lightbox', 'lerp'),
            'param_name' => 'media_lightbox',
            'has_galleries' => true,
            'description' => esc_html__('Specify a media from the lightbox.', 'lerp'),
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
        array(
            'type' => 'dropdown',
            'heading' => 'Skin',
            'param_name' => 'lbox_skin',
            'value' => array(
                esc_html__('Dark', 'lerp') => '',
                esc_html__('Light', 'lerp') => 'white',
            ),
            'description' => esc_html__('Specify the lightbox skin color.', 'lerp'),
            'group' => esc_html__('Lightbox', 'lerp'),
            'dependency' => array(
                'element' => 'media_lightbox',
                'not_empty' => true,
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => 'Direction',
            'param_name' => 'lbox_dir',
            'value' => array(
                esc_html__('Horizontal', 'lerp') => '',
                esc_html__('Vertical', 'lerp') => 'vertical',
            ),
            'description' => esc_html__('Specify the lightbox sliding direction.', 'lerp'),
            'group' => esc_html__('Lightbox', 'lerp'),
            'dependency' => array(
                'element' => 'media_lightbox',
                'not_empty' => true,
            )
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Title", 'lerp'),
            "param_name" => "lbox_title",
            "description" => esc_html__("Activate this to add the media title.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
            'dependency' => array(
                'element' => 'media_lightbox',
                'not_empty' => true,
            )
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Caption", 'lerp'),
            "param_name" => "lbox_caption",
            "description" => esc_html__("Activate this to add the media caption.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
            'dependency' => array(
                'element' => 'media_lightbox',
                'not_empty' => true,
            )
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Social", 'lerp'),
            "param_name" => "lbox_social",
            "description" => esc_html__("Activate this for the social sharing buttons.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
            'dependency' => array(
                'element' => 'media_lightbox',
                'not_empty' => true,
            )
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Deeplinking", 'lerp'),
            "param_name" => "lbox_deep",
            "description" => esc_html__("Activate this for the deeplinking of every slide.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
            'dependency' => array(
                'element' => 'media_lightbox',
                'not_empty' => true,
            )
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("No thumbnails", 'lerp'),
            "param_name" => "lbox_no_tmb",
            "description" => esc_html__("Activate this for not showing the thumbnails.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
            'dependency' => array(
                'element' => 'media_lightbox',
                'not_empty' => true,
            )
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("No arrows", 'lerp'),
            "param_name" => "lbox_no_arrows",
            "description" => esc_html__("Activate this for not showing the navigation arrows.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
            'dependency' => array(
                'element' => 'media_lightbox',
                'not_empty' => true,
            )
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Connect to other media in page", 'lerp'),
            "param_name" => "lbox_connected",
            "description" => esc_html__("Activate this to connect the lightbox with other medias in the same page with this option active.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("Lightbox", 'lerp'),
            'dependency' => array(
                'element' => 'media_lightbox',
                'not_empty' => true,
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'group' => esc_html__('Extra', 'lerp'),
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    ),
    'js_view' => 'VcButtonView'
));

/* Google maps element
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Google Maps', 'lerp'),
    'base' => 'vc_gmaps',
    'weight' => 85,
    'icon' => 'fa fa-map-marker',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Map block', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('Enter text which will be used as widget title. Leave blank if no title is needed.', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Latitude, Longitude', 'lerp'),
            'param_name' => 'latlon',
            'description' => sprintf(wp_kses(__('To extract the Latitude and Longitude of your address, follow the instructions %s. 1) Use the directions under the section "Get the coordinates of a place" 2) Copy the coordinates 3) Paste the coordinates in the field with the "comma" sign.', 'lerp'), array('a' => array('href' => array(), 'target' => array()))), '<a href="https://support.google.com/maps/answer/18539?source=gsearch&hl=en" target="_blank">here</a>')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Map height', 'lerp'),
            'param_name' => 'size',
            'admin_label' => true,
            'description' => esc_html__('Enter map height in pixels. Example: 200 or leave it empty to make map responsive (in this case you need to declare a minimun height for the row and the column equal height or expanded).', 'lerp')
        ),
        array(
            'type' => 'textarea_safe',
            'heading' => esc_html__('Address', 'lerp'),
            'param_name' => 'address',
            'description' => esc_html__('Insert here the address in case you want it to be display on the bottom of the map.', 'lerp'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Map color', 'lerp'),
            'param_name' => 'map_color',
            'value' => $lerp_colors,
            'description' => esc_html__('Specify the map base color.', 'lerp'),
            //'admin_label' => true,
            'param_holder_class' => 'vc_colored-dropdown'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('UI color', 'lerp'),
            'param_name' => 'ui_color',
            'value' => $lerp_colors,
            'description' => esc_html__('Specify the UI color.', 'lerp'),
            //'admin_label' => true,
            'param_holder_class' => 'vc_colored-dropdown'
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Zoom", 'lerp'),
            "param_name" => "zoom",
            "min" => 0,
            "max" => 19,
            "step" => 1,
            "value" => 14,
            "description" => esc_html__("Set map zoom level.", 'lerp'),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Saturation", 'lerp'),
            "param_name" => "map_saturation",
            "min" => -100,
            "max" => 100,
            "step" => 1,
            "value" => -20,
            "description" => esc_html__("Set map color saturation.", 'lerp'),
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Brightness", 'lerp'),
            "param_name" => "map_brightness",
            "min" => -100,
            "max" => 100,
            "step" => 1,
            "value" => 5,
            "description" => esc_html__("Set map color brightness.", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Mobile no draggable", 'lerp'),
            "param_name" => "mobile_no_drag",
            "description" => esc_html__("Deactivate the drag function on mobile devices.", 'lerp'),
            'group' => esc_html__('Mobile', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'group' => esc_html__('Extra', 'lerp'),
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

/* Raw HTML
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Raw HTML', 'lerp'),
    'base' => 'vc_raw_html',
    'icon' => 'fa fa-code',
    'category' => esc_html__('Structure', 'lerp'),
    'wrapper_class' => 'clearfix',
    'description' => esc_html__('Output raw html code', 'lerp'),
    'params' => array(
        array(
            'type' => 'textarea_raw_html',
            'holder' => 'div',
            'heading' => esc_html__('Raw HTML', 'lerp'),
            'param_name' => 'content',
            'value' => base64_encode('<p>I am raw html block.<br/>Click edit button to change this html</p>'),
            'description' => esc_html__('Enter your HTML content.', 'lerp')
        ),
    )
));

/* Raw JS
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Raw JS', 'lerp'),
    'base' => 'vc_raw_js',
    'icon' => 'fa fa-code',
    'category' => esc_html__('Structure', 'lerp'),
    'wrapper_class' => 'clearfix',
    'description' => esc_html__('Output raw JavaScript code', 'lerp'),
    'params' => array(
        array(
            'type' => 'textarea_raw_html',
            'holder' => 'div',
            'heading' => esc_html__('Raw js', 'lerp'),
            'param_name' => 'content',
            'value' => esc_html__(base64_encode('<script type="text/javascript"> alert("Enter your js here!" ); </script>'), 'lerp'),
            'description' => esc_html__('Enter your JS code.', 'lerp')
        ),
    )
));

/* Flickr
 ---------------------------------------------------------- */
vc_map(array(
    'base' => 'vc_flickr',
    'name' => esc_html__('Flickr Widget', 'lerp'),
    'icon' => 'fa fa-flickr',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Image feed from Flickr', 'lerp'),
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('Enter text which will be used as widget title. Leave blank if no title is needed.', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Flickr ID', 'lerp'),
            'param_name' => 'flickr_id',
            'admin_label' => true,
            'description' => sprintf(wp_kses(__('To find your flickID visit %s.', 'lerp'), array('a' => array('href' => array(), 'target' => array()))), '<a href="http://idgettr.com/" target="_blank">idGettr</a>')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Number of photos', 'lerp'),
            'param_name' => 'count',
            'value' => array(
                9,
                8,
                7,
                6,
                5,
                4,
                3,
                2,
                1
            ),
            'description' => esc_html__('Number of photos.', 'lerp')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Type', 'lerp'),
            'param_name' => 'type',
            'value' => array(
                esc_html__('User', 'lerp') => 'user',
                esc_html__('Group', 'lerp') => 'group'
            ),
            'description' => esc_html__('Photo stream type.', 'lerp')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display', 'lerp'),
            'param_name' => 'display',
            'value' => array(
                esc_html__('Latest', 'lerp') => 'latest',
                esc_html__('Random', 'lerp') => 'random'
            ),
            'description' => esc_html__('Photo order.', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

/**
 * Pie chart
 */
vc_map(array(
    'name' => esc_html__('Pie chart', 'vc_extend'),
    'base' => 'vc_pie',
    'class' => '',
    'icon' => 'fa fa-pie-chart',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Animated pie chart', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('Enter text which will be used as widget title. Leave blank if no title is needed.', 'lerp'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Pie value', 'lerp'),
            'param_name' => 'value',
            'description' => esc_html__('Input graph value here. Choose range between 0 and 100.', 'lerp'),
            'value' => '50',
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Pie label value', 'lerp'),
            'param_name' => 'label_value',
            'description' => esc_html__('Input integer value for label. If empty "Pie value" will be used.', 'lerp'),
            'value' => ''
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Units', 'lerp'),
            'param_name' => 'units',
            'description' => esc_html__('Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.', 'lerp')
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Circle thickness", 'lerp'),
            "param_name" => "arc_width",
            "min" => 1,
            "max" => 30,
            "step" => 1,
            "value" => 5,
            "description" => esc_html__("Set the circle thickness.", 'lerp'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'lerp'),
            'param_name' => 'icon',
            'description' => esc_html__('Specify icon from library.', 'lerp'),
            'value' => '',
            'admin_label' => true,
            'settings' => array(
                'emptyIcon' => true,
                'iconsPerPage' => 1100,
                'type' => 'lerp'
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Bar color', 'lerp'),
            'param_name' => 'bar_color',
            'value' => $lerp_colors,
            'description' => esc_html__('Specify pie chart color.', 'lerp'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Coloring icon', 'lerp'),
            'param_name' => 'col_icon',
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            )
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        ),
    )
));

/* Graph
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Progress Bar', 'lerp'),
    'base' => 'vc_progress_bar',
    'icon' => 'fa fa-tasks',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Animated progress bar', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('Enter text which will be used as widget title. Leave blank if no title is needed.', 'lerp')
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Graphic values', 'lerp'),
            'param_name' => 'values',
            'description' => esc_html__('Enter values for graph - value, title and color.', 'lerp'),
            'value' => urlencode(json_encode(array(
                array(
                    'label' => esc_html__('Development', 'lerp'),
                    'value' => '90',
                ),
                array(
                    'label' => esc_html__('Design', 'lerp'),
                    'value' => '80',
                ),
                array(
                    'label' => esc_html__('Marketing', 'lerp'),
                    'value' => '70',
                ),
            ))),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Label', 'lerp'),
                    'param_name' => 'label',
                    'description' => esc_html__('Enter text used as title of bar.', 'lerp'),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Value', 'lerp'),
                    'param_name' => 'value',
                    'description' => esc_html__('Enter value of bar.', 'lerp'),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Bar color', 'lerp'),
                    'param_name' => 'bar_color',
                    'value' => $flat_lerp_colors,
                    'admin_label' => true,
                    'description' => esc_html__('Specify bar color.', 'lerp'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Background color', 'lerp'),
                    'param_name' => 'back_color',
                    'value' => $flat_lerp_colors,
                    'admin_label' => true,
                    'description' => esc_html__('Specify bar background color.', 'lerp'),
                ),
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Units', 'lerp'),
            'param_name' => 'units',
            'description' => esc_html__('Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.', 'lerp')
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

/* Support for 3rd Party plugins
 ---------------------------------------------------------- */

// Contact form 7 plugin
include_once(ABSPATH . 'wp-admin/includes/plugin.php');

// Require plugin.php to use is_plugin_active() below
if ( is_plugin_active('contact-form-7/wp-contact-form-7.php') ) {
    global $wpdb;
    $cf7 = $wpdb->get_results("
  SELECT ID, post_title
  FROM $wpdb->posts
  WHERE post_type = 'wpcf7_contact_form'
  ");
    $contact_forms = array(esc_html__('Select a form…', 'lerp') => 0);
    if ( $cf7 ) {
        foreach ( $cf7 as $cform ) {
            $contact_forms[$cform->post_title] = $cform->ID;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'lerp')] = 0;
    }
    vc_map(array(
        'base' => 'contact-form-7',
        'name' => esc_html__('Contact Form 7', 'lerp'),
        'icon' => 'fa fa-envelope',
        'category' => esc_html__('Content', 'lerp'),
        'description' => esc_html__('Place Contact Form7', 'lerp'),
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Form title', 'lerp'),
                'param_name' => 'title',
                'admin_label' => true,
                'description' => esc_html__('What text use as form title. Leave blank if no title is needed.', 'lerp')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Specify contact form', 'lerp'),
                'param_name' => 'id',
                'value' => $contact_forms,
                'description' => esc_html__('Choose previously created contact form from the drop down list.', 'lerp')
            ),
            $add_css_animation,
            $add_animation_speed,
            $add_animation_delay,
        )
    ));
}

// if contact form7 plugin active

/* WordPress default Widgets (Appearance->Widgets)
 ---------------------------------------------------------- */
vc_map(array(
    'name' => 'WP ' . esc_html__("Search", 'lerp'),
    'base' => 'vc_wp_search',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('A search form for your site', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Live search', 'lerp'),
            'param_name' => 'live_search',
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

vc_map(array(
    'name' => 'WP ' . esc_html__('Meta', 'lerp'),
    'base' => 'vc_wp_meta',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('Log in/out, admin, feed and WordPress links', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

vc_map(array(
    'name' => 'WP ' . esc_html__('Recent Comments', 'lerp'),
    'base' => 'vc_wp_recentcomments',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('The most recent comments', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number of comments to show', 'lerp'),
            'param_name' => 'number',
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

vc_map(array(
    'name' => 'WP ' . esc_html__('Calendar', 'lerp'),
    'base' => 'vc_wp_calendar',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('A calendar of your sites posts', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

vc_map(array(
    'name' => 'WP ' . esc_html__('Pages', 'lerp'),
    'base' => 'vc_wp_pages',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('Your sites WordPress Pages', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Sort by', 'lerp'),
            'param_name' => 'sortby',
            'value' => array(
                esc_html__('Page title', 'lerp') => 'post_title',
                esc_html__('Page order', 'lerp') => 'menu_order',
                esc_html__('Page ID', 'lerp') => 'ID'
            ),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Exclude', 'lerp'),
            'param_name' => 'exclude',
            'description' => esc_html__('Page IDs, separated by commas.', 'lerp'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

$tag_taxonomies = array();
foreach ( get_taxonomies() as $taxonomy ) {
    $tax = get_taxonomy($taxonomy);
    if ( !$tax->show_tagcloud || empty($tax->labels->name) ) {
        continue;
    }
    $tag_taxonomies[$tax->labels->name] = esc_attr($taxonomy);
}
vc_map(array(
    'name' => 'WP ' . esc_html__('Tag Cloud', 'lerp'),
    'base' => 'vc_wp_tagcloud',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('Your most used tags in cloud format', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Taxonomy', 'lerp'),
            'param_name' => 'taxonomy',
            'value' => $tag_taxonomies,
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

$custom_menus = array(esc_html__('Select…', 'lerp') => '');
$menus = get_terms('nav_menu', array(
    'hide_empty' => false
));
if ( is_array($menus) ) {
    foreach ( $menus as $single_menu ) {
        $custom_menus[$single_menu->name] = $single_menu->term_id;
    }
}
vc_map(array(
    'name' => 'WP ' . esc_html__("Custom Menu", 'lerp'),
    'base' => 'vc_wp_custommenu',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('Use this widget to add one of your custom menus as a widget', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Menu', 'lerp'),
            'param_name' => 'nav_menu',
            'value' => $custom_menus,
            'description' => empty($custom_menus) ? esc_html__('Custom menus not found. Please visit <b>Appearance > Menus</b> page to create new menu.', 'lerp') : esc_html__('Specify menu', 'lerp'),
            'admin_label' => true
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Horizontal menu', 'lerp'),
            'param_name' => 'nav_menu_horizontal',
            'value' => array(
                esc_html__('Yes, please', 'lerp') => true
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

vc_map(array(
    'name' => 'WP ' . esc_html__('Text', 'lerp'),
    'base' => 'vc_wp_text',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('Arbitrary text or HTML', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Text', 'lerp'),
            'param_name' => 'content',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

vc_map(array(
    'name' => 'WP ' . esc_html__('Recent Posts', 'lerp'),
    'base' => 'vc_wp_posts',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('The most recent posts on your site', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number of posts to show', 'lerp'),
            'param_name' => 'number',
            'admin_label' => true
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Display post date?', 'lerp'),
            'param_name' => 'show_date',
            'value' => array(
                esc_html__('Yes, please', 'lerp') => true
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

$link_category = array(
    esc_html__('All Links', 'lerp') => ''
);
$link_cats = get_terms('link_category');
if ( is_array($link_cats) ) {
    foreach ( $link_cats as $link_cat ) {
        $link_category[$link_cat->name] = $link_cat->term_id;
    }
}
vc_map(array(
    'name' => 'WP ' . esc_html__('Links', 'lerp'),
    'base' => 'vc_wp_links',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('Your blogroll', 'lerp'),
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Link Category', 'lerp'),
            'param_name' => 'category',
            'value' => $link_category,
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Sort by', 'lerp'),
            'param_name' => 'orderby',
            'value' => array(
                esc_html__('Link title', 'lerp') => 'name',
                esc_html__('Link rating', 'lerp') => 'rating',
                esc_html__('Link ID', 'lerp') => 'id',
                esc_html__('Random', 'lerp') => 'rand'
            )
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Options', 'lerp'),
            'param_name' => 'options',
            'value' => array(
                esc_html__('Show Link Image', 'lerp') => 'images',
                esc_html__('Show Link Name', 'lerp') => 'name',
                esc_html__('Show Link Description', 'lerp') => 'description',
                esc_html__('Show Link Rating', 'lerp') => 'rating'
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number of links to show', 'lerp'),
            'param_name' => 'limit'
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

vc_map(array(
    'name' => 'WP ' . esc_html__('Categories', 'lerp'),
    'base' => 'vc_wp_categories',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('A list or dropdown of categories', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Options', 'lerp'),
            'param_name' => 'options',
            'value' => array(
                esc_html__('Display as dropdown', 'lerp') => 'dropdown',
                esc_html__('Show post counts', 'lerp') => 'count',
                esc_html__('Show hierarchy', 'lerp') => 'hierarchical'
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

vc_map(array(
    'name' => 'WP ' . esc_html__('Archives', 'lerp'),
    'base' => 'vc_wp_archives',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('A monthly archive of your sites posts', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Options', 'lerp'),
            'param_name' => 'options',
            'value' => array(
                esc_html__('Display as dropdown', 'lerp') => 'dropdown',
                esc_html__('Show post counts', 'lerp') => 'count'
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

vc_map(array(
    'name' => 'WP ' . esc_html__('RSS', 'lerp'),
    'base' => 'vc_wp_rss',
    'icon' => 'fa fa-wordpress',
    'category' => esc_html__('WordPress Widgets', 'lerp'),
    'class' => 'wpb_vc_wp_widget',
    'weight' => -50,
    'description' => esc_html__('Entries from any RSS or Atom feed', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('What text use as a widget title. Leave blank to use default widget title.', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('RSS feed URL', 'lerp'),
            'param_name' => 'url',
            'description' => esc_html__('Enter the RSS feed URL.', 'lerp'),
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Items', 'lerp'),
            'param_name' => 'items',
            'value' => array(
                esc_html__('10 - Default', 'lerp') => '',
                1,
                2,
                3,
                4,
                5,
                6,
                7,
                8,
                9,
                10,
                11,
                12,
                13,
                14,
                15,
                16,
                17,
                18,
                19,
                20
            ),
            'description' => esc_html__('How many items would you like to display?', 'lerp'),
            'admin_label' => true
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Options', 'lerp'),
            'param_name' => 'options',
            'value' => array(
                esc_html__('Display item content?', 'lerp') => 'show_summary',
                esc_html__('Display item author if available?', 'lerp') => 'show_author',
                esc_html__('Display item date?', 'lerp') => 'show_date'
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        )
    )
));

/* Empty Space Element
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Empty Space', 'lerp'),
    'base' => 'vc_empty_space',
    'icon' => 'fa fa-arrows-v',
    'weight' => 83,
    'show_settings_on_create' => true,
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Vertical spacer', 'lerp'),
    'params' => array(
        array(
            "type" => "type_numeric_slider",
            "heading" => esc_html__("Height", 'lerp'),
            "param_name" => "empty_h",
            "min" => 0,
            "max" => 5,
            "step" => 1,
            "value" => 2,
            "description" => esc_html__("Set the empty space height.", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Desktop", 'lerp'),
            "param_name" => "desktop_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in desktop layout mode (960px >).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Tablet", 'lerp'),
            "param_name" => "medium_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in tablet layout mode (570px > < 960px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Mobile", 'lerp'),
            "param_name" => "mobile_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in mobile layout mode (< 570px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp'),
            'group' => esc_html__('Extra', 'lerp'),
        ),
    ),
));

/* Custom Heading element
 ----------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Heading', 'lerp'),
    'base' => 'vc_custom_heading',
    'icon' => 'fa fa-header',
    'php_class_name' => 'lerp_generic_admin',
    'weight' => 100,
    'show_settings_on_create' => true,
    'category' => esc_html__('Content', 'lerp'),
    'shortcode' => true,
    'description' => esc_html__('Text heading', 'lerp'),
    'params' => array(
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Heading text', 'lerp'),
            'param_name' => 'content',
            'admin_label' => true,
            'value' => esc_html__('This is a custom heading element.', 'lerp'),
            //'description' => esc_html__('Enter your content. If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'lerp') ,
            'group' => esc_html__('基本', 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Automatic heading text", 'lerp'),
            "param_name" => "auto_text",
            "description" => esc_html__("Activate this to pull automatic text content when used as heading for categories.", 'lerp'),
            'group' => esc_html__('基本', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Element semantic", 'lerp'),
            "param_name" => "heading_semantic",
            "description" => esc_html__("Specify element tag.", 'lerp'),
            "value" => $heading_semantic,
            'std' => 'h2',
            'group' => esc_html__('基本', 'lerp')
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text size", 'lerp'),
            "param_name" => "text_size",
            "description" => esc_html__("Specify text size.", 'lerp'),
            'std' => 'h2',
            "value" => $heading_size,
            'group' => esc_html__('基本', 'lerp')
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text line height", 'lerp'),
            "param_name" => "text_height",
            "description" => esc_html__("Specify text line height.", 'lerp'),
            "value" => $heading_height,
            'group' => esc_html__('基本', 'lerp')
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text letter spacing", 'lerp'),
            "param_name" => "text_space",
            "description" => esc_html__("Specify letter spacing.", 'lerp'),
            "value" => $heading_space,
            'group' => esc_html__('基本', 'lerp')
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text font family", 'lerp'),
            "param_name" => "text_font",
            "description" => esc_html__("Specify text font family.", 'lerp'),
            "value" => $heading_font,
            'std' => '',
            "group" => esc_html__("基本", 'lerp'),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text weight", 'lerp'),
            "param_name" => "text_weight",
            "description" => esc_html__("Specify text weight.", 'lerp'),
            "value" => $heading_weight,
            'std' => '',
            'group' => esc_html__('基本', 'lerp')
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text transform", 'lerp'),
            "param_name" => "text_transform",
            "description" => esc_html__("Specify the heading text transformation.", 'lerp'),
            "value" => array(
                esc_html__('Default CSS', 'lerp') => '',
                esc_html__('Uppercase', 'lerp') => 'uppercase',
                esc_html__('Lowercase', 'lerp') => 'lowercase',
                esc_html__('Capitalize', 'lerp') => 'capitalize'
            ),
            "group" => esc_html__("基本", 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Text italic", 'lerp'),
            "param_name" => "text_italic",
            "description" => esc_html__("Transform the text to italic.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
            "group" => esc_html__("基本", 'lerp')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Text color", 'lerp'),
            "param_name" => "text_color",
            "description" => esc_html__("Specify text color.", 'lerp'),
            "value" => $lerp_colors,
            'group' => esc_html__('基本', 'lerp')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Separator", 'lerp'),
            "param_name" => "separator",
            "description" => esc_html__("Activate the separator. This will appear under the text.", 'lerp'),
            "value" => array(
                esc_html__('None', 'lerp') => '',
                esc_html__('Under heading', 'lerp') => 'yes',
                esc_html__('Under subheading', 'lerp') => 'under',
                esc_html__('Over heading', 'lerp') => 'over'
            ),
            "group" => esc_html__("基本", 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Separator colored", 'lerp'),
            "param_name" => "separator_color",
            "description" => esc_html__("Color the separator with the accent color.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
            'dependency' => array(
                'element' => 'separator',
                'not_empty' => true,
            ),
            "group" => esc_html__("基本", 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Separator double space", 'lerp'),
            "param_name" => "separator_double",
            "description" => esc_html__("Activate to increase the separator space.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
            'dependency' => array(
                'element' => 'separator',
                'not_empty' => true,
            ),
            "group" => esc_html__("基本", 'lerp')
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Subheading', 'lerp'),
            "param_name" => "subheading",
            "description" => esc_html__("Add a subheading text.", 'lerp'),
            "group" => esc_html__("基本", 'lerp'),
            'admin_label' => true,
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Subheading lead", 'lerp'),
            "param_name" => "sub_lead",
            "description" => esc_html__("Transform the text to leading.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
            "group" => esc_html__("基本", 'lerp')
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Reduce subheading top space", 'lerp'),
            "param_name" => "sub_reduced",
            "description" => esc_html__("Activate this to reduce the subheading top margin.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "group" => esc_html__("基本", 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Desktop", 'lerp'),
            "param_name" => "desktop_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in desktop layout mode (960px >).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Tablet", 'lerp'),
            "param_name" => "medium_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in tablet layout mode (570px > < 960px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Mobile", 'lerp'),
            "param_name" => "mobile_visibility",
            "description" => esc_html__("Choose the visibiliy of the element in mobile layout mode (< 570px).", 'lerp'),
            'group' => esc_html__('Responsive', 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp'),
            'group' => esc_html__('Extra', 'lerp')
        ),
    ),
));

/* Icon element
 ----------------------------------------------------------- */

vc_map(array(
    'name' => esc_html__('Icon Box', 'lerp'),
    'base' => 'vc_icon',
    'icon' => 'fa fa-star',
    'weight' => 97,
    'php_class_name' => 'lerp_generic_admin',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Icon box from icon library', 'lerp'),
    'params' => array(
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Module position", 'lerp'),
            "param_name" => "position",
            'admin_label' => true,
            "value" => array(
                esc_html__('Icon top', 'lerp') => '',
                esc_html__('Icon bottom', 'lerp') => 'bottom',
                esc_html__('Icon left', 'lerp') => 'left',
                esc_html__('Icon right', 'lerp') => 'right'
            ),
            'description' => esc_html__('Specify where the icon is positioned inside the module.', 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Title & text top", 'lerp'),
            "param_name" => "title_aligned_icon",
            "description" => esc_html__("Activate this to align the title and text to top. NB. Default title is vertically middle aligned with the icon.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'position',
                'value' => array(
                    'left',
                    'right'
                )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Layout display', 'lerp'),
            'param_name' => 'display',
            'description' => esc_html__('Specify the display mode.', 'lerp'),
            "value" => array(
                esc_html__('Block', 'lerp') => '',
                esc_html__('Inline', 'lerp') => 'inline',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'lerp'),
            'param_name' => 'icon',
            'description' => esc_html__('Specify icon from library.', 'lerp'),
            'value' => '',
            'admin_label' => true,
            'settings' => array(
                'emptyIcon' => true,
                'iconsPerPage' => 1100,
                'type' => 'lerp'
            ),
        ),
        array(
            "type" => "media_element",
            "heading" => esc_html__("Media icon", 'lerp'),
            "param_name" => "icon_image",
            "value" => "",
            "description" => esc_html__("Specify a media icon from the Media Library.", 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon color", 'lerp'),
            "param_name" => "icon_color",
            "description" => esc_html__("Specify icon color. NB. This doesn't work for media icons.", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon background style', 'lerp'),
            'param_name' => 'background_style',
            'value' => array(
                esc_html__('None', 'lerp') => '',
                esc_html__('Circle', 'lerp') => 'fa-rounded',
                esc_html__('Square', 'lerp') => 'fa-squared',
            ),
            'description' => esc_html__("Background style for icon. NB. This doesn't work for media icons.", 'lerp')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon size', 'lerp'),
            'param_name' => 'size',
            'value' => $icon_sizes,
            'std' => '',
            'description' => esc_html__("Icon size. NB. This doesn't work for media icons.", 'lerp')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Icon outlined', 'lerp'),
            'param_name' => 'outline',
            'description' => esc_html__("Outlined icon doesn't have a full background color.", 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'background_style',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Icon shadow', 'lerp'),
            'param_name' => 'shadow',
            'description' => esc_html__('Icon shadow.', 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'background_style',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'lerp'),
            'param_name' => 'title',
            'admin_label' => true,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title semantic", 'lerp'),
            "param_name" => "heading_semantic",
            "description" => esc_html__("Specify element tag.", 'lerp'),
            "value" => $heading_semantic,
            'std' => 'h3',
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title size", 'lerp'),
            "param_name" => "text_size",
            "description" => esc_html__("Specify title size.", 'lerp'),
            'std' => 'h3',
            "value" => $heading_size,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title font family", 'lerp'),
            "param_name" => "text_font",
            "description" => esc_html__("Specify title font family.", 'lerp'),
            "value" => $heading_font,
            'std' => '',
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title weight", 'lerp'),
            "param_name" => "text_weight",
            "description" => esc_html__("Specify title weight.", 'lerp'),
            "value" => $heading_weight,
            'std' => '',
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title line height", 'lerp'),
            "param_name" => "text_height",
            "description" => esc_html__("Specify text line height.", 'lerp'),
            "value" => $heading_height,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Title letter spacing", 'lerp'),
            "param_name" => "text_space",
            "description" => esc_html__("Specify letter spacing.", 'lerp'),
            "value" => $heading_space,
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Text', 'lerp'),
            'param_name' => 'content',
            'admin_label' => true,
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Text lead", 'lerp'),
            "param_name" => "text_lead",
            "description" => esc_html__("Transform the text to leading.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Text top space reduced", 'lerp'),
            "param_name" => "text_reduced",
            "description" => esc_html__("Activate this to reduce the text top margin.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'position',
                'value' => array(
                    '',
                    'bottom'
                )
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Add top margin', 'lerp'),
            'param_name' => 'add_margin',
            'description' => esc_html__('Add text top margin.', 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'position',
                'value' => array(
                    'left',
                    'right'
                )
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('URL (Link)', 'lerp'),
            'param_name' => 'link',
            'description' => esc_html__('Add link to icon.', 'lerp')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Title linked', 'lerp'),
            'param_name' => 'linked_title',
            'description' => esc_html__('Activate this to enable the Url (Link) or Media Lightbox in the title element.', 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
        ),
        array(
            'type' => 'media_element',
            'heading' => esc_html__('Media lightbox', 'lerp'),
            'param_name' => 'media_lightbox',
            'description' => esc_html__('Specify a media from the lightbox.', 'lerp'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Link text', 'lerp'),
            'param_name' => 'link_text',
            'description' => esc_html__('Add a text link if you wish, this will be added under the text.', 'lerp')
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'group' => esc_html__('Extra', 'lerp'),
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        ),
    ),
));

vc_remove_element("add_to_cart");
vc_remove_element("add_to_cart_url");
