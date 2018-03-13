<div class="row my-4 post">
    <div class="col-12 col-sm-5">
		<?php the_post_thumbnail( 'medium' ); ?>
    </div>
    <div class="col-12 col-sm-7">
        <h5 class="card-title text-uppercase mt-3 mt-sm-0 mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <p><small class="text-muted"><?php echo get_the_date(); ?></small></p>
        <p class="card-text"><?php echo get_the_excerpt(); ?></p>
    </div>
</div>
