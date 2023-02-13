<?php 
    class Product extends Controller
    {
        public function index()
        {
            $product = $this->load_model("productinfo");
            $data['page_title'] = "Product";
            $product_data = $product->get_products();
            $data['product_data'] = $product_data;
            $this->view("product", $data);
        }

        public function get()
        {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $product = $this->load_model("productinfo");
                $data = $product->get_products();
                $arr['message'] = "Products fetched successfully";
                $arr['message_type'] = "success";
                $arr['data'] = $data;
                echo json_encode($arr);
            }
        }

        public function delete()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $data = file_get_contents("php://input");
                $data = json_decode($data);
                if (is_object($data)) {
                    $product = $this->load_model("productinfo");
                    $check = $product->delete($data);
                    if ($check) {
                        $arr['message'] = "Product deleted successfully";
                        $arr['message_type'] = "success";
                        $arr['data'] = $data;
                        echo json_encode($arr);
                    } else {
                        $arr['message'] = "Product could not be deleted";
                        $arr['message_type'] = "error";
                        $arr['data'] = "";
                        echo json_encode($arr);
                    }
                }
            }
        }

        public function create()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $data = file_get_contents("php://input");
                $data = json_decode($data);
                if (is_object($data)) {
                    $product = $this->load_model("productinfo");
                    $check = $product->create($data->productName, $data->productPrice, $data->productDescription, $data->productImage, $data->productCategory, $data->productQuantity);
                    if ($check) {
                        $arr['message'] = "Product created successfully";
                        $arr['message_type'] = "success";
                        $arr['data'] = $data;
                        echo json_encode($arr);
                    } else {
                        $arr['message'] = "Product could not be created";
                        $arr['message_type'] = "error";
                        $arr['data'] = "";
                        echo json_encode($arr);
                    }
                }
            }
        }
        

    }