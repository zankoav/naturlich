<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/5/18
 * Time: 3:59 PM
 */
abstract class BaseSection implements Setup
{

    public abstract function id();

    public abstract function title();

    public abstract function description();

    public abstract function settingsControls($customizer);

    public function setup()
    {
        add_action('customize_register', array($this, 'customizer'));
    }

    public function customizer($customizer)
    {

        $customizer->add_section($this->id(),
            array(
                'title' => $this->title(),
                'capability' => 'edit_theme_options',
                'description' => $this->description()
            )
        );

        $this->settingsControls($customizer);
    }
}