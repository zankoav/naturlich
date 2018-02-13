<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/13/18
 * Time: 6:57 PM
 */
class NewsSection extends BaseSection
{

    public function id()
    {
        return 'naturlith_news_';
    }

    public function title()
    {
        return 'News';
    }

    public function description()
    {
        return 'Four news';
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
    }

    public function panel()
    {
        return 'front_page';
    }
}