<?php 
    class Home extends Controller
    {
        public function index()
        {
            $data['page_title'] = "Home";
            $carousel = $this->load_model("Carousel");  
            $data['carousel'] = $carousel->getCarousel();   
            $this->view("home", $data);

        }   

    }