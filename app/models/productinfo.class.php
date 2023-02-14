<?php
class productinfo
{
    public function fetchAllProducts()
    {

        $db = Database::instance();
        $query = "SELECT * FROM product;";
        $result = $db->read($query);
        return $result;
    }

    public function fetchByCategory($category)
    {
        $category =  trim(filter_var($category, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $db = Database::instance();
        $query = "SELECT * FROM product JOIN category ON product.productCategoryID = category.categoryID
        WHERE categoryName='$category';";
        $result = $db->read($query);
        return $result;
    }


    public function create($productName, $productPrice, $productDescription, $productImage, $productCategory, $productQuantity)
    {
        $db = Database::instance();
        $arr['productName'] = $productName;
        $arr['productPrice'] = $productPrice;
        $arr['productDescription'] = $productDescription;
        $arr['productImage'] = $productImage;
        $arr['productCategory'] = $productCategory;
        $arr['productQuantity'] = $productQuantity;
        $query = "INSERT INTO product (productName, productPrice, productDescription, productImage, productCategoryID, productQuantity) VALUES (:productName, :productPrice, :productDescription, :productImage, :productCategory, :productQuantity)";
        $result = $db->write($query, $arr);
        if ($result) {
            return true;
        }
        return false;
    }


    public function delete($id)
    {
        $db = Database::instance();
        $arr['id'] = $id;
        $query = "DELETE FROM product WHERE productID = :id";
        $result = $db->write($query, $arr);
        if ($result) {
            return true;
        }
        return false;
    }
}
