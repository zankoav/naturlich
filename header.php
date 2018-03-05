<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--Header content here-->

<header id="main-header">
    <div class="container header-desktop">
        <div class="row d-none d-md-flex">
            <div class="col-md-3">
                <?php the_custom_logo(); ?>
            </div>
            <div class="col-md-7 align-self-center">
                <?php wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'menu_class' => 'nav',
                    'menu_id' => '',
                    'depth' => 2
                )); ?>
            </div>
            <div class="col-md-2 location">
                <?php if (get_theme_mod('naturlith_languages_enable')): ?>
                    <div class="row">
                        <?php if (get_theme_mod('naturlith_languages_dk_enable')): ?>

                            <div class="col-md-3 pr-1 pl-1 pb-2 pr-lg-1 pl-lg-3 pb-lg-2">
                                <a href="<?php echo get_theme_mod('naturlith_languages_dk_url');?>">
                                    <img src="<?php echo get_template_directory_uri() . '/img/dk.gif'; ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if (get_theme_mod('naturlith_languages_en_enable')): ?>

                            <div class="col-md-3 pr-1 pl-1 pb-2 pr-lg-1 pl-lg-3 pb-lg-2">
                                <a href="<?php echo get_theme_mod('naturlith_languages_en_url');?>">
                                    <img src="<?php echo get_template_directory_uri() . '/img/en.png'; ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if (get_theme_mod('naturlith_languages_de_enable')): ?>

                            <div class="col-md-3 pr-1 pl-1 pb-2 pr-lg-1 pl-lg-3 pb-lg-2">
                                <a href="<?php echo get_theme_mod('naturlith_languages_de_url');?>">
                                    <img src="<?php echo get_template_directory_uri() . '/img/gr.gif'; ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if (get_theme_mod('naturlith_languages_it_enable')): ?>
                            <div class="col-md-3 pr-1 pl-1 pb-2 pr-lg-1 pl-lg-3 pb-lg-2">
                                <a href="<?php echo get_theme_mod('naturlith_languages_it_url');?>">
                                    <img src="<?php echo get_template_directory_uri() . '/img/it.jpg'; ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row d-md-none">
            <div class="col-2 col-sm-4 align-self-center">
                <a class="menu-button">
                    <i class="fas fa-bars fa-2x"></i>
                </a>
            </div>
            <div class="col-5 col-sm-4 pt-1 pt-sm-0"><?php the_custom_logo(); ?></div>
	        <?php if (get_theme_mod('naturlith_languages_enable')): ?>
                <div class="col-5 col-sm-4 d-flex location-mobile">
			        <?php if (get_theme_mod('naturlith_languages_dk_enable')): ?>
                        <a href="<?php echo get_theme_mod('naturlith_languages_dk_url');?>">
                            <img src="<?php echo get_template_directory_uri() . '/img/dk.gif'; ?>" alt="">
                        </a>
			        <?php endif; ?>
			        <?php if (get_theme_mod('naturlith_languages_en_enable')): ?>
                        <a href="<?php echo get_theme_mod('naturlith_languages_en_url');?>">
                            <img src="<?php echo get_template_directory_uri() . '/img/en.png'; ?>" alt="">
                        </a>
			        <?php endif; ?>
			        <?php if (get_theme_mod('naturlith_languages_de_enable')): ?>
                        <a href="<?php echo get_theme_mod('naturlith_languages_de_url');?>">
                            <img src="<?php echo get_template_directory_uri() . '/img/gr.gif'; ?>" alt="">
                        </a>
			        <?php endif; ?>
			        <?php if (get_theme_mod('naturlith_languages_it_enable')): ?>
                        <a href="<?php echo get_theme_mod('naturlith_languages_it_url');?>">
                            <img src="<?php echo get_template_directory_uri() . '/img/it.jpg'; ?>" alt="">
                        </a>
			        <?php endif; ?>
                </div>
	        <?php endif; ?>
        </div>
    </div>
</header>

<header id="header-drop-down" class="fixed-top">
    <div class="container header-desktop">
        <div class="row d-none d-md-flex">
            <div class="col-md-2">
                <?php the_custom_logo(); ?>
            </div>
            <div class="col-md-10 align-self-center">
                <?php wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'menu_class' => 'nav',
                    'menu_id' => '',
                    'depth' => 2
                )); ?>
            </div>
        </div>
        <div class="row d-md-none">
            <div class="col-2 col-sm-4 align-self-center">
                <a class="menu-button">
                    <i class="fas fa-bars fa-2x"></i>
                </a>
            </div>
            <div class="col-5 col-sm-4 pt-1 pt-sm-0"><?php the_custom_logo(); ?></div>
	        <?php if (get_theme_mod('naturlith_languages_enable')): ?>
                <div class="col-5 col-sm-4 d-flex location-mobile">
			        <?php if (get_theme_mod('naturlith_languages_dk_enable')): ?>
                        <a href="<?php echo get_theme_mod('naturlith_languages_dk_url');?>">
                            <img src="<?php echo get_template_directory_uri() . '/img/dk.gif'; ?>" alt="">
                        </a>
			        <?php endif; ?>
			        <?php if (get_theme_mod('naturlith_languages_en_enable')): ?>
                        <a href="<?php echo get_theme_mod('naturlith_languages_en_url');?>">
                            <img src="<?php echo get_template_directory_uri() . '/img/en.png'; ?>" alt="">
                        </a>
			        <?php endif; ?>
			        <?php if (get_theme_mod('naturlith_languages_de_enable')): ?>
                        <a href="<?php echo get_theme_mod('naturlith_languages_de_url');?>">
                            <img src="<?php echo get_template_directory_uri() . '/img/gr.gif'; ?>" alt="">
                        </a>
			        <?php endif; ?>
			        <?php if (get_theme_mod('naturlith_languages_it_enable')): ?>
                        <a href="<?php echo get_theme_mod('naturlith_languages_it_url');?>">
                            <img src="<?php echo get_template_directory_uri() . '/img/it.jpg'; ?>" alt="">
                        </a>
			        <?php endif; ?>
                </div>
	        <?php endif; ?>
        </div>
    </div>
</header>

<menu id="mobile-menu" class="fixed-top pl-0 d-md-none">

    <div class="mobile-menu-left">
        <div class="menu-header d-flex justify-content-between p-3 mb-2">
            <a id="back-button" class="w-100">
                <i class="fas fa-chevron-left fa-2x"></i>
                <span class="fa-lg ml-3"><?php _e('Menu'); ?></span>
            </a>
        </div>
        <div class="content-menu px-3">
            <?php wp_nav_menu(array(
                'theme_location' => 'main_menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'nav',
                'menu_id' => '',
                'depth' => 2
            )); ?>
        </div>
    </div>

</menu>