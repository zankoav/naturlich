<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 1/26/18
 * Time: 9:49 AM
 */



require_once 'base/base.php';
require_once 'inc/front-page-sections/sections.php';

require_once 'inc/NaturlithSetup.php';



require_once 'inc/custom-type-product.php';
require_once 'inc/product-options.php';

require_once 'inc/custom-type-contacts.php';
require_once 'inc/contact-options.php';


$naturlith = new NaturlithSetup();
$naturlith->setup();





