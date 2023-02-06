<?php
class Products
{
    public function getAllProducts()
    {


        $db = Database::getInstance();
        $query = "SELECT * FROM product;";
        $result = $db->read($query);
        var_dump($result);
        return $result;
    }

    public function getAllProductsByCategory()
    {
        $db = Database::getInstance();
        $query = "SELECT * FROM product WHERE categoryID = placeholder;";
        $result = $db->read($query);
        var_dump($result);
        return $result;
    }
}
