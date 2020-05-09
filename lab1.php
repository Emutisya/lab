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
  

    $res = $users->save($con->conn);
    //checking whether operation has occured successfully

    if($res)
    {
        echo 'Save operation successful!!';
        $connection->closeConnection();
    }
    else
    {
        echo 'An Error occurred.';
    }

//        print_r($users);

    foreach ($users as $users)
    {

    }
}

    
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="lab1.css">
        <link rel="stylesheet" type="text/css" href="validate.css">
        <script type="text/javascript" src="validate.js"></script>
        <title>Text goes here</title>
    </head>
    <body>
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
        <table align="center">
           
            <tr>
                <td><label for="fname">First Name</label></td>
                <td><input type="text" name="first_name" id="fname" required placeholder="First Name"></td>
            </tr>
            <tr>
                <td><label for="lname">Last Name</label></td>
                <td><input type="text" name="last_name" id="lname" required placeholder="Last Name"></td>
            </tr>
            <tr>
                <td><label for="city">City</label></td>
                <td><input type="text" name="city_name" id="city" placeholder="City"></td>
            </tr>
           
            <tr>  
                <td><button type="submit" name="btn_save"><strong>SAVE</strong></button></td>
            </tr>
            <tr>
            
        </table>
    </form>

  

    </body>
</html>