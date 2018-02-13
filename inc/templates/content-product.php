<div class="col-12 col-md-6">
    <?php the_post_thumbnail('large', array(
        'class' => "img-fluid w-100",
        'alt' => the_title('', '', 0)
    )); ?>
</div>
<div class="col-12 col-md-6 product-description">
    <h1 class="entry-title text-uppercase mb-0"><?php the_title(); ?></h1>
    <?php the_excerpt(); ?>
    <div class="price my-2">
        <?php
        $price = get_post_meta(get_the_ID(), 'naturlith_price', true);
        echo __("Price: "), empty($price) ? __("none") : "<span>$price $</span>";
        ?>
    </div>
    <?php $stock = get_post_meta(get_the_ID(), 'naturlith_stock', true);
    $stock = $stock == 'on' ? 'Yes' : 'No';
    ?>
    <div class="my-2">In stock : <strong><?php echo $stock; ?></strong></div>
    <div class="my-2">Cement type: <strong><?php echo get_post_meta(get_the_ID(), 'naturlith_cement', true); ?></strong></div>

</div>

<div class="col-12 entry-content mt-5">
    <?php the_content(); ?>
</div><!-- .entry-content -->
