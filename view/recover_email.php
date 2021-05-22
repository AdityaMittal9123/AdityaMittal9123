<?php
include_once 'connect.php';
include_once 'header.php';
$email = " ";
$errors = array('email' => '');

if (isset($_POST['submit'])) {
	if (empty($_POST['email'])) {
		$errors['email'] = "A email is required! ";
	} else {
		$email = $_POST['email'];
		// var_dump($email);
		// die;
		$q = "SELECT * FROM users WHERE email='$email'";
		//var_dump($q);
		// die;
		$r = mysqli_query($conn, $q);
		// var_dump($r);
		// die;

		$result = mysqli_fetch_all($r, MYSQLI_ASSOC);
		// $token = $result['token'];
		var_dump($result);
		die;
		//$emailcount = mysqli_num_rows($r);

		// var_dump($emailcount);
		// die;
		if ($emailcount) {

			$result = mysqli_fetch_array($query);
			$token = $result['token'];
			// var_dump($result);
			// die;

			$subject = "Password reset";
			$body = "Hi $email,
					 Click on the link below to reset your password
				 			http://localhost/prep-2/reset_password.php?token=$token";
			$sender_email = "From: adityamittal761@gmail.com";
			if (mail($email, $subject, $body, $sender_email)) {
				// $msg = "Check your email to verify/activate your account $email";
				?>

	<script type="text/javascript">
								alert("check your mail which you have entered to reset your password");
								window.location.href="login.php";
							</script>
							<?php

			} else {
				echo "Email sending failed";
			}
		} else {
			echo "no email found";
		}
	}
}

?>


<!DOCTYPE html>
<html>
<head>



</head>
<body>
		<div class="container">
 	<section class="container black-text">
 		<h6 class="center black-text">Reset Password</h6>
 	</section>
 	<div class=" card">
 	<form action="recover_email.php" method="POST">
		<label for="email">E-mail *:</label>
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
