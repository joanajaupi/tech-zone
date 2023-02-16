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

    public function fetchProduct($productID)
    {
        $db = Database::instance();
        $arr['productID'] = $productID;
        $query = "SELECT p.*, c.categoryName FROM product p JOIN category c ON p.productCategoryID = c.categoryID WHERE p.productID = :productID";
        $result = $db->read($query, $arr);
        return $result;
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

    public function canPurchase($productID, $quantity)
    {
        $db = Database::instance();
        $arr['productID'] = $productID;
        $query = "SELECT productQuantity FROM product WHERE productID = :productID";
        $result = $db->read($query, $arr);
        if ($result[0]->productQuantity >= $quantity) {
            return true;
        }
        return false;
    }

    public function purchase($productID, $userID, $productQuantity)
    {
        $productPrice = $this->readPrice($productID);
        $productName = $this->readName($productID);
        $this->removeQuantity($productID, $productQuantity);
        $db = Database::instance();

        $arr['productPrice'] = $productPrice;
        $arr['productQuantity'] = $productQuantity;
        $arr['totalPrice'] = $productPrice * $productQuantity;
        $arr['productName'] = $productName;
        $arr['userID'] = $userID;
        $arr['purchasedAt'] = date("Y-m-d H:i:s");
        $query = "INSERT INTO purchase ( userID, productQuantity, productPrice, totalPrice, productName, purchasedAt) VALUES (:userID, :productQuantity, :productPrice, :totalPrice, :productName, :purchasedAt)";

        $result = $db->write($query, $arr);

        if ($result) {
            return true;
        }
        return false;
    }

    function readPrice($productID)
    {
        $db = Database::instance();
        $arr['productID'] = $productID;
        $query = "SELECT productPrice FROM product WHERE productID = :productID";
        $result = $db->read($query, $arr);
        return $result[0]->productPrice;
    }

    function readName($productID)
    {
        $db = Database::instance();
        $arr['productID'] = $productID;
        $query = "SELECT productName FROM product WHERE productID = :productID";
        $result = $db->read($query, $arr);
        return $result[0]->productName;
    }

    function removeQuantity($productID, $productQuantity)
    {
        $db = Database::instance();
        $arr['productID'] = $productID;
        $arr['productQuantity'] = $productQuantity;
        $query = "UPDATE product SET productQuantity = productQuantity - :productQuantity WHERE productID = :productID";
        $result = $db->write($query, $arr);
    }

    public function fetchAllPurchases($userID)
    {
        $db = Database::instance();
        $arr['userID'] = $userID;
        $query = "SELECT transactionID, productName, productPrice, productQuantity,totalPrice,purchasedAt FROM purchase WHERE userID = :userID";
        $result = $db->read($query, $arr);
        return $result;
    }

    public function getNumberOfProducts()
    {
        $db = Database::instance();
        $query = "SELECT COUNT(*) AS numberOfProducts FROM product";
        $result = $db->read($query);
        return $result[0]->numberOfProducts;
    }
    public function getNumberOfPurchases()
    {
        $db = Database::instance();
        $query = "SELECT COUNT(*) AS numberOfPurchases FROM purchase";
        $result = $db->read($query);
        return $result[0]->numberOfPurchases;
    }

    public function addStock($productID, $productQuantity)
    {
        $db = Database::instance();
        $arr['productID'] = $productID;
        $arr['productQuantity'] = $productQuantity;
        $query = "UPDATE product SET productQuantity = productQuantity + :productQuantity WHERE productID = :productID";
        $result = $db->write($query, $arr);
        if ($result) {
            return true;
        }
        return false;
    }
}
