<?php
class Admin extends Controller
{
    // if somebody tries to enter localhost/public/admin without being logged in, they will be redirected to login page
    public function index()
    {
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login([1]);
        if (is_object($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Dashboard";
        $this->view("admin", $data);
    }

    public function categories()
    {
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login([1]);
        if (is_object($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Categories";
        $this->view("categories", $data);
        
    }

    public function products($params = []){

        if(empty($params)){
            $user = $this->load_model("userInfo");
            $user_data = $user->check_login([1]);
            if (is_object($user_data)) {
                $data['user_data'] = $user_data;
            }
            $data['page_title'] = "Products";
            $this->view("admin-products", $data);
        }else{
            
            //check if parameter is create edit or delete
            if($params == "create"){
                $user = $this->load_model("userInfo");
                $user_data = $user->check_login([1]);
                if (is_object($user_data)) {
                    $data['user_data'] = $user_data;
                }
                $data['page_title'] = "Create Product";
                $this->view("product-create", $data);
        }
    }
}

    public function users(){
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login([1]);
        if (is_object($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Users";
        $this->view("admin-users", $data);
    }

    public function orders(){
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login([1]);
        if (is_object($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Purchases";
        $this->view("admin-orders", $data);
    }
}