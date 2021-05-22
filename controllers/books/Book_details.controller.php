<?php
if (!isset($_SESSION['email'])) {
	header("location:/login");
	exit;
}
if(isset($_GET['b_id'])){
$b_id=$_GET['b_id'];
$Book_detail=App::get('books')->bookDetails($b_id);
// var_dump($Book_detail);
// die;
require './view/Book_details.php';
}else{
    echo "no id is there";
}
?>