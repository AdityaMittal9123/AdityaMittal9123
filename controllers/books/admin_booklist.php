<?php
if (!isset($_SESSION['email'])) {
	?>
	<script type="text/javascript">
		alert("Please login first to access booklist!");
		 window.location.href="login";
		</script>
		<?php
	exit;
}
// if(isset($_POST['A-Z'])){
// 	$sort = 'ASC';
// 	// var_dump($_POST['A-Z']);
// 	// die;
// }
// elseif(isset($_POST['Z-A'])){
// 	$sort = 'DESC';
// 	// var_dump($_POST['Z-A']);
// 	// die; 
// }
// else{
// 	$sort='default';
// }
if(isset($_GET['page'])){
	$page = $_GET['page'];
	}else{
		$page=1;
	}
$limit=6;
//$offset = ($page-1)*$limit;
$offset=1;
$datas=App::get('database')->selectLimit('books',$offset,$limit);
$totaldata=App::get('database')->selectAll('books');
$count=count($totaldata);
$total_page=ceil($count/$limit);
$_SESSION['total_page']=$total_page;
$a=$_SESSION['total_page'];
rsort($datas);
require './view/admin_booklist.php';	

?>