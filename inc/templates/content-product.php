<div class="col-12 col-md-6">
    <?php the_post_thumbnail('large', array(
        'class' => "img-fluid w-100 bg-white p-2",
        'alt' => the_title('', '', 0)
    )); ?>
</div>
<div class="col-12 col-md-6 product-description">
    <h1 class="entry-title text-uppercase mb-1 mt-3 mt-md-0"><?php the_title(); ?></h1>
    <p class="category"><?php echo get_the_terms(get_the_ID(), 'naturlith_products_category')[0]->name; ?></p>
    <p><?php echo get_post_meta(get_the_ID(), 'naturlith_product_description', true); ?></p>
    <div class="price mt-3">
        <?php
        $showPrice = get_post_meta(get_the_ID(), 'naturlith_product_show_price', true);
        $price = get_post_meta(get_the_ID(), 'naturlith_product_price', true);

        if ($showPrice) {
            echo __("Price: "), empty($price) ? __("none") : "<span>$price $</span>";
        } ?>
    </div>
</div>

<div class="col-12 entry-content">
    <ul class="list-group list-group-flush my-3">
        <?php $allTerms = get_terms('naturlith_products_filter');
        $postsTerms = wp_get_post_terms(get_the_ID(), 'naturlith_products_filter');

        foreach ($allTerms as $term) : ?>
            <?php if (in_array($term, $postsTerms)) : ?>
                <li class="list-group-item bg-transparent"><?php echo $term->name; ?> <i class="fas fa-check text-success"></i>
                </li>
            <?php else: ?>
                <li class="list-group-item bg-transparent"><?php echo $term->name; ?> <i class="fas fa-times"></i></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <div class="the-content">
        <?php the_content(); ?>
    </div>
</div><!-- .entry-content -->
