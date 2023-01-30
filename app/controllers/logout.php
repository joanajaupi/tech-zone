<?php
class Logout extends Controller
{
    public function index()
    {
        $user = $this->load_model("userInfo");
        $user->logout();
        $data['page_title'] = "Home";

    }   

}