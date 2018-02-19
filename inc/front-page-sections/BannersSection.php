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
        return __('Main Slider', 'naturlith');
    }

    public function description()
    {
        return __('Slider on main page (1500x600)', 'naturlith');
    }

    public function settingsControls($customizer)
    {
        // First slide
        $id = $this->id() . 'title_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('First title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'sub_title_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('First sub title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('First description', 'naturlith'),
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
                    'label' => __('First Slide', 'naturlith'),
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
                'label' => __('First button title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('First button url', 'naturlith'),
                'section' => $this->id()
            )
        );

        // Second slide
        $id = $this->id() . 'title_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Second title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'sub_title_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Second sub title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('Second description', 'naturlith'),
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
                    'label' => __('Second Slide', 'naturlith'),
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
                'label' => __('Second button title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Second button url', 'naturlith'),
                'section' => $this->id()
            )
        );

        // Tried slide
        $id = $this->id() . 'title_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Tried title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'sub_title_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Tried sub title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('Tried description', 'naturlith'),
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
                    'label' => __('Tried Slide', 'naturlith'),
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
                'label' => __('Tried button title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Tried button url', 'naturlith'),
                'section' => $this->id()
            )
        );

        // Fourth slide
        $id = $this->id() . 'title_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Fourth title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'sub_title_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Fourth sub title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('Fourth description', 'naturlith'),
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
                    'label' => __('Fourth Slide', 'naturlith'),
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
                'label' => __('Fourth button title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Fourth button url', 'naturlith'),
                'section' => $this->id()
            )
        );

        // Fifth slide
        $id = $this->id() . 'title_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Fifth title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'sub_title_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Fifth sub title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'description_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('Fifth description', 'naturlith'),
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
                    'label' => __('Fifth Slide', 'naturlith'),
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
                'label' => __('Fifth button title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Fifth button url', 'naturlith'),
                'section' => $this->id()
            )
        );
    }

    public function panel()
    {
        return 'front_page';
    }
}