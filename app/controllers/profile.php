<?php 
    class Profile extends Controller
    {
        public function index()
        {
            
            $user = $this->load_model("userInfo");
            $user_data = $user->check_login();
            if(!is_bool($user_data)){
                $data['user_data'] = $user_data;
            }
            $data['page_title'] = "Profile";
            $this->view("profile", $data);

        }   

    }