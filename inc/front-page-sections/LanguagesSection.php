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
        return __('Languages', 'naturlith');
    }

    public function description()
    {
        return __('Here you can hide local', 'naturlith');
    }

    public function settingsControls($customizer)
    {
        $id = $this->id() . 'en_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('En url', 'naturlith'),
                'section' => $this->id()
            )
        );
        $id = $this->id() . 'en_enable';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'checkbox',
                'label' => __('Enable En', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'it_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('It url', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'it_enable';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'checkbox',
                'label' => __('Enable It', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'dk_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Dk url', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'dk_enable';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'checkbox',
                'label' => __('Enable Dk', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'de_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('De url', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'de_enable';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'checkbox',
                'label' => __('Enable De', 'naturlith'),
                'section' => $this->id()
            )
        );

    }

    public function panel()
    {
        return 'front_page';
    }
}