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
        return 'Advantages';
    }

    public function description()
    {
        return 'Here you can  customize advantages section';
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

        // First item
        $id = $this->id() . 'title_item_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'First item title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'subtitle_item_0';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'First item subtitle',
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
                    'label' => 'First item icon (200x200 PNG)',
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
                'label' => 'Second item title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'subtitle_item_1';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Second item subtitle',
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
                    'label' => 'Second item icon (200x200 PNG)',
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
                'label' => 'Tried item title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'subtitle_item_2';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Tried item subtitle',
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
                    'label' => 'Tried item icon (200x200 PNG)',
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
                'label' => 'Fourth item title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'subtitle_item_3';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Fourth item subtitle',
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
                    'label' => 'Fourth item icon (200x200 PNG)',
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
                'label' => 'Fifth item title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'subtitle_item_4';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'textarea',
                'label' => 'Fifth item subtitle',
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
                    'label' => 'Fifth item icon (200x200 PNG)',
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
                    'label' => 'Image right side (1000x1000 PNG)',
                    'section' => $this->id(),
                    'settings' => $id
                )
            )
        );

        // Button
        $id = $this->id() . 'button_title';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'Button title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'button_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'URL',
                'section' => $this->id()
            )
        );
    }

    public function panel()
    {
        return 'front_page';
    }
}