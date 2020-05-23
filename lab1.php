<?php
include_once 'user.php';
include_once 'DBConnector.php';
include_once 'fileUpload.php';


$con = new DBConnector;

$uploader = new fileUpload;




if(isset($_POST['btn-save'])){

   


    
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $cityname = $_POST['city_name'];
    $username = $_POST['user_name'];
    $password = $_POST['password'];






$users  = new User();

//firstname
$users->setFirstname($firstname);
$firstname = $users->getFirstname();
   


   //last name
$users->setLastname($lastname);
$lastname = $users->getLastname();



//cityname
$users->setCityname($cityname);
$cityname = $users->getCityname();
 


//username
$users->setUsername($username);
$username = $users->getUsername();
 

//password
$users->setPassword($password);
$password = $users->getPassword();


//object for uploading the file
$uploader = new fileUpload;


if(!$users->validateForm()){
    $users->createFormErrorSessions();
    header("Refresh:0");
    die();

}
$temp = $users->save();

//object for uploading the file

$file_upload_reponse = $uploader->upLoadFile();


if($temp & $file_upload_reponse){
    echo "Saving was done successfully!!";
}
else{
    echo "There was an error";
}

//$con->closeDatabase();


}





?>

<html>
	<head>
    <meta charset="UTF-8">
        <meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<title>Sign up Form</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type = "text/javascript" src = "validation.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "validate.css">
   
    <link rel="stylesheet" type="text/css" href="validate.css">
    <script src= "https://ajax/googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type = "text/javascript" src = "timezone.js"></script>
    

		</head>
        <body>
    <h2 align = "center">Sign Up here</h2>
    <form method="post" name="user_details" id="user_details" onsubmit="return validateForm()" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data"  style='width:300px; border: 2px solid pink   '> 
  
    <div class="form-group">
    <div class="form-group">
    <div id="form-errors">

                        <?php

                            session_start();

                            if(!empty($_SESSION['form_errors']))

                            {

                                echo " ".$_SESSION['form_errors'];

                                unset($_SESSION['form_errors']);

                            }

                        ?>

                    </div>

<label for="first_name">First Name:</label>

<input type="text" class="form-control" name="first_name" required>

</div>



<div class="form-group">

<label for="last_name">Last Name:</label>

<input type="text" name="last_name" class="form-control" required>

</div>



<div class="form-group">

<label for="city_name">City Name:</label>

<input type="text" name="city_name" class="form-control"  required>

</div>


<div class="form-group">

<label for="uname">Username</label>

<input type="text" name="user_name" id="uname" class="form-control" >
</div>
           
<div class="form-group">
<label for="password">Password</label>
<input type="password" name="password" id="password" class="form-control" >

</div>

<div class="form-group">
<label for="filetoUpload">Profile Image:</label>
<input type="file" name="filetoUpload" id="filetoUpload" class="form-control" ></td></tr>
</div>

<tr><td><input type="hidden" name="utc_timestamp" id="utc_timestamp" ></td></tr>
<tr><td><input type="hidden" name="time_offset" id="time_offset" ></td></tr>

<button type="submit" name="btn-save" class="btn btn-default"><strong>SAVE</strong></button>

</div>
<a href="login.php">Login</a>
  </form>

    </body>
</html>