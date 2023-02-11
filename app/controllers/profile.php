<?php
class Profile extends Controller
{
    public function index()
    {

        $user = $this->load_model("userInfo");
        $user_data = $user->check_login();
        if (!is_bool($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Profile";
        $this->view("profile", $data);
    }

    public function getInformation()
    {
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login();
        $data['name'] = $user_data->name;
        $data['surname'] = $user_data->surname;
        $data['email'] = $user_data->email;
        $data['phone'] = $user_data->phone;
        echo json_encode($data);
    }

    // public function editInformation()
    // {
    //     $products = $this->load_model("productinfo");
    //     $products = $products->get_products();
    //     $data['products'] = $products;
    //     $data['message'] = "Products fetched successfully";
    //     echo json_encode($data);
    // }

    // public function editPassword()
    // {
    // }
}
