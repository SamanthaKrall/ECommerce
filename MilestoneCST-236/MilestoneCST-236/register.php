<?php
$login_name = $_POST['login_name'];
$login_password = $_POST['login_password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip_code = $_POST['zip_code'];
$country = $_POST['country'];
require 'dbConnector.php';
$query = "INSERT INTO users (user_name, user_password, first_name, last_name, email, phone_number, address, city, state, zip_code, country)
    VALUES ('$login_name', '$login_password', '$first_name', '$last_name', '$email', '$phone_number', '$address', '$city', '$state', '$zip_code', '$country')";
$connection->query($query);
?>
<html>
<body>
	<h1>You have successfully registered!</h1><br>
	<h2> Welcome to the Shirt Shack. Please Login!</h2><br>
	<a href="index.html"><button>Click me to log in!</button></a>
</body>
</html>