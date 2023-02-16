<?php  
    class Categories extends Controller{

        public function index(){
            
        }
    public function get(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $category = $this->load_model("Category");
            $data = $category->getCategories();
            $arr['message'] = "Categories fetched successfully";
            $arr['message_type'] = "success";
            $arr['data'] = $data;
            echo json_encode($arr);
        }
    }
    public function delete(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data = file_get_contents("php://input");
            $data = json_decode($data);
            if(is_object($data)){
                $category = $this->load_model("Category");
                $check = $category->delete($data);
                if($check){
                    $arr['message'] = "Category deleted successfully";
                    $arr['message_type'] = "success";
                    $arr['data'] = $data;
                    echo json_encode($arr);
                }else{
                    $arr['message'] = "Category could not be deleted";
                    $arr['message_type'] = "error";
                    $arr['data'] = "";
                    echo json_encode($arr);
                }
            }
        }
    }
    public function create(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data = file_get_contents("php://input");
            $data = json_decode($data);
            if(is_object($data)){
                $category = $this->load_model("Category");
                $check = $category->create($data);
                if($check){
                    $arr['message'] = "Category created successfully";
                    $arr['message_type'] = "success";
                    $arr['data'] = $data;
                    echo json_encode($arr);
                }else{
                    $arr['message'] = "Category could not be created";
                    $arr['message_type'] = "error";
                    $arr['data'] = "";
                    echo json_encode($arr);
                }
            }
        }
    }

    public function getNumberOfCategories(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $category = $this->load_model("Category");
            $data = $category->getNumberOfCategories();
            $arr['message'] = "Number of categories fetched successfully";
            $arr['message_type'] = "success";
            $arr['data'] = $data;
            echo json_encode($arr);
        }
    }
    public function edit(){
        if($_SERVER['REQUEST_METHOD']== "PUT"){
            $data = file_get_contents("php://input");
            $data = json_decode($data);
            if(is_object($data)){
                $category = $this->load_model("Category");
                $check = $category->edit($data);
                if($check){
                    $arr['message'] = "Category edited successfully";
                    $arr['message_type'] = "success";
                    $arr['data'] = $data;
                    echo json_encode($arr);
                }else{
                    $arr['message'] = "Category could not be edited";
                    $arr['message_type'] = "error";
                    $arr['data'] = "";
                    echo json_encode($arr);
                }
            }
        }
    }
}