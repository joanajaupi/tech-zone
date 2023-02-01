<?php
class allProducts extends Controller
{
    public function index()
    {
        // $product = $this->load_model("productinfo");
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login();
        if (!is_bool($user_data)) {
            $data['user_data'] = $user_data;
        }
        $category = $this->load_model("Category");
        $cats = $category->getCategories();
        $data['categories'] = $cats;
        $data['page_title'] = "allProducts";
        // $product_data = $product->get_product();
        // $data['product_data'] = $product_data;
        $this->view("allProducts", $data);
    }
}
