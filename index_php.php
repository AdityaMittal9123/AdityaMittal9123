<?php

// database connection file
include_once 'connect.php';

// query for all data
$sql = 'SELECT * FROM books';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting data from memory
$datas = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);

?>