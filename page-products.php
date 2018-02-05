<?php
/**
 * Template Name: Products Page
 */

get_header();

// Start the loop.
while (have_posts()) : the_post();

    // Include the page content template.
    get_template_part('inc/templates/content', 'products');

    // End the loop.
endwhile;

get_footer();