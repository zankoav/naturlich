<?php

get_header(); ?>

    <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="container py-5">
            <div class="row">

                <div class="col-12 col-md-3">
                    <h6 class="text-uppercase ml-3">Categories</h6>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'products_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'menu_class' => 'list-group mb-4 mt-3',
                        'menu_id' => 'left-products-menu',
                        'depth' => 1
                    )); ?>

                    <div class="my-5">
                        <?php dynamic_sidebar( 'product-left' ); ?>
                    </div>

                </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                        <?php
                        // Start the loop.
                        while (have_posts()) : the_post();
                            // Include the page content template.
                            get_template_part('inc/templates/content', 'product');
                            // End the loop.
                        endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>