<?php
include_once 'DBConnector.php';
include_once 'user.php';
$con = new DBConnector; /*Database connection is made*/
//data insert code starts here.
if(isset($_POST['btn-save'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $city=$_POST['city_name'];

    //Creating a user object
    /*Note the way we create our object using constructor that will be used to initialize your variables*/
    $users= new User($first_name,$last_name,$city);
    $res=$users->save();

    //checking whether the operation save took occured successfuly.
    if($res){
        echo "Save operation was successful.";
    }else{echo "An error has occured!";
    }
    
}?>


<html>
<head>
<title>Title goes here</title>
</head>
<body>
<form method="post" action="<?=$_SERVER{'PHP_SELF'}?>">
<table align="center">
<tr>
<td><input type="text" name="first_name" required placeholder="First Name" /> </td>
</tr>
<tr>
<td><input type="text" name="last_name" placeholder="Last Name" /> </td>
</tr>
<tr>
<td><input type="text" name="city_name" placeholder="city" /> </td>
</tr>
<tr>
<td> <button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
</tr>
</table>
</form>
</body>
</html>