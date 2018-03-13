<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 1/30/18
	 * Time: 4:14 PM
	 */
	get_header();

	// Start the loop.
	while ( have_posts() ) : the_post();

		// Include the page content template.
		get_template_part( 'inc/templates/content', 'page' );
		// End the loop.

	endwhile;

	get_footer();