<?php 
    class Purchases extends Controller{

        public function getPurchases(){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $purchase = $this->load_model("Purchase");
                $data = $purchase->getPurchases();
                $arr['message'] = "Purchases fetched successfully";
                $arr['message_type'] = "success";
                $arr['data'] = $data;
                echo json_encode($arr);
            }
        }
    }