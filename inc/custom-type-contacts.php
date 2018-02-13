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

function contacts_post_type()
{

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Contacts', 'Post Type General Name', 'naturlith'),
        'singular_name' => _x('Contact', 'Post Type Singular Name', 'naturlith'),
        'menu_name' => __('Contacts', 'naturlith'),
        'parent_item_colon' => __('Parent Contact', 'naturlith'),
        'all_items' => __('All Contacts', 'naturlith'),
        'view_item' => __('View Contact', 'naturlith'),
        'add_new_item' => __('Add New Contact', 'naturlith'),
        'add_new' => __('Add New', 'naturlith'),
        'edit_item' => __('Edit Contact', 'naturlith'),
        'update_item' => __('Update Contact', 'naturlith'),
        'search_items' => __('Search Contact', 'naturlith'),
        'not_found' => __('Not Found', 'naturlith'),
        'not_found_in_trash' => __('Not found in Trash', 'naturlith'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('Contacts', 'naturlith'),
        'description' => __('Contact news and reviews', 'naturlith'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'thumbnail'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-universal-access',
        'can_export' => true,
    );

    register_post_type('naturlith_contacts', $args);

}

add_action('init', 'contacts_post_type', 0);