<?php 
require_once 'db_connector.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$db = new db_connector();
$connection = $db->getConnection();
$id = $_GET['id'];
$userEmail = $_GET['email'];
$userFName = $_GET['fname'];
$userLName = $_GET['lname'];
$userPassword = $_GET['password'];
$userUsername = $_GET['username'];
$userRole = $_GET['role'];
$userPoints = $_GET['upoints'];
$role = $_SESSION['Role'];
echo "user id " . $_SESSION['userID'];
if($connection && isset($_SESSION['userID']) && $role == "Admin"){
    $sql_statement = "UPDATE `User` SET  `Email` = '$userEmail', `FName` = '$userFName', `LName` = '$userLName', `Password` = '$userPassword', `Username` = '$userUsername', `Role` = '$userRole', `UPoints` = '$userPoints' WHERE `UID` = '$id' ";
    $result = mysqli_query($connection, $sql_statement);
    if($result){
        echo "Data updated successfully!";
        echo "click <a href='AdminPage.php'>here</a> to return";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "Error: " . mysqli_connect_error();
}
?>