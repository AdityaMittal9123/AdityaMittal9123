<?php
include_once 'header.php';
include_once 'connect.php';

if (isset($_GET['token'])) {
	$token = $_GET['token'];

	$updatequery = "UPDATE users SET status='active' WHERE token='$token'";
	$query = mysqli_query($conn, $updatequery);
	// var_dump($query);
	// die;
	if ($query) {
		if (isset($_SESSION['msg'])) {
			?>
			<!-- $_SESSION['msg'] = "Account Verified Successfully";
			header("location:login.php"); -->
			<script type="text/javascript">
							alert("Account Verified Successfully");
							window.location.href="login.php";
						</script>
						<?php
} else {
			$_SESSION['msg'] = "You are logged out ";
			header("location:login.php");
		}
	} else {
		$_SESSION['msg'] = "Account not Updated! ";
		header("location:signup.php");
	}
}
?>