<?php
class reviews extends Controller
{

    public function fetchReviews($productID)
    {
        $review = $this->load_model("review");
        $data = $review->fetchReviews($productID);
        if (isset($_SESSION['userID'])) {
            $arr['userID'] = $_SESSION['userID'];
        }
        if ($data == false) {
            $arr['message'] = "No reviews found";
            $arr['message_type'] = "error";
            $arr['data'] = "";
            echo json_encode($arr);
            return;
        } else {
            $arr['message'] = "Reviews fetched successfully";
            $arr['message_type'] = "success";
            $arr['data'] = $data;
            echo json_encode($arr);
        }
    }
    public function publishReview()
    {
        //check if user is logged in
        if (isset($_SESSION['userID'])) {
            $data = file_get_contents("php://input");
            $data = json_decode($data);
            if (is_object($data)) {
                $review = $this->load_model("review");
                $hasWrittenReview = $review->hasWrittenReview($data->productID, $_SESSION['userID']);
                if ($hasWrittenReview === false) {
                    $check = $review->createReview($data->productID, $_SESSION['userID'], $data->review, $data->rate);
                    if ($check) {
                        $arr['message'] = "Review published successfully";
                        $arr['message_type'] = "success";
                        $arr['data'] = $data;
                        echo json_encode($arr);
                    } else {
                        $arr['message'] = "Review could not be published";
                        $arr['message_type'] = "error";
                        $arr['data'] = "";
                        echo json_encode($arr);
                    }
                } else {
                    $arr['message'] = "You have already written a review for this product";
                    $arr['message_type'] = "duplicate";
                    $arr['data'] = "";
                    echo json_encode($arr);
                }
            } else {
                $arr['message'] = "Review could not be published";
                $arr['message_type'] = "error";
                $arr['data'] = "";
                echo json_encode($arr);
            }
        }
    }
}
