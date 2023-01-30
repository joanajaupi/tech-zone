<?php 
    class Carousel{

        public function getCarousel(){

            $db = Database::getInstance();
            try{
               
                $query = "SELECT * FROM recommended_items";
                $result = $db->read($query);
                if(is_array($result) && !empty($result)){
                    return $result;
                }
                return false;

                

            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
  
        }
    }