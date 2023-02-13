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
        //te nav bar
        $category = $this->load_model("Category");
        $cats = $category->getCategories();
        $data['categories'] = $cats;
        $data['page_title'] = "All Products";
        $this->view("allproducts", $data);
    }

    public function fetchAll()
    {
        $products = $this->load_model("productinfo");
        $products = $products->fetchAllProducts();
        $data['products'] = $products;
        $data['message'] = "Products fetched successfully";
        echo json_encode($data);
    }

    public function fetchByCategory($category)
    {
        $products = $this->load_model("productinfo");
        $products = $products->fetchByCategory($category);
        $data['products'] = $products;
        $data['message'] = "Products fetched successfully";
        echo json_encode($data);
    }
}
