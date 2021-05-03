<?php

include_once 'connect.php';
if (isset($_GET[''])) {
	$sql = "SELECT * FROM has_book WHERE b_id='$b_id'";
	$query = mysqli_query($conn, $sql);
	$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
	var_dump($result);
	die;
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include_once 'header.php';?>
</head>
<body>
	<div class="profilecontainer"style="width:300px;margin-left: 500px;padding-top: 20px;">
		<div class="card z-depth=0">
			<div class="card-content">
				<div class="card-image"style="height:250px"><img src="https://www.searchpng.com/wp-content/uploads/2019/02/Men-Profile-Image-715x657.png"></div>
				<h4 class="center">aditya</h4>
			</div>
		</div>
		<details>
        <summary>Reading</summary>
        <p>put the book id here which the user is currently reading</p>
         </details>
     	<details>
        <summary>Returned</summary>
        <p>put the book id here which the user has returned</p>
         </details>
        <details>
        <summary>Wishlist</summary>
        <p>put the book id here which the user is wish to read in future</p>
    	</details>
	</div>
</body>
</html>





