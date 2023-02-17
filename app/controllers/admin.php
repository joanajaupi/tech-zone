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
        if ($user_data->admin == 1)
            $this->view("admin", $data);
        else
            header("Location:" . ROOT . "home");
    }

    public function categories()
    {
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login([1]);
        if (is_object($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Categories";
        if ($user_data->admin == 1)
            $this->view("categories", $data);
        else
            header("Location:" . ROOT . "home");
    }

    public function products($params = [])
    {

        if (empty($params)) {
            $user = $this->load_model("userInfo");
            $user_data = $user->check_login([1]);
            if (is_object($user_data)) {
                $data['user_data'] = $user_data;
            }
            $data['page_title'] = "Products";
            if ($user_data->admin == 1)
                $this->view("admin-products", $data);
            else
                header("Location:" . ROOT . "home");
        } else {

            //check if parameter is create edit or delete
            if ($params == "create") {
                $user = $this->load_model("userInfo");
                $user_data = $user->check_login([1]);
                if (is_object($user_data)) {
                    $data['user_data'] = $user_data;
                }
                $data['page_title'] = "Create Product";
                if ($user_data->admin == 1)
                    $this->view("product-create", $data);
                else
                    header("Location:" . ROOT . "home");
            }
        }
    }

    public function users()
    {
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login([1]);
        if (is_object($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Users";
        if ($user_data->admin == 1)
            $this->view("admin-users", $data);
        else
            header("Location:" . ROOT . "home");
    }

    public function orders()
    {
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login([1]);
        if (is_object($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Purchases";
        if ($user_data->admin == 1)
            $this->view("admin-orders", $data);
        else
            header("Location:" . ROOT . "home");
    }
}
