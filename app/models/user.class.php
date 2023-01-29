<?php 
class User
{
    public $error = "";
    public function signup($POST){
        $data = array();
        $data['name'] = trim($POST["name"]);
        $data['surname'] = trim($POST["surname"]);
        $password = trim($POST["password"]);
        $confirmPassword = trim($POST["confirm-password"]);
        $data['email'] =trim($POST["email"]);
        $data['phone'] = trim($POST["phone"]);
        $data['role'] = 0;

        if(empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email'])){
            $this->error .="Please enter valid email <br>";
        }
        if(empty($data['name']) || !preg_match("/^[a-zA-Z]+$/", $data['name'])){
            $this->error .="invalid name<br>";
        }
        if(strlen($password)<4){
            $this->error .="Password do not match<br>";
        }
        if($password !== $confirmPassword){
            $this->error.="password dot match";
        }
        //if no errors
        if($this->error == ""){
            //save to db
            $data['id'] = uniqid();
            //0 for customers 1 for admins
            $data['registerDate'] = date("Y-m-d H:i:s");
            $data['password']= password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (id, name, surname, password, email,role, phone,registerDate) values (:id, :name, :surname, :password, :email, :role, :phone, :registerDate)";
            $db = Database::getInstance();
            $result = $db->write($query, $data);
            if($result){
                header("Location:" . ROOT . "login");
                die;
            }
            
        }
        else{
            echo "Some error occured<br>";
            echo $this->error;
        }



    }
    public function login($POST){

    }
    public function get_user($url)
    {

    }

}