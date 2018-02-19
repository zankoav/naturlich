<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/13/18
 * Time: 6:32 PM
 */
class FrontPagePanel extends BasePanel
{

    public function priority()
    {
        return 10;
    }

    public function id()
    {
        return 'front_page';
    }

    public function title()
    {
        return __('Front Page', 'naturlith');
    }

    public function description()
    {
        return __('You can change sections on Front Page', 'naturlith');
    }
}