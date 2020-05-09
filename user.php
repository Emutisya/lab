<?php
include "crud.php";
class User implements Crud{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;

/*we can use the class constructor to iniyialize our values,member variables cannot be instantiated from elsewhere; they are private*/
function ___construct($first_name,$last_name,$city_name){
    $this->first_name=$first_name;
    $this->last_name=$last_name;
    $this->city_name=$city_name;


}
//user_id setter
public function setUserId($user_id){
    $this->user_id=$user_id;

}
//user_id getter
public function getUserId(){
    return $this->$user_id;

}
/*Because we implemented the Crud interface we have to define all the methods, otherwise we will run into an error*/
public function save($conn){
    $fn =$this->first_name;
    $ln= $this->last_name;
    $city=$this->city_name;
    

    $result = mysqli_query($conn,"INSERT INTO users(first_name, last_name, user_city) 
    VALUES ('$fn','$ln','$city')") or die("Error ".mysqli_error());
return $res;



}


public function readAll($conn){
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