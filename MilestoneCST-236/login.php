<?php
session_start();
include 'dbConnector.php';
include 'css.css';
$dbConnector = new dbConnector();
$connection = $dbConnector->getConnection();
echo "<body background='Pictures/background.jpg' style='color: magenta'>";
if ($connection) {
    $attemptedLoginName = $_POST['login_name'];
    $attemptedPassword = $_POST['login_password'];
    $sql_statement = "SELECT * FROM users WHERE user_name = '$attemptedLoginName' AND user_password = '$attemptedPassword' LIMIT 1";
    $result = mysqli_query($connection, $sql_statement);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            echo "You have successfully logged in!<br>";
            echo "<a href='main.php'><button>To The Shirts!</button></a>";
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
