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
        $this->tableHelper->create();
        get_template_part('inc/templates/content', 'admin');
    }

    public function addAjaxActions()
    {
        add_action('wp_ajax_add_product', array($this, 'addProductCallback'));
    }

    public function addProductCallback()
    {
        $status = self::ERROR_CODE_SERVER;
        $answer = array('status' => $status);

        if (isset($_POST['action']) and $_POST['action'] == 'add_product') {
            $name = $_POST['name'];
            $slug = $this->getSlug($name);
            $description = $_POST['description'];
            $imgUrl = $_POST['image'];
            $product = [
                'name' => $name,
                'description' => $description,
                'img_url' => $imgUrl
            ];
            $answer['status'] = $this->tableHelper->insert([
                'slug' => $slug,
                'name' => $name,
                'description' => $description,
                'img_url' => $imgUrl
            ]) ? self::SUCCESS : self::ERROR_CODE_SAME_NAME;

            if ($answer['status'] == self::SUCCESS){
                $answer['product'] = $product;
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