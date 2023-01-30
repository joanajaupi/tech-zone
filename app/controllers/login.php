<?php 
    class Login extends Controller
    {
        public function index()
        {
            $data['page_title'] = "Login";
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $user = $this->load_model("userInfo");
                $user->login($_POST);
            }
            $this->view("login", $data);
        }   



    }