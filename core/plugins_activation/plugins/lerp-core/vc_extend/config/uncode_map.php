<?php

global $lerp_colors, $lerp_colors_w_transp, $lerp_post_types;

if ( !isset($lerp_post_types) && function_exists('lerp_get_post_types') ) $lerp_post_types = lerp_get_post_types();
if ( !function_exists('lerp_get_post_types') ) $lerp_post_types = array();

$lerp_index_params_second = array();
foreach ( $lerp_post_types as $key => $value ) {
    if ( $value === 'product' ) continue;
    $lerp_post_type_list = array(
        'type' => 'sorted_list',
        'heading' => ucfirst($value) . ' ' . esc_html__('element', 'lerp'),
        'param_name' => $value . '_items',
        'description' => esc_html__('Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overridden on post to post basis.', 'lerp'),
        'value' => 'title,type,media,text,category',
        "group" => esc_html__("Module", 'lerp'),
        'options' => array(
            array(
                'media',
                esc_html__('Media', 'lerp'),
                array(
                    array(
                        'featured',
                        esc_html__('Featured image', 'lerp')
                    ),
                    array(
                        'media',
                        esc_html__('Featured media', 'lerp')
                    ),
                    array(
                        'custom',
                        esc_html__('Custom', 'lerp')
                    )
                ),
                array(
                    array(
                        'onpost',
                        esc_html__('Link to post', 'lerp')
                    ),
                    array(
                        'lightbox',
                        esc_html__('Lightbox', 'lerp')
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
                'title',
                esc_html__('Title', 'lerp'),
            ),
            array(
                'type',
                esc_html__('Post type', 'lerp'),
            ),
            array(
                'author',
                esc_html__('Author', 'lerp'),
            ),
            array(
                'date',
                esc_html__('Date', 'lerp'),
            ),
            array(
                'category',
                esc_html__('Category', 'lerp'),
            ),
            array(
                'extra',
                esc_html__('Extra', 'lerp'),
            ),
            array(
                'meta',
                esc_html__('Default meta', 'lerp'),
            ),
            array(
                'text',
                esc_html__('Text', 'lerp'),
                array(
                    array(
                        'excerpt',
                        esc_html__('Excerpt', 'lerp')
                    ),
                    array(
                        'full',
                        esc_html__('Full content', 'lerp')
                    ),
                )
            ),
            array(
                'link',
                esc_html__('Read more link', 'lerp'),
                array(
                    array(
                        'default',
                        esc_html__('Default', 'lerp')
                    ),
                    array(
                        'round',
                        esc_html__('Round', 'lerp')
                    ),
                    array(
                        'circle',
                        esc_html__('Circle', 'lerp')
                    ),
                    array(
                        'link',
                        esc_html__('Standard link', 'lerp')
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
        )
    );
    $get_custom_fields = (function_exists('ot_get_option')) ? ot_get_option('_lerp_' . $value . '_custom_fields') : array();
    if ( isset($get_custom_fields) && !empty($get_custom_fields) ) {
        foreach ( $get_custom_fields as $field_key => $field ) {
            $lerp_post_type_list['options'][] = array($field['_lerp_cf_unique_id'], $field['title']);
        }
    }
    $lerp_index_params_second[] = $lerp_post_type_list;
}

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
    'admin_label' => true,
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
    'description' => esc_html__('Specify the entrance animation delay in milliseconds.', 'lerp'),
    'group' => esc_html__('Animation', 'lerp'),
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
    'description' => esc_html__('Specify the entrance animation speed in milliseconds.', 'lerp'),
    'group' => esc_html__('Animation', 'lerp'),
    'dependency' => array(
        'element' => 'css_animation',
        'not_empty' => true
    )
);

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

$fonts = (function_exists('ot_get_option')) ? ot_get_option('_lerp_font_groups') : array();
$heading_font = array(
    esc_html__('Default CSS', 'lerp') => '',
);

if ( isset($fonts) && is_array($fonts) ) {
    foreach ( $fonts as $key => $value ) {
        $heading_font[$value['title']] = $value['_lerp_font_group_unique_id'];
    }
}

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
if ( !empty($font_spacings) ) {
    foreach ( $font_spacings as $key => $value ) {
        $heading_space[$value['title']] = $value['_lerp_heading_font_spacing_unique_id'];
    }
}

global $lerp_index_map;

$lerp_post_list = array(
    'type' => 'sorted_list',
    'heading' => esc_html__('Posts', 'lerp') . ' ' . esc_html__('element', 'lerp'),
    'param_name' => 'post_items',
    'description' => esc_html__('Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overridden on post to post basis.', 'lerp'),
    'value' => 'media|featured|onpost|original,title,category|nobg,date,text|excerpt,link|default,author,sep-one|full,extra',
    "group" => esc_html__("Module", 'lerp'),
    'options' => array(
        array(
            'media',
            esc_html__('Media', 'lerp'),
            array(
                array(
                    'featured',
                    esc_html__('Featured image', 'lerp')
                ),
                array(
                    'media',
                    esc_html__('Featured media', 'lerp')
                ),
                array(
                    'custom',
                    esc_html__('Custom', 'lerp')
                )
            ),
            array(
                array(
                    'onpost',
                    esc_html__('Link to post', 'lerp')
                ),
                array(
                    'lightbox',
                    esc_html__('Lightbox', 'lerp')
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
            'title',
            esc_html__('Title', 'lerp'),
        ),
        array(
            'type',
            esc_html__('Post type', 'lerp'),
        ),
        array(
            'author',
            esc_html__('Author', 'lerp'),
        ),
        array(
            'date',
            esc_html__('Date', 'lerp'),
        ),
        array(
            'category',
            esc_html__('Category', 'lerp'),
            array(
                array(
                    'nobg',
                    esc_html__('No color', 'lerp')
                ),
                array(
                    'yesbg',
                    esc_html__('Colored text', 'lerp')
                )
            )
        ),
        array(
            'extra',
            esc_html__('Extra', 'lerp'),
        ),
        array(
            'meta',
            esc_html__('Default meta', 'lerp'),
        ),
        array(
            'text',
            esc_html__('Text', 'lerp'),
            array(
                array(
                    'excerpt',
                    esc_html__('Excerpt', 'lerp')
                ),
                array(
                    'full',
                    esc_html__('Full content', 'lerp')
                ),
            )
        ),
        array(
            'link',
            esc_html__('Read more link', 'lerp'),
            array(
                array(
                    'default',
                    esc_html__('Default', 'lerp')
                ),
                array(
                    'round',
                    esc_html__('Round', 'lerp')
                ),
                array(
                    'circle',
                    esc_html__('Circle', 'lerp')
                ),
                array(
                    'link',
                    esc_html__('Standard link', 'lerp')
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
    ),
);

$lerp_page_list = array(
    'type' => 'sorted_list',
    'heading' => esc_html__('Pages', 'lerp') . ' ' . esc_html__('element', 'lerp'),
    'param_name' => 'page_items',
    'description' => esc_html__('Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overridden on post to post basis.', 'lerp'),
    'value' => 'title,type,media,text,category',
    "group" => esc_html__("Module", 'lerp'),
    'options' => array(
        array(
            'media',
            esc_html__('Media', 'lerp'),
            array(
                array(
                    'featured',
                    esc_html__('Featured image', 'lerp')
                ),
                array(
                    'media',
                    esc_html__('Featured media', 'lerp')
                ),
                array(
                    'custom',
                    esc_html__('Custom', 'lerp')
                )
            ),
            array(
                array(
                    'onpost',
                    esc_html__('Link to post', 'lerp')
                ),
                array(
                    'lightbox',
                    esc_html__('Lightbox', 'lerp')
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
            'title',
            esc_html__('Title', 'lerp'),
        ),
        array(
            'type',
            esc_html__('Post type', 'lerp'),
        ),
        array(
            'category',
            esc_html__('Category', 'lerp'),
        ),
        array(
            'text',
            esc_html__('Text', 'lerp'),
            array(
                array(
                    'excerpt',
                    esc_html__('Excerpt', 'lerp')
                ),
                array(
                    'full',
                    esc_html__('Full content', 'lerp')
                ),
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
    )
);

$lerp_product_list = array(
    'type' => 'sorted_list',
    'heading' => esc_html__('Products', 'lerp') . ' ' . esc_html__('element', 'lerp'),
    'param_name' => 'product_items',
    'description' => esc_html__('Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overridden on post to post basis.', 'lerp'),
    'value' => 'title,type,media,text,category,price',
    "group" => esc_html__("Module", 'lerp'),
    'options' => array(
        array(
            'media',
            esc_html__('Media', 'lerp'),
            array(
                array(
                    'featured',
                    esc_html__('Featured image', 'lerp')
                ),
                array(
                    'media',
                    esc_html__('Featured media', 'lerp')
                ),
                array(
                    'custom',
                    esc_html__('Custom', 'lerp')
                ),
            ),
            array(
                array(
                    'onpost',
                    esc_html__('Link to post', 'lerp')
                ),
                array(
                    'lightbox',
                    esc_html__('Lightbox', 'lerp')
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
            ),
            array(
                array(
                    'hide-sale',
                    esc_html__('Hide badge', 'lerp')
                ),
                array(
                    'show-sale',
                    esc_html__('Show badge', 'lerp')
                )
            )
        ),
        array(
            'title',
            esc_html__('Title', 'lerp'),
        ),
        array(
            'type',
            esc_html__('Post type', 'lerp'),
        ),
        array(
            'category',
            esc_html__('Category', 'lerp'),
        ),
        array(
            'text',
            esc_html__('Text', 'lerp'),
            array(
                array(
                    'excerpt',
                    esc_html__('Excerpt', 'lerp')
                ),
                array(
                    'full',
                    esc_html__('Full content', 'lerp')
                ),
            )
        ),
        array(
            'price',
            esc_html__('Price', 'lerp'),
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
    )
);

$get_post_custom_fields = (function_exists('ot_get_option')) ? ot_get_option('_lerp_post_custom_fields') : array();
if ( isset($get_post_custom_fields) && !empty($get_post_custom_fields) ) {
    foreach ( $get_post_custom_fields as $field_key => $field ) {
        $lerp_post_list['options'][] = array($field['_lerp_cf_unique_id'], $field['title']);
    }
}

$get_page_custom_fields = (function_exists('ot_get_option')) ? ot_get_option('_lerp_page_custom_fields') : array();
if ( isset($get_page_custom_fields) && !empty($get_page_custom_fields) ) {
    foreach ( $get_page_custom_fields as $field_key => $field ) {
        $lerp_page_list['options'][] = array($field['_lerp_cf_unique_id'], $field['title']);
    }
}

$get_product_custom_fields = (function_exists('ot_get_option')) ? ot_get_option('_lerp_product_custom_fields') : array();
if ( isset($get_product_custom_fields) && !empty($get_product_custom_fields) ) {
    foreach ( $get_product_custom_fields as $field_key => $field ) {
        $lerp_product_list['options'][] = array($field['_lerp_cf_unique_id'], $field['title']);
    }
}

$lerp_index_params_first = array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Widget title', 'lerp'),
        'param_name' => 'title',
        'admin_label' => true,
        'description' => esc_html__('Enter text which will be used as widget title. Leave blank if no title is needed.', 'lerp'),
        'group' => esc_html__('General', 'lerp')
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Widget ID', 'lerp'),
        'param_name' => 'el_id',
        'value' => (function_exists('big_rand')) ? big_rand() : rand(),
        'description' => esc_html__('This value has to be unique. Change it in case it\'s needed.', 'lerp'),
        'group' => esc_html__('General', 'lerp')
    ),
    array(
        "type" => 'dropdown',
        "heading" => esc_html__("Module", 'lerp'),
        "param_name" => "index_type",
        'admin_label' => true,
        "description" => esc_html__("Specify the layout mode: Isotope or Carousel.", 'lerp'),
        "value" => array(
            esc_html__('Isotope', 'lerp') => 'isotope',
            esc_html__('Carousel', 'lerp') => 'carousel',
        ),
        'group' => esc_html__('General', 'lerp')
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Layout modes', 'lerp'),
        'param_name' => 'isotope_mode',
        "description" => wp_kses(__("Specify the Isotope layout mode. <a href='http://isotope.metafizzy.co/layout-modes.html' target='_blank'>Check this for reference</a>", 'lerp'), array('a' => array('href' => array(), 'target' => array()))),
        "value" => array(
            esc_html__('Masonry', 'lerp') => 'masonry',
            esc_html__('Fit rows', 'lerp') => 'fitRows',
            esc_html__('Cells by row', 'lerp') => 'cellsByRow',
            esc_html__('Vertical', 'lerp') => 'vertical',
            esc_html__('Packery', 'lerp') => 'packery',
        ),
        'group' => esc_html__('General', 'lerp'),
        'dependency' => array(
            'element' => 'index_type',
            'value' => 'isotope',
        ),
    ),
    array(
        'type' => 'loop',
        'heading' => esc_html__('Index content', 'lerp'),
        'param_name' => 'loop',
        'admin_label' => true,
        'settings' => array(
            'size' => array(
                'hidden' => false,
                'value' => 10
            ),
            'order_by' => array(
                'value' => 'date'
            ),
        ),
        'value' => 'size:10|order_by:date|post_type:post',
        'description' => esc_html__('Create WordPress loop, to populate content from your site.', 'lerp'),
        'group' => esc_html__('General', 'lerp')
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Post Offset', 'lerp'),
        'param_name' => 'offset',
        'admin_label' => true,
        'description' => esc_html__('Enter the amount of posts that should be skipped in the beginning of the query.', 'lerp'),
        'group' => esc_html__('General', 'lerp')
    ),
    array(
        "type" => 'checkbox',
        "heading" => esc_html__("Automatic query", 'lerp'),
        "param_name" => "auto_query",
        "description" => esc_html__("Activate this to pull automatic query when used as Content Block for categories.", 'lerp'),
        'group' => esc_html__('General', 'lerp'),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
    ),
    array(
        "type" => 'dropdown',
        "heading" => esc_html__("Style", 'lerp'),
        "param_name" => "style_preset",
        "description" => esc_html__("Select the visualization mode.", 'lerp'),
        "value" => array(
            esc_html__('Masonry', 'lerp') => 'masonry',
            esc_html__('Metro', 'lerp') => 'metro',
        ),
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'index_type',
            'value' => array(
                'isotope',
            ),
        ),
    ),
    array(
        "type" => "dropdown",
        "heading" => esc_html__("Index background color", 'lerp'),
        "param_name" => "index_back_color",
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
            'value' => 'carousel'
        ),
    ),
    array(
        "type" => 'checkbox',
        "heading" => esc_html__("Fluid heights", 'lerp'),
        "param_name" => "single_height_viewport",
        "description" => esc_html__("Activate this to set heights relative to the browser window height, instead of using the normal metro calculations.", 'lerp'),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'style_preset',
            'value' => 'metro',
        ),
    ),
    array(
        "type" => 'checkbox',
        "heading" => esc_html__("Remove menu height", 'lerp'),
        "param_name" => "single_height_viewport_minus",
        "description" => esc_html__("Activate this option to remove the menu height from the fluid calculations.", 'lerp'),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'single_height_viewport',
            'not_empty' => true,
        ),
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
            esc_html__('Fluid', 'lerp') => 'fluid',
        ),
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'index_type',
            'value' => 'carousel',
        ),
    ),
    array(
        "type" => "type_numeric_slider",
        "heading" => esc_html__("Fluid height", 'lerp'),
        "param_name" => "carousel_height_viewport",
        "description" => esc_html__("Specify the carousel height relative to the browser window.", 'lerp'),
        "min" => 0,
        "max" => 100,
        "step" => 1,
        "value" => 0,
        "std" => "100",
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'thumb_size',
            'value' => 'fluid',
        ),
    ),
    array(
        "type" => 'checkbox',
        "heading" => esc_html__("Remove menu height", 'lerp'),
        "param_name" => "carousel_height_viewport_minus",
        "description" => esc_html__("Activate this option to remove the menu height from the fluid calculations.", 'lerp'),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'thumb_size',
            'value' => 'fluid',
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
            'element' => 'index_type',
            'value' => 'isotope',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
            'value' => 'isotope',
        ),
        'dependency' => array(
            'element' => 'filtering',
            'value' => 'yes',
        ),
    ),
    array(
        "type" => 'checkbox',
        "heading" => esc_html__("Pagination", 'lerp'),
        "param_name" => "pagination",
        "description" => esc_html__("Activate this to add the pagination function.", 'lerp'),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
        "group" => esc_html__("Module", 'lerp'),
        'dependency' => array(
            'element' => 'index_type',
            'value' => array(
                'isotope',
            ),
        ),
    ),
    array(
        "type" => 'checkbox',
        "heading" => esc_html__("Infinite load more", 'lerp'),
        "param_name" => "infinite",
        "description" => wp_kses(__("Activate this to load more items with scrolling.<br>NB. This option doesn't work is combination with the 'Random' order or with multiple isotope in the same page.", 'lerp'), array('br' => array())),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
        "group" => esc_html__("Module", 'lerp'),
        'dependency' => array(
            'element' => 'pagination',
            'is_empty' => true,
        )
    ),
    array(
        "type" => 'checkbox',
        "heading" => esc_html__("Load more button", 'lerp'),
        "param_name" => "infinite_button",
        "description" => esc_html__("Activate this to load more items by pressing the button.", 'lerp'),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
        "group" => esc_html__("Module", 'lerp'),
        'dependency' => array(
            'element' => 'infinite',
            'value' => 'yes',
        )
    ),
    array(
        "type" => "dropdown",
        "heading" => esc_html__("Load more button hover effect", 'lerp'),
        "param_name" => "infinite_hover_fx",
        "description" => esc_html__("Specify an effect on hover state.", 'lerp'),
        "value" => array(
            'Inherit' => '',
            'Outlined' => 'outlined',
            'Flat' => 'full-colored',
        ),
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'infinite_button',
            'value' => 'yes',
        ),
    ),
    array(
        "type" => "checkbox",
        "heading" => esc_html__("Load more button outlined inverse", 'lerp'),
        "param_name" => "infinite_button_outline",
        "description" => esc_html__("Outlined buttons don't have a full background color. NB: this option is available only with Load More Button Hover Effect > Outlined.", 'lerp'),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'infinite_button',
            'value' => 'yes',
        ),
    ),
    array(
        "type" => "textfield",
        "heading" => esc_html__("Load more button text", 'lerp'),
        "param_name" => "infinite_button_text",
        "description" => esc_html__("Specify the button label. NB. The default is 'Load more'.", 'lerp'),
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'infinite_button',
            'value' => 'yes',
        ),
    ),
    array(
        "type" => "dropdown",
        "heading" => esc_html__("Load more button shape", 'lerp'),
        "param_name" => "infinite_button_shape",
        "description" => esc_html__("Specify the load more button shape.", 'lerp'),
        'group' => esc_html__('Module', 'lerp'),
        "value" => array(
            esc_html__('Default', 'lerp') => '',
            esc_html__('Round', 'lerp') => 'btn-round',
            esc_html__('Circle', 'lerp') => 'btn-circle',
            esc_html__('Square', 'lerp') => 'btn-square'
        ),
        'dependency' => array(
            'element' => 'infinite_button',
            'value' => 'yes',
        ),
    ),
    array(
        "type" => "dropdown",
        "heading" => esc_html__("Load more button color", 'lerp'),
        "param_name" => "infinite_button_color",
        "description" => esc_html__("Specify a background color for the load more button.", 'lerp'),
        "class" => 'lerp_colors',
        "value" => $lerp_colors,
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'infinite_button',
            'value' => 'yes',
        ),
    ),
    array(
        "type" => 'dropdown',
        "heading" => esc_html__("Pagination or Infinite skin", 'lerp'),
        "param_name" => "footer_style",
        "description" => esc_html__("Specify the pagination/infinite skin color.", 'lerp'),
        "value" => array(
            esc_html__('Light', 'lerp') => 'light',
            esc_html__('Dark', 'lerp') => 'dark'
        ),
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'index_type',
            'value' => array(
                'isotope',
            ),
        ),
    ),
    array(
        "type" => "dropdown",
        "heading" => esc_html__("Pagination or Infinite color", 'lerp'),
        "param_name" => "footer_back_color",
        "description" => esc_html__("Specify a background color for the pagination/infinite.", 'lerp'),
        "class" => 'lerp_colors',
        "value" => $lerp_colors,
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'index_type',
            'value' => array(
                'isotope',
            ),
        ),
    ),
    array(
        "type" => 'checkbox',
        "heading" => esc_html__("Pagination or Infinite full width", 'lerp'),
        "param_name" => "footer_full_width",
        "description" => esc_html__("Activate this to force the full width of the pagination/infinite.", 'lerp'),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
        "group" => esc_html__("Module", 'lerp'),
        'dependency' => array(
            'element' => 'index_type',
            'value' => array(
                'isotope',
            ),
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
            'element' => 'index_type',
            'value' => array(
                'isotope',
                'carousel',
            ),
        ),
    ),
    $lerp_post_list,
    $lerp_page_list,
    $lerp_product_list,
);

$lerp_index_params_third = array(
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
        'type' => 'textfield',
        'heading' => esc_html__('Breakpoint - First step', 'lerp'),
        'param_name' => 'screen_lg',
        'value' => 1000,
        'description' => wp_kses(__('Insert the isotope large layout breakpoint in pixel.<br />NB. This is referring to the width of the isotope container, not to the window width.', 'lerp'), array('br' => array())),
        'group' => esc_html__('Module', 'lerp'),
        'dependency' => array(
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
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
            'element' => 'index_type',
            'value' => 'carousel',
        ),
    ),
    array(
        "type" => 'dropdown',
        "heading" => esc_html__("Block layout", 'lerp'),
        "param_name" => "single_text",
        "description" => esc_html__("Specify the text positioning inside the box.", 'lerp'),
        "value" => array(
            esc_html__('Content under image', 'lerp') => 'under',
            esc_html__('Content overlay', 'lerp') => 'overlay',
            esc_html__('Content lateral', 'lerp') => 'lateral',
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
        'group' => esc_html__('Blocks', 'lerp'),
        'dependency' => array(
            'element' => 'index_type',
            'value' => array(
                'isotope',
            ),
        ),
    ),
    array(
        "type" => 'dropdown',
        "heading" => esc_html__("Height", 'lerp'),
        "param_name" => "single_height",
        "description" => esc_html__("Specify the box height.", 'lerp'),
        "value" => $units,
        "std" => "4",
        'group' => esc_html__('Blocks', 'lerp'),
        'dependency' => array(
            'element' => 'index_type',
            'value' => array(
                'isotope',
            ),
        ),
        'dependency' => array(
            'element' => 'style_preset',
            'value' => 'metro',
        ),
        'dependency' => array(
            'element' => 'single_height_viewport',
            'is_empty' => true,
        ),
    ),
    array(
        "type" => "type_numeric_slider",
        "heading" => esc_html__("Height", 'lerp'),
        "param_name" => "single_fluid_height",
        "min" => 0,
        "max" => 100,
        "step" => 1,
        "value" => 0,
        "std" => '33',
        "description" => esc_html__('Set the row height with a percent value.', 'lerp'),
        'group' => esc_html__('Blocks', 'lerp'),
        'dependency' => array(
            'element' => 'index_type',
            'value' => array(
                'isotope',
            ),
        ),
        'dependency' => array(
            'element' => 'style_preset',
            'value' => 'metro',
        ),
        'dependency' => array(
            'element' => 'single_height_viewport',
            'not_empty' => true,
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
    ),
    array(
        "type" => 'dropdown',
        "heading" => esc_html__("Media position", 'lerp'),
        "param_name" => "single_image_position",
        "description" => esc_html__("Specify the image alignment.", 'lerp'),
        "value" => array(
            esc_html__('Left', 'lerp') => '',
            esc_html__('Right', 'lerp') => 'right'
        ),
        'group' => esc_html__('Blocks', 'lerp'),
        'dependency' => array(
            'element' => 'single_text',
            'value' => 'lateral',
        ),
    ),
    array(
        "type" => "type_numeric_slider",
        "heading" => esc_html__("Media size", 'lerp'),
        "param_name" => "single_image_size",
        "min" => 1,
        "max" => 11,
        "step" => 1,
        "std" => 6,
        "description" => esc_html__('Set the image size.', 'lerp'),
        'group' => esc_html__('Blocks', 'lerp'),
        'dependency' => array(
            'element' => 'single_text',
            'value' => 'lateral',
        ),
    ),
    array(
        "type" => 'checkbox',
        "heading" => esc_html__("Media above content on mobile", 'lerp'),
        "param_name" => "single_lateral_responsive",
        "description" => esc_html__("Activate this to put the media above the content on mobile devices.", 'lerp'),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
        'std' => 'yes',
        "group" => esc_html__("Blocks", 'lerp'),
        'dependency' => array(
            'element' => 'single_text',
            'value' => 'lateral',
        ),
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
        "heading" => esc_html__("Text skin", 'lerp'),
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
        "description" => esc_html__("Specify a background color for the overlay.", 'lerp'),
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
        "heading" => esc_html__("Text horizontal alignment mobile", 'lerp'),
        "param_name" => "single_h_align_mobile",
        "description" => esc_html__("Specify the horizontal alignment in mobile.", 'lerp'),
        "value" => array(
            esc_html__('Inherit', 'lerp') => '',
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
        'dependency' => array(
            'element' => 'single_text',
            'value' => 'overlay',
        ),
    ),
    array(
        "type" => 'dropdown',
        "heading" => esc_html__("Text vertical alignment", 'lerp'),
        "param_name" => "single_vertical_text",
        "description" => esc_html__("Specify the text vertical alignment. NB: it works with Metro Layout only.", 'lerp'),
        "value" => array(
            esc_html__('Top', 'lerp') => '',
            esc_html__('Middle', 'lerp') => 'middle',
            esc_html__('Bottom', 'lerp') => 'bottom',
        ),
        'group' => esc_html__('Blocks', 'lerp'),
        'dependency' => array(
            'element' => 'single_text',
            'value' => 'lateral',
        ),
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
        'dependency' => array(
            'element' => 'single_text',
            'value' => 'overlay',
        )
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
            'element' => 'single_text',
            'value' => 'overlay',
        ),
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
        "description" => esc_html__("Activate this to make every single elements clickable instead of the whole block (when availabe).", 'lerp'),
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
        "heading" => esc_html__("Title text transform", 'lerp'),
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
        "heading" => esc_html__("Title semantic", 'lerp'),
        "param_name" => "single_title_semantic",
        "description" => esc_html__("Specify element tag.", 'lerp'),
        "value" => $heading_semantic,
        'std' => 'h3',
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
        "type" => 'checkbox',
        "heading" => esc_html__("Text lead", 'lerp'),
        "param_name" => "single_text_lead",
        "description" => esc_html__("Transform the text to leading.", 'lerp'),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
        "group" => esc_html__("Blocks", 'lerp'),
    ),
    array(
        'type' => 'iconpicker',
        'heading' => esc_html__('Icon', 'lerp'),
        'param_name' => 'single_icon',
        'description' => esc_html__('Specify icon from library.', 'lerp'),
        'settings' => array(
            'emptyIcon' => true,
            'iconsPerPage' => 1100,
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
            esc_html__('Extra Small', 'lerp') => '',
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
        "heading" => esc_html__("Remove border", 'lerp'),
        "param_name" => "single_border",
        "description" => esc_html__("Activate this to remove the border around the block.", 'lerp'),
        "value" => Array(
            esc_html__("Yes, please", 'lerp') => 'yes'
        ),
        "group" => esc_html__("Blocks", 'lerp'),
    ),
    array_merge($add_css_animation, array("group" => esc_html__("Blocks", 'lerp'), "param_name" => 'single_css_animation')),
    array_merge($add_animation_speed, array("group" => esc_html__("Blocks", 'lerp'), "param_name" => 'single_animation_speed', 'dependency' => array('element' => 'single_css_animation', 'not_empty' => true))),
    array_merge($add_animation_delay, array("group" => esc_html__("Blocks", 'lerp'), "param_name" => 'single_animation_delay', 'dependency' => array('element' => 'single_css_animation', 'not_empty' => true))),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Post settings', 'lerp'),
        'param_name' => 'post_matrix',
        'description' => esc_html__('Decide to follow the post ID or to create an indipendent pattern or matrix.', 'lerp'),
        'value' => array(
            esc_html__('By Post ID', 'lerp') => '',
            esc_html__('By Matrix', 'lerp') => 'matrix',
        ),
        'std' => '',
        'group' => esc_html__('Single block', 'lerp'),
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Custom order', 'lerp'),
        'param_name' => 'custom_order',
        'description' => wp_kses(__('Activate this to order the items with drag & drop.<br/>NB. Custom order is only possible when the \'Infinite load more\' or pagination are deactivated.', 'lerp'), array('br' => array())),
        'value' => Array(
            esc_html__('Yes, please', 'lerp') => 'yes'
        ),
        'group' => esc_html__('Single block', 'lerp'),
        'dependency' => array(
            'element' => 'post_matrix',
            'is_empty' => true,
        ),
    ),
    array(
        'type' => 'lerp_matrix_set_amount',
        'heading' => esc_html__('Matrix amount', 'lerp'),
        'param_name' => 'matrix_amount',
        'description' => esc_html__('Enter an integer number that will define your matrix range. If you use the pagination mode the max limit is the post count itself.', 'lerp'),
        'group' => esc_html__('Single block', 'lerp'),
        'value' => '5',
        'dependency' => array(
            'element' => 'post_matrix',
            'value' => 'matrix',
        ),
    ),
    array(
        'type' => 'textfield',
        'edit_field_class' => 'hidden',
        'param_name' => 'order_ids',
        'group' => esc_html__('Single block', 'lerp'),
    ),
    array(
        'type' => 'lerp_items',
        'heading' => '',
        'param_name' => 'items',
        //'description' => esc_html__('Enter text which will be used as widget title. Leave blank if no title is needed.', 'lerp') ,
        'group' => esc_html__('Single block', 'lerp'),
        'dependency' => array(
            'element' => 'post_matrix',
            'is_empty' => true,
        ),
    ),
    array(
        'type' => 'lerp_matrix_items',
        'heading' => '',
        'param_name' => 'matrix_items',
        //'description' => esc_html__('Enter text which will be used as widget title. Leave blank if no title is needed.', 'lerp') ,
        'group' => esc_html__('Single block', 'lerp'),
        'dependency' => array(
            'element' => 'post_matrix',
            'value' => 'matrix',
        ),
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
        "description" => esc_html__("Remove the double tap action on mobile.", 'lerp'),
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
);

$lerp_index_params = array_merge($lerp_index_params_first, $lerp_index_params_second, $lerp_index_params_third);

$lerp_index_map = array(
    'name' => esc_html__('Posts', 'lerp'),
    'base' => 'lerp_index',
    'weight' => 999,
    'php_class_name' => 'lerp_index',
    'icon' => 'fa fa-th',
    'description' => esc_html__('Isotope grid or carousel layout', 'lerp'),
    'params' => $lerp_index_params
);

vc_map($lerp_index_map);

/* Content slider
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Content Slider', 'lerp'),
    'description' => esc_html__('Button element', 'lerp'),
    'base' => 'lerp_slider',
    'weight' => 96,
    'php_class_name' => 'lerp_slider',
    'show_settings_on_create' => false,
    'is_container' => true,
    'icon' => 'fa fa-fast-forward',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Lerp slider', 'lerp'),
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Transition type', 'lerp'),
            'param_name' => 'slider_type',
            "value" => array(
                esc_html__('Slide', 'lerp') => '',
                esc_html__('Fade', 'lerp') => 'fade'
            ),
            'description' => esc_html__('Specify the transition type.', 'lerp'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Auto rotate slides', 'lerp'),
            'param_name' => 'slider_interval',
            'value' => array(
                3000,
                5000,
                10000,
                15000,
                esc_html__('Disable', 'lerp') => 0
            ),
            'std' => 0,
            'description' => esc_html__('Specify the automatic timeout between slides in milliseconds.', 'lerp'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Navigation speed', 'lerp'),
            'param_name' => 'slider_navspeed',
            'value' => array(
                200,
                400,
                700,
                1000,
                esc_html__('Disable', 'lerp') => 0
            ),
            'std' => 400,
            'description' => esc_html__('Specify the navigation speed between slides in milliseconds.', 'lerp'),
        ),
        array(
            'type' => 'checkbox',
            "heading" => esc_html__("Loop", 'lerp'),
            'param_name' => 'slider_loop',
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "description" => esc_html__("Activate the loop option to make the carousel infinite. NB. Don't activate if the slider contains an Isotope index.", 'lerp'),
        ),
        array(
            'type' => 'checkbox',
            "heading" => esc_html__("Arrows hidden", 'lerp'),
            'param_name' => 'slider_hide_arrows',
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "description" => esc_html__("Activate this to hide slider arrows. NB. Arrows are visible only when you use the Content Slider in the page header.", 'lerp'),
        ),
        array(
            'type' => 'checkbox',
            "heading" => esc_html__("Dots hidden", 'lerp'),
            'param_name' => 'slider_hide_dots',
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "description" => esc_html__("Activate this to hide slider pagination dots.", 'lerp'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Dots container position', 'lerp'),
            'param_name' => 'slider_dot_position',
            "value" => array(
                esc_html__('Center', 'lerp') => '',
                esc_html__('Left', 'lerp') => 'left',
                esc_html__('Right', 'lerp') => 'right',
            ),
            "group" => esc_html__("Dots", 'lerp'),
            'description' => esc_html__('Specify the position of pagination dots.', 'lerp'),
            'dependency' => array(
                'element' => 'slider_hide_dots',
                'is_empty' => true,
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Dots container width', 'lerp'),
            'param_name' => 'slider_dot_width',
            "value" => array(
                esc_html__('Full width', 'lerp') => '',
                esc_html__('Limit width', 'lerp') => 'limit',
            ),
            "group" => esc_html__("Dots", 'lerp'),
            'description' => esc_html__('Specify the width of the dots container.', 'lerp'),
            'dependency' => array(
                'element' => 'slider_dot_position',
                'value' => array('left', 'right'),
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Dots container unit of measure", 'lerp'),
            "param_name" => "column_width_use_pixel",
            "edit_field_class" => 'vc_col-sm-12 vc_column row_height',
            "description" => 'Set this value if you want to constrain the container width.',
            "value" => array(
                '' => 'yes'
            ),
            "group" => esc_html__("Dots", 'lerp'),
            'dependency' => array(
                'element' => 'slider_dot_position',
                'value' => array('left', 'right'),
            )
        ),
        array(
            "type" => "type_numeric_slider",
            "heading" => '',
            "param_name" => "slider_width_percent",
            "min" => 0,
            "max" => 100,
            "step" => 1,
            "value" => 100,
            "group" => esc_html__("Dots", 'lerp'),
            "description" => esc_html__("Set the container width with a percent value.", 'lerp'),
            'dependency' => array(
                'element' => 'column_width_use_pixel',
                'is_empty' => true,
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => '',
            "group" => esc_html__("Dots", 'lerp'),
            'param_name' => 'silder_width_pixel',
            'description' => esc_html__("Insert the container width in pixel.", 'lerp'),
            'dependency' => array(
                'element' => 'column_width_use_pixel',
                'not_empty' => true
            )
        ),
        array(
            "type" => "type_numeric_slider",
            'heading' => esc_html__('Dots container padding', 'lerp'),
            "description" => esc_html__("Activate this option to add left and right padding to dots container.", 'lerp'),
            "param_name" => "h_padding",
            "min" => 0,
            "max" => 7,
            "step" => 1,
            "value" => 2,
            "group" => esc_html__("Dots", 'lerp'),
            'dependency' => array(
                'element' => 'slider_dot_position',
                'value' => array('left', 'right'),
            ),
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
	<div class="tab_controls vc_element-icon" style="width: 100%; margin-top: 20px;">
	    <a class="add_tab" title="' . esc_html__('Add slide', 'lerp') . '" style="color: white;"><i class="fa fa-plus2"></i> <span class="tab-label">' . esc_html__('Add slide', 'lerp') . '</span></a>
	</div>',
    'default_content' => '[vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner]',
    'js_view' => 'LerpAccordionView'
));

/* Counter
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Counter', 'lerp'),
    'base' => 'lerp_counter',
    'weight' => 90,
    'icon' => 'fa fa-sort-numerically',
    'php_class_name' => 'lerp_counter',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Animated counter', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Counter value', 'lerp'),
            'param_name' => 'value',
            'description' => esc_html__('Input counter value here.', 'lerp'),
            'value' => '1000',
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Prefix', 'lerp'),
            'param_name' => 'prefix',
            'description' => esc_html__('Input a prefix to the value.', 'lerp'),
            'value' => ''
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Suffix', 'lerp'),
            'param_name' => 'suffix',
            'description' => esc_html__('Input a suffix to the value.', 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Counter color", 'lerp'),
            "param_name" => "counter_color",
            "description" => esc_html__("Specify a color for the counter.", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Counter font size", 'lerp'),
            "param_name" => "size",
            "description" => esc_html__("Specify the counter font dimension.", 'lerp'),
            "value" => $heading_size,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Counter line height", 'lerp'),
            "param_name" => "height",
            "description" => esc_html__("Specify the counter line height.", 'lerp'),
            "value" => $heading_height,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Counter font family", 'lerp'),
            "param_name" => "font",
            "description" => esc_html__("Specify the counter font family.", 'lerp'),
            "value" => $heading_font,
            'std' => '',
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Counter font weight", 'lerp'),
            "param_name" => "weight",
            "description" => esc_html__("Specify the counter font weight.", 'lerp'),
            "value" => $heading_weight,
            'std' => '',
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Counter text transform", 'lerp'),
            "param_name" => "transform",
            "description" => esc_html__("Specify the counter text transformation.", 'lerp'),
            "value" => array(
                esc_html__('Default CSS', 'lerp') => '',
                esc_html__('Uppercase', 'lerp') => 'uppercase',
                esc_html__('Lowercase', 'lerp') => 'lowercase',
                esc_html__('Capitalize', 'lerp') => 'capitalize'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Separator", 'lerp'),
            "param_name" => "separator",
            "description" => esc_html__("Activate this to add a separator between the value and the description.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text under', 'lerp'),
            'param_name' => 'text',
            'description' => esc_html__('Input a text under the counter.', 'lerp'),
            'value' => ''
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
    ),
));

/* Countdown
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Countdown', 'lerp'),
    'base' => 'lerp_countdown',
    'icon' => 'fa fa-clock-o',
    'weight' => 89,
    'php_class_name' => 'lerp_countdown',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Animated countdown', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Final date', 'lerp'),
            'param_name' => 'date',
            'description' => esc_html__('Input the countdown date with this format YYYY/MM/DD. ex. 2016/05/20', 'lerp'),
            'admin_label' => true
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Countdown font size", 'lerp'),
            "param_name" => "size",
            "description" => esc_html__("Specify the countdown font size.", 'lerp'),
            "value" => $heading_size,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Countdown line height", 'lerp'),
            "param_name" => "height",
            "description" => esc_html__("Specify the countdown line height.", 'lerp'),
            "value" => $heading_height,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Countdown font family", 'lerp'),
            "param_name" => "font",
            "description" => esc_html__("Specify the countdown font family.", 'lerp'),
            "value" => $heading_font,
            'std' => '',
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Countdown font weight", 'lerp'),
            "param_name" => "weight",
            "description" => esc_html__("Specify the countdown font weight.", 'lerp'),
            "value" => $heading_weight,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Countdown uppercase", 'lerp'),
            "param_name" => "transform",
            "description" => esc_html__("Specify the countdown text transformation.", 'lerp'),
            "value" => array(
                esc_html__('Default CSS', 'lerp') => '',
                esc_html__('Uppercase', 'lerp') => 'uppercase',
                esc_html__('Lowercase', 'lerp') => 'lowercase',
                esc_html__('Capitalize', 'lerp') => 'capitalize'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Separator", 'lerp'),
            "param_name" => "separator",
            "description" => esc_html__("Activate this to add a separator between the value and the description.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text under', 'lerp'),
            'param_name' => 'text',
            'description' => esc_html__('Input a text under the countdown.', 'lerp'),
            'value' => ''
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
    ),
));

/* List
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('List', 'lerp'),
    'base' => 'lerp_list',
    'weight' => 91,
    'icon' => 'fa fa-list-ol',
    'php_class_name' => 'lerp_list',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('List with icon', 'lerp'),
    'params' => array(
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('List text', 'lerp'),
            'param_name' => 'content',
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Larger text", 'lerp'),
            "param_name" => "larger",
            "description" => esc_html__("Activate this to have bigger text.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
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
            "type" => "dropdown",
            "heading" => esc_html__("Icon color", 'lerp'),
            "param_name" => "icon_color",
            "description" => esc_html__("Specify a color for the icon.", 'lerp'),
            "value" => $lerp_colors,
            'dependency' => array(
                'element' => 'icon',
                'not_empty' => true,
            ),
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
    ),
));

/* Pricing table
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Pricing table', 'lerp'),
    'base' => 'lerp_pricing',
    'weight' => 92,
    'icon' => 'fa fa-list-alt',
    'php_class_name' => 'lerp_pricing',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Pricing table', 'lerp'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('Insert the price table title and separate with a pipe | if you want to have subtitle.', 'lerp'),
            'value' => esc_html__('Title|Subtitle', 'lerp')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Price', 'lerp'),
            'param_name' => 'price',
            'description' => esc_html__('Insert the price and separate with a pipe | if you want to have subtitle.', 'lerp'),
            'value' => esc_html__('$50|per month', 'lerp')
        ),
        array(
            "type" => 'textarea_safe',
            "heading" => esc_html__("Body", 'lerp'),
            "param_name" => "body",
            "description" => esc_html__("Insert body text line. Every new line is a block. If you separate with a pipe | the first part will be with bold style.", 'lerp'),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('Button', 'lerp'),
            'param_name' => 'button',
            'description' => esc_html__('Insert a link if you want a button.', 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Button hover effect", 'lerp'),
            "param_name" => "hover_fx",
            "description" => esc_html__("Specify an effect on hover state.", 'lerp'),
            "value" => array(
                'Inherit' => '',
                'Outlined' => 'outlined',
                'Flat' => 'full-colored',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Block color", 'lerp'),
            "param_name" => "price_color",
            "description" => esc_html__("Specify a color for the block.", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            'type' => 'dropdown',
            'heading' => 'Colored elements',
            'param_name' => 'col_elements',
            'value' => array(
                esc_html__('Inside elements', 'lerp') => '',
                esc_html__('Top and bottom', 'lerp') => 'tb',
            ),
            'description' => esc_html__('Specify how do you want to color the block.', 'lerp'),
            'dependency' => array(
                'element' => 'price_color',
                'not_empty' => true,
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Most popular", 'lerp'),
            "param_name" => "most",
            "description" => esc_html__("Activate this to make the block to stick out, like featured.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Alignment", 'lerp'),
            "param_name" => "align",
            "description" => esc_html__("Specify the text aligment.", 'lerp'),
            "value" => array(
                esc_html__('Center', 'lerp') => '',
                esc_html__('Left', 'lerp') => 'left',
            ),
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
    ),
));

/* Share
 ---------------------------------------------------------- */
vc_map(array(
    'name' => esc_html__('Share', 'lerp'),
    'base' => 'lerp_share',
    'weight' => 86,
    'icon' => 'fa fa-share',
    'php_class_name' => 'lerp_share',
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Share buttons', 'lerp'),
    'params' => array(
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Share layout", 'lerp'),
            "param_name" => "layout",
            "description" => esc_html__("Specify the sharing area layout.", 'lerp'),
            "value" => array(
                esc_html__('One popup button', 'lerp') => '',
                esc_html__('Social buttons', 'lerp') => 'multiple',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Bigger icons", 'lerp'),
            "param_name" => "bigger",
            "description" => esc_html__("Activate this to have bigger icons.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'layout',
                'value' => 'multiple',
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("No background", 'lerp'),
            "param_name" => "no_back",
            "description" => esc_html__("Activate this to remove the background hover effect.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'layout',
                'value' => 'multiple',
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Label', 'lerp'),
            'param_name' => 'title',
            'description' => esc_html__('Insert the label for the share module.', 'lerp'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Separator", 'lerp'),
            "param_name" => "separator",
            "description" => esc_html__("Activate this to add a separator between the value and the description.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'layout',
                'value' => 'multiple',
            ),
        ),
        $add_css_animation,
        $add_animation_speed,
        $add_animation_delay,
    ),
));

/* Twenty Twenty
 ---------------------------------------------------------- */
vc_map(array(
    'base' => 'lerp_twentytwenty',
    'name' => esc_html__('Before and After', 'lerp'),
    'icon' => 'fa fa-adjust',
    'php_class_name' => 'lerp_twentytwenty',
    'weight' => 30,
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Show before-and-after pictures', 'lerp'),
    'params' => array(
        array(
            "type" => "media_element",
            "heading" => esc_html__("Media before", 'lerp'),
            "param_name" => "media_before",
            "value" => "",
            "description" => esc_html__("Specify a media from the media library.", 'lerp'),
            "admin_label" => true
        ),
        array(
            "type" => "media_element",
            "heading" => esc_html__("Media after", 'lerp'),
            "param_name" => "media_after",
            "value" => "",
            "description" => esc_html__("Specify a media from the media library.", 'lerp'),
            "admin_label" => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'lerp'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'lerp')
        ),
    )
));

/* Author Profile
 ---------------------------------------------------------- */
$role_list = apply_filters('lerp_author_profile_role', array('administrator', 'editor', 'author'));
$user_list_original = get_users(array('role__in' => $role_list));
$user_list = array(
    esc_html__('Default user', 'lerp') => ''
);
foreach ( $user_list_original as $user ) {
    $count_user_post = count_user_posts($user->ID);
    if ( $count_user_post > 0 ) //user is author too
        $user_list[$user->display_name] = $user->ID;
}

$size_arr = array(
    esc_html__('Standard', 'lerp') => '',
    esc_html__('Small', 'lerp') => 'btn-sm',
    esc_html__('Large', 'lerp') => 'btn-lg',
    esc_html__('Extra-Large', 'lerp') => 'btn-xl',
    esc_html__('Button link', 'lerp') => 'btn-link',
    esc_html__('Standard link', 'lerp') => 'link',
);

vc_map(array(
    'base' => 'lerp_author_profile',
    'name' => esc_html__('Author Profile', 'lerp'),
    'icon' => 'fa fa-user',
    'php_class_name' => 'lerp_author_profile',
    'weight' => 30,
    'category' => esc_html__('Content', 'lerp'),
    'description' => esc_html__('Display author profile and info', 'lerp'),
    'params' => array(

        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Select user", 'lerp'),
            "param_name" => "user_id",
            "admin_label" => true,
            "description" => esc_html__("Select an option if you want to display a different user than the author.", 'lerp'),
            "value" => $user_list,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Display avatar', 'lerp'),
            'param_name' => 'avatar',
            'description' => esc_html__("Specify whether to show the avatar or not.", 'lerp'),
            "value" => array(
                esc_html__('Use global recognized avatar (Gravatar)', 'lerp') => 'gravatar',
                esc_html__('Use custom avatar', 'lerp') => 'custom',
                esc_html__('Do not display any avatar', 'lerp') => 'hide',
            ),
        ),
        array(
            "type" => "media_element",
            "heading" => esc_html__("Custom avatar", 'lerp'),
            "param_name" => "custom_avatar",
            "value" => "",
            "description" => esc_html__("Specify an image from the media library.", 'lerp'),
            'dependency' => array(
                'element' => 'avatar',
                'value' => array(
                    'custom',
                ),
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Avatar position", 'lerp'),
            "param_name" => "avatar_position",
            "description" => esc_html__("Specify where to position the author avatar with respect to the text.", 'lerp'),
            "value" => array(
                esc_html__('Left', 'lerp') => 'left',
                esc_html__('Top', 'lerp') => 'top',
                esc_html__('Right', 'lerp') => 'right',
            ),
            'dependency' => array(
                'element' => 'avatar',
                'value' => array(
                    'gravatar',
                    'custom',
                ),
            ),
        ),
        array(
            "type" => 'textfield',
            "heading" => esc_html__("Avatar size", 'lerp'),
            "param_name" => "avatar_size",
            "description" => esc_html__("Intended in pixels. Enter an integer number.", 'lerp'),
            "value" => "100",
            'dependency' => array(
                'element' => 'avatar',
                'value' => array(
                    'gravatar',
                    'custom',
                ),
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Avatar style", 'lerp'),
            "param_name" => "avatar_style",
            "description" => esc_html__("Select the look of the avatar image.", 'lerp'),
            "value" => array(
                esc_html__('Square', 'lerp') => '',
                esc_html__('Circular', 'lerp') => 'img-circle',
                esc_html__('Rounded', 'lerp') => 'img-round',
            ),
            "std" => "img-circle",
            'dependency' => array(
                'element' => 'avatar',
                'value' => array(
                    'gravatar',
                    'custom',
                ),
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Avatar border", 'lerp'),
            "param_name" => "avatar_border",
            "description" => esc_html__("Specify whether to display a solid border around the avatar image or not.", 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'avatar',
                'value' => array(
                    'gravatar',
                    'custom',
                ),
            ),
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Avatar Border skin", 'lerp'),
            "param_name" => "avatar_skin",
            "description" => esc_html__("Specify the skin of the avatar box.", 'lerp'),
            "value" => array(
                esc_html__('Light', 'lerp') => 'light',
                esc_html__('Dark', 'lerp') => 'dark'
            ),
            'dependency' => array(
                'element' => 'avatar_border',
                'not_empty' => true,
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Avatar Background color", 'lerp'),
            "param_name" => "avatar_back_color",
            "description" => esc_html__("Specify a background color for the box.", 'lerp'),
            "value" => $lerp_colors,
            'dependency' => array(
                'element' => 'avatar_border',
                'not_empty' => true,
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Author Name Link", 'lerp'),
            "param_name" => "author_name_linked",
            "description" => esc_html__("Link the author name to the author post page.", 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
            "std" => "yes",
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Element semantic", 'lerp'),
            "param_name" => "heading_semantic",
            "description" => esc_html__("Specify element tag.", 'lerp'),
            "value" => $heading_semantic,
            'std' => 'h2',
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text size", 'lerp'),
            "param_name" => "text_size",
            "description" => esc_html__("Specify text size.", 'lerp'),
            'std' => 'h2',
            "value" => $heading_size,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Line height", 'lerp'),
            "param_name" => "text_height",
            "description" => esc_html__("Specify text line height.", 'lerp'),
            "value" => $heading_height,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Letter spacing", 'lerp'),
            "param_name" => "text_space",
            "description" => esc_html__("Specify letter spacing.", 'lerp'),
            "value" => $heading_space,
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Font family", 'lerp'),
            "param_name" => "text_font",
            "description" => esc_html__("Specify text font family.", 'lerp'),
            "value" => $heading_font,
            'std' => '',
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Font weight", 'lerp'),
            "param_name" => "text_weight",
            "description" => esc_html__("Specify text weight.", 'lerp'),
            "value" => $heading_weight,
            'std' => '',
        ),
        array(
            "type" => 'dropdown',
            "heading" => esc_html__("Text transform", 'lerp'),
            "param_name" => "text_transform",
            "description" => esc_html__("Specify the author name text transformation.", 'lerp'),
            "value" => array(
                esc_html__('Default CSS', 'lerp') => '',
                esc_html__('Uppercase', 'lerp') => 'uppercase',
                esc_html__('Lowercase', 'lerp') => 'lowercase',
                esc_html__('Capitalize', 'lerp') => 'capitalize'
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Text italic", 'lerp'),
            "param_name" => "text_italic",
            "description" => esc_html__("Transform the author name to italic.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Text color", 'lerp'),
            "param_name" => "text_color",
            "description" => esc_html__("Specify text color.", 'lerp'),
            "value" => $lerp_colors,
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Separator", 'lerp'),
            "param_name" => "separator",
            "description" => esc_html__("Activate the separator. This will appear under the text.", 'lerp'),
            "value" => array(
                esc_html__('None', 'lerp') => '',
                esc_html__('Under author name', 'lerp') => 'yes',
                esc_html__('Under author bio', 'lerp') => 'under',
                esc_html__('Over author name', 'lerp') => 'over'
            ),
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
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Display author bio", 'lerp'),
            "param_name" => "author_bio",
            "description" => esc_html__("Activate to display author bio text.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
            "std" => 'yes',
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Author bio text lead", 'lerp'),
            "param_name" => "sub_lead",
            "description" => esc_html__("Transform the text to leading.", 'lerp'),
            "value" => Array(
                '' => 'yes'
            ),
            'dependency' => array(
                'element' => 'author_bio',
                'not_empty' => true,
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Reduce author bio top space", 'lerp'),
            "param_name" => "sub_reduced",
            "description" => esc_html__("Activate this to reduce the author bio top margin.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            'dependency' => array(
                'element' => 'author_bio',
                'not_empty' => true,
            ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Display social and contact method icons", 'lerp'),
            "param_name" => "social",
            "description" => esc_html__("Specify whether to display the list of author's social profiles and external urls.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
            "std" => "yes",
        ),
        array(
            "type" => 'checkbox',
            "heading" => esc_html__("Display button", 'lerp'),
            "param_name" => "display_button",
            "description" => esc_html__("Use a button to redirect users to the author post page or a custom link.", 'lerp'),
            "value" => Array(
                esc_html__("Yes, please", 'lerp') => 'yes'
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text', 'lerp'),
            'param_name' => 'button_content',
            'value' => esc_html__('All author posts', 'lerp'),
            'description' => esc_html__('Text on the button.', 'lerp'),
            "group" => esc_html__("Button", 'lerp'),
            'dependency' => array(
                'element' => 'display_button',
                'not_empty' => true,
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Button link", 'lerp'),
            "param_name" => "button_link",
            "description" => esc_html__("Specify whether to link the button to the author post page or a different link.", 'lerp'),
            "value" => array(
                esc_html__('Link to the author post page', 'lerp') => '',
                esc_html__('Custom link', 'lerp') => 'custom',
            ),
            "group" => esc_html__("Button", 'lerp'),
            'dependency' => array(
                'element' => 'display_button',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('URL (Link)', 'lerp'),
            'param_name' => 'link',
            'description' => esc_html__('Button link.', 'lerp'),
            'dependency' => array(
                'element' => 'button_link',
                'value' => 'custom',
            ),
            "group" => esc_html__("Button", 'lerp'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Button color", 'lerp'),
            "param_name" => "button_color",
            "description" => esc_html__("Specify button color.", 'lerp'),
            "value" => $lerp_colors,
            "group" => esc_html__("Button", 'lerp'),
            'dependency' => array(
                'element' => 'display_button',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Size', 'lerp'),
            'param_name' => 'size',
            'value' => $size_arr,
            'description' => esc_html__('Button size.', 'lerp'),
            "group" => esc_html__("Button", 'lerp'),
            'dependency' => array(
                'element' => 'display_button',
                'not_empty' => true,
            ),
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
            "group" => esc_html__("Button", 'lerp'),
            'dependency' => array(
                'element' => 'display_button',
                'not_empty' => true,
            ),
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
            "group" => esc_html__("Button", 'lerp'),
            'dependency' => array(
                'element' => 'display_button',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Outlined inverse', 'lerp'),
            'param_name' => 'outline',
            'description' => esc_html__("Outlined buttons don't have a full background color. NB: this option is available only with Hover Effect > Outlined.", 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
            "group" => esc_html__("Button", 'lerp'),
            'dependency' => array(
                'element' => 'display_button',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Skin text', 'lerp'),
            'param_name' => 'text_skin',
            'description' => esc_html__("Keep the text color as the skin. NB: this option works well with Hover Effect > Outlined.", 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
            "group" => esc_html__("Button", 'lerp'),
            'dependency' => array(
                'element' => 'display_button',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Outlined', 'lerp'),
            'param_name' => 'outline',
            'description' => esc_html__("Outlined buttons doesn't have a full background color.", 'lerp'),
            'value' => array(
                esc_html__('Yes, please', 'lerp') => 'yes'
            ),
            "group" => esc_html__("Button", 'lerp'),
            'dependency' => array(
                'element' => 'display_button',
                'not_empty' => true,
            ),
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
            "group" => esc_html__("Button", 'lerp'),
            'dependency' => array(
                'element' => 'display_button',
                'not_empty' => true,
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
            ),
            "group" => esc_html__("Button", 'lerp'),
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
    )
));

/* Content Block
 ---------------------------------------------------------- */
if ( function_exists('lerp_get_current_post_type') ) {
    $current_post_type = lerp_get_current_post_type();
    if ( $current_post_type !== 'lerpblock' ) {
        $cblock = get_posts('post_type="lerpblock"&numberposts=-1&suppress_filters=0');

        $conten_blocks = array();
        if ( $cblock ) {
            foreach ( $cblock as $cform ) {
                $conten_blocks[$cform->post_title] = $cform->ID;
            }
        } else {
            $conten_blocks[__('No Content Block found', 'lerp')] = 0;
        }
        vc_map(array(
            'base' => 'lerp_block',
            'php_class_name' => 'lerp_block',
            'weight' => 97,
            'name' => __('Content Block VC', 'lerp'),
            'icon' => 'dashicons-before dashicons-tagcloud',
            'category' => __('Content', 'lerp'),
            'description' => __('Place Content Block', 'lerp'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => __('Content Block', 'lerp'),
                    'param_name' => 'id',
                    'value' => $conten_blocks,
                    'admin_label' => true,
                    'save_always' => true,
                    'description' => __('Choose previously created Content Block from the drop down list.', 'lerp'),
                ),
                array(
                    "type" => 'checkbox',
                    "heading" => esc_html__("Column container settings", 'lerp'),
                    "param_name" => "inside_column",
                    "description" => sprintf(esc_html__("Activate this to use the Content Block inside a column.%sNB. When using this option nested row (row child) inside the Content Block will not work.", 'lerp'), '<br /><br />'),
                    "value" => Array(
                        esc_html__("Yes, please", 'lerp') => 'yes'
                    ),
                ),
            ),
            'js_view' => 'LerpBlockView'
        ));
    }
}

?>
