<?php
if(isset($_POST['password']) && isset($_POST['emailid']) ){
	$password=mysqli_escape_string($conn,$_POST['password']);
	$emailid=mysqli_escape_string($conn,$_POST['emailid']);
	$user=new Users();
	$user->passwordUpdate($emailid,$password);
}
else
	header('location:/');
?>