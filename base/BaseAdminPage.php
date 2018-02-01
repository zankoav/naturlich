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
    public abstract function style();

    /**
     * @return array
     */
    public abstract function script();

    /**
     * @return void
     */
    public abstract function load();

    public function setup()
    {
        add_action('admin_menu', function () {
            add_menu_page(
                $this->title(),
                $this->label(),
                'manage_options',
                $this->slug(),
                array($this,'init'),
                $this->icon(),
                $this->order()
            );
        });
    }

    private function addScripts()
    {
        $this->loadStyle();
        $this->loadScript();
    }

    private function loadStyle()
    {
        $style = $this->style();
        if (!empty($style)){
            wp_enqueue_style($style['id'], $style['url']);
        }
    }

    private function loadScript()
    {
        $script = $this->script();
        if (!empty($script)){
            wp_enqueue_script($script['id'], $script['url']);
        }
    }

    public function init(){
        $this->addScripts();
        $this->load();
    }



}