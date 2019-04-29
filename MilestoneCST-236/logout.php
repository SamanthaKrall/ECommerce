<?php
include 'css.css';

session_start();
$_SESSION = array();
session_destroy();

echo "<h1>You have successfully logged out!</h1><br><br><h2>We hope to see you soon!</h2>";
echo "<br><br><a href='index.html'><button>Login</button></a>";

?>