<?php 
class userInfo
{

    public $error = "";
    public function signup($POST){
        $db = Database::getInstance();
        $data = array();
        $data['name'] = trim($POST["name"]);
        $data['surname'] = trim($POST["surname"]);
        $password = trim($POST["password"]);
        $confirmPassword = trim($POST["confirm-password"]);
        $data['email'] =trim($POST["email"]);
        $data['phone'] = trim($POST["phone"]);
        $data['admin'] = 0;
        
        //email validation 
        if(empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email'])){
            $this->error .="Please enter valid email <br>";
        }
        //name validation 
        if(empty($data['name']) || !preg_match("/^[a-zA-Z]+$/", $data['name'])){
            $this->error .="invalid name<br>";
        }
        //password validation 
        if(strlen($password)<4){
            $this->error .="Password too short<br>";
        }
        //password validation 
        if($password !== $confirmPassword){
            $this->error.="password dot match";
        }

        //check if email already exists
        try {
            $query = "SELECT * FROM userInfo WHERE email =:email limit 1";
            $arr['email'] = $data['email'];
            $check = $db->read($query,$arr);
            if(is_array($check)){
                $this->error .= "That email is already in use";
            }
        } catch (PDOException $err) {
            var_dump($err);
        }
        //if no errors
        if($this->error == ""){
            //save to db
            $data['password']= password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO userInfo (name, surname, password, email,admin, phone) values (:name, :surname, :password, :email, :admin, :phone)";
            
            $result = $db->write($query, $data);
            if($result){
                header("Location:" . ROOT . "login");
                die;
            }
            
        }

        $_SESSION['error'] = $this->error;

    }
    public function login($POST){
        $logindata = array();
        $db = Database::getInstance();
        $logindata['email'] = trim($POST['email']);
        $logindata['password']= trim($POST['password']);
        if(empty($logindata['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $logindata['email'])){
            $this->error .="Please enter valid email <br>";
        }
        if($this->error == ""){
                $query = "SELECT password from userInfo WHERE email=:email";
                $array["email"] = $logindata["email"];
                $result = $db->read($query, $array);
                show($result);
                if(is_array($result)){
                    $hashed_password = $result[0]->password;
                }
                if(password_verify($logindata["password"], $hashed_password)){
                    $_SESSION['id'] = $result[0]->id;
                    header("Location:". ROOT . "home");
                    die;
                }
        }
        $_SESSION["error"] = $this->error;
        check_error();
    }
    public function get_user($url)
    {

    }

}