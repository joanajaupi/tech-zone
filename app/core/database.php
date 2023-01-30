<?php 
class Database
{
    public static $conn;
    public function __construct()
    {
        try {
            $string = DB_TYPE . ":host=" .DB_HOST. ";dbname=" . DB_NAME;
            self::$conn = new PDO($string, DB_USER, DB_PASS);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance(){
        if(self::$conn){
            return self::$conn;
        }
        else{   
            
            return $instance = new self();
        }

    }
    public function read($query, $data = array()){
        $stm = self::$conn->prepare($query);
        $result = $stm->execute($data);
        if($result){
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data)>0){
                return $data;
            }
            return false;
        }
        return false;
    }
    public function write($query, $data = array()){
        $stm = self::$conn->prepare($query);
        $result = $stm->execute($data);
        if($result){
                return true;
            }
        return false;

    }

}

