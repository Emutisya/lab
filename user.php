<?php
include "crud.php";
class User implements Crud{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;

/*we can use the class constructor to iniyialize our values,member variables cannot be instantiated from elsewhere; they are private*/
function __construct($fname,$lname,$cname){
    $this->first_name=$fname;
    $this->last_name=$lname;
    $this->city_name=$cname;


}

public static function create()
    {
        $instance = new self("","","");
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
/*Because we implemented the Crud interface we have to define all the methods, otherwise we will run into an error*/
public function save(){
    $db = mysqli_connect("localhost","root","","btc3205");

    $fn =$this->first_name;
    $ln= $this->last_name;
    $city=$this->city_name;
    

    $res = mysqli_query($db,"INSERT INTO users(first_name, last_name, user_city) 
    VALUES ('$fn','$ln','$city')") or die("Error ".mysqli_error());
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

}

?>