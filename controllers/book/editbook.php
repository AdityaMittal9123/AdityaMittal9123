<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if($_SESSION['type']!='inadmin')
	header("location:/");
$book = new Books();


if(isset($_POST['book_name']) and isset($_POST['author_name']) and isset($_POST['description']) and isset($_POST['bid'])  and isset($_POST['book_count'])) {
	
	
	
	$book_name=mysqli_escape_string($GLOBALS['conn'],$_POST['book_name']);
	$count=mysqli_escape_string($GLOBALS['conn'],$_POST['book_count']);
	$author_name=mysqli_escape_string($GLOBALS['conn'],$_POST['author_name']);
	$description=mysqli_escape_string($GLOBALS['conn'],$_POST['description']);
	$bid=mysqli_escape_string($GLOBALS['conn'],$_POST['bid']);
	$booknames=['book_name','author_name','description','count'];
	$bookvalues=[$book_name,$author_name,$description,$count];
	$book->updateBook($booknames,$bookvalues,$bid);
	
	if($_FILES["book_cover"]["name"]){
		$t=substr($book_name,0,5);
		$i=substr($description,0,5);
		$title=str_replace(' ','',$t).str_replace(' ', '', $i);		
		$target_dir = __dir__.'/'.'../../resources/uploads/';   
		$filename=$title.".jpg";      
		$target_file = $target_dir . $filename;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$user=new Users();
		if ($_FILES["book_cover"]["size"] > 1048576) {
			echo "string1";
			$user->flashError(['Sorry, your file is too large. '],'/login?books=1');
		}
		if($imageFileType != "jpg") {
			echo "string2";
			$user->flashError(['Upload File is not jpg Image '],'/login?books=1');
		}
		$deltitle=$_POST['cover_name'];
		$delfilename=$deltitle.".jpg";      
		$delfile_pointer = __dir__.'/'.'../../resources/uploads/'.$delfilename;  
		unlink($delfile_pointer); 
		$booknames=['cover_image_name'];
		$bookvalues=[$title];
		$book->updateBook($booknames,$bookvalues,$bid);
		if (!move_uploaded_file($_FILES["book_cover"]["tmp_name"], $target_file)) {	
			header('location:/login?view=books');		
		}
	}
	header('location:/login?view=books');		
}
if(isset($_GET['bid'])){
	$bid=$_GET['bid'];
	$rows=$book->fetchBook($bid);
	$book_name=$rows['book_name'];
	$author_name=$rows['author_name'];
	$description=$rows['description'];
	$cover=$rows['cover_image_name'];
	$count=$rows['count'];
	
	require __dir__.'/'.'../../Views/books/editbook_form.view.php';
}
elseif(!isset($_POST['book_name'])) {
	header('location:/');
}
?>