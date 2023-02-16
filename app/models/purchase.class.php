<?php 
    class Purchase{

        public function getPurchases(){
            $db = Database::instance();
            $sql = "SELECT * FROM purchase";
            $result = $db->read($sql);
            return $result;
        }

    }