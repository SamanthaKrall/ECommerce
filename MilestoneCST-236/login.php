<?php
include 'dbConnector.php';
$dbConnector = new dbConnector();
$connection = $dbConnector->getConnection();
echo "<body background='Pictures/background.jpg' style='color: white; font-size: 30px'>";
if ($connection) {
    $attemptedLoginName = $_POST['login_name'];
    $attemptedPassword = $_POST['login_password'];
    $sql_statement = "SELECT * FROM users WHERE user_name = '$attemptedLoginName' AND user_password = '$attemptedPassword' LIMIT 1";
    $result = mysqli_query($connection, $sql_statement);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            require 'header.php';
            echo "You have successfully logged in!<br>";
        } else {
            echo "<strong>Login Unsuccessful!</strong><br>Please try again<br>";
            echo "<a href='index.html'><button>Try Again</button></a>";
            exit;
        }
    } else {
        echo "Error " . mysqli_error($connection);
        exit;
    }
} else {
    echo "Error connecting " . mysqli_connect_errno();
    exit;
}
echo "</body>";
?>
