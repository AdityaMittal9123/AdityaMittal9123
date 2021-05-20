<?php
$user = new Users();
$limit=(isset($_POST['limit']))?mysqli_escape_string($conn,$_POST['limit']):10;
$offset=(isset($_GET['offset']))?mysqli_escape_string($conn,$_GET['offset']):0;
$total=mysqli_num_rows($user->fetchUsers())-1;
$rows=$user->fetchUsersLimit($limit,$offset);
$limit=($limit>$total)?$total:$limit;
require __dir__.'/'.'../../Views/users/listUsers_table.view.php';
?>