<?php
if (!isset($_SESSION['email'])) {
	header("location:/login");
	exit;
}
if(isset($_GET['u_id'])){
    $u_id=$_GET['u_id'];

    $user=App::get('users')->UserDetails($u_id);
    // var_dump($user);
    // die;
    
     require './view/profile.php';
}

?>