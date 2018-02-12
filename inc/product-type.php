<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/12/18
 * Time: 8:40 AM
 */


/*
* Creating a function to create our CPT
*/

function custom_post_type()
{
    // Регистрируем таксономию
    register_taxonomy(
        'naturlith_products_category',
        'naturlith_products',
        array(
            'label' => 'Categories',
            'query_var' => true,
            'hierarchical' => true, // Если TRUE, таксономия будет аналогом рубрик (категорий). Если FALSE (по умолчанию), то таксономия станет аналогом меток (тегов).
            'rewrite' => array(
                'slug' => 'products', // This controls the base slug that will display before each term
            )
        )
    );


    function filter_post_type_link($link, $post)
    {

        if ($post->post_type != 'naturlith_products')
            return $link;


        if ($cats = get_the_terms($post->ID, 'naturlith_products_category')) {
            $slug = array_pop($cats)->slug;
            $link = str_replace('%naturlith_products_category%', $slug, $link);
        }
        return $link;
    }

    add_filter('post_type_link', 'filter_post_type_link', 10, 2);


// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Products', 'Post Type General Name', 'naturlith'),
        'singular_name' => _x('Product', 'Post Type Singular Name', 'naturlith'),
        'menu_name' => __('Products', 'naturlith'),
        'parent_item_colon' => __('Parent Product', 'naturlith'),
        'all_items' => __('All Products', 'naturlith'),
        'view_item' => __('View Product', 'naturlith'),
        'add_new_item' => __('Add New Product', 'naturlith'),
        'add_new' => __('Add New', 'naturlith'),
        'edit_item' => __('Edit Product', 'naturlith'),
        'update_item' => __('Update Product', 'naturlith'),
        'search_items' => __('Search Product', 'naturlith'),
        'not_found' => __('Not Found', 'naturlith'),
        'not_found_in_trash' => __('Not found in Trash', 'naturlith'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('products', 'naturlith'),
        'description' => __('Product news and reviews', 'naturlith'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('naturlith_products_category'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical' => false,
        'rewrite' => array('slug' => 'products/%naturlith_products_category%'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
    );

    register_post_type('naturlith_products', $args);

}

function default_taxonomy_term($post_id, $post)
{
    if ('publish' === $post->post_status) {
        $defaults = array(
            'naturlith_products_category' => array('All'),   //
        );
        $taxonomies = get_object_taxonomies($post->post_type);
        foreach ((array)$taxonomies as $taxonomy) {
            $terms = wp_get_post_terms($post_id, $taxonomy);
            if (empty($terms) && array_key_exists($taxonomy, $defaults)) {
                wp_set_object_terms($post_id, $defaults[$taxonomy], $taxonomy);
            }
        }
    }
}

add_action('save_post', 'default_taxonomy_term', 100, 2);

add_action('init', 'custom_post_type', 0);