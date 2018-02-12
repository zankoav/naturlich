<div class="col-12 col-sm-6 col-xl-4 mb-2">
    <div class="product text-center">

        <a href="<?php the_permalink(); ?>" class="card rounded-0 border-0 text-center p-2 ">
            <div class="img-wrap">
                <?php the_post_thumbnail('medium', array(
                    'class' => "card-img-top rounded-0 img-fluid w-100",
                    'alt' => the_title('', '', 0)
                )); ?>
            </div>
            <div class="card-body">
                <h5 class="card-title text-uppercase"><?php the_title(); ?></h5>
                <p class="card-text text-truncate"><?php echo get_the_excerpt();?></p>
                <div class="price">
                    <?php
                    $price = get_post_meta(get_the_ID(), 'naturlith_price', true);
                    echo "<span>", empty($price) ? __("none") : $price . " $", "</span>";
                    ?>
                </div>
            </div>
            <div class="card-footer p-0">
                <div class="text-muted">More</div>
            </div>
        </a>

    </div>
</div>