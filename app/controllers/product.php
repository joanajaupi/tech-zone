<?php
class Product extends Controller
{
    public function index()
    {
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login();
        if (!is_bool($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Product";
        $category = $this->load_model("Category");
        $cats = $category->getCategories();
        $data['categories'] = $cats;
        $data['page_title'] = "Profile";
        $this->view("product", $data);
    }

    public function get()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $product = $this->load_model("productinfo");
            $data = $product->fetchAllProducts();
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
                $check = $product->delete($data->id);
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

    public function fetchProduct($productID)
    {
        $product = $this->load_model("productinfo");
        $data = $product->fetchProduct($productID);
        $arr['message'] = "Product fetched successfully";
        $arr['message_type'] = "success";
        $arr['data'] = $data;
        echo json_encode($arr);
    }

    public function purchaseItem($productID)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = file_get_contents("php://input");
            $data = json_decode($data);
            $user = $this->load_model("userInfo");
            $isLoggedIn = $user->check_login();
            if (!is_bool($isLoggedIn)) {
                $product = $this->load_model("productinfo");
                $canPurchase = $product->canPurchase($productID, $data->productQuantity);
                if ($canPurchase) {
                    $check = $product->purchase($productID, $isLoggedIn->userID, $data->productQuantity);
                    if ($check) {
                        $arr['message'] = "Product purchased successfully";
                        $arr['message_type'] = "success";
                        $arr['data'] = $data;
                        echo json_encode($arr);
                    } else {
                        $arr['message'] = "Product could not be purchased";
                        $arr['message_type'] = "error";
                        $arr['data'] = "";
                        echo json_encode($arr);
                    }
                } else {
                    $arr['message'] = "The quantity you entered is more than the available quantity";
                    $arr['message_type'] = "error";
                    $arr['data'] = "";
                    echo json_encode($arr);
                }
            } else {
                $arr['message'] = "You need to be logged in to purchase a product";
                $arr['message_type'] = "success";
                $arr['redirect'] = ROOT . "login";
                echo json_encode($arr);
            }
        }
    }

    public function getNumberOfPurchases(){
        $user = $this->load_model("userInfo");
        $isLoggedIn = $user->check_login();
        if (!is_bool($isLoggedIn)) {
            $product = $this->load_model("productinfo");
            $data = $product->getNumberOfPurchases();
            $arr['message'] = "Number of purchases fetched successfully";
            $arr['message_type'] = "success";
            $arr['data'] = $data;
            echo json_encode($arr);
        } else {
            $arr['message'] = "You need to be logged in to view your purchases";
            $arr['message_type'] = "success";
            $arr['redirect'] = ROOT . "login";
            echo json_encode($arr);
        }
    }
}
