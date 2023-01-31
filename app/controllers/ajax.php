<?php  
    class Ajax extends Controller{

        public function index(){
            $data = file_get_contents("php://input");
            $data = json_decode($data);

            if(is_object($data)){
                if($data->type = "category"){
                    $category = $this->load_model("category");
                    $check = $category->create($data);
                    if($_SESSION['error'] != ""){
                        $arr['message'] = $_SESSION['error'];
                        $arr['message_type'] = "error";
                        $arr['data'] = "";
                        echo json_encode($arr);

                }
            }
        }
    }