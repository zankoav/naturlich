<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/5/18
 * Time: 4:50 PM
 */
class BannersSection extends BaseSection
{

    public function id()
    {
        return 'naturlith_banners_';
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
        $id = $this->id() . 'title_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'First title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'sub_title_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'First sub title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'First description',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'slide_0';
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

        $id = $this->id() . 'button_title_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'First button title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'First button url',
                'section' => $this->id()
            )
        );

        // Second slide
        $id = $this->id() . 'title_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Second title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'sub_title_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Second sub title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Second description',
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
                    'label' => 'Second Slide',
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        $id = $this->id() . 'button_title_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Second button title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Second button url',
                'section' => $this->id()
            )
        );

        // Tried slide
        $id = $this->id() . 'title_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Tried title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'sub_title_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Tried sub title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Tried description',
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
                    'label' => 'Tried Slide',
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        $id = $this->id() . 'button_title_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Tried button title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Tried button url',
                'section' => $this->id()
            )
        );

        // Fourth slide
        $id = $this->id() . 'title_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Fourth title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'sub_title_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Fourth sub title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Fourth description',
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
                    'label' => 'Fourth Slide',
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        $id = $this->id() . 'button_title_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Fourth button title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Fourth button url',
                'section' => $this->id()
            )
        );

        // Fifth slide
        $id = $this->id() . 'title_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Fifth title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'sub_title_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Fifth sub title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Fifth description',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'slide_4';
        $customizer->add_setting($id);

        $customizer->add_control(
            new WP_Customize_Image_Control(
                $customizer,
                $id,
                array(
                    'label' => 'Fifth Slide',
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        $id = $this->id() . 'button_title_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Fifth button title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Fifth button url',
                'section' => $this->id()
            )
        );
    }

    public function panel()
    {
        return 'front_page';
    }
}