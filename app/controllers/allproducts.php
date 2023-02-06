<?php
class allProducts extends Controller
{
    public function index()
    {
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login();
        if (!is_bool($user_data)) {
            $data['user_data'] = $user_data;
        }
        $products = $this->load_model("productinfo");
        $products = $products->get_products();
        $data['products'] = $products;
        $data['page_title'] = "All Products";
        $this->view("allproducts", $data);
    }

    public function get_products()
    {
        $db = Database::instance();
        $query = "SELECT * FROM product;";
        $result = $db->read($query);
        //rest api
        $data = array();
        $data['products'] = $result;
        echo json_encode($data);
    }
}
