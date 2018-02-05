<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/2/18
 * Time: 3:29 PM
 */
class NaturlithProductTable extends BaseTable
{

    public function name()
    {
        return 'naturlith_products';
    }

    public function createSQL()
    {
        return
            "CREATE TABLE {$this->fullName()} (
            id  bigint(20) unsigned NOT NULL auto_increment,
            slug varchar(64) NOT NULL UNIQUE,
            name varchar(255) NOT NULL DEFAULT '',
            description text,
            img_url varchar(255) NOT NULL DEFAULT '',
            PRIMARY KEY  (id)
            )
            {$this->charsetCollate};";
    }
}