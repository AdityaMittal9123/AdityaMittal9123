<?php



require __dir__.'/'.'../../Controllers/auth/checkAuthentication.php';
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_SESSION['type'])){
	header('location:/login');
}
$msg1=$msg2=$msg3=$emailid=$password=$rname=NULL;
if(isset($_SESSION['error1'])){
	$msg1="<p class='text-danger'>{$_SESSION['error1']}</p>";
	unset($_SESSION['error1']);
}
if (isset($_SESSION['error2'])){
	$msg2="<p class='text-danger'>{$_SESSION['error2']}</p>";
	unset($_SESSION['error2']);
}
if (isset($_SESSION['error3'])){
	$msg3="<p class='text-danger'>{$_SESSION['error3']}</p>";
	unset($_SESSION['error3']);
}
if (isset($_SESSION['error4'])){
	$msg4="<p class='text-success'>{$_SESSION['error4']}</p>";
	unset($_SESSION['error4']);
}
if(isset($_SESSION['name'])){
	$emailid=$_SESSION['name'];
	unset($_SESSION['name']);
}

if(isset($_SESSION['password'])){
	$password=$_SESSION['password'];
	unset($_SESSION['password']);
}
if(isset($_SESSION['rname'])){
	$rname=$_SESSION['rname'];
	unset($_SESSION['rname']);
}
?>
<div class="row bg-light d-flex align-items-center py-5" style="min-height:calc(100% - 180px);">
	<div class="col-lg d-lg-block">

		<div class="col-xl-4 col-lg-5 mx-auto ">	
			<div class="mr-lg-5">
				<div class="mr-lg-5">
					<?php if(isset($_GET['register']))
					require __dir__.'/'.'../../Views/users/registration_form.view.php';
					elseif((Request::uri()=='')||(Request::uri()=='index.php')||(Request::uri()=='index'))
						require __dir__.'/'.'../../Views/users/login_form.view.php';
					?>
				</div>
			</div>
		</div>
	</div>
</div>