<?php

get_header();

// Start the loop.
while (have_posts()) : the_post();

    // Include the page content template.
    get_template_part('inc/templates/content', 'contacts');

    // End the loop.
endwhile;

get_footer();