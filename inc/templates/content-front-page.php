<section id="home-page" <?php post_class(); ?> >

    <?php if (get_theme_mod('naturlith_banners_enable')): ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <?php
            $ITEMS_COUNT = 5;
            ?>
            <ol class="carousel-indicators">
                <?php
                $isFirstLi = true;
                for ($i = 0; $i < $ITEMS_COUNT; $i++) {
                    if (empty(get_theme_mod('naturlith_banners_slide_' . $i))) {
                        continue;
                    } ?>
                    <li data-target="#carouselExampleIndicators"
                        data-slide-to="<?php echo $i; ?>"
                        class="<?php echo $isFirstLi ? 'active' : '';
                        $isFirstLi = false; ?>">
                    </li>
                <?php } ?>
            </ol>
            <div class="carousel-inner">
                <?php
                $isFirstItem = true;
                for ($i = 0; $i < $ITEMS_COUNT; $i++) {
                    if (empty(get_theme_mod('naturlith_banners_slide_' . $i))) {
                        continue;
                    } ?>
                    <div class="carousel-item <?php echo $isFirstItem ? 'active' : '';
                    $isFirstItem = false; ?>">
                        <img class="d-block w-100"
                             src="<?php echo get_theme_mod('naturlith_banners_slide_' . $i); ?>"
                             alt="Slide_<?php echo $i; ?>">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo get_theme_mod('naturlith_banners_title_' . $i); ?></h5>
                            <p><?php echo get_theme_mod('naturlith_banners_description_' . $i); ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php if (!$isFirstLi) { ?>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            <?php } ?>
        </div>
    <?php endif; ?>
    <div id="advantages">
        <?php
        $advantagesTitle = get_theme_mod('naturlith_advantages_title');
        if (!empty($advantagesTitle)) { ?>
            <div class="container py-5 position-relative">
                <h1 class="text-center mb-5 py-3"><?php echo $advantagesTitle; ?></h1>
                <div id="advantage-items" class="row">
                    <?php for ($i = 0; $i < 5; $i++) {
                        $itemTitle = get_theme_mod('naturlith_advantages_title_item_' . $i);
                        if (!empty($itemTitle)) { ?>
                            <div class="col-12 col-lg-9 mb-4 item">
                                <div class="row">
                                    <div class="col-sm-2 col-md-1 align-self-center d-none d-sm-block">
                                        <img class="w-100"
                                             src="<?php echo get_theme_mod('naturlith_advantages_icon_item_' . $i); ?>"
                                             alt="Icon must be here">
                                    </div>
                                    <div class="col-sm-10 col-md-11 align-self-center">
                                        <h5 class="text-uppercase"><?php echo $itemTitle; ?></h5>
                                        <p><?php echo get_theme_mod('naturlith_advantages_subtitle_item_' . $i); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                    <div class="col-12 col-lg-9 mt-3">
                        <div class="row">
                            <div class="col-sm-2 col-md-1 d-none d-sm-block"></div>
                            <a class="btn bg-light text-secondary text-uppercase about rounded-0 border px-4 py-2"
                               href="<?php echo get_theme_mod('naturlith_advantages_button_url'); ?>"
                               target="_blank">
                                <?php echo get_theme_mod('naturlith_advantages_button_title'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <img class="position-absolute h-100 py-5 banner d-none d-lg-block"
                     src="<?php echo get_theme_mod('naturlith_advantages_right_image'); ?>" alt="">
            </div>
        <?php } ?>
    </div>

    <?php if (get_theme_mod('naturlith_products_enable')):
        $args = array('post_type' => 'naturlith_products', 'posts_per_page' => 4);
        $the_query = new WP_Query($args);
        $productTitle = get_theme_mod('naturlith_products_title');

        if (!empty($productTitle) and $the_query->have_posts()): ?>
            <div id="products">
                <div class="container pb-3">
                    <h1 class="text-center mb-5 pt-5"><?php echo $productTitle; ?></h1>
                    <div class="card-deck">
                        <?php
                        $indexOfProduct = 0;
                        while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="card rounded-0 border-0 text-center
                    <?php echo $indexOfProduct > 1 ? 'd-none d-lg-flex' : ''; ?>">
                                <div class="img-wrap">
                                    <?php the_post_thumbnail('medium', array(
                                        'class' => "card-img-top rounded-0 img-fluid",
                                        'alt' => the_title('', '', 0)
                                    )); ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase"><?php echo get_post_meta(get_the_ID(), 'naturlith_mark', true); ?></h5>
                                    <p class="card-text"><?php the_title(); ?></p>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="text-muted">More</div>
                                </div>
                            </a>
                            <?php
                            $indexOfProduct++;
                        endwhile; ?>
                    </div>
                    <div class="card-deck d-flex d-lg-none mt-0 mt-sm-4">
                        <?php
                        $mobileIndexOfProducts = 0;
                        while ($the_query->have_posts()) : $the_query->the_post();
                            if ($mobileIndexOfProducts < 2) {
                                $mobileIndexOfProducts++;
                                continue;
                            }
                            ?>
                            <a href="<?php the_permalink(); ?>" class="card rounded-0 border-0 text-center">
                                <div class="img-wrap">
                                    <?php the_post_thumbnail('medium', array(
                                        'class' => "card-img-top rounded-0 img-fluid",
                                        'alt' => the_title('', '', 0)
                                    )); ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase"><?php echo get_post_meta(get_the_ID(), 'naturlith_mark', true); ?></h5>
                                    <p class="card-text"><?php the_title(); ?></p>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="text-muted">More</div>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>
                <a class="d-block p-5 text-uppercase text-center text-secondary"
                   href="<?php echo get_theme_mod('naturlith_products_all_url'); ?>" target="_blank">
                    <?php echo get_theme_mod('naturlith_products_all'); ?></a>
            </div></div>
        <?php endif;
    endif; ?>

    <?php if (get_theme_mod('naturlith_conditions_enable')): ?>
        <div id="conditions"
             style="background-image: url(<?php echo get_theme_mod('naturlith_conditions_background_image'); ?>);">
            <?php
            $conditionsTitle = get_theme_mod('naturlith_conditions_title');
            if (!empty($conditionsTitle)) { ?>
                <div class="container text-center text-white">
                    <h1 class="text-uppercase"><?php echo $conditionsTitle; ?></h1>
                    <p class="py-3 w-75 mx-auto"><?php echo get_theme_mod('naturlith_conditions_subtitle'); ?></p>
                    <a class="btn rounded-0" href="<?php echo get_theme_mod('naturlith_conditions_read_more_url'); ?>">
                        <?php echo get_theme_mod('naturlith_conditions_read_more_title'); ?>
                    </a>
                </div>
            <?php } ?>
        </div>
    <?php endif; ?>

    <?php if (get_theme_mod('naturlith_news_enable')): ?>
        <div id="news">
            <div class="container">
                <h2 class="text-center text-uppercase mt-5 pb-4"><?php echo get_theme_mod('naturlith_news_title') ?></h2>
                <div class="row">


                    <?php

                    $NUMBERS_OF_POSTS = 4;
                    $posts = array();
                    $ids = [];
                    $args = array(
                        'post_status' => 'publish',
                        'numberposts' => 1
                    );

                    for ($i = 0; $i < $NUMBERS_OF_POSTS; $i++) {
                        $id = get_theme_mod('naturlith_news_post_' . $i);
                        if ($id != 0) {
                            $ids[] = $id;
                        }else{
                            $ids[] = null;
                        }
                    }

                    for ($i = 0; $i < $NUMBERS_OF_POSTS; $i++) {
                        if (isset($ids[$i])) {
                            $posts[] = get_post($ids[$i], 'ARRAY_A');
                        } else {
                            $args['exclude'] = $ids;
                            $wp_resent_news = wp_get_recent_posts($args);
                            $ids[] = $wp_resent_news[0]["ID"];
                            $posts[] = $wp_resent_news[0];
                        }
                    }

                    foreach ($posts as $recent) { ?>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="img-wrap mb-2">
                                <img class="card-img-top rounded-0 img-fluid"
                                     src="<?php echo get_the_post_thumbnail_url($recent["ID"], 'medium');
                                     ?>"
                                     alt="">
                            </div>
                            <!--                        20 октября 2017, 12:16-->
                            <small><?php echo date('d F Y, H:i', strtotime($recent['post_date'])); ?></small>
                            <h4>
                                <a href="<?php echo get_permalink($recent["ID"]); ?>"><?php echo $recent["post_title"]; ?></a>
                            </h4>
                            <p><?php echo wp_trim_words($recent['post_content'], 16); ?></p>
                        </div>
                    <?php }
                    wp_reset_query();
                    ?>


                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (get_theme_mod('naturlith_contact_enable')): ?>
        <div id="contacts">
            <?php
            $contactTitle = get_theme_mod('naturlith_contact_title');
            if (!empty($contactTitle)) { ?>
                <h2 class="text-center text-uppercase mt-5 pb-4"><?php echo $contactTitle; ?></h2>
                <?php
                echo get_theme_mod('naturlith_contact_script');
            } ?>
        </div>
    <?php endif; ?>

</section>