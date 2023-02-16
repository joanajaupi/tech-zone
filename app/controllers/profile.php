<?php
class Profile extends Controller
{
    public function index()
    {
        $user = $this->load_model("userInfo");
        $user_data = $user->check_login();
        if (!is_bool($user_data)) {
            $data['user_data'] = $user_data;
        } else {
            header("Location:" . ROOT . "login");
            die;
        }
        $category = $this->load_model("Category");
        $cats = $category->getCategories();
        $data['categories'] = $cats;
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

    public function updateInformation()
    {
        if ($_SERVER['REQUEST_METHOD'] == "PUT") {
            $data = file_get_contents("php://input");
            $data = json_decode($data);
            if (is_object($data)) {
                $user = $this->load_model("userInfo");
                $user_data = $user->check_login();

                $check = $user->updateInformation($data->name, $data->surname, $data->phone, $user_data->userID);
                if ($check) {
                    $arr['message'] = "Information updated successfully";
                    $arr['message_type'] = "success";
                    $arr['data'] = $data;
                    echo json_encode($arr);
                } else {
                    $arr['message'] = "Information could not be updated";
                    $arr['message_type'] = "error";
                    $arr['data'] = "";
                    echo json_encode($arr);
                }
            }
        }
    }

    public function changePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == "PUT") {
            $data = file_get_contents("php://input");
            $data = json_decode($data);
            if (is_object($data)) {
                $user = $this->load_model("userInfo");
                $user_data = $user->check_login();
                $check = $user->changePassword($data->newPassword, $user_data->userID);
                if ($check) {
                    $arr['message'] = "Password changed successfully";
                    $arr['message_type'] = "success";
                    $arr['data'] = $data;
                    echo json_encode($arr);
                } else {
                    $arr['message'] = "Password could not be changed";
                    $arr['message_type'] = "error";
                    $arr['data'] = "";
                    echo json_encode($arr);
                }
            }
        }
    }

    public function getUsers()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $user = $this->load_model("userInfo");
            $data = $user->getUsers();
            $arr['message'] = "Users fetched successfully";
            $arr['message_type'] = "success";
            $arr['data'] = $data;
            echo json_encode($arr);
        }
    }

    public function getNumberOfUsers()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $user = $this->load_model("userInfo");
            $data = $user->getNumberOfUsers();
            $arr['message'] = "Number of users fetched successfully";
            $arr['message_type'] = "success";
            $arr['data'] = $data;
            echo json_encode($arr);
        }
    }

    public function getPurchases()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $user = $this->load_model("userInfo");
            $user_data = $user->check_login();
            if (!is_bool($user_data)) {
                $product = $this->load_model("productinfo");
                $data = $product->fetchAllPurchases($user_data->userID);
                $arr['message'] = "Purchases fetched successfully";
                $arr['message_type'] = "success";
                $arr['data'] = $data;
                echo json_encode($arr);
            } else {
                $arr['message'] = "Purchases could not be fetched";
                $arr['message_type'] = "error";
                $arr['data'] = "";
                echo json_encode($arr);
            }
        }
    }
}
