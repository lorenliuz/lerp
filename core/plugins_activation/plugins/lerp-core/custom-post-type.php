<?php

/**
 * Initialize CPT
 */

function lerp_custom_post_type()
{

    $portfolio_cpt = (function_exists('ot_get_option')) ? ot_get_option('_lerp_portfolio_cpt') : '';
    $portfolio_cpt_slug = (function_exists('ot_get_option')) ? ot_get_option('_lerp_portfolio_cpt_slug') : '';

    $base = (isset($portfolio_cpt_slug) && $portfolio_cpt_slug !== '') ? sanitize_title_with_dashes($portfolio_cpt_slug) : ((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');
    $label = ucfirst((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');

    // creating (registering) the custom type
    register_post_type('portfolio',
        // let's now add all the options for this post type
        array(
            'labels' => array(
                'name' => $label,
                /* This is the Title of the Group */
                'singular_name' => sprintf(esc_html__('%s Post', 'lerp'), $label),
                /* This is the individual type */
                'all_items' => sprintf(esc_html__('All %s', 'lerp'), $label),
                /* the all items menu item */
                'add_new' => esc_html__('Add New', 'lerp'),
                /* The add new menu item */
                'add_new_item' => sprintf(esc_html__('Add New %s', 'lerp'), $label),
                /* Add New Display Title */
                'edit' => esc_html__('Edit', 'lerp'),
                /* Edit Dialog */
                'edit_item' => sprintf(esc_html__('Edit %s', 'lerp'), $label),
                /* Edit Display Title */
                'new_item' => sprintf(esc_html__('New %s', 'lerp'), $label),
                /* New Display Title */
                'view_item' => sprintf(esc_html__('View %s', 'lerp'), $label),
                /* View Display Title */
                'search_items' => sprintf(esc_html__('Search %s', 'lerp'), $label),
                /* Search Custom Type Title */
                'not_found' => esc_html__('Nothing found in the Database.', 'lerp'),
                /* This displays if there are no entries yet */
                'not_found_in_trash' => esc_html__('Nothing found in Trash', 'lerp'),
                /* This displays if there is nothing in the trash */
                'parent_item_colon' => ''
            ),
            /* end of arrays */
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 7,
            'menu_icon' => 'dashicons-schedule',
            /* this is what order you want it to appear in on the left hand side menu */
            'rewrite' => array(
                'slug' => $base,
                'with_front' => false
            ),
            /* you can specify its url slug */
            'has_archive' => true,
            'capability_type' => 'post',
            'hierarchical' => true,

            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'sticky',
                'page-attributes'
            )
        )
    /* end of options */
    );
    /* end of register post type */

    // now let's add custom categories (these act like categories)
    register_taxonomy(
        'portfolio_category',
        'portfolio',
        array(
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'labels' => array(
                'name' => sprintf(esc_html__('%s Categories', 'lerp'), $label), /* name of the custom taxonomy */
                'singular_name' => sprintf(esc_html__('%s Category', 'lerp'), $label), /* single taxonomy name */
                'search_items' => sprintf(esc_html__('Search %s Categories', 'lerp'), $label), /* search title for taxomony */
                'all_items' => sprintf(esc_html__('All %s Categories', 'lerp'), $label), /* all title for taxonomies */
                'parent_item' => sprintf(esc_html__('Parent %s Category', 'lerp'), $label), /* parent title for taxonomy */
                'parent_item_colon' => sprintf(esc_html__('Parent %s Category:', 'lerp'), $label), /* parent taxonomy title */
                'edit_item' => sprintf(esc_html__('Edit %s Category', 'lerp'), $label), /* edit custom taxonomy title */
                'update_item' => sprintf(esc_html__('Update %s Category', 'lerp'), $label), /* update title for taxonomy */
                'add_new_item' => sprintf(esc_html__('Add New %s Category', 'lerp'), $label), /* add new title for taxonomy */
                'new_item_name' => sprintf(esc_html__('New %s Category Name', 'lerp'), $label) /* name title for taxonomy */
            ),
            'rewrite' => array('slug' => $base . '_cat'),
        )
    );

    $args = array(
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => false,
    );

    register_taxonomy('page_category', array(
        'page'
    ), $args);

    $base = 'lerpblock';
    $label = esc_html__('Content Block', 'lerp');

    // creating (registering) the custom type
    register_post_type($base,
        // let's now add all the options for this post type
        array(
            'labels' => array(
                'name' => $label,
                /* This is the Title of the Group */
                'singular_name' => sprintf(esc_html__('%s Post', 'lerp'), $label),
                /* This is the individual type */
                'all_items' => sprintf(esc_html__('All %s', 'lerp'), $label),
                /* the all items menu item */
                'add_new' => esc_html__('Add New', 'lerp'),
                /* The add new menu item */
                'add_new_item' => sprintf(esc_html__('Add New %s', 'lerp'), $label),
                /* Add New Display Title */
                'edit' => esc_html__('Edit', 'lerp'),
                /* Edit Dialog */
                'edit_item' => sprintf(esc_html__('Edit %s', 'lerp'), $label),
                /* Edit Display Title */
                'new_item' => sprintf(esc_html__('New %s', 'lerp'), $label),
                /* New Display Title */
                'view_item' => sprintf(esc_html__('View %s', 'lerp'), $label),
                /* View Display Title */
                'search_items' => sprintf(esc_html__('Search %s', 'lerp'), $label),
                /* Search Custom Type Title */
                'not_found' => esc_html__('Nothing found in the Database.', 'lerp'),
                /* This displays if there are no entries yet */
                'not_found_in_trash' => esc_html__('Nothing found in Trash', 'lerp'),
                /* This displays if there is nothing in the trash */
                'parent_item_colon' => ''
            ),
            /* end of arrays */
            'public' => is_user_logged_in() ? true : false,
            'publicly_queryable' => is_user_logged_in() ? true : false,
            'exclude_from_search' => true,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 8,
            'menu_icon' => 'dashicons-tagcloud',
            /* you can specify its url slug */
            'has_archive' => false,
            'capability_type' => 'post',
            'hierarchical' => true,
            'rewrite' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array(
                'title',
                'editor',
                'author',
                'revisions',
            )
        )
    /* end of options */
    );

    $gallery_base = 'lerp_gallery';
    $gallery_label_singular = esc_html__('相册', 'lerp');
    $gallery_label_plural = esc_html__('相册', 'lerp');

    // creating (registering) the custom type
    register_post_type($gallery_base,
        // let's now add all the options for this post type
        array(
            'labels' => array(
                'name' => $gallery_label_plural,
                /* This is the Title of the Group */
                'singular_name' => sprintf(esc_html__('%s', 'lerp'), $gallery_label_singular),
                /* This is the individual type */
                'all_items' => sprintf(esc_html__('All %s', 'lerp'), $gallery_label_plural),
                /* the all items menu item */
                'add_new' => esc_html__('Add New', 'lerp'),
                /* The add new menu item */
                'add_new_item' => sprintf(esc_html__('Add New %s', 'lerp'), $gallery_label_singular),
                /* Add New Display Title */
                'edit' => esc_html__('Edit', 'lerp'),
                /* Edit Dialog */
                'edit_item' => sprintf(esc_html__('Edit %s', 'lerp'), $gallery_label_singular),
                /* Edit Display Title */
                'new_item' => sprintf(esc_html__('New %s', 'lerp'), $gallery_label_singular),
                /* New Display Title */
                'view_item' => sprintf(esc_html__('View %s', 'lerp'), $gallery_label_singular),
                /* View Display Title */
                'search_items' => sprintf(esc_html__('Search %s', 'lerp'), $gallery_label_plural),
                /* Search Custom Type Title */
                'not_found' => esc_html__('Nothing found in the Database.', 'lerp'),
                /* This displays if there are no entries yet */
                'not_found_in_trash' => esc_html__('Nothing found in Trash', 'lerp'),
                /* This displays if there is nothing in the trash */
                'parent_item_colon' => ''
            ),
            /* end of arrays */
            'public' => is_user_logged_in() ? true : false,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'show_ui' => true,
            'menu_position' => 9,
            'menu_icon' => 'dashicons-format-gallery',
            /* you can specify its url slug */
            'has_archive' => false,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'revisions',
                // 'page-attributes'
            )
        )
    /* end of options */
    );
    /* end of register post type */

    // now let's add custom categories (these act like categories)
    register_taxonomy(
        'lerpblock_category',
        'lerpblock',
        array(
            'hierarchical' => true,
            'public' => false,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'labels' => array(
                'name' => sprintf(esc_html__('%s Categories', 'lerp'), $label), /* name of the custom taxonomy */
                'singular_name' => sprintf(esc_html__('%s Category', 'lerp'), $label), /* single taxonomy name */
                'search_items' => sprintf(esc_html__('Search %s Categories', 'lerp'), $label), /* search title for taxomony */
                'all_items' => sprintf(esc_html__('All %s Categories', 'lerp'), $label), /* all title for taxonomies */
                'parent_item' => sprintf(esc_html__('Parent %s Category', 'lerp'), $label), /* parent title for taxonomy */
                'parent_item_colon' => sprintf(esc_html__('Parent %s Category:', 'lerp'), $label), /* parent taxonomy title */
                'edit_item' => sprintf(esc_html__('Edit %s Category', 'lerp'), $label), /* edit custom taxonomy title */
                'update_item' => sprintf(esc_html__('Update %s Category', 'lerp'), $label), /* update title for taxonomy */
                'add_new_item' => sprintf(esc_html__('Add New %s Category', 'lerp'), $label), /* add new title for taxonomy */
                'new_item_name' => sprintf(esc_html__('New %s Category Name', 'lerp'), $label) /* name title for taxonomy */
            ),
            'rewrite' => array('slug' => $base . '_cat'),
        )
    );

    // apply category to attachments
    $label = esc_html__('Media', 'lerp');
    // now let's add custom categories (these act like categories)
    register_taxonomy(
        'media-category',
        'attachment',
        array(
            'hierarchical' => true,
            'public' => false,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'rewrite' => array('slug' => _x('media-category', 'Category Slug', 'media-taxonomies')),
            'labels' => array(
                'name' => sprintf(esc_html__('%s Categories', 'lerp'), $label), /* name of the custom taxonomy */
                'singular_name' => sprintf(esc_html__('%s Category', 'lerp'), $label), /* single taxonomy name */
                'search_items' => sprintf(esc_html__('Search %s Categories', 'lerp'), $label), /* search title for taxomony */
                'all_items' => sprintf(esc_html__('All %s Categories', 'lerp'), $label), /* all title for taxonomies */
                'parent_item' => sprintf(esc_html__('Parent %s Category', 'lerp'), $label), /* parent title for taxonomy */
                'parent_item_colon' => sprintf(esc_html__('Parent %s Category:', 'lerp'), $label), /* parent taxonomy title */
                'edit_item' => sprintf(esc_html__('Edit %s Category', 'lerp'), $label), /* edit custom taxonomy title */
                'update_item' => sprintf(esc_html__('Update %s Category', 'lerp'), $label), /* update title for taxonomy */
                'add_new_item' => sprintf(esc_html__('Add New %s Category', 'lerp'), $label), /* add new title for taxonomy */
                'new_item_name' => sprintf(esc_html__('New %s Category Name', 'lerp'), $label) /* name title for taxonomy */
            ),
            'update_count_callback' => '_update_generic_term_count'
        )
    );

    // gallery categories
    register_taxonomy(
        'lerp_gallery_category',
        'lerp_gallery',
        array(
            'hierarchical' => true,
            'public' => false,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'labels' => array(
                'name' => sprintf(esc_html__('%s Categories', 'lerp'), $gallery_label_singular), /* name of the custom taxonomy */
                'singular_name' => sprintf(esc_html__('%s Category', 'lerp'), $gallery_label_singular), /* single taxonomy name */
                'search_items' => sprintf(esc_html__('Search %s Categories', 'lerp'), $gallery_label_singular), /* search title for taxomony */
                'all_items' => sprintf(esc_html__('All %s Categories', 'lerp'), $gallery_label_singular), /* all title for taxonomies */
                'parent_item' => sprintf(esc_html__('Parent %s Category', 'lerp'), $gallery_label_singular), /* parent title for taxonomy */
                'parent_item_colon' => sprintf(esc_html__('Parent %s Category:', 'lerp'), $gallery_label_singular), /* parent taxonomy title */
                'edit_item' => sprintf(esc_html__('Edit %s Category', 'lerp'), $gallery_label_singular), /* edit custom taxonomy title */
                'update_item' => sprintf(esc_html__('Update %s Category', 'lerp'), $gallery_label_singular), /* update title for taxonomy */
                'add_new_item' => sprintf(esc_html__('Add New %s Category', 'lerp'), $gallery_label_singular), /* add new title for taxonomy */
                'new_item_name' => sprintf(esc_html__('New %s Category Name', 'lerp'), $gallery_label_singular) /* name title for taxonomy */
            ),
            'rewrite' => false,
        )
    );
}

function lerp_custom_portfolio_slug()
{
    $portfolio_cpt = (function_exists('ot_get_option')) ? ot_get_option('_lerp_portfolio_cpt') : '';
    if ( $portfolio_cpt === '' ) $portfolio_cp = 'portfolio';
    $rules = get_option('rewrite_rules');
    if ( is_array($rules) ) {
        $index_found = 0;
        foreach ( $rules as $key => $value ) {
            if ( strpos($key, $portfolio_cpt . '/') !== false ) $index_found++;
        }
        if ( $index_found === 0 ) {
            global $wp_rewrite;
            $wp_rewrite->flush_rules();
        }
    }
}

add_action('ot_after_theme_options_save', 'lerp_custom_portfolio_slug');

//runs only when the theme is set up
function lerp_custom_flush_rules()
{
    //defines the post type so the rules can be flushed.
    lerp_custom_post_type();
    //and flush the rules.
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'lerp_custom_flush_rules');
add_action('init', 'lerp_custom_post_type');
?>
