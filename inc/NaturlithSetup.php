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
            'icons' => 'https://use.fontawesome.com/releases/v5.0.4/css/all.css',
            'bootstrap4' => $this->theme_url . '/css/bootstrap4/bootstrap.css',
            'main' => $this->theme_url . '/css/main.css',
            'style' => $this->theme_url . '/style.css',
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
            'bootstrap4' => $this->theme_url . '/js/bootstrap4/bootstrap.bundle.js',
            'bundle' => $this->theme_url . '/js/bundle.js'
        );
    }

    public function isJqueryNeed()
    {
        return true;
    }
}