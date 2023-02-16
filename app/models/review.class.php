<?php

class review
{

    public function fetchReviews($productID)
    {
        $db = Database::getInstance();
        $query = "SELECT u.name, r.review, r.publishedAt, r.rate
                        FROM reviews r JOIN userInfo u ON r.userID = u.userID WHERE r.productID = :productID";
        $arr['productID'] = $productID;
        $result = $db->read($query, $arr);
        return $result;
    }

    public function createReview($productID, $userID, $review, $rate)
    {
        $db = Database::instance();
        $date = date("Y-m-d H:i:s");
        $query = "INSERT INTO reviews (productID, userID, review, rate, publishedAt) VALUES (:productID, :userID, :review, :rate, :publishedAt)";
        $arr['productID'] = $productID;
        $arr['userID'] = $userID;
        $arr['review'] = $review;
        $arr['rate'] = $rate;
        $arr['publishedAt'] = $date;
        $result = $db->write($query, $arr);
        return $result;
    }

    public function hasWrittenReview($productID, $userID)
    {
        $db = Database::instance();
        $query = "SELECT * FROM reviews WHERE productID = :productID AND userID = :userID";
        $arr['productID'] = $productID;
        $arr['userID'] = $userID;
        $result = $db->read($query, $arr);
        if ($result) {
            return  true;
        } else {
            return false;
        }
    }
}
