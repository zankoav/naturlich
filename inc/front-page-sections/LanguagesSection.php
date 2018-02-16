<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/6/18
 * Time: 11:01 AM
 */
class LanguagesSection extends BaseSection
{

    public function id()
    {
        return 'naturlith_languages_';
    }

    public function title()
    {
        return 'Languages';
    }

    public function description()
    {
        return 'Here you can hide local';
    }

    public function settingsControls($customizer)
    {
        $id = $this->id() . 'en_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'En url',
                'section' => $this->id()
            )
        );
        $id = $this->id() . 'en_enable';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'checkbox',
                'label' => 'Enable En',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'it_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'It url',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'it_enable';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'checkbox',
                'label' => 'Enable It',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'dk_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Dk url',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'dk_enable';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'checkbox',
                'label' => 'Enable Dk',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'de_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'De url',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'de_enable';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'checkbox',
                'label' => 'Enable De',
                'section' => $this->id()
            )
        );

    }

    public function panel()
    {
        return 'front_page';
    }
}