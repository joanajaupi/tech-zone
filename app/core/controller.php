<?php 
class Controller{
    public function view($path, $data = []){
        if(file_exists("../app/views/".$path.".php")){

            include "../app/views/".$path.".php";
        }
        else{
            include "../app/views/404.php";
        }
    }

}