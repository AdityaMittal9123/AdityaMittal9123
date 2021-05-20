<?php
require __dir__.'/'.'../../configs/database/config.php';
$conn=mysqli_connect($host,$sql_user,$pass,$database_name);
if(!isset($conn))
	die("Error in Connecting database..!");
?>