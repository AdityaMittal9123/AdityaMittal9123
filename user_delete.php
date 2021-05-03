<?php

include_once 'connect.php';

//geting id
$id = $_GET['id'];
//Query to delete the book
$sql = "DELETE FROM users WHERE u_id='$id'";
$result = mysqli_query($conn, $sql);
// var_dump($result);
// die;
?>

	 if ($result) {
		<script type="text/javascript">
		alert("User deleted successfully!");
		 window.location.href="admin_list.php";
		</script>
	 }
<?php
//closing connection
mysqli_close($conn);
?>