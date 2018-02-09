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
        return array(
            'icons' => $this->themeUrl . '/css/fontawesome/css/fontawesome-all.css',
            'bootstrap4' => $this->themeUrl . '/css/bootstrap4/bootstrap.css',
            'main' => $this->themeUrl . '/css/main.css',
            'style' => $this->themeUrl . '/style.css',
        );
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
        return array(
            'bootstrap4' => $this->themeUrl . '/js/bootstrap4/bootstrap.bundle.js',
            'bundle' => $this->themeUrl . '/js/bundle.js'
        );
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
            'main_menu' => $this->lang('Main menu')
        );
    }

    /**
     * @return array
     */
    public function widgets()
    {
        return [
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
            new ConditionsSection(),
            new ProductsSection(),
            new ContactsSection()
        );
    }
}