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

        $db = Database::instance();
        $query = "SELECT * FROM category";
        $result = $db->read($query);
        if(is_array($result)){
            return $result;
        }
        return false;
       
    }

    public function make_table($cats){
        $result = "";
        if(is_array($cats)){
            foreach ($cats as $cat_row){
                $result.= "<tr>";

                $result.= '
                <td>'.$cat_row->categoryID.'</td>
                <td>'.$cat_row->categoryName . '</td>
                <td>
                <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </td>
              </tr>';

            }

        }
        return $result;
    }
}