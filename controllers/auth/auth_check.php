<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_SESSION['uid']))
	$type=$_SESSION['type'];
else 
	$type=NULL;
?>