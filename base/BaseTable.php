<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/2/18
 * Time: 3:16 PM
 */
abstract class BaseTable implements Setup
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

    public function setup()
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
     * @return mixed
     */
    public function selectAllNamesAndId()
    {
        return $this->db->get_results(
            "SELECT id, name FROM {$this->fullName()};",
            ARRAY_A
        );
    }

    /**
     * @return mixed
     */
    public function selectAllReverse()
    {
        return $this->db->get_results(
            "SELECT * FROM {$this->fullName()} ORDER BY `id` DESC;",
            ARRAY_A
        );
    }

    /**
     * @return mixed
     */
    public function selectItemById($id)
    {
        //select TOP 5 from users order by user_id DESC
        $id = (int)$id;
        return $this->db->get_results(
            $this->db->prepare("SELECT * FROM {$this->fullName()} WHERE id = %d", $id),
            ARRAY_A
        )[0];
    }

    /**
     * @return mixed
     */
    public function selectItemsByIds($ids)
    {
        $idStr = implode(', ', $ids);
        $different = array_count_values($ids);
        $sql = "SELECT * FROM {$this->fullName()} WHERE id IN ({$idStr});";
        $products = $this->db->get_results($sql, ARRAY_A);
        $result = [];
        foreach ($products as $product) {
            $id = $product["id"];
            for ($i = 0; $i < $different[$id]; $i++) {
                $result[] = $product;
            }
        }
        return $result;
    }

    /**
     * @return mixed
     */
    public function selectLastInsertedItem()
    {
        //select TOP 5 from users order by user_id DESC
        return $this->db->get_results(
            "SELECT * FROM {$this->fullName()} ORDER BY `id` DESC LIMIT 1;",
            ARRAY_A
        )[0];
    }

    /**
     * @return mixed
     */
    public function selectWithLimit($limit)
    {
        return $this->db->get_results(
            "SELECT * FROM {$this->fullName()} LIMIT {$limit};",
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