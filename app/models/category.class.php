<?php
class Category{

    public function create($data){
       $db = Database::getInstance();
       //check if category name is alphabets only
       $arr['category'] = ucwords($data->categoryName);
       if(!preg_match("/^[a-zA-Z]+$/", $arr['category'])){
           $_SESSION['error'] = "Category name must be alphabets only";
       }
       //check if category already exists
        $query = "SELECT * FROM category WHERE categoryName = :category";
            $result = $db->read($query, $arr);
            if(is_array($result)){
                $_SESSION['error'] = "Category already exists";
            }
         if(!isset($_SESSION['error'])){
            $query = "INSERT INTO category (categoryName) VALUES (:category)";
            $result = $db->write($query, $arr);
            if($result){return true;}
            return false;
         }
        return false;
       
    }
    public function edit($data){
       
    }
    public function delete($data){
        $db = Database::getInstance();
        $arr['id'] = $data->categoryID;
        $query = "DELETE FROM category WHERE categoryID = :id";
        $result = $db->write($query, $arr);
        if($result){return true;}
        return false;
       
    }
    public function getCategories(){

        $db = Database::instance();
        $query = "SELECT * FROM category ORDER BY categoryID ASC";
        $result = $db->read($query);
        if(is_array($result)){
            return $result;
        }
        return false;
       
    }

   
}