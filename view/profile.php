<!DOCTYPE html>
<html>
<body>
<header>
<center><h3 class="green-text">Welcome To Your Profile Page</h3></center>
</header>
	<div class="profilecontainer"style="width:400px;margin-left: 500px;padding-top: 20px;">
		<div class="card z-depth=0">
			<div class="card-content">
				<div class="card-image"style="height:250px"><img src="https://www.searchpng.com/wp-content/uploads/2019/02/Men-Profile-Image-715x657.png"></div>
				<h4 class="center"><?php echo htmlspecialchars($user->email); ?> </h4>
				<a class="modal-trigger" data-target="terms"><i class="small material-icons red-text">delete_account</i></a>
			</div>
		</div>
		<div class="grey-text">
		<details>
        <summary>Reading</summary>
        <p class="black-text">put the book id here which the user is currently reading</p>
         </details>
     	<details>
        <summary>Returned</summary>
        <p class="black-text">put the book id here which the user has returned</p>
         </details>
        <details>
        <summary>Wishlist</summary>
        <p class="black-text">put the book id here which the user is wish to read in future</p>
    	</details>
		</div>
	</div>
		<!-- <a class="modal-trigger" data-target="terms"><i class="small material-icons red-text">delete_account</i></a> -->

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


</body>
</html>





