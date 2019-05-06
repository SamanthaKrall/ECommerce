<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class dbConnector {
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "ecommerce";
    
    function getConnection() {
        $connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($connection->connect_error) {
            echo "Connection Failed: " 
                . $connection->connect_error 
                . "<br>";
        } else {
            return $connection;
        }
    }
}

?>