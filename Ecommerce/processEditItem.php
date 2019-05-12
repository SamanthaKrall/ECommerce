<?php 
require_once 'db_connector.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$db = new db_connector();
$connection = $db->getConnection();
$id = $_GET['id'];
$productName = $_GET['pname'];
$productDescription = $_GET['pdescription'];
$productPrice = $_GET['pprice'];
$productOwnerID = $_GET['ownerID'];
$productPoints = $_GET['ppoints'];
$role = $_SESSION['Role'];
echo "user id " . $_SESSION['userID'];
if($connection && isset($_SESSION['userID']) && $role == "Admin"){
    $sql_statement = "UPDATE `Product` SET  `PName` = '$productName', `PDescription` = '$productDescription', `PPrice` = '$productPrice', `userID` = '$productOwnerID', `PPoints` = '$productPoints' WHERE `PID` = '$id' ";
    $result = mysqli_query($connection, $sql_statement);
    if($result){
        echo "Data updated successfully!";
        echo "click <a href = 'AdminPage.php'>here</a> to return";
    }else{
        echo "Error: " . mysqli_error($connection);
    }
}else {
    echo "Error: " . mysqli_connect_error();
}
?>