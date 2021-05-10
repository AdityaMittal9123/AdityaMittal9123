<?php
include_once 'connect.php';
include_once 'header.php';
$password = $cpassword = '';
$errors = array('password' => '', 'cpassword' => '');
// $token = $_GET['token'];
// var_dump($token);
// die;
if (isset($_POST['submit'])) {
	if (isset($_SESSION['token'])) {
		$token = $_SESSION['token'];
		// var_dump($token);
		// die;
		if (empty($_POST['password'])) {
			$errors['password'] = "a password is required";
		} else {
			$password = $_POST['password'];
			// $password_hash = password_hash($password, PASSWORD_BCRYPT);

		}
		if (empty($_POST['cpassword'])) {
			$errors['cpassword'] = "a Confirm password is required";
		} else {
			$cpassword = $_POST['cpassword'];
			// $password_hash = password_hash($password, PASSWORD_BCRYPT);

		}

		if (!array_filter($errors)) {

			// if (mysqli_num_rows($res_n) > 0) {
			// 	$errors['email'] = 'email already exists';

			// } else {
			// $cpassword = $_POST['cpassword'];

			if ($password == $cpassword) {

				$updatequery = "UPDATE users SET password='$password' WHERE token='$token'";
				$result = mysqli_query($conn, $updatequery);
				// var_dump($result);
				// die;

				if ($result) {
// 				$subject = "Email activation";
					// 				$body = "Hi , $email <br> Click on the link below to activate your account
					// 			 			http://localhost/prep-2/emailverify.php?token=$token";

// 				$sender_email = "From: adityamittal761@gmail.com";
					// 				if (mail($email, $subject, $body, $sender_email)) {
					// 					$msg = "Check your email to verify/activate your account $email";
					// 					$_SESSION['msg'] = $msg;
					?>
											<script type="text/javascript">
												alert("Your password has been updated !");
												window.location.href="login.php";
											</script>
											<?php
// } else {
					// 					echo "Email sending failed";
					// 				}

				} else {
					//
					?>
			<script type="text/javascript">
											alert("password is not updated");
											window.location.href="reset_password.php";
 						</script>
										<?php
}

			} else {
				?>
			<script type="text/javascript">
											alert("password mismatch");
											window.location.href="reset_password.php";
 						</script>
										<?php
}
		}
		//} else {
		?>
			<script type="text/javascript">
											alert("No token found");
											window.location.href="reset_password.php";
 						</script>
										<?php
}
}
?>


<!DOCTYPE html>
<html>
<head>

	<div class="container red-text"><?php echo $errors['cpassword']; ?></div>

</head>
	<div class="row">
		<div class="container">
 	<section class="container black-text">
 		<h6 class="center black-text">Reset Password</h6>
 	</section>
 	<div class="signup card">
 	<form action="reset_password.php" method="POST">
		<label>New Password *:</label>
		<br>
		<input type="text" name="password" placeholder="Enter password" required>
		 <div class="red-text"><?php echo $errors['password']; ?></div>
		<br><br>
		<label>Confirm Password *:</label>
		<br>
		<input type="text" name="cpassword" placeholder="Repeat your password" required>
		<br><br>
		<div class="center">
		<input type="submit" name="submit" value="Save password" class="btn brand z-depth-0">
		</div>
	</form>
</div>
	</div>
</div>

  </body>
</html>
