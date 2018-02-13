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

    public abstract function panel();

    public function setup()
    {
        add_action('customize_register', array($this, 'customizer'));
    }

    public function customizer($customizer)
    {

        $args = [
            'title' => $this->title(),
            'capability' => 'edit_theme_options',
            'description' => $this->description()
        ];

        if ($this->panel() != null){
            $args['panel'] = $this->panel();
        }

        $customizer->add_section($this->id(), $args);

        $id = $this->id() . 'enable';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'checkbox',
                'label' => 'Enable section',
                'section' => $this->id()
            )
        );

        $this->settingsControls($customizer);
    }
}