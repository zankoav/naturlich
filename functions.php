<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 1/26/18
 * Time: 9:49 AM
 */

require_once 'base/BaseSetup.php';
require_once 'base/BaseAdminPage.php';

require_once 'inc/NaturlithSetup.php';
require_once 'inc/NaturlithProductPage.php';

$naturlith = new NaturlithSetup();
$naturlith->setup();

$productPage = new NaturlithProductPage();
$productPage->setup();


//function hello()
//{
//    return '<h1>Hello gg</h1>';
//}
//
//add_shortcode('gg', 'hello');

//function create_table()
//{
//    global $wpdb;
//
//    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
//
//    $table_name = $wpdb->get_blog_prefix() . 'naturkith_products';
//    $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";
//
//    $sql = "CREATE TABLE {$table_name} (
//	id  bigint(20) unsigned NOT NULL auto_increment,
//	product_name varchar(255) NOT NULL default '',
//	PRIMARY KEY  (id)
//	)
//	{$charset_collate};";
//
//    dbDelta($sql);
//}

//create_table();