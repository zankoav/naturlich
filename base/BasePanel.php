<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/13/18
 * Time: 6:20 PM
 */
abstract class BasePanel implements Setup
{

    public abstract function priority();

    public abstract function id();

    public abstract function title();

    public abstract function description();

    public function setup()
    {
        add_action('customize_register', array($this, 'customizer'));
    }

    public function customizer($customizer)
    {

        $customizer->add_panel($this->id(), array(
            'priority' => $this->priority(),
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => $this->title(),
            'description' => $this->description()
        ));
    }
}