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
            'main_menu' => __('Main menu', self::themeName())
        );
    }
}