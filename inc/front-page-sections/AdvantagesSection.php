<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/6/18
 * Time: 11:01 AM
 */
class AdvantagesSection extends BaseSection
{

    public function id()
    {
        return 'naturlith_advantages_';
    }

    public function title()
    {
        return __('Advantages', 'naturlith');
    }

    public function description()
    {
        return __('Here you can  customize advantages section', 'naturlith');
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

        $id = $this->id() . 'sub_title';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Sub Title', 'naturlith'),
                'section' => $this->id()
            )
        );

        // First item
        $id = $this->id() . 'title_item_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('First item title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'subtitle_item_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('First item subtitle', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'icon_item_0';
        $customizer->add_setting($id);

        $customizer->add_control(
            new WP_Customize_Image_Control(
                $customizer,
                $id,
                array(
                    'label' => __('First item icon (200x200 PNG)', 'naturlith'),
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        // Secound item
        $id = $this->id() . 'title_item_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Second item title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'subtitle_item_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('Second item subtitle', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'icon_item_1';
        $customizer->add_setting($id);

        $customizer->add_control(
            new WP_Customize_Image_Control(
                $customizer,
                $id,
                array(
                    'label' => __('Second item icon (200x200 PNG)', 'naturlith'),
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        // Tried item
        $id = $this->id() . 'title_item_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Tried item title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'subtitle_item_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('Tried item subtitle', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'icon_item_2';
        $customizer->add_setting($id);

        $customizer->add_control(
            new WP_Customize_Image_Control(
                $customizer,
                $id,
                array(
                    'label' => __('Tried item icon (200x200 PNG)', 'naturlith'),
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        // Fourth item
        $id = $this->id() . 'title_item_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Fourth item title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'subtitle_item_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('Fourth item subtitle', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'icon_item_3';
        $customizer->add_setting($id);

        $customizer->add_control(
            new WP_Customize_Image_Control(
                $customizer,
                $id,
                array(
                    'label' => __('Fourth item icon (200x200 PNG)', 'naturlith'),
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        // Fifth item
        $id = $this->id() . 'title_item_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Fifth item title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'subtitle_item_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => __('Fifth item subtitle', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'icon_item_4';
        $customizer->add_setting($id);

        $customizer->add_control(
            new WP_Customize_Image_Control(
                $customizer,
                $id,
                array(
                    'label' => __('Fifth item icon (200x200 PNG)', 'naturlith'),
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        // Right Image
        $id = $this->id() . 'right_image';
        $customizer->add_setting($id);

        $customizer->add_control(
            new WP_Customize_Image_Control(
                $customizer,
                $id,
                array(
                    'label' => __('Image right side (1000x1000 PNG)', 'naturlith'),
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        // Button 1
        $id = $this->id() . 'button_title_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('First button title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('First button url', 'naturlith'),
                'section' => $this->id()
            )
        );

        // Button 2
        $id = $this->id() . 'button_title_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Button second title', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Button second url', 'naturlith'),
                'section' => $this->id()
            )
        );
    }

    public function panel()
    {
        return 'front_page';
    }
}