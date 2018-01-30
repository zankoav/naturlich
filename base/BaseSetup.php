<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 1/26/18
 * Time: 9:48 AM
 */
abstract class BaseSetup
{
    public $themeUrl;
    public $themeDir;

    public function __construct()
    {
        $this->themeUrl = get_template_directory_uri();
        $this->themeDir = get_template_directory();
    }

    /**
     * @return string
     */
    public static abstract function themeName();

    /**
     * @return array
     */
    public abstract function menus();

    /**
     * @return array
     */
    public abstract function widgets();


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

    public function lang($str)
    {
        return __($str, $this::themeName());
    }

    /**
     * @return boolean
     */
    public function isJqueryNeed()
    {
        return true;
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
        $this->addScripts();
        $this->setupTheme();
        $this->setupWidget();
    }

    private function addScripts()
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

    private function setupTheme()
    {
        add_action('after_setup_theme', function () {

            $this->setupLang();
            $this->setupMenu();

            add_theme_support('custom-logo');

            add_theme_support('post-thumbnails');

            add_theme_support('html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption'
            ));
        });
    }

    private function setupLang()
    {
        load_theme_textdomain($this->themeName(), $this->themeDir . '/languages');
    }

    private function setupMenu()
    {
        register_nav_menus($this->menus());
    }

    private function setupWidget()
    {
        $widgets = $this->widgets();
        foreach ($widgets as $widget) {
            add_action('widgets_init', function () use ($widget) {
                register_sidebar(array(
                    'id' => $widget["id"],
                    'name' => $widget["name"],
                    'description' => '',
                    'class' => '',
                    'before_widget' => '<li id="%1$s" class="widget %2$s">',
                    'after_widget' => "</li>\n",
                    'before_title' => '<h2 class="widgettitle">',
                    'after_title' => "</h2>\n",
                ));
            });
        }
    }
}