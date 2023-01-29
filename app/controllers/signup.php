<?php 
    class Signup extends Controller
    {
        public function index()
        {
            $data['page_title'] = "signup";
            if($_SERVER['REQUEST_METHOD']=='POST'){

                
                show($_POST);
                $user = $this->load_model("User");
                $user->signup($_POST);
            }
            $this->view("signup", $data);
        }   

    }