<?php 
    class Product extends Controller
    {
        public function index()
        {
            $product = $this->load_model("productinfo");
            $data['page_title'] = "Product";
            $product_data = $product->get_product();
            $data['product_data'] = $product_data;
            $this->view("product", $data);
        }   

    }