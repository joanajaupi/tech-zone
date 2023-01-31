<?php 
    class Admin extends Controller
    {
        public function index()
        {
            
            $data['page_title'] = "Dashboard";
            $this->view("admin", $data);

        }   

    }
