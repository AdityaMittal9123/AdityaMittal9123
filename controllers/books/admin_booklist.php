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
$datas=App::get('database')->selectAll('books');
require './view/admin_booklist.php';

// if($_POST['search']){
//     $str = $_POST['search'];
//     	$str = preg_replace("#[^0-9a-z]#i", "", $str);
//         $search=App::get('books')->SearchBook($str);
    	
//         $data=$s->fetch(PDO::FETCH_OBJ);
//         $count=$s->rowcount();
//     	if ($count > 0) {
//     		$data = mysqli_fetch_all($s_query, MYSQLI_ASSOC);
//     		while ($data) {
//     			echo $name;
//     			echo $author_name;
    
//     		}
//     	} else {
//     		echo "oops!";
//     	}
//     }


?>