<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 1/26/18
 * Time: 9:49 AM
 */

require_once 'base/Setup.php';

require_once 'base/BaseSection.php';
require_once 'base/BaseSetup.php';

require_once 'inc/customize-controls/BannersSection.php';
require_once 'inc/customize-controls/AdvantagesSection.php';
require_once 'inc/customize-controls/ConditionsSection.php';
require_once 'inc/customize-controls/ContactsSection.php';
require_once 'inc/customize-controls/ProductsSection.php';

require_once 'inc/NaturlithSetup.php';


require_once 'inc/product-type.php';
require_once 'inc/product-options.php';


$naturlith = new NaturlithSetup();
$naturlith->setup();



