<?php
include_once 'connect.php';
session_start();

//set session variable
$email = 'aditya';
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;

//Access session variables

echo $_SESSION['username'] . "<br>";
echo $_SESSION['email'] . "<br>";

//check if session variable is set or not

if (isset($_SESSION['username'])) {
	echo "Session variable is set";
} else {
	echo " session variable is not set";
}

?>