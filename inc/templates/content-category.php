
    <div class="col-12 col-sm-2 mb-3">
		<?php the_post_thumbnail( 'medium' ); ?>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <h5 class="card-title text-uppercase mt-3 mt-sm-0 mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <p><small class="text-muted"><?php echo get_the_date(); ?></small></p>
    </div>