<?php
include 'crud.php';

include 'authenticator.php';

include_once 'DBConnector.php';

class User implements Crud,Authenticator{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;
    private $username;
    private $password;

/*we can use the class constructor to iniyialize our values,member variables cannot be instantiated from elsewhere; they are private*/
function __construct($fname,$lname,$cname,$uname,$pass){
    $this->first_name=$fname;
    $this->last_name=$lname;
    $this->city_name=$cname;
    $this->username =$uname;
    $this->password =$pass;


}

public static function create()
    {
        $instance = new self("","","","","");
        return $instance;
    }

    /**
     * @param mixed $user_id
     */

//user_id setter
public function setUserId($user_id){
    $this->user_id=$user_id;

}

    /**
     * @return mixed
     */
//user_id getter
public function getUserId(){
    return $this->$user_id;

}
    /**

     * @return mixed

     */
//username and password getter and setter
    public function getUsername()
    {
        return $this->username;
    }
    /**

     * @param mixed $username

     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    /**

     * @return mixed

     */
    public function getPassword()
    {
        return $this->password;
    }
    /**

     * @param mixed $password

     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


/*Because we implemented the Crud interface we have to define all the methods, otherwise we will run into an error*/
public function save(){
    $db = mysqli_connect("localhost","root","","btc3205");

    $fn =$this->first_name;
    $ln= $this->last_name;
    $city=$this->city_name;
    $un = $this->username;
    $this->hashPassword();
    $pass = $this->password;

    $res = mysqli_query($db,"INSERT INTO users(first_name, last_name, user_city,username,password)
    VALUES ('$fn','$ln','$city','$un','$pass')") or die("Error ".mysqli_error());
return $res;

}


public function readAll(){
    return null;
}
public function readUnique(){
    return null;
}
public function search(){
    return null;
}
public function update(){
    return null;
}
public function removeOne(){
    return null;
}
public function removeAll(){
    return null;
}
public function validateForm()

{

    $fn = $this->first_name;

    $ln = $this->last_name;

    $city = $this->city_name;



    if($fn == "" || $ln == "" || $city == "")

    {

        return false;

    }

    return true;

}



public function createFormErrorSessions()

{

    session_start();

    $_SESSION['form_errors'] = 'All fields are required';

}




public function hashPassword()

{

    $this->password = password_hash($this->password,PASSWORD_DEFAULT);

}



public static function isPasswordCorrect($password,$username)

{
   
    $conn = new dbconnector();

    $found = false;

    $result = mysqli_query($conn->conn,"SELECT id, username, password FROM users WHERE username='$username'")

    or die("Error".mysqli_error($conn->conn));





    if($result->num_rows > 0)

    {



        $row = $result->fetch_assoc();

        if (password_verify($password,$row['password']))

        {

            $found = true;



        }

    }



    $conn->closeConnection();

    return $found;

}


public function login($conn,$password,$username)
{
    if(self::isPasswordCorrect())
    {
        header("Location:private_page.php");
    }
}
public static function createUserSession($username)
{
    session_start();
    $_SESSION['username'] = $username;
}
public static function logout()
{
    session_start();
    unset($_SESSION['username']);
    session_destroy();
    header("Location:lab1.php");

}

}


?>