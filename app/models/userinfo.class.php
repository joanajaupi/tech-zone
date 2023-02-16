<?php
class userInfo
{

    public $error = "";
    public function signup($POST)
    {
        $db = Database::getInstance();
        $data = array();
        $data['name'] = trim(filter_var($POST["name"], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $data['surname'] = trim(filter_var($POST["surname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $password = trim(filter_var($POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $confirmPassword = trim(filter_var($POST["confirm-password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $data['email'] = trim(filter_var($POST["email"], FILTER_SANITIZE_EMAIL));
        $data['phone'] = trim(filter_var($POST["phone"], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $data['admin'] = 0;

        //email validation 
        if (empty($data['email']) || !preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $data['email'])) {
            $this->error .= "Please enter valid email ";
        }
        //name validation 
        if (empty($data['name']) || !preg_match("/^[a-zA-Z]+$/", $data['name'])) {
            $this->error .= "invalid name";
        }
        //surname validation
        if (empty($data['surname']) || !preg_match("/^[a-zA-Z]+$/", $data['surname'])) {
            $this->error .= "invalid surname";
        }
        //phone validation
        if (empty($data['phone']) || !preg_match("/^[0-9]{10}$/", $data['phone'])) {
            $this->error .= "invalid phone";
        }
        //password validation 
        if (strlen($password) < 8) {
            $this->error .= "Password too short ";
        }
        if(!preg_match("/^(?=.*\d)(?=.*[A-Z]).{8,}$/", $password)){
            $this->error .= "Password must contain at least one uppercase letter and one number<br>";
        }
        //password validation 
        if ($password !== $confirmPassword) {
            $this->error .= "password dot match";
        }

        //check if email already exists
        try {
            $query = "SELECT * FROM userInfo WHERE email =:email limit 1";
            $arr['email'] = $data['email'];
            $check = $db->read($query, $arr);
            if (is_array($check)) {
                $this->error .= "That email is already in use";
            }
        } catch (PDOException $err) {
            var_dump($err);
        }
        //if no errors
        if ($this->error == "") {
            //save to db
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO userInfo (name, surname, password, email,admin, phone) values (:name, :surname, :password, :email, :admin, :phone)";

            $result = $db->write($query, $data);
            if ($result) {
                header("Location:" . ROOT . "login");
                die;
            }
        }

        $_SESSION['error'] = $this->error;
        check_error();
    }

    public function login($POST)
    {
        $logindata = array();
        $db = Database::getInstance();
        $logindata['email'] = trim($POST['email']);
        $logindata['password'] = trim($POST['password']);
        if (empty($logindata['email']) || !preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $logindata['email'])) {
            $this->error .= "Please enter valid email ";
        }
        if ($this->error == "") {
            $query = "SELECT userID, password, admin from userInfo WHERE email=:email";
            $array["email"] = $logindata["email"];
            $result = $db->read($query, $array);
            if (is_array($result)) {
                $hashed_password = $result[0]->password;

                if (password_verify($logindata["password"], $hashed_password)) {
                    $_SESSION['userID'] = $result[0]->userID;
                    show($result);
                    if ($result[0]->admin == 1) {
                        header("Location:" . ROOT . "admin");
                        die;
                    } else {
                        header("Location:" . ROOT . "home");
                        die;
                    }
                }
                $this->error .= "Password is incorrect";
            }
            $this->error .= "Email not found";
        }
        $_SESSION["error"] = $this->error;
        check_error();
    }

    //check if user is logged in
    public function check_login($redirect = false, $allowed = array())
    {
        $db = Database::getInstance();
        $arr1 = array();
        if (count($allowed) > 0) {
            $a['userID'] = $_SESSION['userID'];
            $query = "SELECT admin from userInfo WHERE userID=:userID;";
            $result = $db->read($query, $a);
            show($result);
            if (is_array($result)) {
                $result = $result[0];
                var_dump($result);
                if (in_array($result->admin, $allowed)) {
                    return $result;
                }
            }
        } else {
            if (isset($_SESSION['userID'])) {
                $arr = array();
                $arr['userID'] = $_SESSION['userID'];
                $query = "SELECT * from userInfo WHERE userID=:userID limit 1";
                $result = $db->read($query, $arr);
                if (is_array($result)) {
                    return $result[0];
                }
            }
            if ($redirect) {
                header("Location:" . ROOT . "login");
                die;
            }
        }
        return false;
    }

    public function changePassword($password, $id)
    {
        $password = trim(filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $db = Database::instance();
        $data = array();
        if(strlen($password) < 8 || !preg_match("/^(?=.*\d)(?=.*[A-Z]).{8,}$/", $password)){
            echo "<script>alert('Password must contain at least one uppercase letter and one number')</script>";
            return false;
        }else{
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        $data['userID'] = $id;
        $query = "UPDATE userInfo SET password=:password WHERE userID=:userID";
        $result = $db->write($query, $data);
        if ($result) {
            return true;
        }
        return false;
    }
    }

    public function updateInformation($name, $surname, $phone, $id)
    {
        $data = array();
        $data['name'] = trim(filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $data['surname'] = trim(filter_var($surname, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $data['phone'] = trim(filter_var($phone, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $data['userID'] = $id;

        $db = Database::instance();
        $query = "UPDATE userInfo SET name=:name, surname=:surname, phone=:phone WHERE userID=:userID";
        $result = $db->write($query, $data);
        if ($result) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        if (isset($_SESSION['userID'])) {
            unset($_SESSION['userID']);
        }
        header("Location:" . ROOT . "home");
        die;
    }
    public function getUsers(){
        $db = Database::instance();
        $query = "SELECT name, surname, email, admin FROM userInfo";
        $result = $db->read($query);
        if(is_array($result)){
            return $result;
        }
        return false;
    }

    public function getNumberOfUsers(){
        $db = Database::instance();
        $query = "SELECT COUNT(userID) as number FROM userInfo";
        $result = $db->read($query);
        if(is_array($result)){
            return $result[0]->number;
        }
        return false;
    }
}
