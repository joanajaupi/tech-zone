<?php
    class productinfo{
        public function get_products(){

            $db = Database::instance();
            $query = "SELECT * FROM product;";
            $result = $db->read($query);
            return $result;
        }

        public function getByCategory($category){
            $db = Database::instance();
            $query = "SELECT * FROM product WHERE category = '$category';";
            $result = $db->read($query);
            return $result;
        }
    }