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
        return 'Front Page';
    }

    public function description()
    {
        return 'You can change sections on Front Page';
    }
}