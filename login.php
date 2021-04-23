<?php

include_once 'connect.php';
//include_once 'session.php';
//include_once 'header.php';
$email = $name = $password = " ";
$errors = array('email' => '', 'password' => '');
// if (isset($_POST['login'])) {

// 	if (empty($_POST['email'])) {
// 		$errors['email'] = "a email is required";
// 	}
// 	if (empty($_POST['password'])) {
// 		$errors['password'] = 'password is required';
// 	}
// 	if (array_filter($errors)) {
// 		//echo 'something gone wrong ';
// 	} else {
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "SELECT password FROM users WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
	// var_dump($result);
	// die;
	$data = mysqli_fetch_assoc($result);
	// var_dump($data);
	// die;
	//$password_hash = password_hash($data['password'], PASSWORD_BCRYPT);
	// var_dump($password_hash);
	// die();
	if ($data['password'] == $password) {
		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['u_id'] = $r['u_id'];
		header("Location:index.php");
		// var_dump("hello");
		// die;
	}
}
// 	if (mysqli_num_rows($result) > 0) {
// 		$q = "SELECT * FROM users WHERE email='$email'";
// 		$e = mysqli_query($conn, $q);
// 		//fetch the resulting data from memory
// 		$r = mysqli_fetch_all($e, MYSQLI_ASSOC);
// 		// var_dump('$r');
// 		// die;
// 		//header("Location:index.php");
// 		ctrl x
// session_start();
// 		$_SESSION['email'] = $email;
// 		$_SESSION['u_id'] = $r['u_id'];
// 	} else {
// 		// $_SESSION['valid'] = true;
// 		// $_SESSION['timeout'] = time();
// 		// $_SESSION['email'] = $_POST['email'];
// 		$errors['email'] = 'wrong email';

// 	}
// }

?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'header.php';?>
</head>


<body>
		<div class="red-text"><?php echo $errors['email']; ?></div>
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
			<br><br>
			<div class="center">
				<input type="submit" name="submit" value="Login" class="btn brand z-depth-0">
			</div>
		</form>
	</div>
	  </section>
	</body>
  </html>

