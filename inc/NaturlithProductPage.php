<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/1/18
 * Time: 6:57 PM
 */
class NaturlithProductPage extends BaseAdminPage
{

    /**
     * @return string
     */
    public function label()
    {
        return 'Products';
    }

    /**
     * @return string
     */
    public function title()
    {
        return 'All products';
    }

    /**
     * @return string
     */
    public function slug()
    {
        return 'naturlith-products';
    }

    /**
     * @return integer
     */
    public function order()
    {
        return 5;
    }

    /**
     * @return string
     */
    public function icon()
    {
        return 'dashicons-cart';
    }

    /**
     * @return array
     */
    public function style()
    {
        return array(
            'id' => 'naturlith_products_admin_custom_css',
            'url' => $this->themeUrl . '/css/admin.css'
        );
    }

    /**
     * @return array
     */
    public function script()
    {
        return array(
            'id' => 'naturlith_products_admin_custom_js',
            'url' => $this->themeUrl . '/js/admin-bundle.js'
        );
    }

    /**
     * @return void
     */
    public function load()
    {
        get_template_part('inc/templates/content', 'admin');
    }
}