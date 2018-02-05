<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/2/18
 * Time: 3:16 PM
 */
abstract class BaseTable
{
    public $db;
    public $charsetCollate;

    function __construct()
    {
        global $wpdb;
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        $this->db = $wpdb;
        $this->charsetCollate = "DEFAULT CHARACTER SET {$this->db->charset} COLLATE {$this->db->collate}";
    }

    /**
     * @return string
     */
    public abstract function name();

    /**
     * @return string
     */
    public abstract function createSQL();


    public function fullName()
    {
        return $this->db->get_blog_prefix() . $this->name();
    }

    public function create()
    {
        dbDelta($this->createSQL());
    }

    /**
     * @param $product array
     * @return false|int
     */
    public function insert($product)
    {
        return $this->db->insert($this->fullName(), $product);
    }

    /**
     * @return mixed
     */
    public function selectAll()
    {
        return $this->db->get_results(
            "SELECT * FROM {$this->fullName()};",
            ARRAY_A
        );
    }

    /**
     * @param $product array
     * @param $where array
     * @return false|int
     */
    public function update($product, $where)
    {
        return $this->db->update($this->fullName(), $product, $where);
    }

    /**
     * @param $where array
     * @return false|int
     */
    public function delete($where)
    {
        return $this->db->delete($this->fullName(), $where);
    }

}