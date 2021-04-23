<?php
include_once 'connect.php';
session_start();

//set session variable
$email = 'आदित्य';
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

//cookies structure
//cookies stored in the browser whereas sessions stored in server like xampp because it is important data

//syntax to set a cookie
echo time();
setcookie("category", "Books", time() + 86400, "/");
echo "Cookie is set";
?>