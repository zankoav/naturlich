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
        return __('Products', 'naturlith');
    }

    public function description()
    {
        return __('4 products on Main Page', 'naturlith');
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

        $id = $this->id() . 'acoustic';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Tab 1', 'naturlith'),
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'construct';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => __('Tab 2', 'naturlith'),
                'section' => $this->id()
            )
        );

    }

    public function panel()
    {
        return 'front_page';
    }
}