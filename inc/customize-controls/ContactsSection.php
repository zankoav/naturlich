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
        return 'Contact Section';
    }

    public function description()
    {
        return 'Here you can customize contact section';
    }

    public function settingsControls($customizer)
    {
        $id = $this->id() . 'title';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'script';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Script yandex map',
                'section' => $this->id()
            )
        );
    }
}