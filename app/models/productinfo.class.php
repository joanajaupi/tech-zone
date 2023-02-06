<?php
    class productinfo{
        public function get_products(){

            $db = Database::instance();
            $query = "SELECT * FROM product;";
            $result = $db->read($query);
            return $result;
        }
    }