<?php
/**
 * Template Name: Home Page
 */

get_header();

// Start the loop.
while (have_posts()) : the_post();

    // Include the page content template.
    get_template_part('inc/templates/content', 'home');

    // End the loop.
endwhile;

get_footer();