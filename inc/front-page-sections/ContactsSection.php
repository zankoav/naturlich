<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/6/18
 * Time: 11:01 AM
 */
class ContactsSection extends BaseSection
{

    public function id()
    {
        return 'naturlith_contact_';
    }

    public function title()
    {
        return __('Contact', 'naturlith');
    }

    public function description()
    {
        return __('Here you can customize contact section', 'naturlith');
    }

    public function settingsControls($customizer)
    {
        $id = $this->id() . 'title';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'script';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('Script yandex map', 'naturlith'),
                'section' => $this->id()
            )
        );
    }

    public function panel()
    {
        return 'front_page';
    }
}