<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 1/26/18
 * Time: 9:50 AM
 */
class NaturlithSetup extends BaseSetup
{
    /**
     * @return array
     */
    public function styles()
    {
        $styles = [
            'icons' => $this->themeUrl . '/css/fontawesome/css/fontawesome-all.css',
            'bootstrap4' => $this->themeUrl . '/css/bootstrap4/bootstrap.css',
        ];

        if (is_front_page()) {
            $styles['swiper'] = 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/css/swiper.min.css';
            $styles['front-page'] = $this->themeUrl . '/css/front-page.css';
        } else if (is_tax() or is_page('products')) {
            $styles['products'] = $this->themeUrl . '/css/products.css';
        } else if (is_page('contacts')) {
            $styles['contacts_page'] = $this->themeUrl . '/css/contacts-page.css';
        } else if (is_singular( 'naturlith_products' )) {
            $styles['single-naturlith_products'] = $this->themeUrl . '/css/single-product.css';
        } else {
            $styles['main'] = $this->themeUrl . '/css/main.css';
        }

        $styles['style'] = $this->themeUrl . '/style.css';
        return $styles;
    }

    /**
     * @return array
     */
    public function headerScripts()
    {
        return array();
    }

    /**
     * @return array
     */
    public function footerScripts()
    {
        $scripts = ['bootstrap4' => $this->themeUrl . '/js/bootstrap4/bootstrap.bundle.js'];

        if (is_front_page()) {
            $scripts['fornt-page'] = $this->themeUrl . '/js/front-page/bundle.js';
        } else if (is_tax() or is_page('products')) {
            $scripts['taxonomy_and_products_page'] = $this->themeUrl . '/js/taxonomy_and_page_products/bundle.js';
        } else if (is_page('contacts')) {
            $scripts['contacts_page'] = $this->themeUrl . '/js/contacts-page/bundle.js';
        } else {
            $scripts['bundle'] = $this->themeUrl . '/js/bundle.js';
        }

        return $scripts;
    }

    public function isJqueryNeed()
    {
        return true;
    }


    /**
     * @return string
     */
    public static function themeName()
    {
        return 'naturlith';
    }

    /**
     * @return array
     */
    public function menus()
    {
        return array(
            'main_menu' => $this->lang('Main menu'),
            'products_menu' => $this->lang('Products menu')
        );
    }

    /**
     * @return array
     */
    public function widgets()
    {
        return [

            array(
                'id' => 'product-left',
                'name' => $this->lang('Product Page Left')
            ),
            array(
                'id' => 'contacts-page-left',
                'name' => $this->lang('Contacts Page Left')
            ),
            array(
                'id' => 'contacts-page-right',
                'name' => $this->lang('Contacts Page Right')
            ),
            array(
                'id' => 'footer-1',
                'name' => $this->lang('Footer 1')
            ),
            array(
                'id' => 'footer-2',
                'name' => $this->lang('Footer 2')
            ),
            array(
                'id' => 'footer-3',
                'name' => $this->lang('Footer 3')
            ),
            array(
                'id' => 'footer-4',
                'name' => $this->lang('Footer 4')
            )
        ];
    }

    /**
     * @return array
     */
    public function sections()
    {
        return array(
            new BannersSection(),
            new AdvantagesSection(),
            new ProductsSection(),
            new ConditionsSection(),
            new NewsSection(),
            new ContactsSection(),
            new LanguagesSection()
        );
    }

    /**
     * @return array
     */
    public function panels()
    {
        return array(
            new FrontPagePanel()
        );
    }
}