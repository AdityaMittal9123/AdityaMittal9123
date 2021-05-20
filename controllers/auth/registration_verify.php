<?php
$emailid=$_GET['id'];
$pass=$_GET['secret'];
$user=new Users;
$db_values=$user->fetchUser($emailid);
$db_pass=$db_values['password'];
if($pass===$db_pass){
	$user->activate($emailid);
	$user->flashError([null,null,null,'Your account is now activated successfully'],'/');
}
else
	header('location:/splashmsg?msgtype=verificationfailed');
?>