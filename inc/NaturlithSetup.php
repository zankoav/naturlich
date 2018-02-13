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
            $styles['front-page'] = $this->themeUrl . '/css/front-page.css';
        }

        if (!is_front_page()) {
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
        }

        if (!is_front_page()) {
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
            new ContactsSection()

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