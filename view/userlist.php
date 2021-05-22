<?php
// include_once 'connect.php';
// include_once 'header.php';
// // include_once 'index_php.php';

// $sql = "SELECT * FROM users where usertype=0";

// $s = mysqli_query($conn, $sql);

// $result = mysqli_fetch_all($s, MYSQLI_ASSOC);
// var_dump($result);
// die;

?>
<html>
<head>
  <script>
    $(document).ready(function(){
      $('.modal').modal();
    });
   </script>
 </head>
<body>
  <section>
    <center><h4 class="orange-text">USER LIST</h4></center>
  </section>
	<div class="container" >
      	<div class="row">
      		<?php foreach ($udata as $r) {?>
      			<div class="col col-12 col-md-3 col-lg-2">

      				<div class="card z-depth=0">
      					<div class="card-content">
      						<div class="card-image"style="height:180px"><img src="https://www.searchpng.com/wp-content/uploads/2019/02/Men-Profile-Image-715x657.png"></div>
                  <ul>
      						<div class=""><?php echo htmlspecialchars($r->email); ?></div>
                  <div class="left-align">Type:-<?php echo htmlspecialchars($r->usertype); ?></div>
                  <div class="right-align"><a href="profile?u_id=<?php echo htmlspecialchars($r->u_id); ?>" class=" green-text waves">Go to profile</a></div>
                  <!-- <li><a class="modal-trigger" data-target="terms"><i class="small material-icons red-text">delete_account</i></a></li> -->
                  <!--  </ul>-->
                    <div class="modal" id="terms">
                      <div class="modal-content black-text">
                        <!-- Confirmaton message -->
                      <center><h4>Are you sure ?</h4>
                        <p>This data will not be retrieved back after deleted once.</p>
                          <a href="delete?id=<?php echo htmlspecialchars($r->u_id); ?>" class="modal-close btn">Sure</a>
                          <a href="#" class="modal-close btn">Cancel</a>
                      </center>
                          
                      </div>
                    </div>
                    </ul>
      						 </div>
      				</div>
      			</div>
      		<?php }?>
          <div class="fixed-action-btn">
              <a class="btn-floating btn-large red "href="/">
              <i class="large material-icons ">add_circle</i>
	            </a>
          </div>
      	</div>
      </div>
  </body>