<?php
//include connection file
include_once 'connect.php';
//start the session
session_start();

$check = $_SESSION['login_user'];
$s = "SELECT  username FROM users WHERE email = '$email'";
$s_sql = mysqli_query($conn, $s);
$result = mysqli_fetch_all($s_sql, MYSQLI_ASSOC);

$login_session = $result['email'];

// if (!isset($_SESSION['login_user'])) {
// 	header("location:portal.php");
// 	die();
// }

//if the user is already logen in then redirect it to the index page
// if (isset($_SESSION["id"]) && $_SESSION["id"] == true) {
// 	header("Location:login.php");
// 	exit;
// } else {
// 	header("Location:signup.php");
// 	exit;
// }
// sesson_start();
// $_SESSION['username'] = "harry";
// $_SESSION['password'] = "Harry@123";
// echo "we have save your data";

?>