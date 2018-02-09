<?php

/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 2/1/18
 * Time: 6:57 PM
 */
class NaturlithProductPage extends BaseAdminPage
{

    const ERROR_CODE_SERVER = 0;
    const ERROR_CODE_SAME_NAME = 1;

    const SUCCESS = 'success';

    private $tableHelper;

    public function __construct()
    {
        parent::__construct();
        $this->tableHelper = new NaturlithProductTable();
    }

    /**
     * @return string
     */
    public function label()
    {
        return 'Products';
    }

    /**
     * @return string
     */
    public function title()
    {
        return 'Products';
    }

    /**
     * @return string
     */
    public function slug()
    {
        return 'naturlith-products';
    }

    /**
     * @return integer
     */
    public function order()
    {
        return 4;
    }

    /**
     * @return string
     */
    public function icon()
    {
        return 'dashicons-cart';
    }

    /**
     * @return array
     */
    public function styles()
    {
        return array(
            'icons_admin' => $this->themeUrl . '/css/fontawesome/css/fontawesome-all.css',
            'bootstrap4_admin_css' => $this->themeUrl . '/css/bootstrap4/bootstrap.min.css',
            'naturlith_admin_custom_css' => $this->themeUrl . '/css/admin.css'
        );
    }

    /**
     * @return array
     */
    public function scripts()
    {
        return array(
            'bootstrap4_admin_js' => $this->themeUrl . '/js/bootstrap4/bootstrap.bundle.min.js',
            'naturlith_admin_custom_js' => $this->themeUrl . '/js/admin-bundle.js'
        );
    }

    /**
     * @return void
     */
    public function load()
    {
        $this->tableHelper->setup();
        get_template_part('inc/templates/content', 'admin');
    }

    public function addAjaxActions()
    {
        add_action('wp_ajax_create_product', array($this, 'createProductCallback'));
        add_action('wp_ajax_get_product_by_id', array($this, 'getProductByIdCallback'));
        add_action('wp_ajax_edit_product', array($this, 'editProductCallback'));
        add_action('wp_ajax_remove_product', array($this, 'removeProductCallback'));
    }

    public function getProductByIdCallback()
    {
        $status = self::ERROR_CODE_SERVER;
        $answer = array('status' => $status);
        if (isset($_POST['action']) and $_POST['action'] == 'get_product_by_id' and $data = $_POST['data']) {
            $id = $data['id'];
            if (isset($id)) {
                $answer['product'] = $this->tableHelper->selectItemById($id);
            }
        }
        echo json_encode($answer);
        wp_die();
    }

    public function editProductCallback()
    {
        $status = self::ERROR_CODE_SERVER;
        $answer = array('status' => $status);

        if (isset($_POST['action']) and $_POST['action'] == 'edit_product' and $data = $_POST['data']) {

            $id = $data['id'];
            $data['slug'] = $this->getSlug($data['name']);

            $answer['status'] = $this->tableHelper->update($data, ['id' => $id]) ?
                self::SUCCESS :
                self::ERROR_CODE_SAME_NAME;

            if ($answer['status'] == self::SUCCESS) {
                $answer["product"] = $this->tableHelper->selectItemById($id);
            }

        }
        echo json_encode($answer);
        wp_die();
    }

    public function createProductCallback()
    {
        $status = self::ERROR_CODE_SERVER;
        $answer = array('status' => $status);

        if (isset($_POST['action']) and $_POST['action'] == 'create_product' and $data = $_POST['data']) {
            $data['slug'] = $this->getSlug($data['name']);
            $answer['status'] = $this->tableHelper->insert($data) ? self::SUCCESS : self::ERROR_CODE_SAME_NAME;
            if ($answer['status'] == self::SUCCESS) {
                $answer['product'] = $this->tableHelper->selectLastInsertedItem();
            }
        }
        echo json_encode($answer);
        wp_die();
    }

    public function removeProductCallback()
    {
        $status = self::ERROR_CODE_SERVER;
        $answer = array('status' => $status);
        $data = $_POST['data'];
        if (isset($_POST['action']) and $_POST['action'] == 'remove_product' and isset($data)) {
            $id = $data['id'];
            if (isset($id)) {
                $answer['status'] = $this->tableHelper->delete([
                    'id' => $id
                ]) ? self::SUCCESS : self::ERROR_CODE_SAME_NAME;
            }

            if ($answer['status'] == self::SUCCESS) {
                $answer['id'] = $id;
            }
        }

        echo json_encode($answer);
        wp_die();
    }

    /**
     * @return NaturlithProductTable
     */
    public function getTableHelper()
    {
        return $this->tableHelper;
    }

}