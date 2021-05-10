<?php

include_once 'connect.php';
//include_once 'session.php';
include_once 'header.php';
$email = $error = $password = " ";
$errors = array('email' => '', 'password' => '', 'error' => '');
if (isset($_POST['submit'])) {

	if (empty($_POST['email'])) {
		$errors['email'] = "a email is required";
	}
	if (empty($_POST['password'])) {
		$errors['password'] = 'password is required';
	}
	if (array_filter($errors)) {
		//echo 'something gone wrong ';
	} else {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$usertype = [];
		$u_id = [];
		$sql = "SELECT * FROM users WHERE email='$email' and status='active'";
		$result = mysqli_query($conn, $sql);

		$data = mysqli_fetch_assoc($result);
		// var_dump($data);
		// die;
		// $db_pass = $result['password'];
		// $pass_decode = password_verify($password, $db_pass);
		if ($data['password'] == $password) {
			$_SESSION['usertype'] = $data['usertype'];
			$_SESSION['email'] = $email;
			$_SESSION['u_id'] = $data['u_id'];
			$_SESSION['token'] = $data['token'];
			header("location:admin_booklist.php");
		} else {
			$errors['error'] = "Incorrect password!";
		}
	}

}

?>
<!DOCTYPE html>
<html>
<body>
		<div class="red-text"><?php echo $errors['email']; ?></div>
		<div class="red-text"><?php echo $errors['error']; ?></div>
		<!-- <div class="green-text success"><?php echo $_SESSION['msg']; ?></div> -->

	  <section class="container grey-text">
	  	<div class="col m6 s12 l4">

		<p class="center black-text">login to continue</p>

		<form action="login.php" method="POST">

			<label >E-mail*:</label>
			<br>

			<input  type="email" name="email"  placeholder="Enter E-mail" required>

			<br><br>

			<label >Password*:</label>
			<br>

			<input  type="text" name="password"  placeholder="Enter Password" required>
			<div class="red-text"><?php echo $errors['password']; ?></div>
			<br><br>
			<div class="center">
				<input type="submit" name="submit" value="Login" class="btn brand z-depth-0">
				<p class="black-text">Forgot Your password? No worry, click <a href="recover_email.php"> here</a></p>
			</div>

		</form>
	</div>
	  </section>
	</body>
  </html>

