<?php
// including the php file for index.php
include_once 'index_php.php';
// <!-- Including Header file  -->
include_once 'header.php';
if (!isset($_SESSION['email'])) {
	header("location:login.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
  <head>



  <body class="center">

  </div>
  </div>
  	<h4 class="center black-text">Welcome!</h4>


      <div class="container">
      	<div class="row">
      		<?php foreach ($datas as $data) {?>
      			<div class="col col-12 col-md-4 col-lg-3">

      				<div class="card z-depth=0">
      					<div class="card-content">
      						<div class="card-image"><img src="<?php echo htmlspecialchars($data['cover_image']); ?>"></div>
      						<h6><?php echo htmlspecialchars($data['name']); ?></h6>
      						 <div><?php echo htmlspecialchars($data['author_name']); ?></div>
                   <div>Total books:-<?php echo htmlspecialchars($data['total_count']); ?></div>
      						 </div>
      					<div class="card-action right-align">
      						  <a href="Book_details.php?id=<?php echo $data['id'] ?>"><i class="material-icons">arrow_forward</i></a>
      					</div>
      				</div>
      			</div>

      		<?php }?>
      	</div>
      </div>
      <?php
$role = $_SESSION['usertype'];
if ($role == 1) {
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



