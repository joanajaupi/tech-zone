<?php
class Category{
    public function create($data){
       $db = Database::getInstance();
       $arr['category'] = ucwords($data->data);
       if(!preg_match("/^[a-zA-Z]+$/", $arr['category'])){
           $_SESSION['error'] = "Category name must be alphabets only";
       }
       if(isset($_SESSION['error']) || $_SESSION['error'] != ""){
            $query = "INSERT INTO category (categoryName) VALUES (:category)";
            $result = $db->write($query, $arr);
            if($result){return true;}
       }
        return false;
       
    }
    public function edit($data){
       
    }
    public function delete($data){
       
    }
    public function getCategories(){
       
    }

}