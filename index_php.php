<?php

// database connection file
include_once 'connect.php';

// query for all data
$sql = 'SELECT * FROM books';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting data from memory
$datas = mysqli_fetch_all($result, MYSQLI_ASSOC);

rsort($datas);

// print_r($datas);
// die;

// mysqli_close($conn);

if (isset($_POST['submit'])) {
	$str = mysqli_real_escape_string($conn, $_POST['str']);
	// var_dump($str);
	// die;
	$query = "SELECT * FROM books WHERE name LIKE '%$str%' or author_name LIKE '%$str%'";
	// var_dump($sql);
	// die;
	$s_query = mysqli_query($conn, $query);
	// var_dump($s_query);
	// die;
	$count = mysqli_num_rows($s_query);
	// $data = mysqli_fetch_all($s_query, MYSQLI_ASSOC);
	// echo "There are".$data."results";
	// var_dump($data);
	// die;
	if ($count > 0) {
		$result = mysqli_fetch_assoc($s_query);
		while ($result) {
			print_r($result['name']);
			echo "<br/>";
		}

	} else {
		echo "oops!";
	}
}

// sorting ki query likhni h abhi
// if (isset($_POST['asc'])) {
// 	$sort = $_POST['sort'];
// 	$sql = "SELECT * FROM books ORDER BY name asc  ";

// 	$query = mysqli_query($sql);
// 	$count = mysqli_num_rows($query);
// 	$result = mysqli_fetch_assoc($query);
// 	if ($count > 0) {
// 		foreach ($query as $data) {
// 			echo htmspeciallchars($data['name']);
// 			echo htmspeciallchars($data['author_name']);
// 			echo htmspeciallchars($data['id']);
// 		}
// 	}
// }
?>
