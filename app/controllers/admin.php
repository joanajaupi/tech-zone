<?php 
    class Admin extends Controller
    {
        // if somebody tries to enter localhost/public/admin without being logged in, they will be redirected to login page
        public function index()
        {
            $user = $this->load_model("userInfo");
            $user_data = $user->check_login([1]);
            if(is_object($user_data)){
                $data['user_data'] = $user_data;
            }
            $data['page_title'] = "Dashboard";
            $this->view("admin", $data);

        }

        public function categories()
        {

            $user = $this->load_model("userInfo");
            $user_data = $user->check_login([1]);
            if(is_object($user_data)){
                $data['user_data'] = $user_data;
            }
            $category = $this->load_model("Category");
            $cats = $category->getCategories();
            $c = $category->make_table($cats);
            if(is_array($cats)){
                $data['cats'] = $c;
            }
            $data['page_title'] = "Dashboard";
            $this->view("categories", $data);

        }

    }
