<div class="col-12 col-sm-6 col-xl-4 mb-2">
    <div class="product text-center">
        <div class="card rounded-0 border-0 text-center p-2 ">
            <div class="img-wrap">
                <?php the_post_thumbnail('medium', array(
                    'class' => "card-img-top rounded-0 img-fluid w-100",
                    'alt' => the_title('', '', 0)
                )); ?>
            </div>
            <div class="card-body">
                <h5 class="card-title text-uppercase"><?php echo get_post_meta($id, 'naturlith_product_mark', true) ?></h5>
                <p class="card-text"><?php the_title(); ?></p>
                <div class="price">
                    <?php
                    $id = get_the_ID();
                    $price = get_post_meta($id, 'naturlith_product_price', true);
                    if (get_post_meta($id, 'naturlith_product_show_price', true)) : ?>
                        <span><?php echo "$price $"; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer p-0">
                <a href="<?php the_permalink(); ?>" class="btn"><?php echo __('More', 'naturlith')?></a>
            </div>
        </div>

    </div>
</div>