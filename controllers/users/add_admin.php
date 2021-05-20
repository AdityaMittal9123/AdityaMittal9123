<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if($_SESSION['type']!='inadmin')
	header("location:/");
$user= new Users();

if(isset($_POST['user_name']) and isset($_POST['email']) and isset($_POST['password']) ){
	$user_name=mysqli_escape_string($conn,$_POST['user_name']);
	$email=mysqli_escape_string($conn,$_POST['email']);
	$password=mysqli_escape_string($conn,$_POST['password']);

	
	
	
		 
			if($uid=$user->createAdmin($user_name,$email,$password)){
				
				
				header('location:/login?view=users');
			}
			else
				header('location:/login?view=users');		
		
	
            
}
else
header('location:/');
?>