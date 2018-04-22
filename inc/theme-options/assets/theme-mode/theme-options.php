<?php

/**
 * Initialize the custom Theme Options.
 */
add_action('admin_init', 'custom_theme_options');

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options()
{

    global $wpdb, $lerp_colors, $lerp_post_types;

    if ( !isset($lerp_post_types) ) $lerp_post_types = lerp_get_post_types();
    /**
     * Get a copy of the saved settings array.
     */
    $saved_settings = get_option(ot_settings_id(), array());

    /**
     * Custom settings array that will eventually be
     * passes to the OptionTree Settings API Class.
     */

    if ( !function_exists('ot_filter_measurement_unit_types') ) {
        function ot_filter_measurement_unit_types($array, $field_id)
        {
            return array(
                'px' => 'px',
                '%' => '%'
            );
        }
    }

    add_filter('ot_measurement_unit_types', 'ot_filter_measurement_unit_types', 10, 2);

    function run_array_to($array, $key = '', $value = '')
    {
        $array[$key] = $value;
        return $array;
    }

    $stylesArrayMenu = array(
        array(
            'value' => 'light',
            'label' => esc_html__('Light', 'lerp'),
            'src' => ''
        ),
        array(
            'value' => 'dark',
            'label' => esc_html__('Dark', 'lerp'),
            'src' => ''
        )
    );

    $menus = get_terms('nav_menu', array('hide_empty' => true));
    $menus_array = array();
    $menus_array[] = array(
        'value' => '',
        'label' => esc_html__('Inherit', 'lerp')
    );
    foreach ( $menus as $menu ) {
        $menus_array[] = array(
            'value' => $menu->slug,
            'label' => $menu->name
        );
    }

    if ( is_plugin_active('lerp-core/lerp-core.php') ) {

        $lerpblock = array(
            'value' => 'header_lerpblock',
            'label' => esc_html__('Content Block', 'lerp'),
        );

        $lerpblocks = array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp')
            ),
            array(
                'value' => 'none',
                'label' => esc_html__('None', 'lerp')
            )
        );

        $blocks_query = new WP_Query('post_type=lerpblock&posts_per_page=-1&post_status=publish');

        foreach ( $blocks_query->posts as $block ) {
            $lerpblocks[] = array(
                'value' => $block->ID,
                'label' => $block->post_title,
                'postlink' => get_edit_post_link($block->ID),
            );
        }

        if ( $blocks_query->post_count === 0 ) {
            $lerpblocks[] = array(
                'value' => '',
                'label' => esc_html__('No Content Blocks found', 'lerp')
            );
        }

        $lerpblock_404 = array(
            'id' => '_lerp_404_body',
            'label' => esc_html__('404 content', 'lerp'),
            'desc' => esc_html__('Specify a content for the 404 page.', 'lerp'),
            'std' => '',
            'type' => 'select',
            'choices' => array(
                array(
                    'value' => '',
                    'label' => esc_html__('Default', 'lerp'),
                ),
                array(
                    'value' => 'body_lerpblock',
                    'label' => esc_html__('Content Block', 'lerp'),
                ),
            ),
            'section' => 'lerp_404_section',
        );

        $lerpblocks_404 = array(
            'id' => '_lerp_404_body_block',
            'label' => esc_html__('404 Content Block', 'lerp'),
            'desc' => esc_html__('Specify a content for the 404 page.', 'lerp'),
            'type' => 'select',
            'choices' => $lerpblocks,
            'section' => 'lerp_404_section',
            'operator' => 'and',
            'condition' => '_lerp_404_body:is(body_lerpblock)',
        );

    } else {
        $lerpblock = $lerpblock_404 = $lerpblocks_404 = '';
        $lerpblocks = array();
    }

    if ( is_plugin_active('revslider/revslider.php') ) {

        $revslider = array(
            'value' => 'header_revslider',
            'label' => esc_html__('Revolution Slider', 'lerp'),
        );

        $rs = $wpdb->get_results("SELECT id, title, alias FROM " . $wpdb->prefix . "revslider_sliders WHERE type != 'template' ORDER BY id ASC LIMIT 999");
        $revsliders = array();
        if ( $rs ) {
            foreach ( $rs as $slider ) {
                $revsliders[] = array(
                    'value' => $slider->alias,
                    'label' => $slider->title,
                    'postlink' => admin_url('admin.php?page=revslider&view=slider&id=' . $slider->id),
                );
            }
        } else {
            $revsliders[] = array(
                'value' => '',
                'label' => esc_html__('No Revolution Sliders found', 'lerp')
            );
        }
    } else $revslider = $revsliders = '';

    if ( is_plugin_active('LayerSlider/layerslider.php') ) {

        $layerslider = array(
            'value' => 'header_layerslider',
            'label' => esc_html__('LayerSlider', 'lerp'),
        );

        $ls = $wpdb->get_results("SELECT id, name FROM " . $wpdb->prefix . "layerslider WHERE flag_deleted != '1' ORDER BY id ASC LIMIT 999");
        $layersliders = array();
        if ( $ls ) {
            foreach ( $ls as $slider ) {
                $layersliders[] = array(
                    'value' => $slider->id,
                    'label' => $slider->name,
                    'postlink' => admin_url('admin.php?page=layerslider&action=edit&id=' . $slider->id),
                );
            }
        } else {
            $layersliders[] = array(
                'value' => '',
                'label' => esc_html__('No LayerSliders found', 'lerp')
            );
        }
    } else $layerslider = $layersliders = '';

    $title_size = array(
        array(
            'value' => 'h1',
            'label' => esc_html__('h1', 'lerp')
        ),
        array(
            'value' => 'h2',
            'label' => esc_html__('h2', 'lerp'),
        ),
        array(
            'value' => 'h3',
            'label' => esc_html__('h3', 'lerp'),
        ),
        array(
            'value' => 'h4',
            'label' => esc_html__('h4', 'lerp'),
        ),
        array(
            'value' => 'h5',
            'label' => esc_html__('h5', 'lerp'),
        ),
        array(
            'value' => 'h6',
            'label' => esc_html__('h6', 'lerp'),
        ),
    );

    $font_sizes = ot_get_option('_lerp_heading_font_sizes');
    if ( !empty($font_sizes) ) {
        foreach ( $font_sizes as $key => $value ) {
            $title_size[] = array(
                'value' => $value['_lerp_heading_font_size_unique_id'],
                'label' => $value['title'],
            );
        }
    }

    $title_size[] = array(
        'value' => 'bigtext',
        'label' => esc_html__('BigText', 'lerp'),
    );

    $title_height = array(
        array(
            'value' => '',
            'label' => esc_html__('Default CSS', "lerp")
        ),
    );

    $font_heights = ot_get_option('_lerp_heading_font_heights');
    if ( !empty($font_heights) ) {
        foreach ( $font_heights as $key => $value ) {
            $title_height[] = array(
                'value' => $value['_lerp_heading_font_height_unique_id'],
                'label' => $value['title'],
            );
        }
    }

    $title_spacing = array(
        array(
            'value' => '',
            'label' => esc_html__('Default CSS', "lerp")
        ),
    );

    $btn_letter_spacing = $title_spacing;
    $btn_letter_spacing[] = array(
        'value' => 'lerp-fontspace-zero',
        'label' => esc_html__('Letter Spacing 0', "lerp")
    );

    $font_spacings = ot_get_option('_lerp_heading_font_spacings');
    if ( !empty($font_spacings) ) {
        foreach ( $font_spacings as $key => $value ) {
            $btn_letter_spacing[] = $title_spacing[] = array(
                'value' => $value['_lerp_heading_font_spacing_unique_id'],
                'label' => $value['title'],
            );
        }
    }

    $fonts = get_option('lerp_font_options');
    $title_font = array();

    if ( isset($fonts['font_stack']) && $fonts['font_stack'] !== '[]' ) {
        $font_stack_string = $fonts['font_stack'];
        $font_stack = json_decode(str_replace('&quot;', '"', $font_stack_string), true);

        foreach ( $font_stack as $font ) {
            if ( $font['source'] === 'Font Squirrel' ) {
                $variants = explode(',', $font['variants']);
                $label = (string)$font['family'] . ' - ';
                $weight = array();
                foreach ( $variants as $variant ) {
                    if ( strpos(strtolower($variant), 'hairline') !== false ) {
                        $weight[] = 100;
                    } else if ( strpos(strtolower($variant), 'light') !== false ) {
                        $weight[] = 200;
                    } else if ( strpos(strtolower($variant), 'regular') !== false ) {
                        $weight[] = 400;
                    } else if ( strpos(strtolower($variant), 'semibold') !== false ) {
                        $weight[] = 500;
                    } else if ( strpos(strtolower($variant), 'bold') !== false ) {
                        $weight[] = 600;
                    } else if ( strpos(strtolower($variant), 'black') !== false ) {
                        $weight[] = 800;
                    } else {
                        $weight[] = 400;
                    }
                }
                $label .= implode(',', $weight);
                $title_font[] = array(
                    'value' => urlencode((string)$font['family']),
                    'label' => $label
                );
            } else if ( $font['source'] === 'Google Web Fonts' ) {
                $label = (string)$font['family'] . ' - ' . $font['variants'];
                $title_font[] = array(
                    'value' => urlencode((string)$font['family']),
                    'label' => $label
                );
            } else if ( $font['source'] === 'Typekit' ) {
                $label = (string)$font['family'] . ' - ';
                $variants = explode(',', $font['variants']);
                foreach ( $variants as $key => $variant ) {
                    preg_match("|\d+|", $variants[$key], $weight);
                    $variants[$key] = $weight[0] . '00';
                }
                $label .= implode(',', $variants);
                $title_font[] = array(
                    'value' => urlencode(str_replace('"', '', (string)$font['stub'])),
                    'label' => $label
                );
            } else {
                $title_font[] = array(
                    'value' => urlencode((string)$font['family']),
                    'label' => (string)$font['family']
                );
            }
        }
    } else {
        $title_font = array(
            array(
                'value' => '',
                'label' => esc_html__('No fonts activated.', "lerp"),
            )
        );
    }

    $title_font[] = array(
        'value' => 'manual',
        'label' => esc_html__('Manually entered', 'lerp')
    );

    $custom_fonts = array(
        array(
            'value' => '',
            'label' => esc_html__('Default CSS', "lerp"),
        )
    );

    $custom_fonts_array = ot_get_option('_lerp_font_groups');
    if ( !empty($custom_fonts_array) ) {
        foreach ( $custom_fonts_array as $key => $value ) {
            $custom_fonts[] = array(
                'value' => $value['_lerp_font_group_unique_id'],
                'label' => $value['title'],
            );
        }
    }

    $title_weight = array(
        array(
            'value' => '',
            'label' => esc_html__('Default CSS', "lerp"),
        ),
        array(
            'value' => 100,
            'label' => '100',
        ),
        array(
            'value' => 200,
            'label' => '200',
        ),
        array(
            'value' => 300,
            'label' => '300',
        ),
        array(
            'value' => 400,
            'label' => '400',
        ),
        array(
            'value' => 500,
            'label' => '500',
        ),
        array(
            'value' => 600,
            'label' => '600',
        ),
        array(
            'value' => 700,
            'label' => '700',
        ),
        array(
            'value' => 800,
            'label' => '800',
        ),
        array(
            'value' => 900,
            'label' => '900',
        )
    );

    $menu_section_title = array(
        'id' => '_lerp_%section%_menu_block_title',
        'label' => ' <i class="fa fa-menu"></i> ' . esc_html__('菜单', 'lerp'),
        'desc' => '',
        'type' => 'textblock-titled',
        'class' => 'section-title',
        'section' => 'lerp_%section%_section',
    );

    $menu = array(
        'id' => '_lerp_%section%_menu',
        'label' => esc_html__('菜单', 'lerp'),
        'desc' => esc_html__('Override the primary menu created in \'Appearance -> Menus\'.', 'lerp'),
        'type' => 'select',
        'choices' => $menus_array,
        'section' => 'lerp_%section%_section',
    );

    $menu_width = array(
        'id' => '_lerp_%section%_menu_width',
        'label' => esc_html__('Menu width', 'lerp'),
        'desc' => esc_html__('Override the menu width.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'full',
                'label' => esc_html__('Full', 'lerp'),
            ),
            array(
                'value' => 'limit',
                'label' => esc_html__('Limit', 'lerp'),
            ),
        ),
        'section' => 'lerp_%section%_section',
    );

    $menu_opaque = array(
        'id' => '_lerp_%section%_menu_opaque',
        'label' => esc_html__('Remove transparency', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Override to remove the transparency eventually declared in \'Customize -> Light/Dark skin\'.',
            'lerp'),
        'std' => 'off',
        'section' => 'lerp_%section%_section',
    );

    $menu_no_padding = array(
        'id' => '_lerp_%section%_menu_no_padding',
        'label' => esc_html__('Remove menu content padding', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Remove the additional menu padding in the header.', 'lerp'),
        'std' => 'off',
        'section' => 'lerp_%section%_section',
    );

    $menu_no_padding_mobile = array(
        'id' => '_lerp_%section%_menu_no_padding_mobile',
        'label' => esc_html__('Remove menu content padding on mobile', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Remove the additional menu padding in the header on mobile.', 'lerp'),
        'std' => 'off',
        'section' => 'lerp_%section%_section',
    );

    $header_section_title = array(
        'id' => '_lerp_%section%_header_block_title',
        'label' => '<i class="fa fa-columns2"></i> ' . esc_html__('Header', 'lerp'),
        'desc' => '',
        'type' => 'textblock-titled',
        'class' => 'section-title',
        'section' => 'lerp_%section%_section',
    );

    $header_type = array(
        'id' => '_lerp_%section%_header',
        'label' => esc_html__('Type', 'lerp'),
        'desc' => esc_html__('Specify the header type.', 'lerp'),
        'std' => 'none',
        'type' => 'select',
        'choices' => array(
            array(
                'value' => 'none',
                'label' => esc_html__('Select…', 'lerp'),
            ),
            array(
                'value' => 'header_basic',
                'label' => esc_html__('Basic', 'lerp'),
            ),
            $lerpblock,
            $revslider,
            $layerslider,
        ),
        'section' => 'lerp_%section%_section',
    );

    if ( is_plugin_active('lerp-core/lerp-core.php') ) {

        $header_lerp_block = array(
            'id' => '_lerp_%section%_blocks',
            'label' => esc_html__('Content Block', 'lerp'),
            'desc' => esc_html__('Specify the Content Block.', 'lerp'),
            'type' => 'custom-post-type-select',
            'condition' => '_lerp_%section%_header:is(header_lerpblock)',
            'operator' => 'or',
            'post_type' => 'lerpblock',
            'section' => 'lerp_%section%_section',
        );

    } else {
        $header_lerp_block = null;
    }

    $header_revslider = array(
        'id' => '_lerp_%section%_revslider',
        'label' => esc_html__('Revslider', 'lerp'),
        'desc' => esc_html__('Specify the RevSlider.', 'lerp'),
        'type' => 'select',
        'condition' => '_lerp_%section%_header:is(header_revslider)',
        'operator' => 'or',
        'choices' => $revsliders,
        'section' => 'lerp_%section%_section',
    );

    $header_layerslider = array(
        'id' => '_lerp_%section%_layerslider',
        'label' => esc_html__('LayerSlider', 'lerp'),
        'desc' => esc_html__('Specify the LayerSlider.', 'lerp'),
        'type' => 'select',
        'condition' => '_lerp_%section%_header:is(header_layerslider)',
        'operator' => 'or',
        'choices' => $layersliders,
        'section' => 'lerp_%section%_section',
    );

    $header_title = array(
        'label' => esc_html__('Title in header', 'lerp'),
        'id' => '_lerp_%section%_header_title',
        'type' => 'on-off',
        'desc' => esc_html__('Activate to show title in the header.', 'lerp'),
        'std' => 'on',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'or',
    );

    $header_title_text = array(
        'id' => '_lerp_%section%_header_title_text',
        'label' => esc_html__('Custom text', 'lerp'),
        'desc' => esc_html__('Add custom text for the header. Every newline in the field is a new line in the title.',
            'lerp'),
        'type' => 'textarea-simple',
        'rows' => '15',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on)',
        'operator' => 'and',
    );

    $header_style = array(
        'id' => '_lerp_%section%_header_style',
        'label' => esc_html__('Skin', 'lerp'),
        'desc' => esc_html__('Specify the header text skin.', 'lerp'),
        'std' => 'light',
        'type' => 'select',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'and',
        'choices' => $stylesArrayMenu
    );

    $header_width = array(
        'id' => '_lerp_%section%_header_width',
        'label' => esc_html__('Header width', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'full',
                'label' => esc_html__('Full', 'lerp'),
            ),
            array(
                'value' => 'limit',
                'label' => esc_html__('Limit', 'lerp'),
            ),
        ),
        'desc' => esc_html__('Override the header width.', 'lerp'),
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:contains(header)',
        'operator' => 'or',
    );

    $header_content_width = array(
        'id' => '_lerp_%section%_header_content_width',
        'label' => esc_html__('Content full width', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Activate to expand the header content to full width.', 'lerp'),
        'std' => 'off',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'and',
    );

    $header_custom_width = array(
        'id' => '_lerp_%section%_header_custom_width',
        'label' => esc_html__('Custom inner width', 'lerp'),
        'desc' => esc_html__('Adjust the inner content width in %.', 'lerp'),
        'std' => '100',
        'type' => 'numeric-slider',
        'min_max_step' => '0,100,1',
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'and',
        'section' => 'lerp_%section%_section',
    );

    $header_align = array(
        'id' => '_lerp_%section%_header_align',
        'label' => esc_html__('Content alignment', 'lerp'),
        'desc' => esc_html__('Specify the text/content alignment.', 'lerp'),
        'std' => 'center',
        'type' => 'select',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on)',
        'operator' => 'and',
        'choices' => array(
            array(
                'value' => 'left',
                'label' => esc_html__('Left', 'lerp'),
                'src' => ''
            ),
            array(
                'value' => 'center',
                'label' => esc_html__('Center', 'lerp'),
                'src' => ''
            ),
            array(
                'value' => 'right',
                'label' => esc_html__('Right', 'lerp'),
                'src' => ''
            )
        )
    );

    $header_height = array(
        'id' => '_lerp_%section%_header_height',
        'label' => esc_html__('Height', 'lerp'),
        'desc' => esc_html__('Define the height of the header in px or in % (relative to the window height).', 'lerp'),
        'type' => 'measurement',
        'std' => array(
            '60',
            '%'
        ),
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'or',
        'section' => 'lerp_%section%_section',
    );

    $header_min_height = array(
        'id' => '_lerp_%section%_header_min_height',
        'label' => esc_html__('Minimal height', 'lerp'),
        'desc' => esc_html__('Enter a minimun height for the header in pixel.', 'lerp'),
        'type' => 'text',
        'std' => '300',
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'or',
        'section' => 'lerp_%section%_section',
    );

    $header_position = array(
        'id' => '_lerp_%section%_header_position',
        'label' => esc_html__('Position', 'lerp'),
        'desc' => esc_html__('Specify the position of the header content inside the container.', 'lerp'),
        'std' => 'header-center header-middle',
        'type' => 'select',
        'operator' => 'and',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on)',
        'choices' => array(
            array(
                'value' => 'header-left header-top',
                'label' => esc_html__('Left Top', 'lerp'),
            ),
            array(
                'value' => 'header-left header-center',
                'label' => esc_html__('Left Center', 'lerp'),
            ),
            array(
                'value' => 'header-left header-bottom',
                'label' => esc_html__('Left Bottom', 'lerp'),
            ),
            array(
                'value' => 'header-center header-top',
                'label' => esc_html__('Center Top', 'lerp'),
            ),
            array(
                'value' => 'header-center header-middle',
                'label' => esc_html__('Center Center', 'lerp'),
            ),
            array(
                'value' => 'header-center header-bottom',
                'label' => esc_html__('Center Bottom', 'lerp'),
            ),
            array(
                'value' => 'header-right header-top',
                'label' => esc_html__('Right Top', 'lerp'),
            ),
            array(
                'value' => 'header-right header-center',
                'label' => esc_html__('Right Center', 'lerp'),
            ),
            array(
                'value' => 'header-right header-bottom',
                'label' => esc_html__('Right Bottom', 'lerp'),
            ),
        ),
        'section' => 'lerp_%section%_section',
    );

    $header_title_font = array(
        'id' => '_lerp_%section%_header_title_font',
        'label' => esc_html__('Title font family', 'lerp'),
        'desc' => esc_html__('Specify the font for the title.', 'lerp'),
        'std' => 'font-762333',
        'type' => 'select',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on)',
        'operator' => 'and',
        'choices' => $custom_fonts,
        'section' => 'lerp_%section%_section',
    );

    $header_title_size = array(
        'id' => '_lerp_%section%_header_title_size',
        'label' => esc_html__('Title font size', 'lerp'),
        'desc' => esc_html__('Specify the font size for the title.', 'lerp'),
        'type' => 'select',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on)',
        'operator' => 'and',
        'choices' => $title_size,
        'section' => 'lerp_%section%_section',
    );

    $header_title_height = array(
        'id' => '_lerp_%section%_header_title_height',
        'label' => esc_html__('Title line height', 'lerp'),
        'desc' => esc_html__('Specify the line height for the title.', 'lerp'),
        'type' => 'select',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on)',
        'operator' => 'and',
        'choices' => $title_height,
        'section' => 'lerp_%section%_section',
    );

    $header_title_spacing = array(
        'id' => '_lerp_%section%_header_title_spacing',
        'label' => esc_html__('Title letter spacing', 'lerp'),
        'desc' => esc_html__('Specify the letter spacing for the title.', 'lerp'),
        'type' => 'select',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on)',
        'operator' => 'and',
        'choices' => $title_spacing,
        'section' => 'lerp_%section%_section',
    );

    $header_title_weight = array(
        'id' => '_lerp_%section%_header_title_weight',
        'label' => esc_html__('Title font weight', 'lerp'),
        'desc' => esc_html__('Specify the font weight for the title.', 'lerp'),
        'type' => 'select',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on)',
        'operator' => 'and',
        'choices' => $title_weight,
        'section' => 'lerp_%section%_section',
    );

    $header_title_italic = array(
        'id' => '_lerp_%section%_header_title_italic',
        'label' => esc_html__('Title italic', 'lerp'),
        'desc' => esc_html__('Activate the font style italic for the title.', 'lerp'),
        'type' => 'on-off',
        'std' => 'off',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on)',
        'operator' => 'and',
    );

    $header_title_transform = array(
        'id' => '_lerp_%section%_header_title_transform',
        'label' => esc_html__('Title text transform', 'lerp'),
        'desc' => esc_html__('Specify the title text transformation.', 'lerp'),
        'type' => 'select',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on)',
        'operator' => 'and',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Default CSS', 'lerp'),
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
        )
    );

    $header_text_animation = array(
        'id' => '_lerp_%section%_header_text_animation',
        'label' => esc_html__('Text animation', 'lerp'),
        'desc' => esc_html__('Specify the entrance animation of the title text.', 'lerp'),
        'type' => 'select',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on)',
        'operator' => 'and',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Select…', 'lerp'),
            ),
            array(
                'value' => 'top-t-bottom',
                'label' => esc_html__('Top to bottom', 'lerp'),
            ),
            array(
                'value' => 'left-t-right',
                'label' => esc_html__('Left to right', 'lerp'),
            ),
            array(
                'value' => 'right-t-left',
                'label' => esc_html__('Right to left', 'lerp'),
            ),
            array(
                'value' => 'bottom-t-top',
                'label' => esc_html__('Bottom to top', 'lerp'),
            ),
            array(
                'value' => 'zoom-in',
                'label' => esc_html__('Zoom in', 'lerp'),
            ),
            array(
                'value' => 'zoom-out',
                'label' => esc_html__('Zoom out', 'lerp'),
            ),
            array(
                'value' => 'alpha-anim',
                'label' => esc_html__('Alpha', 'lerp'),
            )
        ),
        'section' => 'lerp_%section%_section',
    );

    $header_animation_delay = array(
        'id' => '_lerp_%section%_header_animation_delay',
        'label' => esc_html__('Animation delay', 'lerp'),
        'desc' => esc_html__('Specify the entrance animation delay of the title text in milliseconds.', 'lerp'),
        'type' => 'select',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on),_lerp_%section%_header_text_animation:not()',
        'operator' => 'and',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('None', 'lerp'),
            ),
            array(
                'value' => '100',
                'label' => esc_html__('ms 100', 'lerp'),
            ),
            array(
                'value' => '200',
                'label' => esc_html__('ms 200', 'lerp'),
            ),
            array(
                'value' => '300',
                'label' => esc_html__('ms 300', 'lerp'),
            ),
            array(
                'value' => '400',
                'label' => esc_html__('ms 400', 'lerp'),
            ),
            array(
                'value' => '500',
                'label' => esc_html__('ms 500', 'lerp'),
            ),
            array(
                'value' => '600',
                'label' => esc_html__('ms 600', 'lerp'),
            ),
            array(
                'value' => '700',
                'label' => esc_html__('ms 700', 'lerp'),
            ),
            array(
                'value' => '800',
                'label' => esc_html__('ms 800', 'lerp'),
            ),
            array(
                'value' => '900',
                'label' => esc_html__('ms 900', 'lerp'),
            ),
            array(
                'value' => '1000',
                'label' => esc_html__('ms 1000', 'lerp'),
            ),
            array(
                'value' => '1100',
                'label' => esc_html__('ms 1100', 'lerp'),
            ),
            array(
                'value' => '1200',
                'label' => esc_html__('ms 1200', 'lerp'),
            ),
            array(
                'value' => '1300',
                'label' => esc_html__('ms 1300', 'lerp'),
            ),
            array(
                'value' => '1400',
                'label' => esc_html__('ms 1400', 'lerp'),
            ),
            array(
                'value' => '1500',
                'label' => esc_html__('ms 1500', 'lerp'),
            ),
            array(
                'value' => '1600',
                'label' => esc_html__('ms 1600', 'lerp'),
            ),
            array(
                'value' => '1700',
                'label' => esc_html__('ms 1700', 'lerp'),
            ),
            array(
                'value' => '1800',
                'label' => esc_html__('ms 1800', 'lerp'),
            ),
            array(
                'value' => '1900',
                'label' => esc_html__('ms 1900', 'lerp'),
            ),
            array(
                'value' => '2000',
                'label' => esc_html__('ms 2000', 'lerp'),
            ),
        ),
        'section' => 'lerp_%section%_section',
    );

    $header_animation_speed = array(
        'id' => '_lerp_%section%_header_animation_speed',
        'label' => esc_html__('Animation speed', 'lerp'),
        'desc' => esc_html__('Specify the entrance animation speed of the title text in milliseconds.', 'lerp'),
        'type' => 'select',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header_title:is(on),_lerp_%section%_header_text_animation:not()',
        'operator' => 'and',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Default (400)', 'lerp'),
            ),
            array(
                'value' => '100',
                'label' => esc_html__('ms 100', 'lerp'),
            ),
            array(
                'value' => '200',
                'label' => esc_html__('ms 200', 'lerp'),
            ),
            array(
                'value' => '300',
                'label' => esc_html__('ms 300', 'lerp'),
            ),
            array(
                'value' => '400',
                'label' => esc_html__('ms 400', 'lerp'),
            ),
            array(
                'value' => '500',
                'label' => esc_html__('ms 500', 'lerp'),
            ),
            array(
                'value' => '600',
                'label' => esc_html__('ms 600', 'lerp'),
            ),
            array(
                'value' => '700',
                'label' => esc_html__('ms 700', 'lerp'),
            ),
            array(
                'value' => '800',
                'label' => esc_html__('ms 800', 'lerp'),
            ),
            array(
                'value' => '900',
                'label' => esc_html__('ms 900', 'lerp'),
            ),
            array(
                'value' => '1000',
                'label' => esc_html__('ms 1000', 'lerp'),
            ),
        ),
        'section' => 'lerp_%section%_section',
    );

    $header_featured = array(
        'label' => esc_html__('Featured media in header', 'lerp'),
        'id' => '_lerp_%section%_header_featured',
        'type' => 'on-off',
        'desc' => esc_html__('Activate to use the featured image in the header.', 'lerp'),
        'std' => 'on',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'or',
    );

    $header_background = array(
        'id' => '_lerp_%section%_header_background',
        'label' => esc_html__('Background', 'lerp'),
        'desc' => esc_html__('Specify the background media and color.', 'lerp'),
        'type' => 'background',
        'std' => array(
            'background-color' => 'color-lxmt',
            'background-repeat' => '',
            'background-attachment' => '',
            'background-position' => '',
            'background-size' => '',
            'background-image' => '',
        ),
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'or',
    );

    $header_parallax = array(
        'id' => '_lerp_%section%_header_parallax',
        'label' => esc_html__('Parallax', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Activate the background parallax effect.', 'lerp'),
        'std' => 'off',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'or',
    );

    $header_kburns = array(
        'id' => '_lerp_%section%_header_kburns',
        'label' => esc_html__('Ken Burns', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Activate the background Ken Burns effect.', 'lerp'),
        'std' => 'off',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'or',
    );

    $header_overlay_color = array(
        'id' => '_lerp_%section%_header_overlay_color',
        'label' => esc_html__('Overlay color', 'lerp'),
        'desc' => esc_html__('Specify the overlay background color.', 'lerp'),
        'type' => 'lerp_color',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'or',
    );

    $header_overlay_color_alpha = array(
        'id' => '_lerp_%section%_header_overlay_color_alpha',
        'label' => esc_html__('Overlay color opacity', 'lerp'),
        'desc' => esc_html__('Set the overlay opacity.', 'lerp'),
        'std' => '100',
        'min_max_step' => '0,100,1',
        'type' => 'numeric-slider',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic)',
        'operator' => 'or',
    );

    $header_scroll_opacity = array(
        'id' => '_lerp_%section%_header_scroll_opacity',
        'label' => esc_html__('Scroll opacity', 'lerp'),
        'desc' => esc_html__('Activate alpha animation when scrolling down.', 'lerp'),
        'type' => 'on-off',
        'std' => 'off',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:is(header_basic),_lerp_%section%_header:is(header_lerpblock)',
        'operator' => 'or',
    );

    $header_scrolldown = array(
        'id' => '_lerp_%section%_header_scrolldown',
        'label' => esc_html__('Scroll down arrow', 'lerp'),
        'desc' => esc_html__('Activate the scroll down arrow button.', 'lerp'),
        'type' => 'on-off',
        'std' => 'on',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_header:not(none)',
        'operator' => 'or',
    );

    $show_breadcrumb = array(
        'id' => '_lerp_%section%_breadcrumb',
        'label' => esc_html__('Show breadcrumb', 'lerp'),
        'desc' => esc_html__('Activate to show the navigation breadcrumb.', 'lerp'),
        'std' => 'off',
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
    );

    $breadcrumb_align = array(
        'id' => '_lerp_%section%_breadcrumb_align',
        'label' => esc_html__('Breadcrumb align', 'lerp'),
        'desc' => esc_html__('Specify the breadcrumb alignment', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Right', 'lerp'),
            ),
            array(
                'value' => 'center',
                'label' => esc_html__('Center', 'lerp'),
            ),
            array(
                'value' => 'left',
                'label' => esc_html__('Left', 'lerp'),
            ),
        ),
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_breadcrumb:is(on)',
        'operator' => 'or',
    );

    $show_title = array(
        'id' => '_lerp_%section%_title',
        'label' => esc_html__('Show title', 'lerp'),
        'desc' => esc_html__('Activate to show the title in the content area.', 'lerp'),
        'std' => 'off',
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
        'operator' => 'or'
    );

    $show_media = array(
        'id' => '_lerp_%section%_media',
        'label' => esc_html__('Show media', 'lerp'),
        'desc' => esc_html__('Activate to show the medias in the content area.', 'lerp'),
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
    );

    $show_featured_media = array(
        'id' => '_lerp_%section%_featured_media',
        'label' => esc_html__('Show featured image', 'lerp'),
        'desc' => esc_html__('Activate to show the featured image in the content area.', 'lerp'),
        'std' => 'off',
        'type' => 'on-off',
        'condition' => '_lerp_%section%_media:not(on)',
        'section' => 'lerp_%section%_section',
    );

    $show_tags = array(
        'id' => '_lerp_%section%_tags',
        'label' => esc_html__('Show tags', 'lerp'),
        'desc' => esc_html__('Activate to show the tags and choose visbility by post to post bases.', 'lerp'),
        'std' => 'off',
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
    );

    $show_tags_align = array(
        'id' => '_lerp_%section%_tags_align',
        'label' => esc_html__('Tags alignment', 'lerp'),
        'desc' => esc_html__('Specify the tags alignment.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => 'left',
                'label' => esc_html__('Left align', 'lerp'),
                'src' => ''
            ),
            array(
                'value' => 'center',
                'label' => esc_html__('Center align', 'lerp'),
                'src' => ''
            ),
            array(
                'value' => 'right',
                'label' => esc_html__('Right align', 'lerp'),
                'src' => ''
            )
        ),
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_tags:is(on)',
        'operator' => 'or',
    );

    $show_comments = array(
        'id' => '_lerp_%section%_comments',
        'label' => esc_html__('Show comments', 'lerp'),
        'desc' => esc_html__('Activate to show the comments and choose visbility by post to post bases.', 'lerp'),
        'std' => 'on',
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
    );

    $show_share = array(
        'id' => '_lerp_%section%_share',
        'label' => esc_html__('Show share', 'lerp'),
        'desc' => esc_html__('Activate to show the share module.', 'lerp'),
        'std' => 'on',
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
    );

    $image_layout = array(
        'id' => '_lerp_%section%_image_layout',
        'label' => esc_html__('Media layout', 'lerp'),
        'desc' => esc_html__('Specify the layout mode for the product images section.', 'lerp'),
        'std' => '',
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Standard', 'lerp'),
            ),
            array(
                'value' => 'stack',
                'label' => esc_html__('Stack', 'lerp'),
            ),
        ),
        'section' => 'lerp_%section%_section',
    );

    $media_size = array(
        'id' => '_lerp_%section%_media_size',
        'label' => esc_html__('Media layout size', 'lerp'),
        'desc' => esc_html__('Specify the size of the media layout area.', 'lerp'),
        'std' => '6',
        'min_max_step' => '1,11,1',
        'type' => 'numeric-slider',
        'section' => 'lerp_%section%_section',
    );

    $enable_sticky_desc = array(
        'id' => '_lerp_%section%_sticky_desc',
        'label' => esc_html__('Sticky content', 'lerp'),
        'desc' => esc_html__('Activate to enable sticky effect for product description.', 'lerp'),
        'std' => 'on',
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_image_layout:is(stack)',
    );

    $enable_woo_zoom = array(
        'id' => '_lerp_%section%_enable_zoom',
        'label' => esc_html__('Zoom', 'lerp'),
        'desc' => esc_html__('Activate to enable drag zoom effect on product image.', 'lerp'),
        'std' => 'off',
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
    );

    $thumb_cols = array(
        'id' => '_lerp_%section%_thumb_cols',
        'label' => esc_html__('Thumbnails columns', 'lerp'),
        'desc' => esc_html__('Specify how many columns to display for your product gallery thumbs.', 'lerp'),
        'std' => '',
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '2',
                'label' => '2',
            ),
            array(
                'value' => '',
                'label' => '3',
            ),
            array(
                'value' => '4',
                'label' => '4',
            ),
            array(
                'value' => '5',
                'label' => '5',
            ),
            array(
                'value' => '6',
                'label' => '6',
            ),
        ),
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_image_layout:is()',
    );

    $enable_woo_slider = array(
        'id' => '_lerp_%section%_enable_slider',
        'label' => esc_html__('Thumbnails carousel', 'lerp'),
        'desc' => esc_html__('Activate to enable carousel slider when you click gallery thumbs.', 'lerp'),
        'std' => 'off',
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_image_layout:is()',
    );

    $body_section_title = array(
        'id' => '_lerp_%section%_body_title',
        'label' => '<i class="fa fa-layout"></i> ' . esc_html__('Content', 'lerp'),
        'desc' => '',
        'type' => 'textblock-titled',
        'class' => 'section-title',
        'section' => 'lerp_%section%_section',
    );

    $body_lerp_block = array(
        'id' => '_lerp_%section%_content_block',
        'label' => esc_html__('Content Block', 'lerp'),
        'desc' => esc_html__('Define the Content Block to use. NB. Select "Inherit" to use the default template.',
            'lerp'),
        'type' => 'select',
        'choices' => $lerpblocks,
        'section' => 'lerp_%section%_section',
    );

    $body_lerp_block_before = array(
        'id' => '_lerp_%section%_content_block_before',
        'label' => esc_html__('Content Block - Before Content', 'lerp'),
        'desc' => esc_html__('Define the Content Block to use.', 'lerp'),
        'type' => 'custom-post-type-select',
        'post_type' => 'lerpblock',
        'section' => 'lerp_%section%_section',
    );

    $body_lerp_block_after_pre = array(
        'id' => '_lerp_%section%_content_block_after_pre',
        'label' => esc_html__('After Content (ex: Author Profile)', 'lerp'),
        'desc' => esc_html__('Define the Content Block to use.', 'lerp'),
        'type' => 'custom-post-type-select',
        'post_type' => 'lerpblock',
        'section' => 'lerp_%section%_section',
    );

    $body_lerp_block_after = array(
        'id' => '_lerp_%section%_content_block_after',
        'label' => esc_html__('After Content (ex: Related Posts)', 'lerp'),
        'desc' => esc_html__('Define the Content Block to use.', 'lerp'),
        'type' => 'custom-post-type-select',
        'post_type' => 'lerpblock',
        'section' => 'lerp_%section%_section',
    );

    $body_layout_width = array(
        'id' => '_lerp_%section%_layout_width',
        'label' => esc_html__('Content width', 'lerp'),
        'desc' => esc_html__('Specify the content width.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'full',
                'label' => esc_html__('Full', 'lerp'),
            ),
            array(
                'value' => 'limit',
                'label' => esc_html__('Limit', 'lerp'),
            ),
        ),
        'section' => 'lerp_%section%_section',
    );

    $body_layout_width_custom = array(
        'id' => '_lerp_%section%_layout_width_custom',
        'label' => esc_html__('Custom width', 'lerp'),
        'desc' => esc_html__('Define the custom width for the content area in px or in %. This option takes effect with normal contents (not Page Builder).',
            'lerp'),
        'type' => 'measurement',
        'condition' => '_lerp_%section%_layout_width:is(limit)',
        'operator' => 'or',
        'section' => 'lerp_%section%_section',
    );

    $body_single_post_width = array(
        'id' => '_lerp_%section%_single_width',
        'label' => esc_html__('Single post width', 'lerp'),
        'desc' => esc_html__('Specify the single post width from 1 to 12.', 'lerp'),
        'type' => 'select',
        'std' => '4',
        'condition' => '_lerp_%section%_content_block:is(),_lerp_%section%_content_block:is(none)',
        'operator' => 'or',
        'choices' => array(
            array(
                'value' => '1',
                'label' => '1',
            ),
            array(
                'value' => '2',
                'label' => '2',
            ),
            array(
                'value' => '3',
                'label' => '3',
            ),
            array(
                'value' => '4',
                'label' => '4',
            ),
            array(
                'value' => '5',
                'label' => '5',
            ),
            array(
                'value' => '6',
                'label' => '6',
            ),
            array(
                'value' => '7',
                'label' => '7',
            ),
            array(
                'value' => '8',
                'label' => '8',
            ),
            array(
                'value' => '9',
                'label' => '9',
            ),
            array(
                'value' => '10',
                'label' => '10',
            ),
            array(
                'value' => '11',
                'label' => '11',
            ),
            array(
                'value' => '12',
                'label' => '12',
            ),
        ),
        'section' => 'lerp_%section%_section',
    );

    $body_single_text_lenght = array(
        'id' => '_lerp_%section%_single_text_length',
        'label' => esc_html__('Single teaser text length', 'lerp'),
        'desc' => esc_html__('Enter the number of words you want for the teaser. If nothing in entered the full content will be showed.',
            'lerp'),
        'type' => 'text',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_content_block:is(),_lerp_%section%_content_block:is(none)',
        'operator' => 'or',
    );

    $sidebar_section_title = array(
        'id' => '_lerp_%section%_sidebar_title',
        'label' => '<i class="fa fa-content-right"></i> ' . esc_html__('Sidebar', 'lerp'),
        'desc' => '',
        'type' => 'textblock-titled',
        'class' => 'section-title',
        'section' => 'lerp_%section%_section',
    );

    $sidebar_activate = array(
        'id' => '_lerp_%section%_activate_sidebar',
        'label' => esc_html__('Activate the sidebar', 'lerp'),
        'desc' => esc_html__('Activate to show the sidebar.', 'lerp'),
        'std' => 'off',
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
    );

    $sidebar_widget = array(
        'id' => '_lerp_%section%_sidebar',
        'label' => esc_html__('Sidebar', 'lerp'),
        'desc' => esc_html__('Specify the sidebar.', 'lerp'),
        'type' => 'sidebar-select',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_activate_sidebar:not(off)',
    );

    $sidebar_position = array(
        'id' => '_lerp_%section%_sidebar_position',
        'label' => esc_html__('Position', 'lerp'),
        'desc' => esc_html__('Specify the position of the sidebar.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => 'sidebar_right',
                'label' => esc_html__('Right', 'lerp'),
            ),
            array(
                'value' => 'sidebar_left',
                'label' => esc_html__('Left', 'lerp'),
            ),
        ),
        'condition' => '_lerp_%section%_activate_sidebar:not(off)',
        'section' => 'lerp_%section%_section',
    );

    $sidebar_size = array(
        'id' => '_lerp_%section%_sidebar_size',
        'label' => esc_html__('Size', 'lerp'),
        'desc' => esc_html__('Set the size of the sidebar.', 'lerp'),
        'std' => '4',
        'min_max_step' => '1,11,1',
        'type' => 'numeric-slider',
        'condition' => '_lerp_%section%_activate_sidebar:not(off)',
        'section' => 'lerp_%section%_section',
    );

    $sidebar_sticky = array(
        'id' => '_lerp_%section%_sidebar_sticky',
        'label' => esc_html__('Sticky sidebar', 'lerp'),
        'desc' => esc_html__('Activate to have a sticky sidebar.', 'lerp'),
        'std' => 'off',
        'type' => 'on-off',
        'condition' => '_lerp_%section%_activate_sidebar:not(off)',
        'section' => 'lerp_%section%_section',
    );

    $sidebar_style = array(
        'id' => '_lerp_%section%_sidebar_style',
        'label' => esc_html__('Skin', 'lerp'),
        'desc' => esc_html__('Override the sidebar text skin color.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', "lerp"),
            ),
            array(
                'value' => 'light',
                'label' => esc_html__('Light', "lerp"),
            ),
            array(
                'value' => 'dark',
                'label' => esc_html__('Dark', "lerp"),
            )
        ),
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_activate_sidebar:not(off)',
    );

    $sidebar_bgcolor = array(
        'id' => '_lerp_%section%_sidebar_bgcolor',
        'label' => esc_html__('Background color', 'lerp'),
        'desc' => esc_html__('Specify the sidebar background color.', 'lerp'),
        'type' => 'lerp_color',
        'section' => 'lerp_%section%_section',
        'condition' => '_lerp_%section%_activate_sidebar:not(off)',
    );

    $sidebar_fill = array(
        'id' => '_lerp_%section%_sidebar_fill',
        'label' => esc_html__('Sidebar filling space', 'lerp'),
        'desc' => esc_html__('Activate to remove padding around the sidebar and fill the height.', 'lerp'),
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
        'std' => 'off',
        'operator' => 'and',
        'condition' => '_lerp_%section%_sidebar_bgcolor:not(),_lerp_%section%_activate_sidebar:not(off)',
    );

    $navigation_section_title = array(
        'id' => '_lerp_%section%_navigation_title',
        'label' => '<i class="fa fa-location"></i> ' . esc_html__('Navigation', 'lerp'),
        'desc' => '',
        'type' => 'textblock-titled',
        'class' => 'section-title',
        'section' => 'lerp_%section%_section',
    );

    $navigation_activate = array(
        'id' => '_lerp_%section%_navigation_activate',
        'label' => esc_html__('Navigation bar', 'lerp'),
        'desc' => esc_html__('Activate to show the navigation bar.', 'lerp'),
        'std' => 'on',
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
    );

    $navigation_page_index = array(
        'id' => '_lerp_%section%_navigation_index',
        'label' => esc_html__('Navigation index', 'lerp'),
        'desc' => esc_html__('Specify the page you want to use as index.', 'lerp'),
        'type' => 'page-select',
        'section' => 'lerp_%section%_section',
        'operator' => 'and',
        'condition' => '_lerp_%section%_navigation_activate:not(off)',
    );

    $navigation_index_label = array(
        'id' => '_lerp_%section%_navigation_index_label',
        'label' => esc_html__('Index custom label', 'lerp'),
        'desc' => esc_html__('Enter a custom label for the index button.', 'lerp'),
        'type' => 'text',
        'section' => 'lerp_%section%_section',
        'operator' => 'and',
        'condition' => '_lerp_%section%_navigation_activate:not(off)',
    );

    $navigation_nextprev_title = array(
        'id' => '_lerp_%section%_navigation_nextprev_title',
        'label' => esc_html__('Navigation titles', 'lerp'),
        'desc' => esc_html__('Activate to show the next/prev post title.', 'lerp'),
        'std' => 'off',
        'type' => 'on-off',
        'section' => 'lerp_%section%_section',
        'operator' => 'and',
        'condition' => '_lerp_%section%_navigation_activate:not(off)',
    );

    $footer_section_title = array(
        'id' => '_lerp_%section%_footer_block_title',
        'label' => '<i class="fa fa-ellipsis"></i> ' . esc_html__('Footer', 'lerp'),
        'desc' => '',
        'type' => 'textblock-titled',
        'class' => 'section-title',
        'section' => 'lerp_%section%_section',
    );

    if ( is_plugin_active('lerp-core/lerp-core.php') ) {

        $footer_lerp_block = array(
            'id' => '_lerp_%section%_footer_block',
            'label' => esc_html__('Content Block', 'lerp'),
            'desc' => esc_html__('Override the Content Block.', 'lerp'),
            'type' => 'select',
            'choices' => $lerpblocks,
            'section' => 'lerp_%section%_section',
        );

    } else {
        $footer_lerp_block = null;
    }

    $footer_width = array(
        'id' => '_lerp_%section%_footer_width',
        'label' => esc_html__('Footer width', 'lerp'),
        'desc' => esc_html__('Override the footer width.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'full',
                'label' => esc_html__('Full', 'lerp'),
            ),
            array(
                'value' => 'limit',
                'label' => esc_html__('Limit', 'lerp'),
            ),
        ),
        'section' => 'lerp_%section%_section',
    );

    $custom_fields_section_title = array(
        'id' => '_lerp_%section%_cf_title',
        'label' => '<i class="fa fa-pencil3"></i> ' . esc_html__('Custom fields', 'lerp'),
        'desc' => '',
        'type' => 'textblock-titled',
        'class' => 'section-title',
        'section' => 'lerp_%section%_section',
    );

    $custom_fields_list = array(
        'id' => '_lerp_%section%_custom_fields',
        'label' => esc_html__('Custom fields', 'lerp'),
        'desc' => esc_html__('Create here all the custom fields that can be used inside the posts module.', 'lerp'),
        'type' => 'list-item',
        'section' => 'lerp_%section%_section',
        'settings' => array(
            array(
                'id' => '_lerp_cf_unique_id',
                'class' => 'unique_id',
                'std' => 'detail-',
                'type' => 'text',
                'label' => esc_html__('Unique custom field ID', 'lerp'),
                'desc' => esc_html__('This value is created automatically and it shouldn\'t be edited unless you know what you are doing.',
                    'lerp'),
            ),
        )
    );

    $portfolio_cpt_name = ot_get_option('_lerp_portfolio_cpt');
    if ( $portfolio_cpt_name == '' ) $portfolio_cpt_name = 'portfolio';

    $cpt_single_sections = array();
    $cpt_index_sections = array();
    $cpt_single_options = array();
    $cpt_index_options = array();

    if ( count($lerp_post_types) > 0 ) {
        foreach ( $lerp_post_types as $key => $value ) {
            if ( $value !== 'portfolio' && $value !== 'product' ) {
                $cpt_obj = get_post_type_object($value);

                if ( is_object($cpt_obj) ) {
                    $cpt_name = $cpt_obj->labels->name;
                    $cpt_sing_name = $cpt_obj->labels->singular_name;
                    $cpt_single_sections[] = array(
                        'id' => 'lerp_' . $value . '_section',
                        'title' => '<span class="smaller"><i class="fa fa-paper"></i> ' . ucfirst($cpt_sing_name) . '</span>',
                        'group' => esc_html__('Single', 'lerp')
                    );
                    $cpt_index_sections[] = array(
                        'id' => 'lerp_' . $value . '_index_section',
                        'title' => '<span class="smaller"><i class="fa fa-archive2"></i> ' . ucfirst($cpt_name) . '</span>',
                        'group' => esc_html__('Archives', 'lerp')
                    );
                } elseif ( $value == 'author' ) {
                    $cpt_index_sections[] = array(
                        'id' => 'lerp_' . $value . '_index_section',
                        'title' => '<span class="smaller"><i class="fa fa-archive2"></i> ' . esc_html__('Authors',
                                'lerp') . '</span>',
                        'group' => esc_html__('归档', 'lerp')
                    );
                }
            }
        }

        foreach ( $lerp_post_types as $key => $value ) {
            if ( $value !== 'portfolio' && $value !== 'product' && $value !== 'author' ) {
                $cpt_single_options[] = str_replace('%section%', $value, $menu_section_title);
                $cpt_single_options[] = str_replace('%section%', $value, $menu);
                $cpt_single_options[] = str_replace('%section%', $value, $menu_width);
                $cpt_single_options[] = str_replace('%section%', $value, $menu_opaque);
                $cpt_single_options[] = str_replace('%section%', $value, $header_section_title);
                $cpt_single_options[] = str_replace('%section%', $value, $header_type);
                $cpt_single_options[] = str_replace('%section%', $value, $header_lerp_block);
                $cpt_single_options[] = str_replace('%section%', $value, $header_revslider);
                $cpt_single_options[] = str_replace('%section%', $value, $header_layerslider);
                $cpt_single_options[] = str_replace('%section%', $value, $header_width);
                $cpt_single_options[] = str_replace('%section%', $value, $header_height);
                $cpt_single_options[] = str_replace('%section%', $value, $header_min_height);
                $cpt_single_options[] = str_replace('%section%', $value, $header_title);
                $cpt_single_options[] = str_replace('%section%', $value, $header_style);
                $cpt_single_options[] = str_replace('%section%', $value, $header_content_width);
                $cpt_single_options[] = str_replace('%section%', $value, $header_custom_width);
                $cpt_single_options[] = str_replace('%section%', $value, $header_align);
                $cpt_single_options[] = str_replace('%section%', $value, $header_position);
                $cpt_single_options[] = str_replace('%section%', $value, $header_title_font);
                $cpt_single_options[] = str_replace('%section%', $value, $header_title_size);
                $cpt_single_options[] = str_replace('%section%', $value, $header_title_height);
                $cpt_single_options[] = str_replace('%section%', $value, $header_title_spacing);
                $cpt_single_options[] = str_replace('%section%', $value, $header_title_weight);
                $cpt_single_options[] = str_replace('%section%', $value, $header_title_transform);
                $cpt_single_options[] = str_replace('%section%', $value, $header_title_italic);
                $cpt_single_options[] = str_replace('%section%', $value, $header_text_animation);
                $cpt_single_options[] = str_replace('%section%', $value, $header_animation_speed);
                $cpt_single_options[] = str_replace('%section%', $value, $header_animation_delay);
                $cpt_single_options[] = str_replace('%section%', $value, $header_featured);
                $cpt_single_options[] = str_replace('%section%', $value, $header_background);
                $cpt_single_options[] = str_replace('%section%', $value, $header_parallax);
                $cpt_single_options[] = str_replace('%section%', $value, $header_kburns);
                $cpt_single_options[] = str_replace('%section%', $value, $header_overlay_color);
                $cpt_single_options[] = str_replace('%section%', $value, $header_overlay_color_alpha);
                $cpt_single_options[] = str_replace('%section%', $value, $header_scroll_opacity);
                $cpt_single_options[] = str_replace('%section%', $value, $header_scrolldown);
                $cpt_single_options[] = str_replace('%section%', $value, $body_section_title);
                $cpt_single_options[] = str_replace('%section%', $value, $body_layout_width);
                $cpt_single_options[] = str_replace('%section%', $value, $body_layout_width_custom);
                $cpt_single_options[] = str_replace('%section%', $value, run_array_to($show_breadcrumb, 'std', 'on'));
                $cpt_single_options[] = str_replace('%section%', $value, $breadcrumb_align);
                $cpt_single_options[] = str_replace('%section%', $value, run_array_to($show_title, 'std', 'on'));
                $cpt_single_options[] = str_replace('%section%', $value, $show_media);
                $cpt_single_options[] = str_replace('%section%', $value, $show_featured_media);
                $cpt_single_options[] = str_replace('%section%', $value, $show_comments);
                $cpt_single_options[] = str_replace('%section%', $value, $show_share);
                $cpt_single_options[] = str_replace('%section%', $value, $image_layout);
                $cpt_single_options[] = str_replace('%section%', $value, $media_size);
                $cpt_single_options[] = str_replace('%section%', $value, $enable_sticky_desc);
                $cpt_single_options[] = str_replace('%section%', $value, $enable_woo_zoom);
                $cpt_single_options[] = str_replace('%section%', $value, $thumb_cols);
                $cpt_single_options[] = str_replace('%section%', $value, $enable_woo_slider);
                $cpt_single_options[] = str_replace('%section%', $value, $body_lerp_block_after_pre);
                $cpt_single_options[] = str_replace('%section%', $value, $body_lerp_block_after);
                $cpt_single_options[] = str_replace('%section%', $value, $sidebar_section_title);
                $cpt_single_options[] = str_replace('%section%', $value, $sidebar_activate);
                $cpt_single_options[] = str_replace('%section%', $value, $sidebar_widget);
                $cpt_single_options[] = str_replace('%section%', $value, $sidebar_position);
                $cpt_single_options[] = str_replace('%section%', $value, $sidebar_size);
                $cpt_single_options[] = str_replace('%section%', $value, $sidebar_sticky);
                $cpt_single_options[] = str_replace('%section%', $value, $sidebar_style);
                $cpt_single_options[] = str_replace('%section%', $value, $sidebar_bgcolor);
                $cpt_single_options[] = str_replace('%section%', $value, $sidebar_fill);
                $cpt_single_options[] = str_replace('%section%', $value, $navigation_section_title);
                $cpt_single_options[] = str_replace('%section%', $value, $navigation_activate);
                $cpt_single_options[] = str_replace('%section%', $value, $navigation_page_index);
                $cpt_single_options[] = str_replace('%section%', $value, $navigation_index_label);
                $cpt_single_options[] = str_replace('%section%', $value, $navigation_nextprev_title);
                $cpt_single_options[] = str_replace('%section%', $value, $footer_section_title);
                $cpt_single_options[] = str_replace('%section%', $value, $footer_lerp_block);
                $cpt_single_options[] = str_replace('%section%', $value, $footer_width);
                $cpt_single_options[] = str_replace('%section%', $value, $custom_fields_section_title);
                $cpt_single_options[] = str_replace('%section%', $value, $custom_fields_list);
            }
        }
        foreach ( $lerp_post_types as $key => $value ) {
            if ( $value !== 'portfolio' && $value !== 'product' ) {
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $menu_section_title);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $menu);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $menu_width);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $menu_opaque);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_section_title);
                $cpt_index_options[] = str_replace('%section%',
                    $value . '_index',
                    run_array_to($header_type, 'std', 'header_basic'));
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_lerp_block);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_revslider);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_layerslider);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_width);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_height);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_min_height);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_title);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_style);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_content_width);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_custom_width);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_align);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_position);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_title_font);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_title_size);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_title_height);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_title_spacing);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_title_weight);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_title_transform);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_title_italic);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_text_animation);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_animation_speed);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_animation_delay);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_featured);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_background);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_parallax);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_kburns);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_overlay_color);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_overlay_color_alpha);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_scroll_opacity);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $header_scrolldown);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $menu_no_padding);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $menu_no_padding_mobile);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $body_section_title);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $show_breadcrumb);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $breadcrumb_align);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $body_lerp_block);
                $cpt_index_options[] = str_replace('%section%',
                    $value . '_index',
                    run_array_to($body_layout_width,
                        'condition',
                        '_lerp_%section%_content_block:is(),_lerp_%section%_content_block:is(none)'));
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $body_single_post_width);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $body_single_text_lenght);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $show_title);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $sidebar_section_title);
                $cpt_index_options[] = str_replace('%section%',
                    $value . '_index',
                    run_array_to($sidebar_activate, 'std', 'on'));
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $sidebar_widget);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $sidebar_position);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $sidebar_size);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $sidebar_sticky);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $sidebar_style);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $sidebar_bgcolor);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $sidebar_fill);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $footer_section_title);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $footer_lerp_block);
                $cpt_index_options[] = str_replace('%section%', $value . '_index', $footer_width);
            }
        }
    }

    $custom_settings_section_one = array(
        array(
            'id' => 'lerp_header_section',
            'title' => '<i class="fa fa-heart3"></i> ' . esc_html__('导航栏', 'lerp'),
            'group' => esc_html__('基本设置', 'lerp'),
            'group_icon' => 'fa-layout'
        ),
        array(
            'id' => 'lerp_main_section',
            'title' => '<i class="fa fa-layers"></i> ' . esc_html__('布局', 'lerp'),
            'group' => esc_html__('基本设置', 'lerp'),
        ),
        array(
            'id' => 'lerp_footer_section',
            'title' => '<i class="fa fa-ellipsis"></i> ' . esc_html__('页脚', 'lerp'),
            'group' => esc_html__('基本设置', 'lerp')
        ),
        array(
            'id' => 'lerp_post_section',
            'title' => '<span class="smaller"><i class="fa fa-paper"></i> ' . esc_html__('文章', 'lerp') . '</span>',
            'group' => esc_html__('页面', 'lerp'),
            'group_icon' => 'fa-file2'
        ),
        array(
            'id' => 'lerp_page_section',
            'title' => '<span class="smaller"><i class="fa fa-paper"></i> ' . esc_html__('页面', 'lerp') . '</span>',
            'group' => esc_html__('页面', 'lerp')
        ),
        array(
            'id' => 'lerp_portfolio_section',
            'title' => '<span class="smaller"><i class="fa fa-paper"></i> ' . ucfirst($portfolio_cpt_name) . '</span>',
            'group' => esc_html__('页面', 'lerp')
        ),
    );

    $custom_settings_section_one = array_merge($custom_settings_section_one, $cpt_single_sections);

    $custom_settings_section_two = array(
        array(
            'id' => 'lerp_post_index_section',
            'title' => '<span class="smaller"><i class="fa fa-archive2"></i> ' . esc_html__('文章',
                    'lerp') . '</span>',
            'group' => esc_html__('归档', 'lerp'),
            'group_icon' => 'fa-archive2'
        ),
        array(
            'id' => 'lerp_page_index_section',
            'title' => '<span class="smaller"><i class="fa fa-archive2"></i> ' . esc_html__('页面',
                    'lerp') . '</span>',
            'group' => esc_html__('归档', 'lerp')
        ),
        array(
            'id' => 'lerp_portfolio_index_section',
            'title' => '<span class="smaller"><i class="fa fa-archive2"></i> ' . ucfirst($portfolio_cpt_name) . 's</span>',
            'group' => esc_html__('归档', 'lerp')
        ),
    );

    $custom_settings_section_one = array_merge($custom_settings_section_one, $custom_settings_section_two);
    $custom_settings_section_one = array_merge($custom_settings_section_one, $cpt_index_sections);

    $custom_settings_section_three = array(
        array(
            'id' => 'lerp_search_index_section',
            'title' => '<span class="smaller"><i class="fa fa-archive2"></i> ' . esc_html__('搜索',
                    'lerp') . '</span>',
            'group' => esc_html__('归档', 'lerp')
        ),
        array(
            'id' => 'lerp_404_section',
            'title' => '<span class="smaller"><i class="fa fa-help"></i> ' . esc_html__('404', 'lerp') . '</span>',
            'group' => esc_html__('页面', 'lerp')
        ),
        array(
            'id' => 'lerp_colors_section',
            'title' => '<i class="fa fa-drop"></i> ' . esc_html__('调色板', 'lerp'),
            'group' => esc_html__('视觉', 'lerp'),
            'group_icon' => 'fa-eye2'
        ),
        array(
            'id' => 'lerp_typography_section',
            'title' => '<i class="fa fa-font"></i> ' . esc_html__('排版', 'lerp'),
            'group' => esc_html__('视觉', 'lerp')
        ),
        array(
            'id' => 'lerp_customize_section',
            'title' => '<i class="fa fa-box"></i> ' . esc_html__('定制', 'lerp'),
            'group' => esc_html__('视觉', 'lerp')
        ),
        array(
            'id' => 'lerp_extra_section',
            'title' => esc_html__('Extra', 'lerp'),
            'group' => esc_html__('视觉', 'lerp')
        ),
        array(
            'id' => 'lerp_sidebars_section',
            'title' => '<i class="fa fa-content-right"></i> ' . esc_html__('侧边栏', 'lerp'),
            'group' => esc_html__('通用', 'lerp'),
            'group_icon' => 'fa-cog2'
        ),
        array(
            'id' => 'lerp_connections_section',
            'title' => '<i class="fa fa-share2"></i> ' . esc_html__('社交', 'lerp'),
            'group' => esc_html__('通用', 'lerp')
        ),
        array(
            'id' => 'lerp_gmaps_section',
            'title' => '<i class="fa fa-map-o"></i> ' . esc_html__('谷歌地图', 'lerp'),
            'group' => esc_html__('通用', 'lerp')
        ),
        array(
            'id' => 'lerp_redirect_section',
            'title' => '<i class="fa fa-reply2"></i> ' . esc_html__('重定向', 'lerp'),
            'group' => esc_html__('通用', 'lerp')
        ),
        array(
            'id' => 'lerp_cssjs_section',
            'title' => '<i class="fa fa-code"></i> ' . esc_html__('CSS & JS', 'lerp'),
            'group' => esc_html__('通用', 'lerp')
        ),
        array(
            'id' => 'lerp_performance_section',
            'title' => '<i class="fa fa-loader"></i> ' . esc_html__('性能', 'lerp'),
            'group' => esc_html__('通用', 'lerp')
        ),
    );

    $custom_settings_section_one = array_merge($custom_settings_section_one, $custom_settings_section_three);

    $custom_settings_one = array(
        array(
            'id' => '_lerp_general_block_title',
            'label' => '<i class="fa fa-globe3"></i> ' . esc_html__('基本', 'lerp'),
            'desc' => '',
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_main_section',
        ),
        array(
            'id' => '_lerp_main_width',
            'label' => esc_html__('网站宽度', 'lerp'),
            'desc' => esc_html__('输入网站的宽度。', 'lerp'),
            'std' => array(
                '1200',
                'px'
            ),
            'type' => 'measurement',
            'section' => 'lerp_main_section',
        ),
        array(
            'id' => '_lerp_main_align',
            'label' => esc_html__('Site layout align', 'lerp'),
            'desc' => esc_html__('Specify the alignment of the content area when is less then 100% width.', 'lerp'),
            'std' => 'center',
            'type' => 'select',
            'section' => 'lerp_main_section',
            'choices' => array(
                array(
                    'value' => 'left',
                    'label' => esc_html__('Left align', 'lerp'),
                    'src' => ''
                ),
                array(
                    'value' => 'center',
                    'label' => esc_html__('Center align', 'lerp'),
                    'src' => ''
                ),
                array(
                    'value' => 'right',
                    'label' => esc_html__('Right align', 'lerp'),
                    'src' => ''
                )
            )
        ),
        array(
            'id' => '_lerp_boxed',
            'label' => esc_html__('盒布局', 'lerp'),
            'desc' => esc_html__('激活盒布局。', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_main_section',
        ),
        array(
            'id' => '_lerp_body_border',
            'label' => esc_html__('Body frame', 'lerp'),
            'desc' => esc_html__('Specify the thickness of the frame around the body', 'lerp'),
            'std' => '0',
            'type' => 'numeric-slider',
            'min_max_step' => '0,36,9',
            'section' => 'lerp_main_section',
            'condition' => '_lerp_boxed:is(off)',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_body_border_color',
            'label' => esc_html__('Body frame color', 'lerp'),
            'desc' => esc_html__('Specify the body frame color.', 'lerp'),
            'type' => 'lerp_color',
            'section' => 'lerp_main_section',
            'condition' => '_lerp_boxed:is(off),_lerp_body_border:not(0)',
            'operator' => 'and'
        ),
        str_replace('%section%', 'main', run_array_to($header_section_title, 'condition', '_lerp_boxed:is(off)')),
        array(
            'id' => '_lerp_header_full',
            'label' => esc_html__('Container full width', 'lerp'),
            'desc' => esc_html__('Activate to expand the header container to full width.', 'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_main_section',
            'condition' => '_lerp_boxed:is(off)',
            'operator' => 'and'
        ),
        str_replace('%section%', 'main', run_array_to($body_section_title, 'condition', '_lerp_boxed:is(off)')),
        array(
            'id' => '_lerp_body_full',
            'label' => esc_html__('Content area full width', 'lerp'),
            'desc' => esc_html__('Activate to expand the content area to full width.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_main_section',
            'condition' => '_lerp_boxed:is(off)',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_custom_logo_block_title',
            'label' => '<i class="fa fa-heart3"></i> ' . esc_html__('Logo', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_logo_switch',
            'label' => esc_html__('Switchable logo', 'lerp'),
            'desc' => esc_html__('Activate to upload different logo for each skin.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_logo',
            'label' => esc_html__('Logo', 'lerp'),
            'desc' => esc_html__('Upload a logo. You can use Images, SVG code or HTML code.', 'lerp'),
            'type' => 'upload',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_logo_switch:is(off)',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_logo_light',
            'label' => esc_html__('Logo - Light', 'lerp'),
            'desc' => esc_html__('Upload a logo for the light skin.', 'lerp'),
            'type' => 'upload',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_logo_switch:is(on)',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_logo_dark',
            'label' => esc_html__('Logo - Dark', 'lerp'),
            'desc' => esc_html__('Upload a logo for the dark skin.', 'lerp'),
            'type' => 'upload',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_logo_switch:is(on)',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_logo_height',
            'label' => esc_html__('Logo height', 'lerp'),
            'desc' => esc_html__('Enter the height of the logo in px.', 'lerp'),
            'std' => '20',
            'type' => 'text',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_logo_height_mobile',
            'label' => esc_html__('Logo height mobile', 'lerp'),
            'desc' => esc_html__('Enter the height of the logo in px for mobile version.', 'lerp'),
            'type' => 'text',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_headers_block_title',
            'label' => '<i class="fa fa-menu"></i> ' . esc_html__('菜单', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_headers',
            'desc' => esc_html__('Specify the menu layout.', 'lerp'),
            'label' => '',
            'std' => 'hmenu-right',
            'type' => 'radio-image',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_vmenu_position',
            'label' => esc_html__('Menu horizontal position', 'lerp'),
            'desc' => esc_html__('Specify the horizontal position of the menu.', 'lerp'),
            'std' => 'left',
            'type' => 'select',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_headers:contains(vmenu),_lerp_headers:is(menu-overlay),_lerp_headers:is(menu-overlay-center)',
            'operator' => 'or',
            'choices' => array(
                array(
                    'value' => 'left',
                    'label' => esc_html__('Left', 'lerp'),
                    'src' => ''
                ),
                array(
                    'value' => 'right',
                    'label' => esc_html__('Right', 'lerp'),
                    'src' => ''
                )
            )
        ),
        array(
            'id' => '_lerp_vmenu_v_position',
            'label' => esc_html__('Menu vertical alignment', 'lerp'),
            'desc' => esc_html__('Specify the vertical alignment of the menu.', 'lerp'),
            'std' => 'middle',
            'type' => 'select',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_headers:contains(vmenu),_lerp_headers:is(menu-overlay),_lerp_headers:is(menu-overlay-center)',
            'operator' => 'or',
            'choices' => array(
                array(
                    'value' => 'top',
                    'label' => esc_html__('Top', 'lerp'),
                    'src' => ''
                ),
                array(
                    'value' => 'middle',
                    'label' => esc_html__('Middle', 'lerp'),
                    'src' => ''
                ),
                array(
                    'value' => 'bottom',
                    'label' => esc_html__('Bottom', 'lerp'),
                    'src' => ''
                ),
            )
        ),
        array(
            'id' => '_lerp_vmenu_align',
            'label' => esc_html__('Menu horizontal alignment', 'lerp'),
            'desc' => esc_html__('Specify the horizontal alignment of the menu.', 'lerp'),
            'std' => 'left',
            'type' => 'select',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_headers:contains(vmenu),_lerp_headers:is(menu-overlay),_lerp_headers:is(menu-overlay-center)',
            'operator' => 'or',
            'choices' => array(
                array(
                    'value' => 'left',
                    'label' => esc_html__('Left Align', 'lerp'),
                    'src' => ''
                ),
                array(
                    'value' => 'center',
                    'label' => esc_html__('Center Align', 'lerp'),
                    'src' => ''
                ),
                array(
                    'value' => 'right',
                    'label' => esc_html__('Right Align', 'lerp'),
                    'src' => ''
                )
            )
        ),
        array(
            'id' => '_lerp_vmenu_width',
            'label' => esc_html__('Vertical menu width', 'lerp'),
            'desc' => esc_html__('Vertical menu width in px', 'lerp'),
            'std' => '252',
            'type' => 'numeric-slider',
            'section' => 'lerp_header_section',
            'rows' => '',
            'post_type' => '',
            'taxonomy' => '',
            'min_max_step' => '108,504,12',
            'class' => '',
            'condition' => '_lerp_headers:contains(vmenu)',
            'operator' => 'or'
        ),
        array(
            'id' => '_lerp_menu_accordion_active',
            'label' => esc_html__('Vertical menu open', 'lerp'),
            'desc' => esc_html__('Open the accordion menu at the current item menu on page loading.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_headers:is(vmenu)',
            'operator' => 'or'
        ),
        array(
            'id' => '_lerp_menu_full',
            'label' => esc_html__('Menu full width', 'lerp'),
            'desc' => esc_html__('Activate to expand the menu to full width. (Only for the horizontal menus).', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_boxed:is(off)',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_menu_visuals_block_title',
            'label' => '<i class="fa fa-eye2"></i> ' . esc_html__('Visuals', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_menu_shadows',
            'label' => esc_html__('Menu divider shadow', 'lerp'),
            'desc' => esc_html__('Activate to show the menu devider shadow.', 'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_submenu_shadows',
            'label' => esc_html__('Menu dropdown shadow', 'lerp'),
            'desc' => esc_html__('Activate this for the shadow effect on menu dropdown on desktop view. NB. this option works for horizontal menus only.',
                'lerp'),
            'std' => 'none',
            'type' => 'select',
            'section' => 'lerp_header_section',
            'std' => '',
            'choices' => array(
                array(
                    'value' => '',
                    'label' => esc_html__('None', 'lerp'),
                ),
                array(
                    'value' => 'xs',
                    'label' => esc_html__('Extra Small', 'lerp'),
                ),
                array(
                    'value' => 'sm',
                    'label' => esc_html__('Small', 'lerp'),
                ),
                array(
                    'value' => 'std',
                    'label' => esc_html__('Standard', 'lerp'),
                ),
                array(
                    'value' => 'lg',
                    'label' => esc_html__('Large', 'lerp'),
                ),
                array(
                    'value' => 'xl',
                    'label' => esc_html__('Extra Large', 'lerp'),
                ),
            ),
            'condition' => '_lerp_headers:contains(hmenu),_lerp_headers:is(vmenu-offcanvas),_lerp_headers:is(menu-overlay)',
            'operator' => 'or'
        ),
        array(
            'id' => '_lerp_submenu_darker_shadows',
            'label' => esc_html__('Menu dropdown darker shadow', 'lerp'),
            'desc' => esc_html__('Activate this for the dark shadow effect on menu dropdown on desktop view.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_submenu_shadows:not()',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_menu_borders',
            'label' => esc_html__('Menu borders', 'lerp'),
            'desc' => esc_html__('Activate to show the menu borders.', 'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_menu_no_arrows',
            'label' => esc_html__('Hide dropdown arrows', 'lerp'),
            'desc' => esc_html__('Activate to hide the dropdow arrows.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_menu_mobile_transparency',
            'label' => esc_html__('Menu mobile transparency', 'lerp'),
            'desc' => esc_html__('Activate the menu transparency when possible.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_menu_custom_padding',
            'label' => esc_html__('Custom vertical padding', 'lerp'),
            'desc' => esc_html__('Activate custom padding above and below the logo.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_menu_custom_padding_desktop',
            'label' => esc_html__('Padding on desktop', 'lerp'),
            'desc' => esc_html__('Set custom padding on desktop devices.', 'lerp'),
            'std' => '27',
            'type' => 'numeric-slider',
            'min_max_step' => '0,36,9',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_menu_custom_padding:is(on)',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_menu_custom_padding_mobile',
            'label' => esc_html__('Padding on mobile', 'lerp'),
            'desc' => esc_html__('Set custom padding on mobile devices.', 'lerp'),
            'std' => '27',
            'type' => 'numeric-slider',
            'min_max_step' => '0,36,9',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_menu_custom_padding:is(on)',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_menu_animation_block_title',
            'label' => '<i class="fa fa-fast-forward2"></i> ' . esc_html__('Animation', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_header_section',
            // 'condition' => '_lerp_headers:contains(hmenu),_lerp_headers:is(vmenu-offcanvas),_lerp_headers:is(menu-overlay)',
            // 'operator' => 'or'
        ),
        array(
            'id' => '_lerp_menu_sticky',
            'label' => esc_html__('Menu sticky', 'lerp'),
            'desc' => esc_html__('Activate the sticky menu. This is a menu that is locked into place so that it does not disappear when the user scrolls down the page.',
                'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_headers:contains(hmenu),_lerp_headers:is(vmenu-offcanvas),_lerp_headers:is(menu-overlay),_lerp_headers:is(menu-overlay-center)',
            'operator' => 'or'
        ),
        array(
            'id' => '_lerp_menu_sticky_mobile',
            'label' => esc_html__('Menu sticky mobile', 'lerp'),
            'desc' => esc_html__('Activate the sticky menu on mobile devices. This is a menu that is locked into place so that it does not disappear when the user scrolls down the page.',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_menu_mobile_centered',
            'label' => esc_html__('Menu centered mobile', 'lerp'),
            'desc' => esc_html__('Activate the centered style for mobile menu. NB. You need to have the Menu Sticky Mobile active.',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_menu_sticky_mobile:is(on)',
            'operator' => 'and',
        ),
        array(
            'id' => '_lerp_menu_hide',
            'label' => esc_html__('Menu hide', 'lerp'),
            'desc' => esc_html__('Activate the autohide menu. This is a menu that is hiding after the user have scrolled down the page.',
                'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_headers:contains(hmenu),_lerp_headers:is(menu-overlay),_lerp_headers:is(menu-overlay-center),_lerp_headers:is(vmenu-offcanvas)',
            'operator' => 'or'
        ),
        array(
            'id' => '_lerp_menu_hide_mobile',
            'label' => esc_html__('Menu hide mobile', 'lerp'),
            'desc' => esc_html__('Activate the autohide menu on mobile devices. This is a menu that is hiding after the user have scrolled down the page.',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_menu_shrink',
            'label' => esc_html__('Menu shrink', 'lerp'),
            'desc' => esc_html__('Activate the shrink menu. This is a menu where the logo shrinks after the user have scrolled down the page.',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_headers:contains(hmenu),_lerp_headers:is(menu-overlay),_lerp_headers:is(menu-overlay-center),_lerp_headers:is(vmenu-offcanvas)',
            'operator' => 'or'
        ),
        array(
            'id' => '_lerp_menu_li_animation',
            'label' => esc_html__('Menu sub-levels animated', 'lerp'),
            'desc' => esc_html__('Activate the animation for menu sub-levels. NB. this option works for horizontal menus only.',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_headers:is(hmenu-right),_lerp_headers:is(hmenu-left),_lerp_headers:is(hmenu-justify),_lerp_headers:is(hmenu-center),_lerp_headers:is(hmenu-center-split)',
            'operator' => 'or'
        ),
        array(
            'id' => '_lerp_menu_mobile_animation',
            'label' => esc_html__('Menu open items animation', 'lerp'),
            'desc' => esc_html__('Specify the menu items animation when opening.', 'lerp'),
            'std' => 'none',
            'type' => 'select',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_menu_sticky_mobile:is(on),_lerp_menu_hide_mobile:is(on)',
            'operator' => 'or',
            'choices' => array(
                array(
                    'value' => 'none',
                    'label' => esc_html__('None', 'lerp'),
                ),
                array(
                    'value' => 'scale',
                    'label' => esc_html__('Scale', 'lerp'),
                ),
            )
        ),
        array(
            'id' => '_lerp_menu_overlay_animation',
            'label' => esc_html__('Menu overlay animation', 'lerp'),
            'desc' => esc_html__('Specify the overlay menu animation when opening and closing.', 'lerp'),
            'std' => 'sequential',
            'type' => 'select',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_headers:is(menu-overlay),_lerp_headers:is(menu-overlay-center)',
            'operator' => 'or',
            'choices' => array(
                array(
                    'value' => '3d',
                    'label' => esc_html__('3D', 'lerp'),
                ),
                array(
                    'value' => 'sequential',
                    'label' => esc_html__('Flat', 'lerp'),
                ),
            )
        ),
        array(
            'id' => '_lerp_min_logo',
            'label' => esc_html__('Minimum logo height', 'lerp'),
            'desc' => esc_html__('Enter the minimal height of the shrinked logo in <b>px</b>.', 'lerp'),
            'type' => 'text',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_menu_shrink:is(on),_lerp_headers:not(vmenu)',
            'operator' => 'and',
        ),
        array(
            'id' => '_lerp_menu_add_block_title',
            'label' => '<i class="fa fa-square-plus"></i> ' . esc_html__('Additionals', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_menu_no_secondary',
            'label' => esc_html__('Hide secondary menu', 'lerp'),
            'desc' => esc_html__('Activate to hide the secondary menu.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_secondary_padding',
            'label' => esc_html__('Secondary menu padding', 'lerp'),
            'desc' => esc_html__('Activate to increase secondary menu padding.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_menu_no_secondary:is(off)',
            'operator' => 'or'
        ),
        array(
            'id' => '_lerp_menu_socials',
            'label' => esc_html__('Social icons', 'lerp'),
            'desc' => esc_html__('Activate to show the social connection icons in the menu bar.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_menu_search',
            'label' => esc_html__('Search icon', 'lerp'),
            'desc' => esc_html__('Activate to show the search icon in the menu bar.', 'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_menu_search_animation',
            'label' => esc_html__('Search overlay animation', 'lerp'),
            'desc' => esc_html__('Specify the search overlay animation when opening and closing.', 'lerp'),
            'std' => 'sequential',
            'type' => 'select',
            'section' => 'lerp_header_section',
            'choices' => array(
                array(
                    'value' => '3d',
                    'label' => esc_html__('3D', 'lerp'),
                ),
                array(
                    'value' => 'sequential',
                    'label' => esc_html__('Flat', 'lerp'),
                ),
            ),
            'condition' => '_lerp_menu_search:is(on)',
            'operator' => 'or'
        ),
        array(
            'id' => '_lerp_woocommerce_cart',
            'label' => esc_html__('Woocommerce cart', 'lerp'),
            'desc' => esc_html__('Activate to show the Woocommerce icon in the menu bar.', 'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
        ),
        array(
            'id' => '_lerp_woocommerce_cart_desktop',
            'label' => esc_html__('Woocommerce cart on menu bar', 'lerp'),
            'desc' => esc_html__('Show the cart icon in the menu bar when layout is on desktop mode (Only for overlay and offcanvas menu).',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_woocommerce_cart:is(on)',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_woocommerce_cart_mobile',
            'label' => esc_html__('Woocommerce cart on menu bar for mobile', 'lerp'),
            'desc' => esc_html__('Show the cart icon in the menu bar when layout is on mobile mode.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_woocommerce_cart:is(on)',
            'operator' => 'or'
        ),
        array(
            'id' => '_lerp_menu_bloginfo',
            'label' => esc_html__('Top line text', 'lerp'),
            'desc' => esc_html__('Insert additional text on top of the menu.', 'lerp'),
            'type' => 'textarea',
            'section' => 'lerp_header_section',
            'condition' => '_lerp_headers:is(hmenu-right),_lerp_headers:is(hmenu-left),_lerp_headers:is(hmenu-justify),_lerp_headers:is(hmenu-center),_lerp_headers:is(hmenu-center-split)',
            'operator' => 'or'
        ),
        //////////////////////
        //  Post Single		///
        //////////////////////
        str_replace('%section%', 'post', $menu_section_title),
        str_replace('%section%', 'post', $menu),
        str_replace('%section%', 'post', $menu_width),
        str_replace('%section%', 'post', $menu_opaque),
        str_replace('%section%', 'post', $header_section_title),
        str_replace('%section%', 'post', run_array_to($header_type, 'std', 'header_basic')),
        str_replace('%section%', 'post', $header_lerp_block),
        str_replace('%section%', 'post', $header_revslider),
        str_replace('%section%', 'post', $header_layerslider),

        str_replace('%section%', 'post', $header_width),
        str_replace('%section%', 'post', $header_height),
        str_replace('%section%', 'post', $header_min_height),
        str_replace('%section%', 'post', $header_title),
        str_replace('%section%', 'post', $header_style),
        str_replace('%section%', 'post', $header_content_width),
        str_replace('%section%', 'post', $header_custom_width),
        str_replace('%section%', 'post', $header_align),
        str_replace('%section%', 'post', $header_position),
        str_replace('%section%', 'post', $header_title_font),
        str_replace('%section%', 'post', $header_title_size),
        str_replace('%section%', 'post', $header_title_height),
        str_replace('%section%', 'post', $header_title_spacing),
        str_replace('%section%', 'post', $header_title_weight),
        str_replace('%section%', 'post', $header_title_transform),
        str_replace('%section%', 'post', $header_title_italic),
        str_replace('%section%', 'post', $header_text_animation),
        str_replace('%section%', 'post', $header_animation_speed),
        str_replace('%section%', 'post', $header_animation_delay),
        str_replace('%section%', 'post', $header_featured),
        str_replace('%section%', 'post', $header_background),
        str_replace('%section%', 'post', $header_parallax),
        str_replace('%section%', 'post', $header_kburns),
        str_replace('%section%', 'post', $header_overlay_color),
        str_replace('%section%', 'post', $header_overlay_color_alpha),
        str_replace('%section%', 'post', $header_scroll_opacity),
        str_replace('%section%', 'post', $header_scrolldown),

        str_replace('%section%', 'post', $body_section_title),
        str_replace('%section%', 'post', $body_layout_width),
        str_replace('%section%', 'post', $body_layout_width_custom),
        str_replace('%section%', 'post', $show_breadcrumb),
        str_replace('%section%', 'post', $breadcrumb_align),
        // str_replace('%section%', 'post', $body_lerp_block_before),
        str_replace('%section%', 'post', $show_title),
        str_replace('%section%', 'post', $show_media),
        str_replace('%section%', 'post', $show_featured_media),
        str_replace('%section%', 'post', $show_comments),
        str_replace('%section%', 'post', $show_share),
        str_replace('%section%', 'post', $show_tags),
        str_replace('%section%', 'post', $show_tags_align),
        str_replace('%section%', 'post', $body_lerp_block_after_pre),
        str_replace('%section%', 'post', $body_lerp_block_after),
        str_replace('%section%', 'post', $sidebar_section_title),
        str_replace('%section%', 'post', run_array_to($sidebar_activate, 'std', 'on')),
        str_replace('%section%', 'post', $sidebar_widget),
        str_replace('%section%', 'post', $sidebar_position),
        str_replace('%section%', 'post', $sidebar_size),
        str_replace('%section%', 'post', $sidebar_sticky),
        str_replace('%section%', 'post', $sidebar_style),
        str_replace('%section%', 'post', $sidebar_bgcolor),
        str_replace('%section%', 'post', $sidebar_fill),

        str_replace('%section%', 'post', $navigation_section_title),
        str_replace('%section%', 'post', $navigation_activate),
        str_replace('%section%', 'post', $navigation_page_index),
        str_replace('%section%', 'post', $navigation_index_label),
        str_replace('%section%', 'post', $navigation_nextprev_title),
        str_replace('%section%', 'post', $footer_section_title),
        str_replace('%section%', 'post', $footer_lerp_block),
        str_replace('%section%', 'post', $footer_width),
        str_replace('%section%', 'post', $custom_fields_section_title),
        str_replace('%section%', 'post', $custom_fields_list),
        ///////////////
        //  Page		///
        ///////////////
        str_replace('%section%', 'page', $menu_section_title),
        str_replace('%section%', 'page', $menu),
        str_replace('%section%', 'page', $menu_width),
        str_replace('%section%', 'page', $menu_opaque),
        str_replace('%section%', 'page', $header_section_title),
        str_replace('%section%', 'page', $header_type),
        str_replace('%section%', 'page', $header_lerp_block),
        str_replace('%section%', 'page', $header_revslider),
        str_replace('%section%', 'page', $header_layerslider),

        str_replace('%section%', 'page', $header_width),
        str_replace('%section%', 'page', $header_height),
        str_replace('%section%', 'page', $header_min_height),
        str_replace('%section%', 'page', $header_title),
        str_replace('%section%', 'page', $header_style),
        str_replace('%section%', 'page', $header_content_width),
        str_replace('%section%', 'page', $header_custom_width),
        str_replace('%section%', 'page', $header_align),
        str_replace('%section%', 'page', $header_position),
        str_replace('%section%', 'page', $header_title_font),
        str_replace('%section%', 'page', $header_title_size),
        str_replace('%section%', 'page', $header_title_height),
        str_replace('%section%', 'page', $header_title_spacing),
        str_replace('%section%', 'page', $header_title_weight),
        str_replace('%section%', 'page', $header_title_transform),
        str_replace('%section%', 'page', $header_title_italic),
        str_replace('%section%', 'page', $header_text_animation),
        str_replace('%section%', 'page', $header_animation_speed),
        str_replace('%section%', 'page', $header_animation_delay),
        str_replace('%section%', 'page', $header_featured),
        str_replace('%section%', 'page', $header_background),
        str_replace('%section%', 'page', $header_parallax),
        str_replace('%section%', 'page', $header_kburns),
        str_replace('%section%', 'page', $header_overlay_color),
        str_replace('%section%', 'page', $header_overlay_color_alpha),
        str_replace('%section%', 'page', $header_scroll_opacity),
        str_replace('%section%', 'page', $header_scrolldown),
        str_replace('%section%', 'page', $body_section_title),
        str_replace('%section%', 'page', $body_layout_width),
        str_replace('%section%', 'page', $body_layout_width_custom),
        str_replace('%section%', 'page', run_array_to($show_breadcrumb, 'std', 'on')),
        str_replace('%section%', 'page', $breadcrumb_align),
        str_replace('%section%', 'page', run_array_to($show_title, 'std', 'on')),
        str_replace('%section%', 'page', $show_media),
        str_replace('%section%', 'page', $show_featured_media),
        str_replace('%section%', 'page', $show_comments),
        str_replace('%section%', 'page', $body_lerp_block_after),
        str_replace('%section%', 'page', $sidebar_section_title),
        str_replace('%section%', 'page', $sidebar_activate),
        str_replace('%section%', 'page', $sidebar_widget),
        str_replace('%section%', 'page', $sidebar_position),
        str_replace('%section%', 'page', $sidebar_size),
        str_replace('%section%', 'page', $sidebar_sticky),
        str_replace('%section%', 'page', $sidebar_style),
        str_replace('%section%', 'page', $sidebar_bgcolor),
        str_replace('%section%', 'page', $sidebar_fill),
        str_replace('%section%', 'page', $footer_section_title),
        str_replace('%section%', 'page', $footer_lerp_block),
        str_replace('%section%', 'page', $footer_width),
        str_replace('%section%', 'page', $custom_fields_section_title),
        str_replace('%section%', 'page', $custom_fields_list),
        ///////////////////////////
        //  Portfolio Single		///
        ///////////////////////////
        str_replace('%section%', 'portfolio', $menu_section_title),
        str_replace('%section%', 'portfolio', $menu),
        str_replace('%section%', 'portfolio', $menu_width),
        str_replace('%section%', 'portfolio', $menu_opaque),
        str_replace('%section%', 'portfolio', $header_section_title),
        str_replace('%section%', 'portfolio', $header_type),
        str_replace('%section%', 'portfolio', $header_lerp_block),
        str_replace('%section%', 'portfolio', $header_revslider),
        str_replace('%section%', 'portfolio', $header_layerslider),

        str_replace('%section%', 'portfolio', $header_width),
        str_replace('%section%', 'portfolio', $header_height),
        str_replace('%section%', 'portfolio', $header_min_height),
        str_replace('%section%', 'portfolio', $header_title),
        str_replace('%section%', 'portfolio', $header_style),
        str_replace('%section%', 'portfolio', $header_content_width),
        str_replace('%section%', 'portfolio', $header_custom_width),
        str_replace('%section%', 'portfolio', $header_align),
        str_replace('%section%', 'portfolio', $header_position),
        str_replace('%section%', 'portfolio', $header_title_font),
        str_replace('%section%', 'portfolio', $header_title_size),
        str_replace('%section%', 'portfolio', $header_title_height),
        str_replace('%section%', 'portfolio', $header_title_spacing),
        str_replace('%section%', 'portfolio', $header_title_weight),
        str_replace('%section%', 'portfolio', $header_title_transform),
        str_replace('%section%', 'portfolio', $header_title_italic),
        str_replace('%section%', 'portfolio', $header_text_animation),
        str_replace('%section%', 'portfolio', $header_animation_speed),
        str_replace('%section%', 'portfolio', $header_animation_delay),
        str_replace('%section%', 'portfolio', $header_featured),
        str_replace('%section%', 'portfolio', $header_background),
        str_replace('%section%', 'portfolio', $header_parallax),
        str_replace('%section%', 'portfolio', $header_kburns),
        str_replace('%section%', 'portfolio', $header_overlay_color),
        str_replace('%section%', 'portfolio', $header_overlay_color_alpha),
        str_replace('%section%', 'portfolio', $header_scroll_opacity),
        str_replace('%section%', 'portfolio', $header_scrolldown),

        str_replace('%section%', 'portfolio', $body_section_title),
        str_replace('%section%', 'portfolio', $body_layout_width),
        str_replace('%section%', 'portfolio', $body_layout_width_custom),
        str_replace('%section%', 'portfolio', run_array_to($show_breadcrumb, 'std', 'on')),
        str_replace('%section%', 'portfolio', $breadcrumb_align),
        str_replace('%section%', 'portfolio', run_array_to($show_title, 'std', 'on')),
        str_replace('%section%', 'portfolio', $show_media),
        str_replace('%section%', 'portfolio', $show_featured_media),
        str_replace('%section%', 'portfolio', run_array_to($show_comments, 'std', 'off')),
        str_replace('%section%', 'portfolio', $show_share),
        str_replace('%section%', 'portfolio', $body_lerp_block_after),
        array(
            'id' => '_lerp_portfolio_details_title',
            'label' => '<i class="fa fa-briefcase3"></i> ' . esc_html__('Details', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_portfolio_section',
        ),
        array(
            'id' => '_lerp_portfolio_details',
            'label' => ucfirst($portfolio_cpt_name) . ' ' . esc_html__('details', 'lerp'),
            'desc' => sprintf(esc_html__('Create here all the %s details label that you need.', 'lerp'),
                $portfolio_cpt_name),
            'type' => 'list-item',
            'section' => 'lerp_portfolio_section',
            'settings' => array(
                array(
                    'id' => '_lerp_portfolio_detail_unique_id',
                    'class' => 'unique_id',
                    'std' => 'detail-',
                    'type' => 'text',
                    'label' => sprintf(esc_html__('Unique %s detail ID', 'lerp'), $portfolio_cpt_name),
                    'desc' => esc_html__('This value is created automatically and it shouldn\'t be edited unless you know what you are doing.',
                        'lerp'),
                ),
            )
        ),
        array(
            'id' => '_lerp_portfolio_position',
            'label' => ucfirst($portfolio_cpt_name) . ' ' . esc_html__('details layout', 'lerp'),
            'desc' => sprintf(esc_html__('Specify the layout template for all the %s posts.', 'lerp'),
                $portfolio_cpt_name),
            'type' => 'select',
            'section' => 'lerp_portfolio_section',
            'choices' => array(
                array(
                    'value' => '',
                    'label' => esc_html__('Select…', 'lerp'),
                ),
                array(
                    'value' => 'portfolio_top',
                    'label' => esc_html__('Details on the top', 'lerp'),
                ),
                array(
                    'value' => 'sidebar_right',
                    'label' => esc_html__('Details on the right', 'lerp'),
                ),
                array(
                    'value' => 'portfolio_bottom',
                    'label' => esc_html__('Details on the bottom', 'lerp'),
                ),
                array(
                    'value' => 'sidebar_left',
                    'label' => esc_html__('Details on the left', 'lerp'),
                ),
            )
        ),
        array(
            'id' => '_lerp_portfolio_sidebar_size',
            'label' => esc_html__('Sidebar size', 'lerp'),
            'desc' => esc_html__('Set the sidebar size.', 'lerp'),
            'std' => '4',
            'min_max_step' => '1,12,1',
            'type' => 'numeric-slider',
            'section' => 'lerp_portfolio_section',
            'operator' => 'and',
            'condition' => '_lerp_portfolio_position:not(),_lerp_portfolio_position:contains(sidebar)',
        ),
        str_replace('%section%',
            'portfolio',
            run_array_to($sidebar_sticky,
                'condition',
                '_lerp_portfolio_position:not(),_lerp_portfolio_position:contains(sidebar)')),
        array(
            'id' => '_lerp_portfolio_style',
            'label' => esc_html__('Skin', 'lerp'),
            'desc' => esc_html__('Specify the sidebar text skin color.', 'lerp'),
            'type' => 'select',
            'choices' => array(
                array(
                    'value' => '',
                    'label' => esc_html__('Inherit', "lerp"),
                ),
                array(
                    'value' => 'light',
                    'label' => esc_html__('Light', "lerp"),
                ),
                array(
                    'value' => 'dark',
                    'label' => esc_html__('Dark', "lerp"),
                )
            ),
            'section' => 'lerp_portfolio_section',
            'condition' => '_lerp_portfolio_position:not()',
        ),
        array(
            'id' => '_lerp_portfolio_bgcolor',
            'label' => esc_html__('Sidebar color', 'lerp'),
            'desc' => esc_html__('Specify the sidebar background color.', 'lerp'),
            'type' => 'lerp_color',
            'section' => 'lerp_portfolio_section',
            'condition' => '_lerp_portfolio_position:not()',
        ),
        array(
            'id' => '_lerp_portfolio_sidebar_fill',
            'label' => esc_html__('Sidebar filling space', 'lerp'),
            'desc' => esc_html__('Activate to remove padding around the sidebar and fill the height.', 'lerp'),
            'type' => 'on-off',
            'section' => 'lerp_portfolio_section',
            'std' => 'off',
            'operator' => 'and',
            'condition' => '_lerp_portfolio_position:not(),_lerp_portfolio_sidebar_bgcolor:not(),_lerp_portfolio_position:contains(sidebar)',
        ),
        str_replace('%section%', 'portfolio', $navigation_section_title),
        str_replace('%section%', 'portfolio', $navigation_activate),
        str_replace('%section%', 'portfolio', $navigation_page_index),
        str_replace('%section%', 'portfolio', $navigation_index_label),
        str_replace('%section%', 'portfolio', $navigation_nextprev_title),
        str_replace('%section%', 'portfolio', $footer_section_title),
        str_replace('%section%', 'portfolio', $footer_lerp_block),
        str_replace('%section%', 'portfolio', $footer_width),
        str_replace('%section%', 'portfolio', $custom_fields_section_title),
        str_replace('%section%', 'portfolio', $custom_fields_list),
    );

    $custom_settings_one = array_merge($custom_settings_one, $cpt_single_options);

    $custom_settings_two = array(
        ///////////////////
        //  Page 404		///
        ///////////////////
        str_replace('%section%', '404', $menu_section_title),
        str_replace('%section%', '404', $menu),
        str_replace('%section%', '404', $menu_width),
        str_replace('%section%', '404', $menu_opaque),
        str_replace('%section%', '404', $header_section_title),
        str_replace('%section%', '404', $header_type),
        str_replace('%section%', '404', $header_lerp_block),
        str_replace('%section%', '404', $header_revslider),
        str_replace('%section%', '404', $header_layerslider),

        str_replace('%section%', '404', $header_width),
        str_replace('%section%', '404', $header_height),
        str_replace('%section%', '404', $header_min_height),
        str_replace('%section%', '404', $header_title),
        str_replace('%section%', '404', $header_title_text),
        str_replace('%section%', '404', $header_style),
        str_replace('%section%', '404', $header_content_width),
        str_replace('%section%', '404', $header_custom_width),
        str_replace('%section%', '404', $header_align),
        str_replace('%section%', '404', $header_position),
        str_replace('%section%', '404', $header_title_font),
        str_replace('%section%', '404', $header_title_size),
        str_replace('%section%', '404', $header_title_height),
        str_replace('%section%', '404', $header_title_spacing),
        str_replace('%section%', '404', $header_title_weight),
        str_replace('%section%', '404', $header_title_transform),
        str_replace('%section%', '404', $header_title_italic),
        str_replace('%section%', '404', $header_text_animation),
        str_replace('%section%', '404', $header_animation_speed),
        str_replace('%section%', '404', $header_animation_delay),
        str_replace('%section%', '404', $header_background),
        str_replace('%section%', '404', $header_parallax),
        str_replace('%section%', '404', $header_kburns),
        str_replace('%section%', '404', $header_overlay_color),
        str_replace('%section%', '404', $header_overlay_color_alpha),
        str_replace('%section%', '404', $header_scroll_opacity),
        str_replace('%section%', '404', $header_scrolldown),

        str_replace('%section%', '404', $body_section_title),
        str_replace('%section%', '404', $body_layout_width),
        str_replace('%section%', '404', $lerpblock_404),
        str_replace('%section%', '404', $lerpblocks_404),
        str_replace('%section%', '404', $footer_section_title),
        str_replace('%section%', '404', $footer_lerp_block),
        str_replace('%section%', '404', $footer_width),
        //////////////////////
        //  Posts Index		///
        //////////////////////
        str_replace('%section%', 'post_index', $menu_section_title),
        str_replace('%section%', 'post_index', $menu),
        str_replace('%section%', 'post_index', $menu_width),
        str_replace('%section%', 'post_index', $menu_opaque),
        str_replace('%section%', 'post_index', $header_section_title),
        str_replace('%section%', 'post_index', run_array_to($header_type, 'std', 'header_basic')),
        str_replace('%section%', 'post_index', $header_lerp_block),
        str_replace('%section%', 'post_index', $header_revslider),
        str_replace('%section%', 'post_index', $header_layerslider),

        str_replace('%section%', 'post_index', $header_width),
        str_replace('%section%', 'post_index', $header_height),
        str_replace('%section%', 'post_index', $header_min_height),
        str_replace('%section%', 'post_index', $header_title),
        str_replace('%section%', 'post_index', $header_style),
        str_replace('%section%', 'post_index', $header_content_width),
        str_replace('%section%', 'post_index', $header_custom_width),
        str_replace('%section%', 'post_index', $header_align),
        str_replace('%section%', 'post_index', $header_position),
        str_replace('%section%', 'post_index', $header_title_font),
        str_replace('%section%', 'post_index', $header_title_size),
        str_replace('%section%', 'post_index', $header_title_height),
        str_replace('%section%', 'post_index', $header_title_spacing),
        str_replace('%section%', 'post_index', $header_title_weight),
        str_replace('%section%', 'post_index', $header_title_transform),
        str_replace('%section%', 'post_index', $header_title_italic),
        str_replace('%section%', 'post_index', $header_text_animation),
        str_replace('%section%', 'post_index', $header_animation_speed),
        str_replace('%section%', 'post_index', $header_animation_delay),
        str_replace('%section%', 'post_index', $header_featured),
        str_replace('%section%', 'post_index', $header_background),
        str_replace('%section%', 'post_index', $header_parallax),
        str_replace('%section%', 'post_index', $header_kburns),
        str_replace('%section%', 'post_index', $header_overlay_color),
        str_replace('%section%', 'post_index', $header_overlay_color_alpha),
        str_replace('%section%', 'post_index', $header_scroll_opacity),
        str_replace('%section%', 'post_index', $header_scrolldown),
        str_replace('%section%', 'post_index', $menu_no_padding),
        str_replace('%section%', 'post_index', $menu_no_padding_mobile),

        str_replace('%section%', 'post_index', $body_section_title),
        str_replace('%section%', 'post_index', $show_breadcrumb),
        str_replace('%section%', 'post_index', $breadcrumb_align),
        str_replace('%section%', 'post_index', $body_lerp_block),
        str_replace('%section%', 'post_index', $body_layout_width),
        str_replace('%section%', 'post_index', $body_single_post_width),
        str_replace('%section%', 'post_index', $body_single_text_lenght),
        str_replace('%section%', 'post_index', $show_title),
        str_replace('%section%', 'post_index', $sidebar_section_title),
        str_replace('%section%', 'post_index', run_array_to($sidebar_activate, 'std', 'on')),
        str_replace('%section%', 'post_index', $sidebar_widget),
        str_replace('%section%', 'post_index', $sidebar_position),
        str_replace('%section%', 'post_index', $sidebar_size),
        str_replace('%section%', 'post_index', $sidebar_sticky),
        str_replace('%section%', 'post_index', $sidebar_style),
        str_replace('%section%', 'post_index', $sidebar_bgcolor),
        str_replace('%section%', 'post_index', $sidebar_fill),
        str_replace('%section%', 'post_index', $footer_section_title),
        str_replace('%section%', 'post_index', $footer_lerp_block),
        str_replace('%section%', 'post_index', $footer_width),
        //////////////////////
        //  Pages Index		///
        //////////////////////
        str_replace('%section%', 'page_index', $menu_section_title),
        str_replace('%section%', 'page_index', $menu),
        str_replace('%section%', 'page_index', $menu_width),
        str_replace('%section%', 'page_index', $menu_opaque),
        str_replace('%section%', 'page_index', $header_section_title),
        str_replace('%section%', 'page_index', run_array_to($header_type, 'std', 'header_basic')),
        str_replace('%section%', 'page_index', $header_lerp_block),
        str_replace('%section%', 'page_index', $header_revslider),
        str_replace('%section%', 'page_index', $header_layerslider),

        str_replace('%section%', 'page_index', $header_width),
        str_replace('%section%', 'page_index', $header_height),
        str_replace('%section%', 'page_index', $header_min_height),
        str_replace('%section%', 'page_index', $header_title),
        str_replace('%section%', 'page_index', $header_style),
        str_replace('%section%', 'page_index', $header_content_width),
        str_replace('%section%', 'page_index', $header_custom_width),
        str_replace('%section%', 'page_index', $header_align),
        str_replace('%section%', 'page_index', $header_position),
        str_replace('%section%', 'page_index', $header_title_font),
        str_replace('%section%', 'page_index', $header_title_size),
        str_replace('%section%', 'page_index', $header_title_height),
        str_replace('%section%', 'page_index', $header_title_spacing),
        str_replace('%section%', 'page_index', $header_title_weight),
        str_replace('%section%', 'page_index', $header_title_transform),
        str_replace('%section%', 'page_index', $header_title_italic),
        str_replace('%section%', 'page_index', $header_text_animation),
        str_replace('%section%', 'page_index', $header_animation_speed),
        str_replace('%section%', 'page_index', $header_animation_delay),
        str_replace('%section%', 'page_index', $header_featured),
        str_replace('%section%', 'page_index', $header_background),
        str_replace('%section%', 'page_index', $header_parallax),
        str_replace('%section%', 'page_index', $header_kburns),
        str_replace('%section%', 'page_index', $header_overlay_color),
        str_replace('%section%', 'page_index', $header_overlay_color_alpha),
        str_replace('%section%', 'page_index', $header_scroll_opacity),
        str_replace('%section%', 'page_index', $header_scrolldown),
        str_replace('%section%', 'page_index', $menu_no_padding),
        str_replace('%section%', 'page_index', $menu_no_padding_mobile),

        str_replace('%section%', 'page_index', $body_section_title),
        str_replace('%section%', 'page_index', $show_breadcrumb),
        str_replace('%section%', 'page_index', $breadcrumb_align),
        str_replace('%section%', 'page_index', $body_lerp_block),
        str_replace('%section%',
            'page_index',
            run_array_to($body_layout_width,
                'condition',
                '_lerp_%section%_content_block:is(),_lerp_%section%_content_block:is(none)')),
        str_replace('%section%', 'page_index', $body_single_post_width),
        str_replace('%section%', 'page_index', $body_single_text_lenght),
        str_replace('%section%', 'page_index', $show_title),
        str_replace('%section%', 'page_index', $sidebar_section_title),
        str_replace('%section%', 'page_index', run_array_to($sidebar_activate, 'std', 'on')),
        str_replace('%section%', 'page_index', $sidebar_widget),
        str_replace('%section%', 'page_index', $sidebar_position),
        str_replace('%section%', 'page_index', $sidebar_size),
        str_replace('%section%', 'page_index', $sidebar_sticky),
        str_replace('%section%', 'page_index', $sidebar_style),
        str_replace('%section%', 'page_index', $sidebar_bgcolor),
        str_replace('%section%', 'page_index', $sidebar_fill),
        str_replace('%section%', 'page_index', $footer_section_title),
        str_replace('%section%', 'page_index', $footer_lerp_block),
        str_replace('%section%', 'page_index', $footer_width),
        ////////////////////////
        //  Archive Index		///
        ////////////////////////
        str_replace('%section%', 'portfolio_index', $menu_section_title),
        str_replace('%section%', 'portfolio_index', $menu),
        str_replace('%section%', 'portfolio_index', $menu_width),
        str_replace('%section%', 'portfolio_index', $menu_opaque),
        str_replace('%section%', 'portfolio_index', $header_section_title),
        str_replace('%section%', 'portfolio_index', run_array_to($header_type, 'std', 'header_basic')),
        str_replace('%section%', 'portfolio_index', $header_lerp_block),
        str_replace('%section%', 'portfolio_index', $header_revslider),
        str_replace('%section%', 'portfolio_index', $header_layerslider),

        str_replace('%section%', 'portfolio_index', $header_width),
        str_replace('%section%', 'portfolio_index', $header_height),
        str_replace('%section%', 'portfolio_index', $header_min_height),
        str_replace('%section%', 'portfolio_index', $header_title),
        str_replace('%section%', 'portfolio_index', $header_style),
        str_replace('%section%', 'portfolio_index', $header_content_width),
        str_replace('%section%', 'portfolio_index', $header_custom_width),
        str_replace('%section%', 'portfolio_index', $header_align),
        str_replace('%section%', 'portfolio_index', $header_position),
        str_replace('%section%', 'portfolio_index', $header_title_font),
        str_replace('%section%', 'portfolio_index', $header_title_size),
        str_replace('%section%', 'portfolio_index', $header_title_height),
        str_replace('%section%', 'portfolio_index', $header_title_spacing),
        str_replace('%section%', 'portfolio_index', $header_title_weight),
        str_replace('%section%', 'portfolio_index', $header_title_transform),
        str_replace('%section%', 'portfolio_index', $header_title_italic),
        str_replace('%section%', 'portfolio_index', $header_text_animation),
        str_replace('%section%', 'portfolio_index', $header_animation_speed),
        str_replace('%section%', 'portfolio_index', $header_animation_delay),
        str_replace('%section%', 'portfolio_index', $header_featured),
        str_replace('%section%', 'portfolio_index', $header_background),
        str_replace('%section%', 'portfolio_index', $header_parallax),
        str_replace('%section%', 'portfolio_index', $header_kburns),
        str_replace('%section%', 'portfolio_index', $header_overlay_color),
        str_replace('%section%', 'portfolio_index', $header_overlay_color_alpha),
        str_replace('%section%', 'portfolio_index', $header_scroll_opacity),
        str_replace('%section%', 'portfolio_index', $header_scrolldown),
        str_replace('%section%', 'portfolio_index', $menu_no_padding),
        str_replace('%section%', 'portfolio_index', $menu_no_padding_mobile),

        str_replace('%section%', 'portfolio_index', $body_section_title),
        str_replace('%section%', 'portfolio_index', $show_breadcrumb),
        str_replace('%section%', 'portfolio_index', $breadcrumb_align),
        str_replace('%section%', 'portfolio_index', $body_lerp_block),
        str_replace('%section%',
            'portfolio_index',
            run_array_to($body_layout_width,
                'condition',
                '_lerp_%section%_content_block:is(),_lerp_%section%_content_block:is(none)')),
        str_replace('%section%', 'portfolio_index', $body_single_post_width),
        str_replace('%section%', 'portfolio_index', $show_title),
        str_replace('%section%', 'portfolio_index', $sidebar_section_title),
        str_replace('%section%', 'portfolio_index', $sidebar_activate),
        str_replace('%section%', 'portfolio_index', $sidebar_widget),
        str_replace('%section%', 'portfolio_index', $sidebar_position),
        str_replace('%section%', 'portfolio_index', $sidebar_size),
        str_replace('%section%', 'portfolio_index', $sidebar_sticky),
        str_replace('%section%', 'portfolio_index', $sidebar_style),
        str_replace('%section%', 'portfolio_index', $sidebar_bgcolor),
        str_replace('%section%', 'portfolio_index', $sidebar_fill),
        str_replace('%section%', 'portfolio_index', $footer_section_title),
        str_replace('%section%', 'portfolio_index', $footer_lerp_block),
        str_replace('%section%', 'portfolio_index', $footer_width),
    );

    $custom_settings_one = array_merge($custom_settings_one, $custom_settings_two);
    $custom_settings_one = array_merge($custom_settings_one, $cpt_index_options);

    $custom_settings_three = array(
        ///////////////////////
        //  Search Index		///
        ///////////////////////
        str_replace('%section%', 'search_index', $menu_section_title),
        str_replace('%section%', 'search_index', $menu),
        str_replace('%section%', 'search_index', $menu_width),
        str_replace('%section%', 'search_index', $menu_opaque),
        str_replace('%section%', 'search_index', $header_section_title),
        str_replace('%section%', 'search_index', run_array_to($header_type, 'std', 'header_basic')),
        str_replace('%section%', 'search_index', $header_lerp_block),
        str_replace('%section%', 'search_index', $header_revslider),
        str_replace('%section%', 'search_index', $header_layerslider),

        str_replace('%section%', 'search_index', $header_width),
        str_replace('%section%', 'search_index', $header_height),
        str_replace('%section%', 'search_index', $header_min_height),
        str_replace('%section%', 'search_index', $header_title),
        str_replace('%section%', 'search_index', $header_title_text),
        str_replace('%section%', 'search_index', $header_style),
        str_replace('%section%', 'search_index', $header_content_width),
        str_replace('%section%', 'search_index', $header_custom_width),
        str_replace('%section%', 'search_index', $header_align),
        str_replace('%section%', 'search_index', $header_position),
        str_replace('%section%', 'search_index', $header_title_font),
        str_replace('%section%', 'search_index', $header_title_size),
        str_replace('%section%', 'search_index', $header_title_height),
        str_replace('%section%', 'search_index', $header_title_spacing),
        str_replace('%section%', 'search_index', $header_title_weight),
        str_replace('%section%', 'search_index', $header_title_transform),
        str_replace('%section%', 'search_index', $header_title_italic),
        str_replace('%section%', 'search_index', $header_text_animation),
        str_replace('%section%', 'search_index', $header_animation_speed),
        str_replace('%section%', 'search_index', $header_animation_delay),
        str_replace('%section%', 'search_index', $header_background),
        str_replace('%section%', 'search_index', $header_parallax),
        str_replace('%section%', 'search_index', $header_kburns),
        str_replace('%section%', 'search_index', $header_overlay_color),
        str_replace('%section%', 'search_index', $header_overlay_color_alpha),
        str_replace('%section%', 'search_index', $header_scroll_opacity),
        str_replace('%section%', 'search_index', $header_scrolldown),
        str_replace('%section%', 'search_index', $menu_no_padding),
        str_replace('%section%', 'search_index', $menu_no_padding_mobile),

        str_replace('%section%', 'search_index', $body_section_title),
        str_replace('%section%', 'search_index', $body_lerp_block),
        str_replace('%section%', 'search_index', $body_layout_width),
        str_replace('%section%', 'search_index', $sidebar_section_title),
        str_replace('%section%', 'search_index', $sidebar_activate),
        str_replace('%section%', 'search_index', $sidebar_widget),
        str_replace('%section%', 'search_index', $sidebar_position),
        str_replace('%section%', 'search_index', $sidebar_size),
        str_replace('%section%', 'search_index', $sidebar_sticky),
        str_replace('%section%', 'search_index', $sidebar_style),
        str_replace('%section%', 'search_index', $sidebar_bgcolor),
        str_replace('%section%', 'search_index', $sidebar_fill),
        str_replace('%section%', 'search_index', $footer_section_title),
        str_replace('%section%', 'search_index', $footer_lerp_block),
        str_replace('%section%', 'search_index', $footer_width),

        array(
            'id' => '_lerp_sidebars',
            'label' => esc_html__('Site sidebars', 'lerp'),
            'desc' => esc_html__('Define here all the sidebars you will need. A default sidebar is already defined.',
                'lerp'),
            'type' => 'list-item',
            'section' => 'lerp_sidebars_section',
            'class' => 'list-item',
            'settings' => array(
                array(
                    'id' => '_lerp_sidebar_unique_id',
                    'class' => 'unique_id',
                    'std' => 'sidebar-',
                    'type' => 'text',
                    'label' => esc_html__('Unique sidebar ID', 'lerp'),
                    'desc' => esc_html__('This value is created automatically and it shouldn\'t be edited unless you know what you are doing.',
                        'lerp'),
                ),
            )
        ),
        array(
            'id' => '_lerp_font_groups',
            'label' => esc_html__('Custom fonts', 'lerp'),
            'desc' => esc_html__('Define here all the fonts you will need.', 'lerp'),
            'std' => array(
                array(
                    'title' => 'Font Poppins (Sans Serif)',
                    '_lerp_font_group_unique_id' => 'font-762333',
                    '_lerp_font_group' => 'Poppins'
                ),
                array(
                    'title' => 'Font Roboto (Sans Serif)',
                    '_lerp_font_group_unique_id' => 'font-377884',
                    '_lerp_font_group' => 'Roboto'
                ),
            ),
            'type' => 'list-item',
            'section' => 'lerp_typography_section',
            'settings' => array(
                array(
                    'id' => '_lerp_font_group_unique_id',
                    'class' => 'unique_id',
                    'std' => 'font-',
                    'type' => 'text',
                    'label' => esc_html__('Unique font ID', 'lerp'),
                    'desc' => esc_html__('This value is created automatically and it shouldn\'t be edited unless you know what you are doing.',
                        'lerp'),
                ),
                array(
                    'id' => '_lerp_font_group',
                    'label' => esc_html__('Lerp font', 'lerp'),
                    'desc' => esc_html__('Specify a font.', 'lerp'),
                    'type' => 'select',
                    'choices' => $title_font,
                ),
                array(
                    'id' => '_lerp_font_manual',
                    'label' => esc_html__('Font family', 'lerp'),
                    'desc' => esc_html__('Enter a font family.', 'lerp'),
                    'type' => 'text',
                    'condition' => '_lerp_font_group:is(manual)',
                    'operator' => 'and'
                )
            )
        ),
        array(
            'id' => '_lerp_font_size',
            'label' => esc_html__('Default font size', 'lerp'),
            'desc' => esc_html__('Font size for p,li,dt,dd,dl,address,label,small,pre in <b>px</b>.', 'lerp'),
            'std' => '15',
            'type' => 'text',
            'section' => 'lerp_typography_section',
        ),
        array(
            'id' => '_lerp_heading_h1',
            'label' => esc_html__('Font size H1', 'lerp'),
            'desc' => esc_html__('Font size for H1 in <b>px</b>.', 'lerp'),
            'std' => '35',
            'type' => 'text',
            'section' => 'lerp_typography_section',
        ),
        array(
            'id' => '_lerp_heading_h2',
            'label' => esc_html__('Font size H2', 'lerp'),
            'desc' => esc_html__('Font size for H2 in <b>px</b>.', 'lerp'),
            'std' => '29',
            'type' => 'text',
            'section' => 'lerp_typography_section',
        ),
        array(
            'id' => '_lerp_heading_h3',
            'label' => esc_html__('Font size H3', 'lerp'),
            'desc' => esc_html__('Font size for H3 in <b>px</b>.', 'lerp'),
            'std' => '24',
            'type' => 'text',
            'section' => 'lerp_typography_section',
        ),
        array(
            'id' => '_lerp_heading_h4',
            'label' => esc_html__('Font size H4', 'lerp'),
            'desc' => esc_html__('Font size for H4 in <b>px</b>.', 'lerp'),
            'std' => '20',
            'type' => 'text',
            'section' => 'lerp_typography_section',
        ),
        array(
            'id' => '_lerp_heading_h5',
            'label' => esc_html__('Font size H5', 'lerp'),
            'desc' => esc_html__('Font size for H5 in <b>px</b>.', 'lerp'),
            'std' => '17',
            'type' => 'text',
            'section' => 'lerp_typography_section',
        ),
        array(
            'id' => '_lerp_heading_h6',
            'label' => esc_html__('Font size H6', 'lerp'),
            'desc' => esc_html__('Font size for H6 in <b>px</b>.', 'lerp'),
            'std' => '14',
            'type' => 'text',
            'section' => 'lerp_typography_section',
        ),
        array(
            'id' => '_lerp_heading_font_sizes',
            'label' => esc_html__('Custom font size', 'lerp'),
            'desc' => esc_html__('Define here all the additional font sizes you will need.', 'lerp'),
            'std' => '',
            'type' => 'list-item',
            'section' => 'lerp_typography_section',
            'settings' => array(
                array(
                    'id' => '_lerp_heading_font_size_unique_id',
                    'class' => 'unique_id',
                    'std' => 'fontsize-',
                    'type' => 'text',
                    'label' => esc_html__('Unique font size ID', 'lerp'),
                    'desc' => esc_html__('This value is created automatically and it shouldn\'t be edited unless you know what you are doing.',
                        'lerp'),
                ),
                array(
                    'id' => '_lerp_heading_font_size',
                    'label' => esc_html__('Font size', 'lerp'),
                    'desc' => esc_html__('Font size in <b>px</b>.', 'lerp'),
                    'std' => '',
                    'type' => 'text',
                )
            )
        ),
        array(
            'id' => '_lerp_heading_font_heights',
            'label' => esc_html__('Custom line height', 'lerp'),
            'desc' => esc_html__('Define here all the additional font line heights you will need.', 'lerp'),
            'std' => '',
            'type' => 'list-item',
            'section' => 'lerp_typography_section',
            'settings' => array(
                array(
                    'id' => '_lerp_heading_font_height_unique_id',
                    'class' => 'unique_id',
                    'std' => 'fontheight-',
                    'type' => 'text',
                    'label' => esc_html__('Unique font height ID', 'lerp'),
                    'desc' => esc_html__('This value is created automatically and it shouldn\'t be edited unless you know what you are doing.',
                        'lerp'),
                ),
                array(
                    'id' => '_lerp_heading_font_height',
                    'label' => esc_html__('Font line height', 'lerp'),
                    'desc' => esc_html__('Insert a line height.', 'lerp'),
                    'std' => '',
                    'type' => 'text',
                )
            )
        ),
        array(
            'id' => '_lerp_heading_font_spacings',
            'label' => esc_html__('Custom letter spacing', 'lerp'),
            'desc' => esc_html__('Define here all the letter spacings you will need.', 'lerp'),
            'std' => '',
            'type' => 'list-item',
            'section' => 'lerp_typography_section',
            'settings' => array(
                array(
                    'id' => '_lerp_heading_font_spacing_unique_id',
                    'class' => 'unique_id',
                    'std' => 'fontspace-',
                    'type' => 'text',
                    'label' => esc_html__('Unique letter spacing ID', 'lerp'),
                    'desc' => esc_html__('This value is created automatically and it shouldn\'t be edited unless you know what you are doing.',
                        'lerp'),
                ),
                array(
                    'id' => '_lerp_heading_font_spacing',
                    'label' => esc_html__('Letter spacing', 'lerp'),
                    'desc' => esc_html__('Letter spacing with the unit (em or px). Ex. 0.2em', 'lerp'),
                    'std' => '',
                    'type' => 'text',
                )
            )
        ),
        array(
            'id' => '_lerp_custom_colors_list',
            'label' => esc_html__('Color palettes', 'lerp'),
            'desc' => esc_html__('Define all the colors you will need.', 'lerp'),
            'std' => array(
                array(
                    'title' => esc_html__('Black', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-jevc',
                    '_lerp_custom_color' => '#000000',
                ),
                array(
                    'title' => esc_html__('Dark 1', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-nhtu',
                    '_lerp_custom_color' => '#101213',
                ),
                array(
                    'title' => esc_html__('Dark 2', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-wayh',
                    '_lerp_custom_color' => '#141618',
                ),
                array(
                    'title' => esc_html__('Dark 3', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-rgdb',
                    '_lerp_custom_color' => '#1b1d1f',
                ),
                array(
                    'title' => esc_html__('Dark 4', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-prif',
                    '_lerp_custom_color' => '#303133',
                ),
                array(
                    'title' => esc_html__('White', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-xsdn',
                    '_lerp_custom_color' => '#ffffff',
                ),
                array(
                    'title' => esc_html__('Light 1', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-lxmt',
                    '_lerp_custom_color' => '#f7f7f7',
                ),
                array(
                    'title' => esc_html__('Light 2', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-gyho',
                    '_lerp_custom_color' => '#eaeaea',
                ),
                array(
                    'title' => esc_html__('Light 3', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-uydo',
                    '_lerp_custom_color' => '#dddddd',
                ),
                array(
                    'title' => esc_html__('Light 4', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-wvjs',
                    '_lerp_custom_color' => '#777',
                ),
                array(
                    'title' => esc_html__('Cerulean', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-vyce',
                    '_lerp_custom_color' => '#0cb4ce',
                ),
                array(
                    'title' => esc_html__('International Orange', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-dfgh',
                    '_lerp_custom_color' => '#FF590A',
                ),
                array(
                    'title' => esc_html__('Malachite', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-iopl',
                    '_lerp_custom_color' => '#0CCE50',
                ),
                array(
                    'title' => esc_html__('Sunglow', 'lerp'),
                    '_lerp_custom_color_unique_id' => 'color-zsdf',
                    '_lerp_custom_color' => '#FFC42E',
                ),
            ),
            'type' => 'list-item',
            'section' => 'lerp_colors_section',
            'class' => 'list-colors',
            'settings' => array(
                array(
                    'id' => '_lerp_custom_color_unique_id',
                    'std' => 'color-',
                    'class' => 'unique_id',
                    'type' => 'text',
                    'label' => esc_html__('Unique color ID', 'lerp'),
                    'desc' => esc_html__('This value is created automatically and it shouldn\'t be edited unless you know what you are doing.',
                        'lerp'),
                ),
                array(
                    'id' => '_lerp_custom_color_regular',
                    'label' => esc_html__('Monochrome', 'lerp'),
                    'desc' => esc_html__('Activate to assign a monochromatic color, otherwise a gradient will be used.',
                        'lerp'),
                    'std' => 'on',
                    'type' => 'on-off',
                    'section' => 'lerp_customize_section',
                ),
                array(
                    'id' => '_lerp_custom_color',
                    'label' => esc_html__('Colorpicker', 'lerp'),
                    'desc' => esc_html__('Specify the color for this palette. You can also define a color with the alpha value.',
                        'lerp'),
                    'std' => '',
                    'type' => 'colorpicker',
                    'condition' => '_lerp_custom_color_regular:is(on)',
                ),
                array(
                    'id' => '_lerp_custom_color_gradient',
                    'label' => esc_html__('Gradient', 'lerp'),
                    'desc' => esc_html__('Specify the gradient color for this palette. NB. You can use a gradient color only as a background color.',
                        'lerp'),
                    'std' => '',
                    'type' => 'gradientpicker',
                    'condition' => '_lerp_custom_color_regular:is(off)',
                ),
            )
        ),
        array(
            'id' => '_lerp_custom_light_block_title',
            'label' => '<i class="fa fa-square-o"></i> ' . esc_html__('Light skin', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_logo_color_light',
            'label' => esc_html__('SVG/Text logo color', 'lerp'),
            'desc' => esc_html__('Specify the logo color if it\'s a SVG or textual.', 'lerp'),
            'std' => 'color-prif',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_color_light',
            'label' => esc_html__('Menu text color', 'lerp'),
            'desc' => esc_html__('Specify the menu text color.', 'lerp'),
            'std' => 'color-prif',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_bg_color_light',
            'label' => esc_html__('Primary menu background color', 'lerp'),
            'desc' => esc_html__('Specify the primary menu background color.', 'lerp'),
            'std' => 'color-xsdn',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_bg_alpha_light',
            'label' => esc_html__('Primary menu background opacity', 'lerp'),
            'desc' => esc_html__('Adjust the primary menu background transparency.', 'lerp'),
            'std' => '100',
            'type' => 'numeric-slider',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_submenu_bg_color_light',
            'label' => esc_html__('Primary submenu background color', 'lerp'),
            'desc' => esc_html__('Specify the primary submenu text color.', 'lerp'),
            'std' => 'color-xsdn',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_border_color_light',
            'label' => esc_html__('Primary menu border color', 'lerp'),
            'desc' => esc_html__('Specify the primary menu border color.', 'lerp'),
            'std' => 'color-gyho',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_border_alpha_light',
            'label' => esc_html__('Primary menu border opacity', 'lerp'),
            'desc' => esc_html__('Adjust the primary menu border transparency.', 'lerp'),
            'std' => '100',
            'type' => 'numeric-slider',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_secmenu_bg_color_light',
            'label' => esc_html__('Secondary menu background color', 'lerp'),
            'desc' => esc_html__('Specify the secondary menu background color.', 'lerp'),
            'std' => 'color-xsdn',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_heading_color_light',
            'label' => esc_html__('Headings color', 'lerp'),
            'desc' => esc_html__('Specify the headings text color.', 'lerp'),
            'std' => 'color-prif',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_text_color_light',
            'label' => esc_html__('Content text color', 'lerp'),
            'desc' => esc_html__('Specify the content area text color.', 'lerp'),
            'std' => 'color-wvjs',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_background_color_light',
            'label' => esc_html__('Content background color', 'lerp'),
            'desc' => esc_html__('Specify the content background color.', 'lerp'),
            'std' => 'color-xsdn',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_custom_dark_block_title',
            'label' => '<i class="fa fa-square"></i> ' . esc_html__('Dark skin', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_logo_color_dark',
            'label' => esc_html__('SVG/Text logo color', 'lerp'),
            'desc' => esc_html__('Specify the logo color if it\'s a SVG or textual.', 'lerp'),
            'std' => 'color-xsdn',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_color_dark',
            'label' => esc_html__('Menu text color', 'lerp'),
            'desc' => esc_html__('Specify the menu text color.', 'lerp'),
            'std' => 'color-xsdn',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_bg_color_dark',
            'label' => esc_html__('Primary menu background color', 'lerp'),
            'desc' => esc_html__('Specify the primary menu background color.', 'lerp'),
            'std' => 'color-wayh',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_bg_alpha_dark',
            'label' => esc_html__('Primary menu background opacity', 'lerp'),
            'desc' => esc_html__('Adjust the primary menu background transparency.', 'lerp'),
            'std' => '100',
            'type' => 'numeric-slider',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_submenu_bg_color_dark',
            'label' => esc_html__('Primary submenu background color', 'lerp'),
            'desc' => esc_html__('Specify the primary submenu text color.', 'lerp'),
            'std' => 'color-rgdb',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_border_color_dark',
            'label' => esc_html__('Primary menu border color', 'lerp'),
            'desc' => esc_html__('Specify the primary menu border color.', 'lerp'),
            'std' => 'color-prif',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_border_alpha_dark',
            'label' => esc_html__('Primary menu border opacity', 'lerp'),
            'desc' => esc_html__('Adjust the primary menu border transparency.', 'lerp'),
            'std' => '100',
            'type' => 'numeric-slider',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_secmenu_bg_color_dark',
            'label' => esc_html__('Secondary menu background color', 'lerp'),
            'desc' => esc_html__('Specify the secondary menu background color.', 'lerp'),
            'std' => 'color-wayh',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_heading_color_dark',
            'label' => esc_html__('Headings color', 'lerp'),
            'desc' => esc_html__('Specify the headings text color.', 'lerp'),
            'std' => 'color-xsdn',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_text_color_dark',
            'label' => esc_html__('Content text color', 'lerp'),
            'desc' => esc_html__('Specify the content area text color.', 'lerp'),
            'std' => 'color-xsdn',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_background_color_dark',
            'label' => esc_html__('Content background color', 'lerp'),
            'desc' => esc_html__('Specify the content background color.', 'lerp'),
            'std' => 'color-wayh',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_custom_general_block_title',
            'label' => '<i class="fa fa-globe3"></i> ' . esc_html__('General', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_body_background',
            'label' => esc_html__('HTML body background', 'lerp'),
            'desc' => esc_html__('Specify the body background color and media.', 'lerp'),
            'type' => 'background',
            'std' => array(
                'background-color' => 'color-lxmt',
                'background-repeat' => '',
                'background-attachment' => '',
                'background-position' => '',
                'background-size' => '',
                'background-image' => '',
            ),
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_accent_color',
            'label' => esc_html__('Accent color', 'lerp'),
            'desc' => esc_html__('Specify the accent color.', 'lerp'),
            'std' => 'color-vyce',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_body_link_color',
            'label' => esc_html__('Links color', 'lerp'),
            'desc' => esc_html__('Specify the color of links in page textual contents.', 'lerp'),
            'std' => '',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => array(
                array(
                    'value' => '',
                    'label' => esc_html__('Default', 'lerp'),
                ),
                array(
                    'value' => 'accent',
                    'label' => esc_html__('Accent color', 'lerp'),
                ),
            )
        ),
        array(
            'id' => '_lerp_body_font_family',
            'label' => esc_html__('Body font family', 'lerp'),
            'desc' => esc_html__('Specify the body font family.', 'lerp'),
            'std' => 'font-377884',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => $custom_fonts
        ),
        array(
            'id' => '_lerp_ui_font_family',
            'label' => esc_html__('UI font family', 'lerp'),
            'desc' => esc_html__('Specify the UI font family.', 'lerp'),
            'std' => 'font-762333',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => $custom_fonts
        ),
        array(
            'id' => '_lerp_ui_font_weight',
            'label' => esc_html__('UI font weight', 'lerp'),
            'desc' => esc_html__('Specify the UI font weight.', 'lerp'),
            'std' => '600',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => $title_weight
        ),
        array(
            'id' => '_lerp_heading_font_family',
            'label' => esc_html__('Headings font family', 'lerp'),
            'desc' => esc_html__('Specify the headings font family.', 'lerp'),
            'std' => 'font-377884',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => $custom_fonts
        ),
        array(
            'id' => '_lerp_heading_font_weight',
            'label' => esc_html__('Headings font weight', 'lerp'),
            'desc' => esc_html__('Specify the Headings font weight.', 'lerp'),
            'std' => '600',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => $title_weight
        ),
        array(
            'id' => '_lerp_input_underline',
            'label' => esc_html__('Input text underlined', 'lerp'),
            'desc' => esc_html__('Activate to style all the input text with the underline.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_style_block_title',
            'label' => '<i class="fa fa-menu"></i> ' . esc_html__('菜单', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_overlay_menu_style',
            'label' => esc_html__('Overlay menu skin', 'lerp'),
            'desc' => esc_html__('Specify the overlay menu skin.', 'lerp'),
            'std' => 'light',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'condition' => '_lerp_headers:is(menu-overlay),_lerp_headers:is(menu-overlay-center)',
            'operator' => 'or',
            'choices' => $stylesArrayMenu
        ),
        array(
            'id' => '_lerp_menu_color_hover',
            'label' => esc_html__('Menu highlight color', 'lerp'),
            'desc' => esc_html__('Specify the menu active and hover effect color (If not specified an opaque version of the menu color will be used).',
                'lerp'),
            'std' => '',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_primary_menu_style',
            'label' => esc_html__('Primary menu skin', 'lerp'),
            'desc' => esc_html__('Specify the primary menu skin.', 'lerp'),
            'std' => 'light',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'choices' => $stylesArrayMenu
        ),
        array(
            'id' => '_lerp_primary_submenu_style',
            'label' => esc_html__('Primary submenu skin', 'lerp'),
            'desc' => esc_html__('Specify the primary submenu skin.', 'lerp'),
            'std' => 'light',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'choices' => $stylesArrayMenu
        ),
        array(
            'id' => '_lerp_secondary_menu_style',
            'label' => esc_html__('Secondary menu skin', 'lerp'),
            'desc' => esc_html__('Specify the secondary menu skin.', 'lerp'),
            'std' => 'dark',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'condition' => '_lerp_headers:is(hmenu-right),_lerp_headers:is(hmenu-left),_lerp_headers:is(hmenu-justify),_lerp_headers:is(hmenu-center)',
            'operator' => 'or',
            'choices' => $stylesArrayMenu
        ),
        array(
            'id' => '_lerp_menu_font_size',
            'label' => esc_html__('Menu font size', 'lerp'),
            'desc' => esc_html__('Specify the menu font size. NB: the Overlay menu font size is automatic relative to the viewport.',
                'lerp'),
            'std' => '12',
            'type' => 'text',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_submenu_font_size',
            'label' => esc_html__('Submenu font size', 'lerp'),
            'desc' => esc_html__('Specify the submenu font size. NB: the Overlay submenu font size is automatic relative to the viewport.',
                'lerp'),
            'std' => '12',
            'type' => 'text',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_mobile_font_size',
            'label' => esc_html__('Mobile menu font size', 'lerp'),
            'desc' => esc_html__('Specify the menu font size for mobile.', 'lerp'),
            'std' => '12',
            'type' => 'text',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_font_family',
            'label' => esc_html__('Menu font family', 'lerp'),
            'desc' => esc_html__('Specify the menu font family.', 'lerp'),
            'std' => 'font-762333',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => $custom_fonts
        ),
        array(
            'id' => '_lerp_menu_font_weight',
            'label' => esc_html__('Menu font weight', 'lerp'),
            'desc' => esc_html__('Specify the menu font weight.', 'lerp'),
            'std' => '600',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => $title_weight
        ),
        array(
            'id' => '_lerp_menu_first_uppercase',
            'label' => esc_html__('Menu first level uppercase', 'lerp'),
            'desc' => esc_html__('Activate to transform the first menu level to uppercase.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_menu_other_uppercase',
            'label' => esc_html__('Menu other levels uppercase', 'lerp'),
            'desc' => esc_html__('Activate to transform all the others menu level to uppercase.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_custom_content_block_title',
            'label' => '<i class="fa fa-layout"></i> ' . esc_html__('Content', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_general_style',
            'label' => esc_html__('Skin', 'lerp'),
            'desc' => esc_html__('Specify the content skin.', 'lerp'),
            'std' => 'light',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'condition' => '',
            'operator' => 'and',
            'choices' => array(
                array(
                    'value' => 'light',
                    'label' => esc_html__('Light', 'lerp'),
                    'src' => ''
                ),
                array(
                    'value' => 'dark',
                    'label' => esc_html__('Dark', 'lerp'),
                    'src' => ''
                )
            )
        ),
        array(
            'id' => '_lerp_general_bg_color',
            'label' => esc_html__('Background color', 'lerp'),
            'desc' => esc_html__('Specify a custom content background color.', 'lerp'),
            'std' => '',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_custom_buttons_block_title',
            'label' => '<i class="fa fa-download3"></i> ' . esc_html__('Buttons and Forms', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_buttons_font_family',
            'label' => esc_html__('Buttons font family', 'lerp'),
            'desc' => esc_html__('Specify the buttons font family.', 'lerp'),
            'std' => 'font-762333',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => $custom_fonts
        ),
        array(
            'id' => '_lerp_buttons_font_weight',
            'label' => esc_html__('Buttons font weight', 'lerp'),
            'desc' => esc_html__('Specify the buttons font weight.', 'lerp'),
            'std' => '600',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => $title_weight
        ),
        array(
            'id' => '_lerp_buttons_text_transform',
            'label' => esc_html__('Buttons text transform', 'lerp'),
            'desc' => esc_html__('Specify the buttons text transform.', 'lerp'),
            'std' => 'uppercase',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => array(
                array(
                    'value' => 'initial',
                    'label' => esc_html__('Default', 'lerp'),
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
        ),
        array(
            'id' => '_lerp_buttons_letter_spacing',
            'label' => esc_html__('Buttons letter spacing', 'lerp'),
            'desc' => esc_html__('Specify the letter spacing value.', 'lerp'),
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'operator' => 'or',
            'choices' => $btn_letter_spacing,
        ),
        array(
            'id' => '_lerp_buttons_border_width',
            'label' => esc_html__('Button and form fields border', 'lerp'),
            'desc' => esc_html__('Specify the width of the borders for buttons and form fields', 'lerp'),
            'std' => '1',
            'type' => 'numeric-slider',
            'min_max_step' => '1,5,1',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_button_hover',
            'label' => esc_html__('Button hover effect', 'lerp'),
            'desc' => esc_html__('Specify an effect on hover state.', 'lerp'),
            'std' => '',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'choices' => array(
                array(
                    'value' => '',
                    'label' => esc_html__('Outlined', 'lerp')
                ),
                array(
                    'value' => 'full-colored',
                    'label' => esc_html__('Flat', 'lerp')
                )
            )
        ),
        array(
            'id' => '_lerp_footer_style_block_title',
            'label' => '<i class="fa fa-ellipsis"></i> ' . esc_html__('Footer', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_footer_last_style',
            'label' => esc_html__('Copyright area skin', 'lerp'),
            'desc' => esc_html__('Specify the copyright area skin color.', 'lerp'),
            'std' => 'dark',
            'type' => 'select',
            'section' => 'lerp_customize_section',
            'condition' => '',
            'operator' => 'and',
            'choices' => $stylesArrayMenu
        ),
        array(
            'id' => '_lerp_footer_bg_color',
            'label' => esc_html__('Copyright area custom background color', 'lerp'),
            'desc' => esc_html__('Specify a custom copyright area background color.', 'lerp'),
            'std' => '',
            'type' => 'lerp_color',
            'section' => 'lerp_customize_section',
        ),
        array(
            'id' => '_lerp_customize_extra_block_title',
            'label' => '<i class="fa fa-download3"></i> ' . esc_html__('Scroll & Parallax', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_extra_section',
        ),
        array(
            'id' => '_lerp_smooth_scroller',
            'label' => esc_html__('Smooth scroller', 'lerp'),
            'desc' => esc_html__('Activate the enhanced smooth scroller.', 'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_extra_section',
        ),
        array(
            'id' => '_lerp_scroll_constant',
            'label' => esc_html__('ScrollTo constant speed', 'lerp'),
            'desc' => esc_html__('Activate this to always have a constant speed when scrolling to point.', 'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_extra_section',
        ),
        array(
            'id' => '_lerp_scroll_constant_factor',
            'label' => esc_html__('ScrollTo constant speed factor', 'lerp'),
            'desc' => esc_html__('Adjust the constant scroll speed factor. Default 2', 'lerp'),
            'std' => '2',
            'type' => 'numeric-slider',
            'min_max_step' => '1,15,0.25',
            'section' => 'lerp_extra_section',
            'operator' => 'or',
            'condition' => '_lerp_scroll_constant:is(on)',
        ),
        array(
            'id' => '_lerp_scroll_speed_value',
            'label' => esc_html__('ScrollTo speed fixed', 'lerp'),
            'desc' => esc_html__('Specify the scroll speed time in milliseconds.', 'lerp'),
            'std' => '1000',
            'type' => 'text',
            'section' => 'lerp_extra_section',
            'operator' => 'or',
            'condition' => '_lerp_scroll_constant:is(off)',
        ),
        array(
            'id' => '_lerp_parallax_factor',
            'label' => esc_html__('Parallax speed factor', 'lerp'),
            'desc' => esc_html__('Adjust the parallax speed factor. Default 2.5', 'lerp'),
            'std' => '2.5',
            'type' => 'numeric-slider',
            'min_max_step' => '0.5,3,0.5',
            'section' => 'lerp_extra_section',
        ),
        array(
            'id' => '_lerp_custom_portfolio_block_title',
            'label' => '<i class="fa fa-briefcase3"></i> ' . ucfirst($portfolio_cpt_name) . ' ' . esc_html__('CPT',
                    'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_extra_section',
        ),
        array(
            'id' => '_lerp_portfolio_cpt',
            'label' => ucfirst($portfolio_cpt_name) . ' ' . esc_html__('CPT label', 'lerp'),
            'desc' => esc_html__('Enter a custom portfolio post type label.', 'lerp'),
            'std' => 'portfolio',
            'type' => 'text',
            'section' => 'lerp_extra_section',
        ),
        array(
            'id' => '_lerp_portfolio_cpt_slug',
            'label' => ucfirst($portfolio_cpt_name) . ' ' . esc_html__('CPT slug', 'lerp'),
            'desc' => esc_html__('Enter a custom portfolio post type slug.', 'lerp'),
            'std' => 'portfolio',
            'type' => 'text',
            'section' => 'lerp_extra_section',
        )
    );

    if ( class_exists('WooCommerce') ) {

        $custom_settings_three[] = array(
            'id' => '_lerp_woocommerce_block_title',
            'label' => '<i class="fa fa-shopping-cart"></i> ' . esc_html__('WooCommerce', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_extra_section',
        );

        $custom_settings_three[] = array(
            'id' => '_lerp_woocommerce_cart_icon',
            'label' => esc_html__('Cart icon', 'lerp'),
            'desc' => esc_html__('Specify the cart icon', 'lerp'),
            'std' => 'fa fa-bag',
            'type' => 'text',
            'class' => 'button_icon_container',
            'section' => 'lerp_extra_section',
        );

        $custom_settings_three[] = array(
            'id' => '_lerp_woocommerce_hooks',
            'label' => esc_html__('Enable Hooks', 'lerp'),
            'desc' => esc_html__('Activate this to enable default WooCommerce hooks on product loops.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_extra_section',
            'condition' => '',
            'operator' => 'and'
        );
    }

    $custom_settings_four = array(
        array(
            'id' => '_lerp_customize_admin_block_title',
            'label' => '<i class="fa fa-dashboard"></i> ' . esc_html__('Admin', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_extra_section',
        ),
        array(
            'id' => '_lerp_admin_help',
            'label' => esc_html__('Help button in admin bar', 'lerp'),
            'desc' => esc_html__('Activate to show the Lerp help button in the WP admin bar.', 'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_extra_section',
        ),
        array(
            'id' => '_lerp_footer_layout_block_title',
            'label' => '<i class="fa fa-layers"></i> ' . esc_html__('布局', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_footer_section',
        ),
        array(
            'id' => '_lerp_footer_full',
            'label' => esc_html__('全宽页脚', 'lerp'),
            'desc' => esc_html__('将页脚展开为全宽度。', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_footer_section',
            'condition' => '_lerp_boxed:is(off)',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_footer_content_block_title',
            'label' => '<i class="fa fa-cog2"></i> ' . esc_html__('小工具', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_footer_section',
        ),
        array(
            'id' => '_lerp_footer_block',
            'label' => esc_html__('内容块', 'lerp'),
            'desc' => esc_html__('指定要用作页脚内容的内容块。', 'lerp'),
            'std' => '',
            'type' => 'custom-post-type-select',
            'section' => 'lerp_footer_section',
            'post_type' => 'lerpblock',
            'condition' => '',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_footer_last_block_title',
            'label' => '<i class="fa fa-copyright"></i> ' . esc_html__('版权', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_footer_section',
        ),
        array(
            'id' => '_lerp_footer_copyright',
            'label' => esc_html__('自动版权文本', 'lerp'),
            'desc' => esc_html__('激活以使用自动版权文本。', 'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_footer_section',
        ),
        array(
            'id' => '_lerp_footer_text',
            'label' => esc_html__('自定义版权文本', 'lerp'),
            'desc' => esc_html__('插入页脚版权区域的自定义文本。', 'lerp'),
            'type' => 'textarea',
            'section' => 'lerp_footer_section',
            'operator' => 'or',
            'condition' => '_lerp_footer_copyright:is(off)',
        ),
        array(
            'id' => '_lerp_footer_position',
            'label' => esc_html__('内容对齐', 'lerp'),
            'desc' => esc_html__('指定页脚版权文本对齐。', 'lerp'),
            'std' => 'left',
            'type' => 'select',
            'section' => 'lerp_footer_section',
            'choices' => array(
                array(
                    'value' => 'left',
                    'label' => esc_html__('Left', 'lerp')
                ),
                array(
                    'value' => 'center',
                    'label' => esc_html__('Center', 'lerp')
                ),
                array(
                    'value' => 'right',
                    'label' => esc_html__('Right', 'lerp')
                )
            )
        ),
        array(
            'id' => '_lerp_footer_social',
            'label' => esc_html__('Social links', 'lerp'),
            'desc' => esc_html__('Activate to have the social icons in the footer copyright area.', 'lerp'),
            'type' => 'on-off',
            'section' => 'lerp_footer_section',
        ),
        array(
            'id' => '_lerp_footer_add_block_title',
            'label' => '<i class="fa fa-square-plus"></i> ' . esc_html__('Additionals', 'lerp'),
            'type' => 'textblock-titled',
            'class' => 'section-title',
            'section' => 'lerp_footer_section',
        ),
        array(
            'id' => '_lerp_footer_uparrow',
            'label' => esc_html__('Scroll up button', 'lerp'),
            'desc' => esc_html__('Activate to add a scroll up button in the footer.', 'lerp'),
            'type' => 'on-off',
            'std' => 'on',
            'section' => 'lerp_footer_section',
        ),
        array(
            'id' => '_lerp_footer_uparrow_mobile',
            'label' => esc_html__('Scroll up button on mobile', 'lerp'),
            'desc' => esc_html__('Activate to add a scroll up button in the footer for mobile devices.', 'lerp'),
            'type' => 'on-off',
            'std' => 'on',
            'condition' => '_lerp_footer_uparrow:is(on)',
            'operator' => 'and',
            'section' => 'lerp_footer_section',
        ),
        array(
            'id' => '_lerp_social_list',
            'label' => esc_html__('Social Networks', 'lerp'),
            'desc' => esc_html__('Define here all the social networks you will need.', 'lerp'),
            'type' => 'list-item',
            'section' => 'lerp_connections_section',
            'class' => 'list-social',
            'settings' => array(
                array(
                    'id' => '_lerp_social_unique_id',
                    'class' => 'unique_id',
                    'std' => 'social-',
                    'type' => 'text',
                    'label' => esc_html__('Unique social ID', 'lerp'),
                    'desc' => esc_html__('This value is created automatically and it shouldn\'t be edited unless you know what you are doing.',
                        'lerp'),
                ),
                array(
                    'id' => '_lerp_social',
                    'label' => esc_html__('Social Network Icon', 'lerp'),
                    'desc' => esc_html__('Specify the social network icon.', 'lerp'),
                    'type' => 'text',
                    'class' => 'button_icon_container',
                ),
                array(
                    'id' => '_lerp_link',
                    'label' => esc_html__('Social Network Link', 'lerp'),
                    'desc' => esc_html__('Enter your social network link.', 'lerp'),
                    'std' => '',
                    'type' => 'text',
                    'condition' => '',
                    'operator' => 'and'
                ),
                array(
                    'id' => '_lerp_menu_hidden',
                    'label' => esc_html__('Hide In The Menu', 'lerp'),
                    'desc' => esc_html__('Activate to hide the social icon in the menu (if the social connections in the menu is active).',
                        'lerp'),
                    'std' => 'off',
                    'type' => 'on-off',
                    'condition' => '',
                    'operator' => 'and'
                ),
            )
        ),
        array(
            'id' => '_lerp_gmaps_api',
            'label' => esc_html__('Google Maps API KEY', 'lerp'),
            'desc' => sprintf(wp_kses(__('To use Lerp custom styled Google Maps you need to create <a href="%s" target="_blank">here the Google API KEY</a> and paste it in this field.',
                'lerp'),
                array('a' => array('href' => array(), 'target' => array()))),
                'https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key'),
            'type' => 'text',
            'section' => 'lerp_gmaps_section',
        ),
        array(
            'id' => '_lerp_custom_css',
            'label' => esc_html__('CSS', 'lerp'),
            'desc' => esc_html__('Enter here your custom CSS.', 'lerp'),
            'std' => '',
            'type' => 'css',
            'section' => 'lerp_cssjs_section',
            'rows' => '20',
            'condition' => '',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_custom_js',
            'label' => esc_html__('Javascript', 'lerp'),
            'desc' => esc_html__('Enter here your custom Javacript code.', 'lerp'),
            'std' => '',
            'type' => 'textarea-simple',
            'section' => 'lerp_cssjs_section',
            'rows' => '20',
            'condition' => '',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_adaptive',
            'label' => esc_html__('Adaptive images', 'lerp'),
            'desc' => esc_html__('Activate to take advantage of the Adaptive Images system. Adaptive Images detects your visitor\'s screen size and automatically delivers device appropriate re-scaled images.',
                'lerp'),
            'std' => 'on',
            'type' => 'on-off',
            'section' => 'lerp_performance_section',
            'condition' => '',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_adaptive_async',
            'label' => esc_html__('Asynchronous adaptive image system', 'lerp'),
            'desc' => esc_html__('Activate to load the adaptive images asynchronously, this will improve the loading performance and it\'s necessary if using an aggresive caching system.',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_performance_section',
            'operator' => 'or',
            'condition' => '_lerp_adaptive:is(on)',
        ),
        array(
            'id' => '_lerp_adaptive_async_blur',
            'label' => esc_html__('Asynchronous loading blur effect', 'lerp'),
            'desc' => esc_html__('Activate to use a bluring effect when loading the images.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_performance_section',
            'operator' => 'and',
            'condition' => '_lerp_adaptive:is(on),_lerp_adaptive_async:is(on)',
        ),
        array(
            'id' => '_lerp_adaptive_mobile_advanced',
            'label' => esc_html__('Mobile settings', 'lerp'),
            'desc' => esc_html__('Activate to set specific mobile options.', 'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_performance_section',
            'operator' => 'or',
            'condition' => '_lerp_adaptive:is(on)',
        ),
        array(
            'id' => '_lerp_adaptive_use_orientation_width',
            'label' => esc_html__('Use current mobile orientation width', 'lerp'),
            'desc' => esc_html__('Activate to use the current mobile orientation width (portrait or landscape) instead of the max device\'s width (landscape).',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_performance_section',
            'operator' => 'and',
            'condition' => '_lerp_adaptive:is(on),_lerp_adaptive_mobile_advanced:is(on)',
        ),
        array(
            'id' => '_lerp_adaptive_limit_density',
            'label' => esc_html__('Limit device density', 'lerp'),
            'desc' => esc_html__('Activate to limit the pixel density to 2 when generating the most appropriate image for high pixel density displays.',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_performance_section',
            'operator' => 'and',
            'condition' => '_lerp_adaptive:is(on),_lerp_adaptive_mobile_advanced:is(on)',
        ),
        array(
            'id' => '_lerp_adaptive_quality',
            'label' => esc_html__('Image quality', 'lerp'),
            'desc' => esc_html__('Adjust the images compression quality.', 'lerp'),
            'std' => '90',
            'type' => 'numeric-slider',
            'min_max_step' => '60,100,1',
            'section' => 'lerp_performance_section',
            'operator' => 'or',
            'condition' => '_lerp_adaptive:is(on)',
        ),
        array(
            'id' => '_lerp_adaptive_sizes',
            'label' => esc_html__('Image sizes range', 'lerp'),
            'desc' => esc_html__('Enter all the image sizes you want use for the Adaptive Images system. NB. The values needs to be comma separated.',
                'lerp'),
            'type' => 'text',
            'std' => '258,516,720,1032,1440,2064,2880',
            'section' => 'lerp_performance_section',
            'operator' => 'or',
            'condition' => '_lerp_adaptive:is(on)',
        ),
        array(
            'id' => '_lerp_htaccess',
            'label' => esc_html__('Apache Server Configs', 'lerp'),
            'desc' => esc_html__('Activate the enhanced .htaccess, this will improve the web site\'s performance and security.',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_performance_section',
            'condition' => '',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_production',
            'label' => esc_html__('Production mode', 'lerp'),
            'desc' => esc_html__('Activate this to switch to production mode, the CSS and JS will be cached by the browser and the JS minified.',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_performance_section',
            'condition' => '',
            'operator' => 'and'
        ),
        array(
            'id' => '_lerp_redirect',
            'label' => esc_html__('Activate page redirect', 'lerp'),
            'desc' => esc_html__('Activate to redirect all the website calls to a specific page. NB. This can only be visible when the user is not logged in.',
                'lerp'),
            'std' => 'off',
            'type' => 'on-off',
            'section' => 'lerp_redirect_section',
        ),
        array(
            'id' => '_lerp_redirect_page',
            'label' => esc_html__('Redirect page', 'lerp'),
            'desc' => esc_html__('Specify the redirect page. NB. This page will be presented without menu and footer.',
                'lerp'),
            'type' => 'page_select',
            'section' => 'lerp_redirect_section',
            'post_type' => 'page',
            'condition' => '_lerp_redirect:is(on)',
            'operator' => 'and'
        ),
    );

    $custom_settings_one = array_merge($custom_settings_one, $custom_settings_three);
    $custom_settings_one = array_merge($custom_settings_one, $custom_settings_four);

    $custom_settings = array(
        'sections' => $custom_settings_section_one,
        'settings' => $custom_settings_one,
    );

    if ( class_exists('WooCommerce') ) {

        $woo_section = array(
            // array(
            // 	'id' => 'lerp_woocommerce_section',
            // 	'title' => '<i class="fa fa-shopping-cart"></i> ' . esc_html__('WooCommerce', 'lerp')
            // ),
            array(
                'id' => 'lerp_product_section',
                'title' => '<span class="smaller"><i class="fa fa-paper"></i> ' . esc_html__('Product',
                        'lerp') . '</span>',
                'group' => esc_html__('Single', 'lerp'),
            ),
            array(
                'id' => 'lerp_product_index_section',
                'title' => '<span class="smaller"><i class="fa fa-archive2"></i> ' . esc_html__('Products',
                        'lerp') . '</span>',
                'group' => esc_html__('Archives', 'lerp'),
            ),
        );

        $menus_array[] = array(
            'value' => '',
            'label' => esc_html__('Select…', 'lerp')
        );
        $menu_array = array();
        $nav_menus = get_registered_nav_menus();

        foreach ( $nav_menus as $location => $description ) {

            $menu_array['value'] = $location;
            $menu_array['label'] = $description;
            $menus_array[] = $menu_array;
        }

        $menus_array[] = array(
            'value' => 'social',
            'label' => esc_html__('Social Menu', 'lerp')
        );

        $woocommerce_post = array(
            /////////////////////////
            //  Product Single		///
            /////////////////////////
            str_replace('%section%', 'product', $menu_section_title),
            str_replace('%section%', 'product', $menu),
            str_replace('%section%', 'product', $menu_width),
            str_replace('%section%', 'product', $menu_opaque),
            str_replace('%section%', 'product', $header_section_title),
            str_replace('%section%', 'product', $header_type),
            str_replace('%section%', 'product', $header_lerp_block),
            str_replace('%section%', 'product', $header_revslider),
            str_replace('%section%', 'product', $header_layerslider),

            str_replace('%section%', 'product', $header_width),
            str_replace('%section%', 'product', $header_height),
            str_replace('%section%', 'product', $header_min_height),
            str_replace('%section%', 'product', $header_title),
            str_replace('%section%', 'product', $header_style),
            str_replace('%section%', 'product', $header_content_width),
            str_replace('%section%', 'product', $header_custom_width),
            str_replace('%section%', 'product', $header_align),
            str_replace('%section%', 'product', $header_position),
            str_replace('%section%', 'product', $header_title_font),
            str_replace('%section%', 'product', $header_title_size),
            str_replace('%section%', 'product', $header_title_height),
            str_replace('%section%', 'product', $header_title_spacing),
            str_replace('%section%', 'product', $header_title_weight),
            str_replace('%section%', 'product', $header_title_transform),
            str_replace('%section%', 'product', $header_title_italic),
            str_replace('%section%', 'product', $header_text_animation),
            str_replace('%section%', 'product', $header_animation_speed),
            str_replace('%section%', 'product', $header_animation_delay),
            str_replace('%section%', 'product', $header_featured),
            str_replace('%section%', 'product', $header_background),
            str_replace('%section%', 'product', $header_parallax),
            str_replace('%section%', 'product', $header_kburns),
            str_replace('%section%', 'product', $header_overlay_color),
            str_replace('%section%', 'product', $header_overlay_color_alpha),
            str_replace('%section%', 'product', $header_scroll_opacity),
            str_replace('%section%', 'product', $header_scrolldown),

            str_replace('%section%', 'product', $body_section_title),
            str_replace('%section%', 'product', $body_layout_width),
            str_replace('%section%', 'product', $body_layout_width_custom),
            str_replace('%section%', 'product', $show_breadcrumb),
            str_replace('%section%', 'product', $breadcrumb_align),
            str_replace('%section%', 'product', $show_title),
            str_replace('%section%', 'product', $show_share),
            str_replace('%section%', 'product', $image_layout),
            str_replace('%section%', 'product', $media_size),
            str_replace('%section%', 'product', $enable_sticky_desc),
            str_replace('%section%', 'product', $enable_woo_zoom),
            str_replace('%section%', 'product', $thumb_cols),
            str_replace('%section%', 'product', $enable_woo_slider),
            str_replace('%section%', 'product', $body_lerp_block_after),
            str_replace('%section%', 'product', $navigation_section_title),
            str_replace('%section%', 'product', $navigation_activate),
            str_replace('%section%', 'product', $navigation_page_index),
            str_replace('%section%', 'product', $navigation_index_label),
            str_replace('%section%', 'product', $navigation_nextprev_title),
            str_replace('%section%', 'product', $footer_section_title),
            str_replace('%section%', 'product', $footer_lerp_block),
            str_replace('%section%', 'product', $footer_width),
            str_replace('%section%', 'product', $custom_fields_section_title),
            str_replace('%section%', 'product', $custom_fields_list),
            /////////////////////////
            //  Products Index		///
            /////////////////////////
            str_replace('%section%', 'product_index', $menu_section_title),
            str_replace('%section%', 'product_index', $menu),
            str_replace('%section%', 'product_index', $menu_width),
            str_replace('%section%', 'product_index', $menu_opaque),
            str_replace('%section%', 'product_index', $header_section_title),
            str_replace('%section%', 'product_index', run_array_to($header_type, 'std', 'header_basic')),
            str_replace('%section%', 'product_index', $header_lerp_block),
            str_replace('%section%', 'product_index', $header_revslider),
            str_replace('%section%', 'product_index', $header_layerslider),

            str_replace('%section%', 'product_index', $header_width),
            str_replace('%section%', 'product_index', $header_height),
            str_replace('%section%', 'product_index', $header_min_height),
            str_replace('%section%', 'product_index', $header_title),
            str_replace('%section%', 'product_index', $header_style),
            str_replace('%section%', 'product_index', $header_content_width),
            str_replace('%section%', 'product_index', $header_custom_width),
            str_replace('%section%', 'product_index', $header_align),
            str_replace('%section%', 'product_index', $header_position),
            str_replace('%section%', 'product_index', $header_title_font),
            str_replace('%section%', 'product_index', $header_title_size),
            str_replace('%section%', 'product_index', $header_title_height),
            str_replace('%section%', 'product_index', $header_title_spacing),
            str_replace('%section%', 'product_index', $header_title_weight),
            str_replace('%section%', 'product_index', $header_title_transform),
            str_replace('%section%', 'product_index', $header_title_italic),
            str_replace('%section%', 'product_index', $header_text_animation),
            str_replace('%section%', 'product_index', $header_animation_speed),
            str_replace('%section%', 'product_index', $header_animation_delay),
            str_replace('%section%', 'product_index', $header_featured),
            str_replace('%section%', 'product_index', $header_background),
            str_replace('%section%', 'product_index', $header_parallax),
            str_replace('%section%', 'product_index', $header_kburns),
            str_replace('%section%', 'product_index', $header_overlay_color),
            str_replace('%section%', 'product_index', $header_overlay_color_alpha),
            str_replace('%section%', 'product_index', $header_scroll_opacity),
            str_replace('%section%', 'product_index', $header_scrolldown),
            str_replace('%section%', 'product_index', $menu_no_padding),
            str_replace('%section%', 'product_index', $menu_no_padding_mobile),

            str_replace('%section%', 'product_index', $body_section_title),
            str_replace('%section%', 'product_index', $show_breadcrumb),
            str_replace('%section%', 'product_index', $breadcrumb_align),
            str_replace('%section%', 'product_index', $body_lerp_block),
            str_replace('%section%', 'product_index', $body_layout_width),
            str_replace('%section%', 'product_index', $body_single_post_width),
            str_replace('%section%', 'product_index', $show_title),
            str_replace('%section%', 'product_index', $sidebar_section_title),
            str_replace('%section%', 'product_index', run_array_to($sidebar_activate, 'std', 'on')),
            str_replace('%section%', 'product_index', $sidebar_widget),
            str_replace('%section%', 'product_index', $sidebar_position),
            str_replace('%section%', 'product_index', $sidebar_size),
            str_replace('%section%', 'product_index', $sidebar_sticky),
            str_replace('%section%', 'product_index', $sidebar_style),
            str_replace('%section%', 'product_index', $sidebar_bgcolor),
            str_replace('%section%', 'product_index', $sidebar_fill),
            str_replace('%section%', 'product_index', $footer_section_title),
            str_replace('%section%', 'product_index', $footer_lerp_block),
            str_replace('%section%', 'product_index', $footer_width),
        );

        $custom_settings['sections'] = array_merge($custom_settings['sections'], $woo_section);
        // array_push($custom_settings['settings'], $woocommerce_cart_icon);
        // array_push($custom_settings['settings'], $woocommerce_hooks);
        $custom_settings['settings'] = array_merge($custom_settings['settings'], $woocommerce_post);

    }

    $custom_settings['settings'] = array_filter($custom_settings['settings'], 'lerp_is_not_null');

    /* allow settings to be filtered before saving */
    $custom_settings = apply_filters(ot_settings_id() . '_args', $custom_settings);

    /* settings are not the same update the DB */
    if ( $saved_settings !== $custom_settings ) {
        update_option(ot_settings_id(), $custom_settings);
    }

    /**
     * Filter on layout images.
     */
    function filter_layout_radio_images($array, $layout)
    {

        /* only run the filter where the field ID is my_radio_images */
        if ( $layout == '_lerp_headers' ) {
            $array = array(
                array(
                    'value' => 'hmenu-right',
                    'label' => esc_html__('Right', 'lerp'),
                    'src' => get_template_directory_uri() . '/assets/images/layout/hmenu-right.jpg'
                ),
                array(
                    'value' => 'hmenu-justify',
                    'label' => esc_html__('Justify', 'lerp'),
                    'src' => get_template_directory_uri() . '/assets/images/layout/hmenu-justify.jpg'
                ),
                array(
                    'value' => 'hmenu-left',
                    'label' => esc_html__('Left', 'lerp'),
                    'src' => get_template_directory_uri() . '/assets/images/layout/hmenu-left.jpg'
                ),
                array(
                    'value' => 'hmenu-center',
                    'label' => esc_html__('Center', 'lerp'),
                    'src' => get_template_directory_uri() . '/assets/images/layout/hmenu-center.jpg'
                ),
                array(
                    'value' => 'hmenu-center-split',
                    'label' => esc_html__('Center Split', 'lerp'),
                    'src' => get_template_directory_uri() . '/assets/images/layout/hmenu-splitted.jpg'
                ),
                array(
                    'value' => 'vmenu',
                    'label' => esc_html__('Lateral', 'lerp'),
                    'src' => get_template_directory_uri() . '/assets/images/layout/vmenu.jpg'
                ),
                array(
                    'value' => 'vmenu-offcanvas',
                    'label' => esc_html__('Offcanvas', 'lerp'),
                    'src' => get_template_directory_uri() . '/assets/images/layout/offcanvas.jpg'
                ),
                array(
                    'value' => 'menu-overlay',
                    'label' => esc_html__('Overlay', 'lerp'),
                    'src' => get_template_directory_uri() . '/assets/images/layout/overlay.jpg'
                ),
                array(
                    'value' => 'menu-overlay-center',
                    'label' => esc_html__('Overlay Center', 'lerp'),
                    'src' => get_template_directory_uri() . '/assets/images/layout/overlay-center.jpg'
                ),
            );
        }
        return $array;
    }

    add_filter('ot_radio_images', 'filter_layout_radio_images', 10, 2);
}
