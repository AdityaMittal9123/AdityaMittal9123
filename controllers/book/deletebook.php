<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if($_SESSION['type']!='inadmin')
	header("location:/");

$book = new Books();
if(isset($_POST['bid'])){
	$bid=$_POST['bid'];
	$row=$book->fetchBook($bid);
	if($book->deleteBook($bid)){
		$title=$row['cover_image_name'];
		$filename=$title.".jpg";      
		$file_pointer = __dir__.'/'.'../../resources/uploads/'.$filename;  
		unlink($file_pointer); 
		header('location:/login?view=books');		
	}
	else
		header('location:/login?view=books');		
}
else 
header('location:/');
?>