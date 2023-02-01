<?php  
    class Ajax extends Controller{

        public function index(){
            $data = file_get_contents("php://input");
            $data = json_decode($data);

            if(is_object($data)){
                if($data->type = "add_category"){
                    $category = $this->load_model("Category");
                    $check = $category->create($data);
                    if(!isset($_SESSION['error']) || $_SESSION['error'] != ""){
                        $arr['message'] = $_SESSION['error'];
                        $_SESSION['error'] = "";
                        $arr['message_type'] = "error";
                        $arr['data'] = "";
                        echo json_encode($arr);
                    }else{
                        $arr['message'] = "Category created successfully";
                        $arr['message_type'] = "success";
                        $arr['data'] = $data->data;
                       
                        echo json_encode($arr);
                    }
            }
        }
    }


}