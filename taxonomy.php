<?php
get_header(); ?>
    <section id="products">
        <div class="container py-5">
            <div class="row justify-content-between mb-0">
                <div class="col-auto align-self-center">
                    <h1><?php echo single_cat_title('', 0); ?></h1>
                </div>
                <div class="col-3 align-self-center">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Sorted by: </label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr class="mb-5">
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
                    <h6 class="text-uppercase ml-3">Filters</h6>
                    <form id="product-filter" class="mb-4 mt-3 pl-3">
                        <div class="form-check my-2">
                            <input class="form-check-input" type="checkbox" name="instock" value="on"
                                   id="d1" checked>
                            <label class="form-check-label" for="d1">In stock</label>
                        </div>
                        <div class="form-check my-2">
                            <input class="form-check-input" type="checkbox" name="instock" value="on"
                                   id="d1" checked>
                            <label class="form-check-label" for="d1">In stock</label>
                        </div>
                        <div class="form-check my-2">
                            <input class="form-check-input" type="checkbox" name="instock" value="on"
                                   id="d1" checked>
                            <label class="form-check-label" for="d1">In stock</label>
                        </div>
                        <div class="form-check my-2">
                            <input class="form-check-input" type="checkbox" name="instock" value="on"
                                   id="d1" checked>
                            <label class="form-check-label" for="d1">In stock</label>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                        <?php
                        // Start the loop.
                        while (have_posts()) : the_post();
//                          $cement = get_post_meta(get_the_ID(), 'naturlith_cement', true);
                            get_template_part('inc/templates/content', 'products');
                        endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>