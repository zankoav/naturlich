<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/1/18
 * Time: 6:36 PM
 */
abstract class BaseAdminPage
{
    public $themeUrl;

    public function __construct()
    {
        $this->themeUrl = get_template_directory_uri();
        $this->addAjaxActions();
    }

    /**
     * @return string
     */
    public abstract function label();

    /**
     * @return string
     */
    public abstract function title();

    /**
     * @return string
     */
    public abstract function slug();

    /**
     * @return integer
     */
    public abstract function order();

    /**
     * @return string
     */
    public abstract function icon();

    /**
     * @return array
     */
    public abstract function styles();

    /**
     * @return array
     */
    public abstract function scripts();

    /**
     * @return void
     */
    public abstract function load();

    /**
     * add_action('wp_ajax_(action)', array($this, 'action_callback'));
     * @return void
     */
    public abstract function addAjaxActions();

    public function setup()
    {
        add_action('admin_menu', function () {
            add_menu_page(
                $this->title(),
                $this->label(),
                'manage_options',
                $this->slug(),
                array($this, 'init'),
                $this->icon(),
                $this->order()
            );
        });
    }

    private function addScripts()
    {
        $this->loadStyles();
        $this->loadScripts();
        wp_enqueue_media();
    }

    private function loadStyles()
    {
        $styles = $this->styles();
        if (!empty($styles)) {
            foreach ($styles as $key => $value) {
                wp_enqueue_style($key, $value);
            }
        }
    }

    private function loadScripts()
    {
        $scripts = $this->scripts();
        if (!empty($scripts)) {
            foreach ($scripts as $key => $value) {
                wp_enqueue_script($key, $value);
            }
        }
    }

    public function init()
    {
        $this->addScripts();
        $this->load();
    }

    public function getSlug($name)
    {
        return (new Slugifier())
            ->setLowercase(true)
            ->setTransliterate(true)
            ->slugify($name);
    }

}