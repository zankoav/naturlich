/**
 * Created by alexandrzanko on 1/23/18.
 */
import {menu} from './moduls/menu.js';
import {page} from './moduls/page.js';
import {productsFilter} from './moduls/filter_of_products.js';

productsFilter();

jQuery(document).ready(function ($) {
    menu($);
});
page();




