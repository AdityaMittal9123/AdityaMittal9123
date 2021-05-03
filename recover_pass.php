<?php
include_once 'connect.php';
$email = '';
$errors = array('email' => '');

if (isset($_POST['submit'])) {
	// if (empty($_POST['email'])) {
	// 	$errors['email'] = "A email is required! ";
	// } else {
	$email = $_POST['email'];
	// }
	// if (!array_filter($errors)) {

	$namequery = "SELECT * FROM users WHERE email='$email'";
	$query = mysqli_query($conn, $namequery);
	// var_dump($query);
	// die;
	$emailcount = mysqli_num_rows($query);
	// var_dump($emailcount);
	// die;
	$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
	$token = $result['token'];
	var_dump($token);
	die;
	if ($emailcount == 0) {

		// $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
		// $token = $result['token'];
		// var_dump($result);
		// die;

		$subject = "Password reset";
		$body = "Hi $email,
				 Click on the link below to reset your password
			 			http://localhost/prep-2/reset_password.php?token=$token";
		$sender_email = "From: adityamittal761@gmail.com";
		if (mail($email, $subject, $body, $sender_email)) {
			// $msg = "Check your email to verify/activate your account $email";
			// $_SESSION['msg'] = $msg;
			?>
						<script type="text/javascript">
							alert("check your mail which you have entered to resset your password");
							window.location.href="login.php";
						</script>
						<?php
} else {
			echo "Email sending failed";
		}
	} else {
		echo "No email found";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<?php include_once 'header.php';?>


</head>
<body>
		<div class="container">
 	<section class="container black-text">
 		<h6 class="center black-text">Reset Password</h6>
 	</section>
 	<div class=" card">
 	<form action="recover_pass.php" method="POST">
		<label>E-mail *:</label>
		<br>
		<input type="email" name="email" placeholder="Enter E-mail to get reset link" required>
		<div class="red-text"><?php echo $errors['email']; ?></div>
		<br><br>
		<div class="center">
		<input type="submit" name="submit" value="Send Mail" class="btn brand z-depth-0">
		</div>
	</form>
</div>
	</div>


  </body>
</html>
