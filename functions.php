<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 1/26/18
 * Time: 9:49 AM
 */

require_once 'base/utils/Slugifier.php';
require_once 'base/BaseSetup.php';
require_once 'base/BaseAdminPage.php';
require_once 'base/BaseTable.php';

require_once 'inc/NaturlithSetup.php';
require_once 'inc/NaturlithProductTable.php';
require_once 'inc/NaturlithProductPage.php';

$naturlith = new NaturlithSetup();
$naturlith->setup();

$productPage = new NaturlithProductPage();
$productPage->setup();
