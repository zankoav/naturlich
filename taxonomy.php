<?php

get_header(); ?>

    <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="container py-5">
            <div class="row">

                <div class="col-12 col-md-3">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'products_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'menu_class' => 'list-group',
                        'menu_id' => 'left-products-menu',
                        'depth' => 1
                    )); ?>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                        <?php
                        // Start the loop.
                        while (have_posts()) : the_post();
                            // Include the page content template.
                            get_template_part('inc/templates/content', 'products');
                            // End the loop.
                        endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>