<div class="col-12 col-md-6">
    <?php the_post_thumbnail('large', array(
        'class' => "img-fluid w-100",
        'alt' => the_title('', '', 0)
    )); ?>
</div>
<div class="col-12 col-md-6">
    <h1 class="entry-title text-uppercase mb-0"><?php the_title(); ?></h1>
    <?php the_excerpt(); ?>
    <div class="price">
        <?php
        $price = get_post_meta(get_the_ID(), 'naturlith_price', true);
        echo __("Price: "), empty($price) ? __("none") : "<span>$price $</span>";
        ?>
    </div>
</div>

<div class="col-12 entry-content mt-5">
    <?php the_content(); ?>
</div><!-- .entry-content -->
