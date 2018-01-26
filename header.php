<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<!--Header content here-->

<header>
    <div class="container header-desktop">
        <div class="row">
            <div class="col-md-3">
                <?php the_custom_logo(); ?>
            </div>
            <div class="col-md-9 align-self-center">
                <?php wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'menu_class' => 'nav',
                    'menu_id' => '',
                    'depth' => 2
                )); ?>
            </div>
        </div>
    </div>
</header>
