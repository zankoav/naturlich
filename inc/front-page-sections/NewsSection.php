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

        $args = array('numberposts' => '-1');
        $posts = wp_get_recent_posts($args);
        $postsOptions = ['0' => 'Choose post'];

        foreach ($posts as $post){
            $postsOptions[$post["ID"]] = $post["post_title"];
        }

        $id = $this->id() . 'post_0';
        $customizer->add_setting($id,
            array('default' => '0')
        );
        $customizer->add_control($id,
            array(
                'label' => __('Post 1'),
                'type' => 'select',
                'choices' => $postsOptions,
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'post_1';
        $customizer->add_setting($id,
            array('default' => '0')
        );
        $customizer->add_control($id,
            array(
                'label' => __('Post 2'),
                'type' => 'select',
                'choices' => $postsOptions,
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'post_2';
        $customizer->add_setting($id,
            array('default' => '0')
        );
        $customizer->add_control($id,
            array(
                'label' => __('Post 3'),
                'type' => 'select',
                'choices' => $postsOptions,
                'section' => $this->id()
            )
        );

        $id = $this->id() . 'post_3';
        $customizer->add_setting($id,
            array('default' => '0')
        );
        $customizer->add_control($id,
            array(
                'label' => __('Post 4'),
                'type' => 'select',
                'choices' => $postsOptions,
                'section' => $this->id()
            )
        );
    }

    public function panel()
    {
        return 'front_page';
    }
}