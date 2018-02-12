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
        return 'Products section';
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

//        global
//        $productPage;
//        $products = $productPage->getTableHelper()->selectAllNamesAndId();

        $choices = array('' => '--');

//        foreach ($products as $product) {
//            $choices[$product["id"]] = $product["name"];
//        }


        for ($i = 0; $i < self::COUNT_PRODUCT; $i++) {
            $id = "{$this->id()}product_{$i}";
            $customizer->add_setting($id, ['default' => '--']);
            $index = $i + 1;
            $customizer->add_control($id,
                array(
                    'label' => "Product {$index}",
                    'section' => $this->id(),
                    'type' => 'select',
                    'choices' => $choices
                )
            );
        }

        $id = $this->id() . 'all';
        $customizer->add_setting($id);
        $customizer->add_control($id,
            array(
                'type' => 'text',
                'label' => 'View all button title',
                'section' => $this->id()
            )
        );

    }
}