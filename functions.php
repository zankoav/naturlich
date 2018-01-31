<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 1/26/18
 * Time: 9:49 AM
 */

require_once 'base/BaseSetup.php';
require_once 'inc/NaturlithSetup.php';

$naturlith = new NaturlithSetup();
$naturlith->setup();

add_action('admin_menu', function () {
    add_menu_page(
        'Продукты',
        'Продукты',
        'manage_options',
        'site-options',
        'add_my_setting',
        'dashicons-cart',
        4
    );
});

function add_my_setting()
{
    get_template_part('inc/templates/content', 'admin');
}