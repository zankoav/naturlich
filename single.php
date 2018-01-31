<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 1/31/18
 * Time: 2:18 PM
 */

get_header();

// Start the loop.
while (have_posts()) : the_post();

    // Include the page content template.
    get_template_part('inc/templates/content', 'single');

    // End the loop.
endwhile;

get_footer();