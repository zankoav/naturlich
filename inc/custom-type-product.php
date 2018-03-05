<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/12/18
 * Time: 8:40 AM
 */

$pageSlugs = ['products']; //'contacts',

function products_post_type()
{
    // Регистрируем таксономию
    register_taxonomy(
        'naturlith_products_category',
        'naturlith_products',
        array(
            'label' => __('Product Categories', 'naturlith'),
            'query_var' => true,
            'hierarchical' => true, // Если TRUE, таксономия будет аналогом рубрик (категорий). Если FALSE (по умолчанию), то таксономия станет аналогом меток (тегов).
            'rewrite' => array(
                'slug' => 'products', // This controls the base slug that will display before each term
            )
        )
    );

    // Регистрируем таксономию
    register_taxonomy(
        'naturlith_products_filter',
        'naturlith_products',
        array(
            'label' => __('Product filter', 'naturlith'),
            'labels' => array(
                'name' => __('Filters', 'naturlith'),
                'singular_name' => __('Filter', 'naturlith'),
                'all_items' => __('All Filters', 'naturlith'),
                'view_item ' => __('View Filter', 'naturlith'),
                'parent_item' => __('Parent Filter', 'naturlith'),
                'parent_item_colon' => __('Parent Filter:', 'naturlith'),
                'edit_item' => __('Edit Filter', 'naturlith'),
                'update_item' => __('Update Filter', 'naturlith'),
                'add_new_item' => __('Add New Filter', 'naturlith'),
                'new_item_name' => __('New Filter Name', 'naturlith'),
                'menu_name' => __('Filter', 'naturlith'),
            ),
            'show_in_nav_menus' => false, // равен аргументу public
            'show_tagcloud' => false,
            'hierarchical' => true, // Если TRUE, таксономия будет аналогом рубрик (категорий). Если FALSE (по умолчанию), то таксономия станет аналогом меток (тегов).
            'rewrite' => array(
                'slug' => 'filter', // This controls the base slug that will display before each term
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
        'supports' => array('title', 'editor', 'thumbnail'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('naturlith_products_category', 'naturlith_products_filter'),
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

function default_product_term($post_id, $post)
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

add_filter('page_row_actions', 'remove_row_actions_naturlith_products', 10, 2);

function remove_row_actions_naturlith_products($actions, $page)
{
    global $pageSlugs;

    if (get_post_type() == 'page' and in_array($page->post_name, $pageSlugs)) {
        unset($actions['clone']);
        unset($actions['inline hide-if-no-js']);
        unset($actions['edit']);
        unset($actions['view']);
        unset($actions['trash']);
    }
    return $actions;
}

add_action('admin_head-post.php', 'hide_publishing_actions');
add_action('admin_head-post-new.php', 'hide_publishing_actions');
function hide_publishing_actions()
{
    $post_type = 'page';
    global $pageSlugs;
    global $post;
    if ($post->post_type == $post_type and in_array($post->post_name, $pageSlugs)) {
        remove_post_type_support('page', 'editor');
        remove_meta_box('postimagediv', 'page', 'side');
        remove_meta_box('pageparentdiv', 'page', 'side');
        remove_meta_box('submitdiv', 'page', 'side');
        remove_meta_box('slugdiv', 'page', 'normal');
        remove_meta_box('postexcerpt', 'page', 'normal');
        remove_meta_box('trackbacksdiv', 'page', 'normal');
        remove_meta_box('postcustom', 'page', 'normal');
        remove_meta_box('commentstatusdiv', 'page', 'normal');
        remove_meta_box('commentsdiv', 'page', 'normal');
        remove_meta_box('revisionsdiv', 'page', 'normal');
        remove_meta_box('authordiv', 'page', 'normal');
        remove_meta_box('sqpt-meta-tags', 'page', 'normal');


    }
}

add_filter('get_user_option_screen_layout_page', function () {
    $post_type = 'page';
    global $pageSlugs;
    global $post;
    if ($post->post_type == $post_type and in_array($post->post_name, $pageSlugs)) {
        return 1;
    }
    return 2;
});

add_action('save_post', 'default_product_term', 100, 2);

add_action('init', 'products_post_type', 0);