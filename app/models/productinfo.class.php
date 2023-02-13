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


        public function create($productName, $productPrice, $productDescription, $productImage, $productCategory, $productQuantity){
            $db = Database::instance();
            $arr['productName'] = $productName;
            $arr['productPrice'] = $productPrice;
            $arr['productDescription'] = $productDescription;
            $arr['productImage'] = $productImage;
            $arr['productCategory'] = $productCategory;
            $arr['productQuantity'] = $productQuantity;
            $query = "INSERT INTO product (productName, productPrice, productDescription, productImage, productCategoryID, productQuantity) VALUES (:productName, :productPrice, :productDescription, :productImage, :productCategory, :productQuantity)";
            $result = $db->write($query, $arr);
            if($result){return true;}
            return false;
        }
    }