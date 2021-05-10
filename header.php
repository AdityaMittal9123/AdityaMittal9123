<?php
//include_once 'connect.php';
session_start();

// if (isset($_POST['search'])) {
// 	$str = $_POST['search'];
// 	$str = preg_replace("#[^0-9a-z]#i", "", $str);
// 	$sql = "SELECT * FROM books WHERE name LIKE '%$str%' or author_name LIKE '%$str%";
// 	// var_dump($sql);
// 	// die;
// 	$s_query = mysqli_query($conn, $sql);
// 	var_dump($s_query);
// 	die;
// 	$count = mysqli_num_rows($s_query);
// 	// $data=mysqli_fetch_all($s_query,MYSQLI_ASSOC);
// 	// echo "There are".$data."results";
// 	// var_dump($count);
// 	// die;
// 	if ($count > 0) {
// 		$data = mysqli_fetch_all($s_query, MYSQLI_ASSOC);
// 		while ($data) {
// 			echo $name;
// 			echo $author_name;

// 		}
// 	} else {
// 		echo "oops!";
// 	}
// }

?>
<!DOCTYPE html>
<html lang="en">
 <head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width-wise-width , initial scale=1.0" />
<link rel="stylesheet" href="signup.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script> -->


 <script>
 document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems, {});
        });
    </script>

</head>
<title>E-library</title>
</head>

	<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
     <!--  <ul class="navbar-nav me-auto mb-2 mb-lg-0"> -->
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->

       <!--  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           expand more
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
       <!--  <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      <!-- </ul> -->
      	<!-- <form class="d-flex">
        <input class="form-control me-3  text-light" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-0 text-light" type="submit">Search</button>
      </form> -->
    <!-- </div>
  </div> -->
<nav>
<?php

if (!isset($_SESSION['email'])) {
	echo "<ul>
	<li><a href='singup.php' class='logo'>E-library</a></li>
	</ul>";
}
if (isset($_SESSION['email']) && $_SESSION['usertype'] == 1) {
	echo "				<a href='admin_booklist.php' class='logo left'>E-library</a>
							<ul class='right'>
							<li><a href='profile.php' style='color:white;'> $_SESSION[email]<i class='material-icons right'>person</i></a></li>
                            <li><a  href='logout.php'>Logout</a></li>
                            <li><a class='dropdown-trigger bt' href='#!' data-target='dropdown12' >Control Panel<i class='material-icons right'>expand_more</i></a></li>
                            </ul>
                        ";
	echo " <ul id='dropdown12' class='dropdown-content' style='background-color:orange;'>
                                <li><div class='divider'></div></li>
                                <li><a href='books.php' style='color:white;'>Add New Book</a></li>
                                <li><a href='adminlist.php' style='color:white;'>List Admin</a></li>
                                <li><a href='userlist.php' style='color:white;'>User List</a></li>
                                </ul>";
} elseif (isset($_SESSION['email']) && $_SESSION['usertype'] == 0) {

	echo "<a href='admin_booklist.php' class='logo left'>E-library</a>
	<ul class='right'>
	<li><a href='profile.php'class='white-text right'>$_SESSION[email]<i class='material-icons right'>account_circle</i></a></li>
                      <li> <a class='right' name='logout' type='submit' href='logout.php'>Logout</a></li>
                      </ul>";
}
?>
</nav>
