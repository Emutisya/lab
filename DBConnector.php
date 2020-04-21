<?php
define('DB_SERVER','localhost'); //we use the local machine
define('DB_USER','root');//user is root
define('DB_PASS','');//no password
define('DB_NAME','btc3205');//Database name.

class DBConnector{
    public $conn;
    /*We connect to our database inside our class constructor
    so we can always cause a databse connection whenever an object is created.*/
    function ___construct(){
 $this->conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die ("Error: ".mysql_error());
mysqli_select_db(DB_NAME,$this->conn);

    }
    /*Once we are with database reads, updates, deletes 
    this public function does exactly that*/
    public function closeDatabse(){
        mysqli_close($this->conn);

    }

}
?>