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
<link rel="stylesheet" href="./resources/css/signup.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

 
</head>
<title>E-library</title>
</head>
<nav>
<?php

if (!isset($_SESSION['email'])) {
	echo "<ul>
	<li><a href='/' class='logo'>E-library</a></li>
	</ul>";
}
if (isset($_SESSION['email']) && $_SESSION['usertype'] == 'admin') {
	echo "				<a href='/admin_booklist' class='logo left'>E-library</a>
							      <ul class='right'>
                            <li><a class='dropdown-trigger' href='#' data-target='dropdown1' >$_SESSION[email]<i class='material-icons right'>person</i></a></li>
                            <li><a  href='/logout'>Logout</a></li>
                            </ul>
                        ";
	echo " <ul id='dropdown1' class='dropdown-content' >
                                // <li><div class='divider'></div></li>
                                <li><a class='dropdown-trigger bt' href='#' data-target='dropdown12' value='<?php echo $_SESSION[email];?>' ><i class='material-icons right'>person</i></a></li>                                <li><a href='books.php' style='color:white;'>Add New Book</a></li>
                                <li><a href='adminlist.php' style='color:white;'>List Admin</a></li>
                                <li><a href='userlist.php' style='color:white;'>User List</a></li>
                                <li><a  href='/logout' style='color:white;'>Logout</a></li>
                                </ul>";
} elseif (isset($_SESSION['email']) && $_SESSION['usertype'] == 'reader') {

	echo "<a href='/admin_booklist' class='logo left'>E-library</a>
	<ul class='right'>
                      <li> <a class='right' name='logout' type='submit' href='/logout'>Logout</a></li>
                      <li><a class='dropdown-trigger bt' href='#' data-target='dropdown12' value='<?php echo $_SESSION[email];?>' ><i class='material-icons right'>person</i></a></li>
                      </ul>";
  echo " <ul id='dropdown12' class='dropdown-content' style='background-color:orange;'>
                      <li><div class='divider'></div></li>
                      <li><a href='profile.php' style='color:white;'> $_SESSION[email]<i class='material-icons right'>person</i></a></li>
                      <li><a  href='/logout' style='color:white;'>Logout</a></li>
                      </ul>";
}
?>
</nav>
<script>
 document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems, {});
        });
    </script>