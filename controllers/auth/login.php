<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$user = new Users;
$book = new Books;
if (isset($_SESSION['token']) and isset($_SESSION['loginid'])) {
	$name = $_SESSION['loginid'];
	$row = $user->fetchUser($name);
	$type = $row['type'];
	$uid = $row['uid'];
	$name = $row['user_name'];
	unset($_SESSION['token']);
	unset($_SESSION['loginid']);
	require __dir__ . '/' . '../../Controllers/common/setUserSession.php';
	header('location:/');
} elseif (!isset($_SESSION['uid'])) {
	if (isset($_POST['emailid']) && $_POST['emailid'] != '') {
		$name = mysqli_escape_string($conn, $_POST['emailid']);
		$_SESSION['name'] = $name;
		if (isset($_POST['password']) && $_POST['password'] != '') {
			$pass = mysqli_escape_string($conn, $_POST['password']);
			$_SESSION['password'] = $pass;
			$row = $user->fetchUser($name);
			$user->verify($row, $pass);
		} else
			$user->flashError([NULL, 'Please Enter Password'], '/');
	} else
		$user->flashError(['Please Enter Email Address', 'Please Enter Password'], '/');
}    ?>
<div class="container-fluid bg-light">
	<div class="row">
		<?php
		if (isset($_SESSION['type'])) :
			if ($_SESSION['type'] == 'inadmin' && !isset($_GET['listbooks'])) :
				$total_users = mysqli_num_rows($user->fetchUsers()) - 1;
				$total_books = mysqli_num_rows($book->fetchBooks());
		?>

				<main role="main" class="mx-auto col-xl-8 pt-3 px-4">
					
					<div class="text-center text-lg-left border-bottom">
						<?php if (!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view'] == 'books')) : ?>
							<h2>Add Book <a href='#' data-toggle="modal" data-target="#addBookModal" id='btn-addBook'><i class="fas fa-plus-circle text-secondary h4"></i></a>
							</h2>
					</div>
					<?php require __dir__ . '/' . '../books/ListBooks.php'; ?>

				<?php elseif ($_GET['view'] == 'users') : ?>
				<div>
					<h2> Users </h2>
					</div>
				
	</div>
	<?php require __dir__ . '/' . '../users/ListAllUsers.php'; ?>
<?php
						endif; ?>
<?php

			endif;
?>
<main role="main" class="container my-3 px-0">
	<?php if (isset($_GET['listbooks']) && $_GET['listbooks'] == "shelf") { ?>
		<div class="text-center border-bottom">
			<h4 class="my-2 pb-2 font-weight-normal">My Shelf</h4>
		</div>
	<?php

				require __dir__ . '/' . '../books/UserBooks.php';
			} else if (isset($_GET['listbooks']) && $_GET['listbooks'] == "fav") { ?>
		<div class="text-center border-bottom">
			<h4 class="my-2 pb-2 font-weight-normal">My Favorites</h4>
		</div>
	<?php

				require __dir__ . '/' . '../books/UserFavBooks.php';
			} else if (isset($_GET['listbooks']) && $_GET['listbooks'] == "finised") { ?>
		<div class="text-center border-bottom">
			<h4 class="my-2 pb-2 font-weight-normal">My Finished</h4>
		</div>
		<?php

				require __dir__ . '/' . '../books/UserFinishedBooks.php';
			}  else if (isset($_GET['listbooks']) && $_GET['listbooks'] == "reading-history") { ?>
		<div class="text-center border-bottom">
			<h4 class="my-2 pb-2 font-weight-normal">Reading History</h4>
		</div>
		<?php require __dir__ . '/' . '../books/UserHistoryBooks.php';
			}   else {
				if ($_SESSION['type'] == 'inreader') { ?>
			<div class="text-center text-sm-left border-bottom">
				<h4 class="my-2 pb-2 font-weight-normal">Books </h4>
			</div> <?php
					require __dir__ . '/' . '../books/ListBooks.php';
				}
			}
		else :
			header('location:/');
		endif;
					?>

</main>
</div>
</div>