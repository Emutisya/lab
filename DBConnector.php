<?php
define('DB_SERVER','localhost'); //we use the local machine
define('DB_USER','root');//user is root
define('DB_PASS','');//no password
define('DB_NAME','btc3205');//Database name.

class DBConnector{
    public $conn;
    /*We connect to our database inside our class constructor
    so we can always cause a databse connection whenever an object is created.*/
    public function __construct(){

        $this->conn = new mysqli(DB_SERVER,DB_USER,DB_PASS);
        if ($this->conn->connect_error)
        {
            die("Connection failed: " . $this->conn->connect_error);
        }

        mysqli_select_db($this->conn,DB_NAME);
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
?>
