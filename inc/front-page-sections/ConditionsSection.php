<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/6/18
 * Time: 11:01 AM
 */
class ConditionsSection extends BaseSection
{

    public function id()
    {
        return 'naturlith_conditions_';
    }

    public function title()
    {
        return __('Conditions', 'naturlith');
    }

    public function description()
    {
        return __('Here you can customize conditions section', 'naturlith');
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

        $id = $this->id() . 'subtitle';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('Text', 'naturlith'),
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
                    'label' => __('Background image', 'naturlith'),
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
                'label' => __('Read more title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'read_more_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Read more URL', 'naturlith'),
                'section' => $this->id()
            )
        );
    }

    public function panel()
    {
        return 'front_page';
    }
}