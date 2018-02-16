<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/8/18
 * Time: 8:33 AM
 */
class ProductsSection extends BaseSection
{

    const COUNT_PRODUCT = 4;

    public function id()
    {
        return 'naturlith_products_';
    }

    public function title()
    {
        return 'Products';
    }

    public function description()
    {
        return '4 products on Main Page';
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

        $id = $this->id() . 'all';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'View all button title',
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'all_url';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'URL for all button',
                'section' => $this->id()
            )
        );

    }

    public function panel()
    {
        return 'front_page';
    }
}