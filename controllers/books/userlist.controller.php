<?php
if (!isset($_SESSION['email'])) {
	header("location:/login");
	exit;
}
$udata=App::get('database')->selectAll('users');
require './view/userlist.php';

?>