<?php
$user=new Users();
if(isset($_POST['resemailid'])){
	$emailid=mysqli_escape_string($conn,$_POST['resemailid']);
	$_SESSION['name']=$emailid;
	if($user->freshUser($emailid,$conn))
		$user->flashError(['Email Address Not Registered'],'/reset_password');
	else{
		$row=$user->fetchUser($emailid);
		$name=$row['user_name'];
		$pass=$row['password'];
		$lnk=APP_URL.'/passwordreset?id='.$emailid.'&secret='.$pass;
		if(Mail::sendResetPasswordMail($lnk,$emailid,$name)){
			header("location:/splashmsg?msgtype=forgotpassword");
		}
		else{
			$user->flashError(['Internal Error, Try Again'],'/reset_password');
		}	
	}
}
else
	$user->flashError(['Please Enter Valid Email Address'],'/reset_password');
?>