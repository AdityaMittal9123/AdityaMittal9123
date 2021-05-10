<?php

//including connection file named connect.php
include_once 'connect.php';
include_once 'header.php';

// if (isset($_POST['Mark'])) {
// 	$marked = mysqli_real_escape_string($conn, $_REQUEST['marked']);
// 	$sql = "INSERT INTO has_book (b_id,u_id,marked) VALUES('" . $row['b_id'] . "','" . $_SESSION['u_id'] . "','" . $marked . "')";
// 	$s = mysqli_query($conn, $sql);
// 	if ($s) {
// 		?>
      <!--  <script>alert('book successfully marked')</script> -->
       <?php
// }
// }

//check GET request id parameter
if (isset($_GET['id'])) {
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	//make sql
	$sql = "SELECT * FROM books WHERE id=$id";

	//get the query result
	$output = mysqli_query($conn, $sql);

	//fetch result in array format
	$data = mysqli_fetch_assoc($output);

	//closing the connection
	mysqli_close($conn);

}
?>

<!DOCTYPE html>
<html>
 <head>
   <!-- script for modal used deleting a book -->
   <script>
    $(document).ready(function(){
      $('.modal').modal();
    });
   </script>

   <script>
  $(document).ready(function(){
    $('select').material_select();
  });
</script>

   <title>Book Details</title>
 </head>
 <body class="background" style="background-color:#ffe6e6;">
   <!-- select box for marking the book as issue, returnde or wishlist -->
    <form action="" method="POST" class="center hide-on-small-and-down">
     <div class="input-field col s12">
    <select>
      <option value="" disabled selected>Choose your option</option>
      <option value="1">Issue Book</option>
      <option value="2">Returned</option>
      <option value="3">Wishlist</option>
    </select>
    <label>Mark Book as :-</label>
  </div>
  </form>


    <!-- container for the book details -->
    <div class="row">
      <div class="container">
          <div class="col m12 l5">
            <div class="card z-depth=0">
              <div class="card-content center">
                <div class="card-image"><img src="<?php echo htmlspecialchars($data['cover_image']); ?>"></div>
              </div>
            </div>

          </div>
          <div class="center-align"><h4><?php echo htmlspecialchars($data['name']); ?><br><br>by<br></h4>
          <h4><?php echo htmlspecialchars($data['author_name']); ?></h4>
          <h5>Description</h5></center>
          <h5 class="black-text darken-4"><?php echo htmlspecialchars($data['description']); ?><br><br></h5>
        </div>
        <table>
        <tr><a class="waves-effect waves-light btn center" href="<?php echo $data['pdf'] ?>" target="_blank">Read Book</a></tr>
        <tr><a href="Edit.php?id=<?php echo $data['id'] ?>" class="waves-effect waves-light btn center">Edit Books</a></tr>
        <tr><a class="waves-effect waves-light btn modal-trigger center" data-target="terms">Delete Books</a></tr>
        </table>

       <div class="modal" id="terms">

        <div class="modal-content black-text">

          <!-- Confirmaton message -->

         <center><h4>Are you sure ?</h4>
          <p>This data will not be retrieved back after deleted once.</p>
            <a href="delete.php?id=<?php echo $data['id'] ?>" class="modal-close btn">Sure</a>
            <a href="#" class="modal-close btn">Cancel</a>
         </center>
        </div>
       </div>
      </div>
    </div>
    <!-- <form action="" method="POST"> -->
    <!-- <p>
      <span>Mark As:-</span>
      <label>
        <input name="action" type="checkbox"/>
        <span>Reading</span>
      </label>
      <label>
        <input   name="action" type="checkbox"/>
        <span>Retured</span>
      </label>
       <label>
        <input  name="action" type="checkbox"/>
        <span>Wishlist</span>
      </label>
      <button class="btn modal-trigger" type ="submit" name="upload" value="1" style="background-color: orange;max-width: 100px;">SAVE</button>
       <select class="select" name="marked" type=checkbox >
        <option>Completed</option>
        <option>Issued</option>
        <option>Wishlist</option>
      </select>
    </p> -->
</body>
</html>
