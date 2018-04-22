<?php

/**
 * Initialize the Lerp Meta Boxes.
 */

function lerp_page_options()
{

    /*
    * Init vars
    */

    global $wpdb;

    $portfolio_cpt_name = ot_get_option('_lerp_portfolio_cpt');
    if ( $portfolio_cpt_name == '' ) $portfolio_cpt_name = 'portfolio';

    $fp_post_types = apply_filters('lerp_fullpage_post_types', array('page', 'portfolio', 'post'));

    $post_type = lerp_get_current_post_type();
    $lerp_post_types = lerp_get_post_types(true);

    $fields = array();

    function run_array_mb($array, $condition = '', $parent = '')
    {
        if ( $array === null || $array === '' ) return false;
        $array['condition'] = $condition;
        $array['parent'] = $parent;
        return $array;
    }

    //////////////////////////
    //  General specific   ///
    //////////////////////////

    $specific_body_background = array(
        'id' => '_lerp_specific_body_background',
        'label' => esc_html__('HTML Body background', 'lerp'),
        'desc' => esc_html__('Specify the HTML body background color and media. The background is visible if you have Content > Background Color set to transparent or a Boxed layout.',
            'lerp'),
        'type' => 'background',
        'section' => 'lerp_general_section',
    );

    $general_fields = array(
        array(
            'label' => '<i class="fa fa-globe3 fa-fw"></i> ' . esc_html__('基本', 'lerp'),
            'id' => '_lerp_general_tab',
            'type' => 'tab',
        ),
        run_array_mb($specific_body_background),
    );

    $fields = array_merge($fields, $general_fields);

    ///////////////////////
    //  Menu specific   ///
    ///////////////////////

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

    $specific_menu = array(
        'id' => '_lerp_specific_menu',
        'label' => esc_html__('菜单', 'lerp'),
        'desc' => esc_html__('Override the menu.', 'lerp'),
        'type' => 'select',
        'choices' => $menus_array
    );

    $specific_menu_width = array(
        'id' => '_lerp_specific_menu_width',
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
    );

    $menu_opaque = array(
        'id' => '_lerp_specific_menu_opaque',
        'label' => esc_html__('Remove transparency', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Override to remove the transparency eventually declared in \'Customize -> Light/Dark skin\'.',
            'lerp'),
        'std' => 'off',
    );

    $menu_no_shadow = array(
        'id' => '_lerp_specific_menu_no_shadow',
        'label' => esc_html__('Remove shadow', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Override to remove the shadow eventually declared in \'Menu -> Visuals\'.', 'lerp'),
        'std' => 'off',
    );

    $menu_no_padding = array(
        'id' => '_lerp_menu_no_padding',
        'label' => esc_html__('Remove menu content padding', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Remove the additional menu padding in the header.', 'lerp'),
        'std' => 'off',
    );

    $menu_no_padding_mobile = array(
        'id' => '_lerp_menu_no_padding_mobile',
        'label' => esc_html__('Remove menu content padding on mobile', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Remove the additional menu padding in the header on mobile.', 'lerp'),
        'std' => 'off',
    );

    $menu_fields = array(
        array(
            'label' => '<i class="fa fa-menu fa-fw"></i> ' . esc_html__('菜单', 'lerp'),
            'id' => '_lerp_menu_tab',
            'type' => 'tab',
        ),
        run_array_mb($specific_menu),
        run_array_mb($specific_menu_width),
        run_array_mb($menu_opaque),
        run_array_mb($menu_no_shadow),
    );

    $fields = array_merge($fields, $menu_fields);

    /////////////////////////
    //  Header specific   ///
    /////////////////////////

    if ( is_plugin_active('lerp-core/lerp-core.php') ) {

        $lerpblock = array(
            'value' => 'header_lerpblock',
            'label' => esc_html__('Content Block', 'lerp'),
        );

        $ubq = $wpdb->get_results("SELECT id, post_title FROM " . $wpdb->prefix . "posts WHERE post_type = 'lerpblock' AND post_status = 'publish' ORDER BY post_title ASC LIMIT 9999");
        $lerpblocks = array();
        if ( $ubq ) {
            foreach ( $ubq as $block ) {
                $lerpblocks[] = array(
                    'value' => $block->id,
                    'label' => $block->post_title,
                    'postlink' => get_edit_post_link($block->id),
                );
            }
        } else {
            $lerpblocks[] = array(
                'value' => '',
                'label' => esc_html__('No Content Blocks found', 'lerp')
            );
        }

        $lerpblocks_extended = array_merge(
            array(
                array(
                    'value' => '',
                    'label' => esc_html__('Inherit', 'lerp')
                ),
                array(
                    'value' => 'none',
                    'label' => esc_html__('None', 'lerp')
                )
            ),
            $lerpblocks);

    } else {
        $lerpblock = '';
        $lerpblocks_extended = '';
    }

    $revslider = $revsliders = '';

    $layerslider = $layersliders = '';

    $header_type = array(
        'id' => '_lerp_header_type',
        'label' => esc_html__('Type', 'lerp'),
        'desc' => esc_html__('Override the header type.', 'lerp'),
        'std' => '',
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'header_basic',
                'label' => esc_html__('Basic', 'lerp'),
            ),
            $lerpblock,
            $revslider,
            $layerslider,
            array(
                'value' => 'none',
                'label' => esc_html__('None', 'lerp'),
            ),
        )
    );

    if ( is_plugin_active('lerp-core/lerp-core.php') ) {

        $header_blocks_list = array(
            'id' => '_lerp_blocks_list',
            'label' => esc_html__('Content Block', 'lerp'),
            'desc' => esc_html__('Specify the Content Block.', 'lerp'),
            'type' => 'select',
            'operator' => 'or',
            'choices' => $lerpblocks
        );

    } else {
        $header_blocks_list = null;
    }

    $header_revslider_list = array(
        'id' => '_lerp_revslider_list',
        'label' => esc_html__('Revslider', 'lerp'),
        'desc' => esc_html__('Specify the Revolution Slider.', 'lerp'),
        'type' => 'select',
        'operator' => 'or',
        'choices' => $revsliders
    );

    $header_layerslider_list = array(
        'id' => '_lerp_layerslider_list',
        'label' => esc_html__('LayerSlider', 'lerp'),
        'desc' => esc_html__('Specify the LayerSlider.', 'lerp'),
        'type' => 'select',
        'operator' => 'or',
        'choices' => $layersliders
    );

    $header_full_width = array(
        'id' => '_lerp_header_full_width',
        'label' => esc_html__('Container full width', 'lerp'),
        'std' => 'on',
        'type' => 'on-off',
        'desc' => esc_html__('Activate to expand the header container to full width.', 'lerp'),
        'operator' => 'or',
        'condition' => '',
    );

    $header_content_width = array(
        'id' => '_lerp_header_content_width',
        'label' => esc_html__('Content full width', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Activate to expand the header content to full width.', 'lerp'),
        'std' => 'off',
        'condition' => '',
        'operator' => 'or',
    );

    $header_custom_width = array(
        'id' => '_lerp_header_custom_width',
        'label' => esc_html__('Custom inner width', 'lerp'),
        'desc' => esc_html__('Adjust the inner content width in %.', 'lerp'),
        'std' => '100',
        'type' => 'numeric-slider',
        'min_max_step' => '0,100,1',
        'condition' => '',
        'operator' => 'or'
    );

    $header_align = array(
        'id' => '_lerp_header_align',
        'label' => esc_html__('Content alignment', 'lerp'),
        'desc' => esc_html__('Specify the text/content alignment.', 'lerp'),
        'type' => 'select',
        'condition' => '',
        'operator' => 'or',
        'std' => 'align_center',
        'choices' => array(
            array(
                'value' => 'left',
                'label' => esc_html__('Left', "lerp"),
            ),
            array(
                'value' => 'center',
                'label' => esc_html__('Center', "lerp"),
            ),
            array(
                'value' => 'right',
                'label' => esc_html__('Right', "lerp"),
            ),
        )
    );

    $header_height = array(
        'id' => '_lerp_header_height',
        'label' => esc_html__('Height', 'lerp'),
        'desc' => esc_html__('Define the height of the header in px or in % (relative to the window height).', 'lerp'),
        'std' => array(
            '50',
            '%'
        ),
        'type' => 'measurement',
        'condition' => '',
        'operator' => 'or',
    );

    $header_min_height = array(
        'id' => '_lerp_header_min_height',
        'label' => esc_html__('Minimal height', 'lerp'),
        'desc' => esc_html__('Enter a minimun height for the header in pixel.', 'lerp'),
        'type' => 'text',
    );

    $header_style = array(
        'id' => '_lerp_header_style',
        'label' => esc_html__('Skin', 'lerp'),
        'desc' => esc_html__('Specify the header text skin.', 'lerp'),
        'type' => 'select',
        'section' => 'colors',
        'std' => 'dark',
        'condition' => '',
        'operator' => 'or',
        'choices' => array(
            array(
                'value' => 'light',
                'label' => esc_html__('Light', "lerp"),
                'src' => ''
            ),
            array(
                'value' => 'dark',
                'label' => esc_html__('Dark', "lerp"),
                'src' => ''
            )
        )
    );

    $header_position = array(
        'id' => '_lerp_header_position',
        'label' => esc_html__('Position', 'lerp'),
        'desc' => esc_html__('Specify the position of the header content inside the container.', 'lerp'),
        'std' => 'header-center header-middle',
        'type' => 'select',
        'operator' => 'or',
        'condition' => '',
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
        )
    );

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

    $font_spacings = ot_get_option('_lerp_heading_font_spacings');
    if ( !empty($font_spacings) ) {
        foreach ( $font_spacings as $key => $value ) {
            $title_spacing[] = array(
                'value' => $value['_lerp_heading_font_spacing_unique_id'],
                'label' => $value['title'],
            );
        }
    }

    $title_font = array(
        array(
            'value' => '',
            'label' => esc_html__('Default CSS', "lerp"),
        )
    );

    $custom_fonts_array = ot_get_option('_lerp_font_groups');
    if ( !empty($custom_fonts_array) ) {
        foreach ( $custom_fonts_array as $key => $value ) {
            $title_font[] = array(
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

    $header_featured = array(
        'label' => esc_html__('Featured image in header', 'lerp'),
        'id' => '_lerp_header_featured',
        'type' => 'on-off',
        'desc' => esc_html__('Activate to use the featured image in the header.', 'lerp'),
        'std' => 'on',
    );

    $header_background = array(
        'id' => '_lerp_header_background',
        'label' => esc_html__('Background', 'lerp'),
        'desc' => esc_html__('Specify the background media and color.', 'lerp'),
        'type' => 'background',
        'condition' => '',
        'operator' => 'or',
        'std' => array(
            'background-color' => 'color-wayh',
        ),
    );

    $header_overlay_color = array(
        'id' => '_lerp_header_overlay_color',
        'label' => esc_html__('Overlay color', 'lerp'),
        'desc' => esc_html__('Specify the overlay background color.', 'lerp'),
        'type' => 'lerp_color',
        'condition' => '',
        'operator' => 'or',
    );

    $header_overlay_color_alpha = array(
        'id' => '_lerp_header_overlay_color_alpha',
        'label' => esc_html__('Overlay color opacity', 'lerp'),
        'desc' => esc_html__('Set the overlay opacity.', 'lerp'),
        'std' => '100',
        'min_max_step' => '0,100,1',
        'type' => 'numeric-slider',
        'condition' => '',
        'operator' => 'or',
    );

    $header_scroll_opacity = array(
        'id' => '_lerp_header_scroll_opacity',
        'label' => esc_html__('Scroll opacity', 'lerp'),
        'desc' => esc_html__('Activate alpha animation when scrolling down.', 'lerp'),
        'type' => 'on-off',
        'std' => 'off',
        'condition' => '',
        'operator' => 'or',
    );

    $header_scrolldown = array(
        'id' => '_lerp_header_scrolldown',
        'label' => esc_html__('Scroll down arrow', 'lerp'),
        'desc' => esc_html__('Activate the scroll down arrow button.', 'lerp'),
        'type' => 'on-off',
        'std' => 'off',
        'condition' => '',
        'operator' => 'and',
    );

    $header_name = array(
        'id' => '_lerp_scroll_header_name',
        'label' => esc_html__('Header section name', 'lerp'),
        'desc' => esc_html__('Insert the header section name, required for the onepage scroll.', 'lerp'),
        'type' => 'text',
    );

    $header_parallax = array(
        'label' => esc_html__('Parallax', 'lerp'),
        'id' => '_lerp_header_parallax',
        'type' => 'on-off',
        'desc' => esc_html__('Activate the background parallax effect.', 'lerp'),
        'std' => 'off',
        'operator' => 'or',
        'condition' => '',
    );

    $header_kburns = array(
        'label' => esc_html__('Ken Burns', 'lerp'),
        'id' => '_lerp_header_kburns',
        'type' => 'on-off',
        'desc' => esc_html__('Activate the background Ken Burns effect.', 'lerp'),
        'std' => 'off',
        'operator' => 'or',
        'condition' => '',
    );

    $header_title = array(
        'label' => esc_html__('Title in header', 'lerp'),
        'id' => '_lerp_header_title',
        'type' => 'on-off',
        'desc' => esc_html__('Activate to show title in the header.', 'lerp'),
        'std' => 'on',
    );


    $header_title_font = array(
        'id' => '_lerp_header_title_font',
        'label' => esc_html__('Title font family', 'lerp'),
        'desc' => esc_html__('Specify the font for the title.', 'lerp'),
        'type' => 'select',
        'choices' => $title_font,
    );

    $header_title_size = array(
        'id' => '_lerp_header_title_size',
        'label' => esc_html__('Title font size', 'lerp'),
        'desc' => esc_html__('Specify the font size for the title.', 'lerp'),
        'type' => 'select',
        'choices' => $title_size,
    );

    $header_title_height = array(
        'id' => '_lerp_header_title_height',
        'label' => esc_html__('Title line height', 'lerp'),
        'desc' => esc_html__('Specify the line height for the title.', 'lerp'),
        'type' => 'select',
        'choices' => $title_height,
    );

    $header_title_spacing = array(
        'id' => '_lerp_header_title_spacing',
        'label' => esc_html__('Title letter spacing', 'lerp'),
        'desc' => esc_html__('Specify the letter spacing for the title.', 'lerp'),
        'type' => 'select',
        'choices' => $title_spacing,
    );

    $header_title_weight = array(
        'id' => '_lerp_header_title_weight',
        'label' => esc_html__('Title font weight', 'lerp'),
        'desc' => esc_html__('Specify the font weight for the title.', 'lerp'),
        'type' => 'select',
        'choices' => $title_weight,
    );

    $header_title_italic = array(
        'id' => '_lerp_header_title_italic',
        'label' => esc_html__('Title italic', 'lerp'),
        'desc' => esc_html__('Activate the font style italic for the title.', 'lerp'),
        'type' => 'on-off',
        'std' => 'off'
    );

    $header_title_transform = array(
        'id' => '_lerp_header_title_transform',
        'label' => esc_html__('Title text transform', 'lerp'),
        'desc' => esc_html__('Specify the title text transformation.', 'lerp'),
        'type' => 'select',
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

    $header_title_custom = array(
        'label' => esc_html__('Custom content', 'lerp'),
        'id' => '_lerp_header_title_custom',
        'type' => 'on-off',
        'desc' => esc_html__('Activate custom contents instead of the default page title.', 'lerp'),
        'std' => 'off',
        'condition' => '',
        'operator' => 'and',
    );

    $header_text = array(
        'id' => '_lerp_header_text',
        'label' => esc_html__('Text content', 'lerp'),
        'type' => 'textarea',
    );

    $header_text_animation = array(
        'id' => '_lerp_header_text_animation',
        'label' => esc_html__('Text animation', 'lerp'),
        'desc' => esc_html__('Specify the entrance animation of the title text.', 'lerp'),
        'type' => 'select',
        'condition' => '',
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
        )
    );

    $header_animation_delay = array(
        'id' => '_lerp_header_animation_delay',
        'label' => esc_html__('Animation delay', 'lerp'),
        'desc' => esc_html__('Specify the entrance animation delay of the title text in milliseconds.', 'lerp'),
        'type' => 'select',
        'condition' => '',
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
    );

    $header_animation_speed = array(
        'id' => '_lerp_header_animation_speed',
        'label' => esc_html__('Animation speed', 'lerp'),
        'desc' => esc_html__('Specify the entrance animation speed of the title text in milliseconds.', 'lerp'),
        'type' => 'select',
        'condition' => '',
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
    );

    $header_fields = array(
        array(
            'label' => '<i class="fa fa-columns2 fa-fw"></i> ' . esc_html__('页眉', 'lerp'),
            'id' => '_lerp_header_tab',
            'type' => 'tab',
        ),
        run_array_mb($header_type),
        run_array_mb($header_blocks_list, '_lerp_header_type:is(header_lerpblock)'),
        run_array_mb($header_revslider_list, '_lerp_header_type:is(header_revslider)'),
        run_array_mb($header_layerslider_list, '_lerp_header_type:is(header_layerslider)'),
        run_array_mb($header_full_width, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_height, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_min_height, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_title, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_title_custom, '_lerp_header_type:is(header_basic),_lerp_header_title:is(on)'),
        run_array_mb($header_text, '_lerp_header_type:is(header_basic),_lerp_header_title_custom:is(on)'),
        run_array_mb($header_style, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_content_width, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_custom_width, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_align, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_position, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_title_font, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_title_size, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_title_height, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_title_spacing, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_title_weight, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_title_transform, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_title_italic, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_text_animation, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_animation_speed, '_lerp_header_text_animation:not()'),
        run_array_mb($header_animation_delay, '_lerp_header_text_animation:not()'),
        run_array_mb($header_featured, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_background, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_parallax, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_kburns, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_overlay_color, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_overlay_color_alpha, '_lerp_header_type:is(header_basic)'),
        run_array_mb($header_scroll_opacity,
            '_lerp_header_type:is(header_basic),_lerp_header_type:is(header_lerpblock)'),
        run_array_mb($header_scrolldown, '_lerp_header_type:not(),_lerp_header_type:not(none)'),
        run_array_mb($header_name, '_lerp_header_type:is(header_basic)'),
        run_array_mb($menu_no_padding),
        run_array_mb($menu_no_padding_mobile),
    );

    $fields = array_merge($fields, $header_fields);

    ///////////////////////
    //  Body specific   ///
    ///////////////////////

    $specific_style = array(
        'id' => '_lerp_specific_style',
        'label' => esc_html__('皮肤', 'lerp'),
        'desc' => esc_html__('Override the content skin.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'light',
                'label' => esc_html__('Light', 'lerp'),
            ),
            array(
                'value' => 'dark',
                'label' => esc_html__('Dark', 'lerp'),
            ),
        ),
    );

    $specific_layout_width = array(
        'id' => '_lerp_specific_layout_width',
        'label' => esc_html__('内容宽度', 'lerp'),
        'desc' => esc_html__('Override the content width.', 'lerp'),
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
    );

    $specific_layout_width_custom = array(
        'id' => '_lerp_specific_layout_width_custom',
        'label' => esc_html__('Custom width', 'lerp'),
        'desc' => esc_html__('Define the custom width for the content area in px or in %. This option takes effect with normal contents (not Page Builder).',
            'lerp'),
        'type' => 'measurement',
        'operator' => 'or',
    );

    $specific_breadcrumb = array(
        'id' => '_lerp_specific_breadcrumb',
        'label' => esc_html__('显示面包屑', 'lerp'),
        'desc' => esc_html__('Override to show the navigation breadcrumb.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'on',
                'label' => esc_html__('Yes', 'lerp'),
            ),
            array(
                'value' => 'off',
                'label' => esc_html__('No', 'lerp'),
            ),
        ),
    );

    $specific_breadcrumb_align = array(
        'id' => '_lerp_specific_breadcrumb_align',
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
        'operator' => 'or',
    );

    $specific_title = array(
        'id' => '_lerp_specific_title',
        'label' => esc_html__('Show title', 'lerp'),
        'desc' => esc_html__('Override to show the title in the content area.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'on',
                'label' => esc_html__('Yes', 'lerp'),
            ),
            array(
                'value' => 'off',
                'label' => esc_html__('No', 'lerp'),
            ),
        ),
    );

    $specific_media = array(
        'id' => '_lerp_specific_media',
        'label' => esc_html__('Show media', 'lerp'),
        'desc' => esc_html__('Override to show the media in the content area.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'on',
                'label' => esc_html__('Yes', 'lerp'),
            ),
            array(
                'value' => 'off',
                'label' => esc_html__('No', 'lerp'),
            ),
        ),
    );

    $specific_featured_media = array(
        'id' => '_lerp_specific_featured_media',
        'label' => esc_html__('Show featured image', 'lerp'),
        'desc' => esc_html__('Activate to show the featured image in the content area.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'on',
                'label' => esc_html__('Yes', 'lerp'),
            ),
            array(
                'value' => 'off',
                'label' => esc_html__('No', 'lerp'),
            ),
        ),
    );

    $specific_tags = array(
        'id' => '_lerp_specific_tags',
        'label' => esc_html__('Show tags', 'lerp'),
        'desc' => esc_html__('Override to show the tags module.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'on',
                'label' => esc_html__('Yes', 'lerp'),
            ),
            array(
                'value' => 'off',
                'label' => esc_html__('No', 'lerp'),
            ),
        ),
    );

    $specific_tags_align = array(
        'id' => '_lerp_specific_tags_align',
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
        'operator' => 'or',
        'condition' => '_lerp_specific_tags:is(on)',
    );

    $specific_share = array(
        'id' => '_lerp_specific_share',
        'label' => esc_html__('Show share', 'lerp'),
        'desc' => esc_html__('Override to show the share module.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'on',
                'label' => esc_html__('Yes', 'lerp'),
            ),
            array(
                'value' => 'off',
                'label' => esc_html__('No', 'lerp'),
            ),
        ),
    );

    $specific_image_layout = array(
        'id' => '_lerp_product_image_layout',
        'label' => esc_html__('Media layout', 'lerp'),
        'desc' => esc_html__('Specify the layout mode for the product images section.', 'lerp'),
        'std' => '',
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'std',
                'label' => esc_html__('Standard', 'lerp'),
            ),
            array(
                'value' => 'stack',
                'label' => esc_html__('Stack', 'lerp'),
            ),
        ),
    );

    $specific_media_size = array(
        'id' => '_lerp_product_media_size',
        'label' => esc_html__('Media layout size', 'lerp'),
        'desc' => esc_html__('Specify the size of the media layout area.', 'lerp'),
        'std' => '0',
        'min_max_step' => '0,11,1',
        'type' => 'numeric-slider',
        'operator' => 'and',
    );

    $specific_enable_sticky_desc = array(
        'id' => '_lerp_product_sticky_desc',
        'label' => esc_html__('Sticky content', 'lerp'),
        'desc' => esc_html__('Activate to enable sticky effect for product description. It works with stack layout only',
            'lerp'),
        'std' => '',
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'on',
                'label' => esc_html__('on', 'lerp'),
            ),
            array(
                'value' => 'off',
                'label' => esc_html__('off', 'lerp'),
            ),
        ),
        'operator' => 'or',
    );

    $specific_enable_woo_zoom = array(
        'id' => '_lerp_product_enable_zoom',
        'label' => esc_html__('Zoom', 'lerp'),
        'desc' => esc_html__('Activate to enable drag zoom effect on product image.', 'lerp'),
        'std' => '',
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'on',
                'label' => esc_html__('on', 'lerp'),
            ),
            array(
                'value' => 'off',
                'label' => esc_html__('off', 'lerp'),
            ),
        ),
    );

    $specific_thumb_cols = array(
        'id' => '_lerp_thumb_cols',
        'label' => esc_html__('Thumbnails columns', 'lerp'),
        'desc' => esc_html__('Specify how many columns to display for your product gallery thumbs.', 'lerp'),
        'std' => '',
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
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
        ),
        'operator' => 'or',
        'condition' => '_lerp_product_image_layout:is()',
    );

    $specific_enable_woo_slider = array(
        'id' => '_lerp_product_enable_slider',
        'label' => esc_html__('Thumbnails carousel', 'lerp'),
        'desc' => esc_html__('Activate to enable carousel slider when you click gallery thumbs.', 'lerp'),
        'std' => '',
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Inherit', 'lerp'),
            ),
            array(
                'value' => 'on',
                'label' => esc_html__('on', 'lerp'),
            ),
            array(
                'value' => 'off',
                'label' => esc_html__('off', 'lerp'),
            ),
        ),
        'operator' => 'or',
        'condition' => '_lerp_product_image_layout:is()',
    );

    $specific_content_block_before = array(
        'id' => '_lerp_specific_content_block_before',
        'label' => esc_html__('Content Block - Before Content', 'lerp'),
        'desc' => esc_html__('Specify the Content Block.', 'lerp'),
        'type' => 'select',
        'choices' => $lerpblocks_extended
    );

    $specific_content_block_after_pre = array(
        'id' => '_lerp_specific_content_block_after_pre',
        'label' => esc_html__('After Content (ex: Author Profile)', 'lerp'),
        'desc' => esc_html__('Specify the Content Block.', 'lerp'),
        'type' => 'select',
        'choices' => $lerpblocks_extended
    );

    $specific_content_block_after = array(
        'id' => '_lerp_specific_content_block_after',
        'label' => esc_html__('After Content (ex: Related Posts)', 'lerp'),
        'desc' => esc_html__('Specify the Content Block.', 'lerp'),
        'type' => 'select',
        'choices' => $lerpblocks_extended
    );

    $specific_bg_color = array(
        'id' => '_lerp_specific_bg_color',
        'label' => esc_html__('Background color', 'lerp'),
        'desc' => esc_html__('Specify a custom content background color.', 'lerp'),
        'type' => 'lerp_colors_w_transp',
    );

    $body_fields = array(
        array(
            'label' => '<i class="fa fa-layout fa-fw"></i> ' . esc_html__('内容', 'lerp'),
            'id' => '_lerp_body_tab',
            'type' => 'tab',
        ),
        run_array_mb($specific_style),
        run_array_mb($specific_bg_color),
        run_array_mb($specific_layout_width),
        run_array_mb($specific_layout_width_custom, '_lerp_specific_layout_width:is(limit)'),
        run_array_mb($specific_breadcrumb),
        run_array_mb($specific_breadcrumb_align, '_lerp_specific_breadcrumb:is(on)'),
        //run_array_mb($specific_content_block_before) ,
        run_array_mb($specific_title),
        run_array_mb($specific_media),
        run_array_mb($specific_featured_media, '_lerp_specific_media:not(on)'),
        run_array_mb($specific_share),
    );

    if ( $post_type === 'post' ) {
        $body_fields[] = run_array_mb($specific_tags);
        $body_fields[] = run_array_mb($specific_tags_align, '_lerp_specific_tags:is(on)');
        $body_fields[] = run_array_mb($specific_content_block_after_pre);
    }

    if ( $post_type === 'product' ) {
        $body_fields[] = run_array_mb($specific_image_layout);
        $body_fields[] = run_array_mb($specific_media_size);
        $body_fields[] = run_array_mb($specific_enable_sticky_desc,
            '_lerp_product_image_layout:is(),_lerp_product_image_layout:is(stack)');
        $body_fields[] = run_array_mb($specific_enable_woo_zoom);
        $body_fields[] = run_array_mb($specific_thumb_cols,
            '_lerp_product_image_layout:is(),_lerp_product_image_layout:is(std)');
        $body_fields[] = run_array_mb($specific_enable_woo_slider,
            '_lerp_product_image_layout:is(),_lerp_product_image_layout:is(std)');
    }

    $body_fields[] = run_array_mb($specific_content_block_after);

    $fields = array_merge($fields, $body_fields);

    if ( $post_type !== 'product' && $post_type !== 'portfolio' ) {

        //////////////////////////
        //  Sidebar specific   ///
        //////////////////////////

        $active_sidebar = array(
            'id' => '_lerp_active_sidebar',
            'label' => esc_html__('Activate the sidebar', 'lerp'),
            'desc' => esc_html__('Override the sidebar visibility.', 'lerp'),
            'type' => 'select',
            'choices' => array(
                array(
                    'value' => '',
                    'label' => esc_html__('Inherit', 'lerp'),
                ),
                array(
                    'value' => 'on',
                    'label' => esc_html__('Yes', 'lerp'),
                ),
                array(
                    'value' => 'off',
                    'label' => esc_html__('No', 'lerp'),
                ),
            ),
        );

        $sidebar = array(
            'id' => '_lerp_sidebar',
            'label' => esc_html__('侧边栏', 'lerp'),
            'desc' => esc_html__('Specify the sidebar.', 'lerp'),
            'type' => 'sidebar-select',
            'operator' => 'or',
        );

        $sidebar_position = array(
            'id' => '_lerp_sidebar_position',
            'label' => esc_html__('位置', 'lerp'),
            'desc' => esc_html__('Specify the position of the sidebar.', 'lerp'),
            'type' => 'select',
            'choices' => array(
                array(
                    'value' => 'sidebar_right',
                    'label' => esc_html__('右', 'lerp'),
                ),
                array(
                    'value' => 'sidebar_left',
                    'label' => esc_html__('左', 'lerp'),
                ),
            ),
            'operator' => 'and',
        );

        $sidebar_size = array(
            'id' => '_lerp_sidebar_size',
            'label' => esc_html__('大小', 'lerp'),
            'desc' => esc_html__('设置侧边栏的大小。', 'lerp'),
            'std' => '4',
            'min_max_step' => '1,11,1',
            'type' => 'numeric-slider',
            'operator' => 'and',
        );

        $sidebar_sticky = array(
            'id' => '_lerp_sidebar_sticky',
            'label' => esc_html__('Sticky sidebar', 'lerp'),
            'desc' => esc_html__('Activate to have a sticky sidebar.', 'lerp'),
            'type' => 'on-off',
            'std' => 'off',
            'operator' => 'and',
        );

        $sidebar_style = array(
            'id' => '_lerp_sidebar_style',
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
            'operator' => 'and',
        );

        $sidebar_bgcolor = array(
            'id' => '_lerp_sidebar_bgcolor',
            'label' => esc_html__('Background color', 'lerp'),
            'desc' => esc_html__('Specify the sidebar background color.', 'lerp'),
            'type' => 'lerp_color',
            'operator' => 'and',
        );

        $sidebar_fill = array(
            'id' => '_lerp_sidebar_fill',
            'label' => esc_html__('Sidebar filling space', 'lerp'),
            'desc' => esc_html__('Activate to remove padding around the sidebar and fill the height.', 'lerp'),
            'type' => 'on-off',
            'std' => 'off',
            'operator' => 'and',
        );

        $sidebar_fields = array(
            array(
                'label' => '<i class="fa fa-content-right fa-fw"></i> ' . esc_html__('侧边栏', 'lerp'),
                'id' => '_lerp_sidebar_tab',
                'type' => 'tab',
            ),
            run_array_mb($active_sidebar),
            run_array_mb($sidebar, '_lerp_active_sidebar:is(on)'),
            run_array_mb($sidebar_position, '_lerp_active_sidebar:is(on)'),
            run_array_mb($sidebar_size, '_lerp_active_sidebar:is(on)'),
            run_array_mb($sidebar_sticky, '_lerp_active_sidebar:is(on)'),
            run_array_mb($sidebar_style, '_lerp_active_sidebar:is(on)'),
            run_array_mb($sidebar_bgcolor, '_lerp_active_sidebar:is(on)'),
            run_array_mb($sidebar_fill, '_lerp_active_sidebar:is(on),_lerp_sidebar_bgcolor:not()'),
        );

        $fields = array_merge($fields, $sidebar_fields);

    }

    if ( $post_type === 'portfolio' ) {

        ////////////////////////////
        //  Portfolio specific   ///
        ////////////////////////////

        $portfolio_details = ot_get_option('_lerp_portfolio_details');

        if ( isset($portfolio_details) && !empty($portfolio_details) ) {
            foreach ( $portfolio_details as $key => $value ) {
                $portfolio_details[$key]['id'] = $value['_lerp_portfolio_detail_unique_id'];
                $portfolio_details[$key]['label'] = $value['title'];
                $portfolio_details[$key]['type'] = 'text';
                $portfolio_details[$key]['condition'] = '_lerp_portfolio_active:not(off)';
            }
        }

        $portfolio_fields = array(
            array(
                'label' => '<i class="fa fa-briefcase3 fa-fw"></i> ' . esc_html__('Details', 'lerp'),
                'id' => '_lerp_portfolio_tab',
                'type' => 'tab',
            ),
            array(
                'id' => '_lerp_portfolio_active',
                'label' => ucfirst($portfolio_cpt_name) . ' ' . esc_html__('details', 'lerp'),
                'desc' => sprintf(esc_html__('Override the %s visibility.', 'lerp'), $portfolio_cpt_name),
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '',
                        'label' => esc_html__('Inherit', 'lerp'),
                    ),
                    array(
                        'value' => 'on',
                        'label' => esc_html__('Yes', 'lerp'),
                    ),
                    array(
                        'value' => 'off',
                        'label' => esc_html__('No', 'lerp'),
                    ),
                ),
            ),
            array(
                'id' => '_lerp_portfolio_position',
                'label' => ucfirst($portfolio_cpt_name) . ' ' . esc_html__('details layout', 'lerp'),
                'desc' => sprintf(esc_html__('Specify the layout template for all the %s posts.', 'lerp'),
                    $portfolio_cpt_name),
                'type' => 'select',
                'choices' => array(
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
                ),
                'operator' => 'or',
                'condition' => '_lerp_portfolio_active:is(on)',
            ),
            array(
                'id' => '_lerp_portfolio_sidebar_size',
                'label' => esc_html__('Sidebar size', 'lerp'),
                'desc' => esc_html__('Set the sidebar size.', 'lerp'),
                'std' => '4',
                'min_max_step' => '1,12,1',
                'type' => 'numeric-slider',
                'operator' => 'and',
                'condition' => '_lerp_portfolio_position:contains(sidebar),_lerp_portfolio_active:is(on)',
            ),
            array(
                'id' => '_lerp_portfolio_sidebar_sticky',
                'label' => esc_html__('Sticky sidebar', 'lerp'),
                'desc' => esc_html__('Activate to have a sticky sidebar.', 'lerp'),
                'type' => 'on-off',
                'std' => 'off',
                'operator' => 'and',
                'condition' => '_lerp_portfolio_position:contains(sidebar),_lerp_portfolio_active:is(on)',
            ),
            array(
                'id' => '_lerp_portfolio_style',
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
                'operator' => 'or',
                'condition' => '_lerp_portfolio_active:is(on)',
            ),
            array(
                'id' => '_lerp_portfolio_bgcolor',
                'label' => esc_html__('Background color', 'lerp'),
                'desc' => esc_html__('Specify the background color.', 'lerp'),
                'type' => 'lerp_color',
                'operator' => 'or',
                'condition' => '_lerp_portfolio_active:is(on)',
            ),
            array(
                'id' => '_lerp_portfolio_sidebar_fill',
                'label' => esc_html__('Sidebar filling space', 'lerp'),
                'desc' => esc_html__('Activate to remove padding around the sidebar and fill the height.', 'lerp'),
                'type' => 'on-off',
                'std' => 'off',
                'operator' => 'and',
                'condition' => '_lerp_portfolio_position:contains(sidebar),_lerp_portfolio_bgcolor:not(),_lerp_portfolio_active:is(on)',
            ),
        );

        if ( !empty($portfolio_details) ) $portfolio_fields = array_merge($portfolio_fields, $portfolio_details);

        $fields = array_merge($fields, $portfolio_fields);

    }

    if ( $post_type !== 'page' ) {

        $ppp_fields = array(
            array(
                'label' => '<i class="fa fa-location fa-fw"></i> ' . esc_html__('导航', 'lerp'),
                'id' => '_lerp_navigation_tab',
                'type' => 'tab',
            ),
            array(
                'id' => '_lerp_specific_navigation_index',
                'label' => esc_html__('Navigation parent', 'lerp'),
                'type' => 'page-select',
                'desc' => esc_html__('Specify the parent page to create the navigation logic.', 'lerp'),
            ),
            array(
                'id' => '_lerp_specific_navigation_hide',
                'label' => esc_html__('Hide Navigation', 'lerp'),
                'type' => 'page-select',
                'type' => 'on-off',
                'desc' => esc_html__('...', 'lerp'),
                'std' => 'off',
            ),
        );

        $fields = array_merge($fields, $ppp_fields);

    }

    /////////////////////////
    //  Footer specific   ///
    /////////////////////////

    if ( is_plugin_active('lerp-core/lerp-core.php') ) {

        $specific_footer_blocks_list = array(
            'id' => '_lerp_specific_footer_block',
            'label' => esc_html__('Content Block', 'lerp'),
            'desc' => esc_html__('Specify the Content Block.', 'lerp'),
            'type' => 'select',
            'operator' => 'or',
            'choices' => $lerpblocks_extended
        );

    } else {
        $specific_footer_blocks_list = null;
        $lerpblocks_extended = null;
    }

    $specific_footer_width = array(
        'id' => '_lerp_specific_footer_width',
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
    );

    $footer_fields = array(
        array(
            'label' => '<i class="fa fa-ellipsis fa-fw"></i> ' . esc_html__('页脚', 'lerp'),
            'id' => '_lerp_footer_tab',
            'type' => 'tab',
        ),
        run_array_mb($specific_footer_blocks_list),
        run_array_mb($specific_footer_width),
    );

    $fields = array_merge($fields, $footer_fields);

    //////////////////////////
    //        Scroll        //
    //////////////////////////

    $array_scroll = array(
        array(
            'value' => '',
            'label' => esc_html__('None', 'lerp'),
        ),
        array(
            'value' => 'on',
            'label' => esc_html__('Simple Scroll', 'lerp'),
        )
    );

    if ( in_array($post_type, $fp_post_types) ) {
        $array_scroll[] = array(
            'value' => 'slide',
            'label' => esc_html__('Slides Scroll', 'lerp'),
        );
    }


    $page_scroll = array(
        'id' => '_lerp_page_scroll',
        'label' => esc_html__('Type', 'lerp'),
        'type' => 'select',
        'desc' => esc_html__('Set the single page scrolling method.', 'lerp'),
        'std' => 'off',
        'choices' => $array_scroll
    );

    $scroll_snap = array(
        'id' => '_lerp_scroll_snap',
        'label' => esc_html__('Scroll Snap', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Add Scroll Snap effect (smoothly snaps to rows) on page scroll.', 'lerp'),
        'std' => 'off',
    );

    $fullpage_type = array(
        'id' => '_lerp_fullpage_type',
        'label' => esc_html__('Effect', 'lerp'),
        'desc' => esc_html__('Specify the transition effect.', 'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => 'curtain',
                'label' => esc_html__('Curtain', 'lerp'),
            ),
            array(
                'value' => 'parallax',
                'label' => esc_html__('Parallax', 'lerp'),
            ),
            array(
                'value' => 'zoom',
                'label' => esc_html__('Zoom', 'lerp'),
            ),
            array(
                'value' => 'trid',
                'label' => esc_html__('3D', 'lerp'),
            ),
        ),
    );

    $fp_opacity = array(
        'id' => '_lerp_fullpage_opacity',
        'label' => esc_html__('Opacity', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Add opacity effect during the transition. NB. In complex page layouts this option can slow down your transitions.',
            'lerp'),
        'std' => 'off',
    );

    $scroll_history = array(
        'id' => '_lerp_scroll_history',
        'label' => esc_html__('Disable history', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Disable the Browser URL History (Hash navigation).', 'lerp'),
        'std' => 'off',
    );

    $scroll_safe_padding = array(
        'id' => '_lerp_scroll_safe_padding',
        'label' => esc_html__('Safe padding', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('With the menu transparent add the menu height, when you don’t customise the row padding, as padding to your contents to avoid overlapping with the menu itself.',
            'lerp'),
        'std' => 'on',
    );

    $scroll_additional_padding = array(
        'id' => '_lerp_scroll_additional_padding',
        'label' => esc_html__('Safe padding additional', 'lerp'),
        'desc' => esc_html__('Add extra padding to the Safe Padding option.', 'lerp'),
        'std' => '0',
        'min_max_step' => '0,54,18',
        'type' => 'numeric-slider',
        'operator' => 'and',
    );

    $scroll_dots = array(
        'id' => '_lerp_scroll_dots',
        'label' => esc_html__('Hide dots', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Hide the dots navigation.', 'lerp'),
        'std' => 'off',
    );

    $empty_dots = array(
        'id' => '_lerp_empty_dots',
        'label' => esc_html__('Show empty dots', 'lerp'),
        'type' => 'on-off',
        'desc' => esc_html__('Display empty dots without specifying a Row Name (dots navigation label).', 'lerp'),
        'std' => 'off',
    );

    $fullpage_menu = array(
        'id' => '_lerp_fullpage_menu',
        'label' => esc_html__('菜单', 'lerp'),
        'desc' => esc_html__('Set the animation for the Menu. NB: When you use the Slides Scroll the default Menu behaviour is Sticky.',
            'lerp'),
        'type' => 'select',
        'choices' => array(
            array(
                'value' => '',
                'label' => esc_html__('Default', 'lerp'),
            ),
            array(
                'value' => 'hide',
                'label' => esc_html__('Hide after first slide', 'lerp'),
            ),
        ),
    );

    $mobile_scroll = array(
        'id' => '_lerp_fullpage_mobile',
        'label' => esc_html__('Disable On Mobile', 'lerp'),
        'desc' => esc_html__('Deactivate the Slide Scroll for small devices.', 'lerp'),
        'type' => 'on-off',
        'std' => 'off',
    );

    $scroller_fields = array(
        array(
            'label' => '<i class="fa fa-download3 fa-fw"></i> ' . esc_html__('滚动', 'lerp'),
            'id' => '_lerp_scroll_tab',
            'type' => 'tab',
        ),
        run_array_mb($page_scroll),
        run_array_mb($fullpage_type, '_lerp_page_scroll:is(slide)'),
        run_array_mb($fp_opacity, '_lerp_page_scroll:is(slide),_lerp_fullpage_type:not(none)'),
        run_array_mb($scroll_dots, '_lerp_page_scroll:not()'),
        run_array_mb($empty_dots, '_lerp_page_scroll:is(slide),_lerp_scroll_dots:not(on)'),
        run_array_mb($scroll_history, '_lerp_page_scroll:not()'),
        run_array_mb($scroll_safe_padding, '_lerp_page_scroll:is(slide)'),
        run_array_mb($scroll_additional_padding, '_lerp_page_scroll:is(slide),_lerp_scroll_safe_padding:is(on)'),
        run_array_mb($fullpage_menu, '_lerp_page_scroll:is(slide)'),
        run_array_mb($mobile_scroll, '_lerp_page_scroll:is(slide)'),
    );

    if ( in_array($post_type, $fp_post_types) )
        $scroller_fields[] = run_array_mb($scroll_snap, '_lerp_page_scroll:is(on)');

    $fields = array_merge($fields, $scroller_fields);

    $get_custom_fields = ot_get_option('_lerp_' . $post_type . '_custom_fields');
    if ( isset($get_custom_fields) && !empty($get_custom_fields) ) {
        foreach ( $get_custom_fields as $key => $value ) {
            $get_custom_fields[$key]['id'] = $value['_lerp_cf_unique_id'];
            $get_custom_fields[$key]['label'] = $value['title'];
            $get_custom_fields[$key]['type'] = 'text';
        }
    }

    $custom_fields = array(
        array(
            'label' => '<i class="fa fa-pencil3 fa-fw"></i> ' . esc_html__('自定义字段', 'lerp'),
            'id' => '_lerp_cf_tab',
            'type' => 'tab',
        ),
    );

    if ( !empty($get_custom_fields) ) $custom_fields = array_merge($custom_fields, $get_custom_fields);

    $fields = array_merge($fields, $custom_fields);

    $lerp_page_array = array(
        'id' => '_lerp_page_options',
        'title' => esc_html__('页面设置', 'lerp'),
        'desc' => '',
        'pages' => $lerp_post_types,
        'context' => 'normal',
        'priority' => 'default',
        'fields' => $fields
    );

    if ( function_exists('ot_register_meta_box') ) ot_register_meta_box($lerp_page_array);

}

add_action('admin_init', 'lerp_page_options');
