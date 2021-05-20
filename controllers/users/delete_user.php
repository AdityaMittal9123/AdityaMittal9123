<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if($_SESSION['type']!='inadmin')
	header("location:/");
$user = new Users();
if(isset($_POST['uid'])){
	$uid=$_POST['uid'];
	$user->deleteAllBooks($uid);
	if($user->deleteUserById($uid))
		header('location:/login?view=users');
}
?>