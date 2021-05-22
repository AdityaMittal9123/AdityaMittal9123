<?php
// if (isset($_POST['submit'])) {
// 	$str = mysqli_real_escape_string($conn, $_POST['str']);
// 	$query = "SELECT * FROM books WHERE name LIKE '%$str%' OR author_name LIKE '%$str%'";
// 	// var_dump($query);
// 	// die;

// 	$res = mysqli_query($conn, $query);
// 	$da = mysqli_fetch_all($res, MYSQLI_ASSOC);
// 	var_dump($da);
// 	die;
// 	if (mysqli_num_rows($res) > 0) {
// 		echo "yes";
// 	} else {
// 		echo "no data found";
// 	}
// }

?>

<!DOCTYPE html>
<html>
  <head>
</head>
 <body class="center">
    <form class='center' method='post' action="#" style="width:300px">
        <input type="textbox" name="str" required />
        <input type="submit" name="submit" value="search" />
      </form>

      <form class='center' action="admin_booklist.php" type='action' method='post'style="width:300px;">
         <div class='input-field'>
           <!--  Dropdown Trigger -->

      <ul id = "dropdown" class = "dropdown-content">
         <li><a href="#">ASC</a></li>
         <li><a href="#">DESC</a></li>
      </ul>

      <a class = "dropdown-button orange-text" href = "#" data-activates = "dropdown">SORT BY-
         <i class = "mdi-navigation-arrow-drop-down material-icons">expand_more</i></a>
      </div>
      
              <!-- <form action="/admin_booklist.php">
                <label for="sort">SORT BY</label>
                <select name="sort" id="sort">
                  <option value="asc">A-Z</option>
                  <option value="desc">Z-A</option>
                </select>
                 <input type="submit" value="Submit">
 -->
              </form>

 <!--  <body class="center"> -->





      <div class="container">
      	<div class="row">
      		<?php foreach ($datas as $data) {?>
      			<div class="col col-12 col-md-3 col-lg-2">

      				<div class="card z-depth=0">
      					<div class="card-content">
      						<div class="card-image"><img src="<?php echo htmlspecialchars($data->cover_image); ?>"></div>
      						<h6><?php echo htmlspecialchars($data->name); ?></h6>
      						 <div><?php echo htmlspecialchars($data->author_name); ?></div>
                   <div>Total books:-<?php echo htmlspecialchars($data->total_count); ?></div>
      						 </div>
                   <div class="card-action ">
                    <a href="book_details?b_id=<?php echo $data->b_id ?>"><i class="material-icons">add</i></a>
                    <a href="book_details?b_id=<?php echo $data->b_id ?>"><i class="material-icons">check</i></a>
      						  <a href="book_details?b_id=<?php echo $data->b_id ?>"><i class="material-icons">favorite_border</i></a>
      					</div>
      					<div class="card-action ">
                    <span><a href="delete?b_id=<?php echo $data->b_id ?>"><i class="material-icons">delete</i></a></span>
                    <span><a href="book_details?b_id=<?php echo $data->b_id ?>"><i class="material-icons">edit</i></a></span>
      						  <span><a href="book_details?b_id=<?php echo $data->b_id ?>"><i class="material-icons">arrow_forward</i></a></span>
      					</div>
      				</div>
      			</div>

      		<?php }?>
      	</div>
      </div>
      <?php
// $role = $_SESSION['usertype'];
if ($_SESSION['usertype']=='admin') {
	echo '<div class="fixed-action-btn">
  <a class="btn-floating btn-large red "href="add.php">
  <i class="large material-icons ">add_circle</i>
 </a>';
}
?>
<!-- <button class="left"><a href="logout.php">Logout</a></button>
 -->
 <!--  <ul>
    <li><a class="btn red"href="add.php">Book</a></li>
  </ul> -->

</div>
  </body>
</html>



