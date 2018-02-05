<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/5/18
 * Time: 4:50 PM
 */
class NaturlithBannersSection extends BaseSection
{

    public function id()
    {
        return 'naturlith_banners_slider';
    }

    public function title()
    {
        return 'Main Slider';
    }

    public function description()
    {
        return 'Slider on main page (1500x600)';
    }

    public function settingsControls($customizer)
    {
        // First slide
        $id = $this->id() . 'title_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'First title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'First description',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'slide_1';
        $customizer->add_setting($id);

        $customizer->add_control(
            new WP_Customize_Image_Control(
                $customizer,
                $id,
                array(
                    'label' => 'First Slide',
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        // Second slide
        $id = $this->id() . 'title_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Second title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Second description',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'slide_2';
        $customizer->add_setting($id);

        $customizer->add_control(
            new WP_Customize_Image_Control(
                $customizer,
                $id,
                array(
                    'label' => 'Second Slide',
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        // Tried slide
        $id = $this->id() . 'title_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Tried title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Tried description',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'slide_3';
        $customizer->add_setting($id);

        $customizer->add_control(
            new WP_Customize_Image_Control(
                $customizer,
                $id,
                array(
                    'label' => 'Tried Slide',
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );
    }
}