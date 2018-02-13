<?php
if (isset($_GET['instock'])) {
    $inStock = $_GET['instock'];
}

if (isset($_GET['type'])) {
    $cementType = $_GET['type'];
}
$options = $custom_meta_fields[3]["options"];

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

                    <form id="product-filter" class="my-4 p-3 bg-white border rounded-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="instock" value="on"
                                   id="d1" <?php echo isset($inStock) ? "checked" : ''; ?>>
                            <label class="form-check-label" for="d1">In stock</label>
                        </div>
                        <div class="form-group my-2">
                            <label class="form-check-label" for="d2">Cement type</label>
                            <select id="d2" name="type" class="form-control">
                                <?php foreach ($options as $option) {
                                    if (isset($cementType) and $option["value"] == $cementType) { ?>
                                        <option value="<?php echo $option["value"]; ?>"
                                                selected><?php echo $option["label"]; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $option["value"]; ?>"><?php echo $option["label"]; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                        <?php


                        // Start the loop.
                        while (have_posts()) : the_post();
                            if (isset($inStock) and !empty($inStock)) {
                                $stock = get_post_meta(get_the_ID(), 'naturlith_stock', true);
                                if ($stock != $inStock) {
                                    continue;
                                }
                            }

                            if (isset($cementType) and !empty($cementType)) {
                                $cement = get_post_meta(get_the_ID(), 'naturlith_cement', true);
                                if ($cementType != $cement) {
                                    continue;
                                }
                            }
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