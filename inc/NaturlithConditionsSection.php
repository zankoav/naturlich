<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/6/18
 * Time: 11:01 AM
 */
class NaturlithConditionsSection extends BaseSection
{

    public function id()
    {
        return 'naturlith_conditions_';
    }

    public function title()
    {
        return 'Conditions Section';
    }

    public function description()
    {
        return 'Here you can customize conditions section';
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

        $id = $this->id() . 'subtitle';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Text',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'background_image';
        $customizer->add_setting($id);

        $customizer->add_control(
            new WP_Customize_Image_Control(
                $customizer,
                $id,
                array(
                    'label' => 'Background image',
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        $id = $this->id() . 'read_more_title';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Read more title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'read_more_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Read more URL',
                'section' => $this->id()
            )
        );
    }
}