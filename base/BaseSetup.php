<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 1/26/18
 * Time: 9:48 AM
 */
abstract class BaseSetup
{
    public $theme_url;

    public function __construct()
    {
        $this->theme_url = get_template_directory_uri();
    }

    /**
     * @return array
     */
    public abstract function styles();

    /**
     * @return array
     */
    public abstract function headerScripts();

    /**
     * @return array
     */
    public abstract function footerScripts();

    /**
     * @return boolean
     */
    public function isJqueryNeed()
    {
        return false;
    }

    /**
     * @return boolean
     */
    public function isJqueryLoadInFooter()
    {
        return true;
    }

    public function setup()
    {
        $this->add_scripts();
    }

    private function add_scripts()
    {
        add_action('wp_enqueue_scripts', function () {

            $styles = $this->styles();
            foreach ($styles as $key => $style) {
                wp_enqueue_style($key, $style, false, null);
            }

            $this->includeJquery();
            $this->loadScripts(true);
            $this->loadScripts(false);

        });
    }

    private function loadScripts($isFooter)
    {
        $scripts = $isFooter ? $this->footerScripts() : $this->headerScripts();
        foreach ($scripts as $key => $src) {
            wp_enqueue_script($key, $src, false, null, $isFooter);
        }
    }

    private function includeJquery()
    {
        if ($this->isJqueryLoadInFooter()) {
            wp_deregister_script('jquery');
            wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, null, true);
        }

        if ($this->isJqueryNeed()) {
            wp_enqueue_script('jquery');
        }
    }
}