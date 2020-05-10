<?php
//include_once 'DBConnector.php';
include_once 'user.php';
$con = new DBConnector; /*Database connection is made*/
//data insert code starts here.
if(isset($_POST['btn-save'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $city=$_POST['city_name'];
    $username = $_POST['user_name'];
    $password = $_POST['password'];
    //Creating a user object
    /*Note the way we create our object using constructor that will be used to initialize your variables*/
    $users= new User($first_name,$last_name,$city,$username,$password);
  
    if (!$users->validateForm())

    {

        $users->createFormErrorSessions();

        header("Refresh:0");

        die();

    }

    $res = $users->save();
    //checking whether operation has occured successfully

    if($res)
    {
        echo 'Save operation successful!!';
      //  $connection->closeConnection();
    }
    else
    {
        echo 'An Error occurred.';
    }

//        print_r($users);
/*
    foreach ($users as $users)
    {

    }
}
*/
}
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <title>User Form</title>
        <link rel="stylesheet" type="text/css" href="validate.css">

        <script type="text/javascript" src="validate.js"></script>
    </head>
    <body>
    <form method="post" name="user_details" id="user_details" onsubmit="return validateForm()" action="<?=$_SERVER['PHP_SELF']?>"  style='width:300px; border: 2px solid pink   '>
  
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


<button type="submit" name="btn-save" class="btn btn-default"><strong>SAVE</strong></button>

</div>
<a href="login.php">Login</a>
  </form>

    </body>
</html>