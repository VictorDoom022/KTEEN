<?php 
session_start();
include("../config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<title>KTEEN</title>
</head>
<body class="bg-light">
	<?php 
	if (isset($_GET['logout'])) {
		session_destroy();
		echo "<script>window.location.assign('login.php');</script>";
	}

	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
	}else{
		echo "<script>window.location.assign('login.php');</script>";
	}
	?>
	<nav class="navbar fixed-top navbar-light bg-white p-0 shadow">
		<a class="navbar-brand col-2" href="index.php">
			KTEEN
		</a>
		<ul class="navbar-nav px-3">
			<li class="nav-item">
				<a href="index.php?logout='1'" class="btn btn-sm btn-outline-dark" role="button" aria-pressed="true">Log Out</a>
			</li>
		</ul>
	</nav>

	<div class="fixed-bottom col-10 ml-auto mb-3">
		<div class="card bg-secondary shadow-lg">
			<form class="form-inline m-2">
				<a href="#addfood" data-toggle="modal" class="btn"><i class="fas fa-plus text-light"></i></button>
				<a href="" class="mx-2 btn"><i class="far fa-trash-alt text-light"></i></i></a>
				<input type="search" name="" placeholder="Search" class="form-control col mr-2 ml-auto">
				<input type="submit" name="" value="Search" class="btn btn-outline-light ml-2 mr-2">
			</form>
		</div>
	</div>

	<div class="modal fade" id="addfood" tabindex="-1" role="modal">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="header-title">Add Menu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form>
					<div class="modal-body">
						<form action="menu.php" method="post">
							<input type="hidden" name="stall_ID" value="">
							<div class="form-row">
								<div class="col form-group">
									<label for="name">Food Name</label>
									<input type="text" name="" id="name" class="form-control" placeholder="Food Name">
								</div>
								<div class="col form-group">
									<label for="category">Category</label>
									<input type="text" list="category_list" name="" id="category" class="form-control" placeholder="Category">
									<datalist id="category_list">
										<option value="jjyy">
										<option value="yyjj">
										<option value="jyjy">
									</datalist>
								</div>
							</div>
							<div class="form-row">
								<div class="col-7 form-group">
									<label for="image">Image</label>
									<div class="custom-file">
										<input type="file" name="" class="custom-file-input" id="image">
										<label class="custom-file-label" for="image">Image</label>
									</div>
								</div>
								<div class="col form-group">
									<label for="price">Price</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">RM</div>
										</div>
										<input type="number" name="" id="price" min="0" class="form-control" placeholder="Price">
									</div>
									
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<input type="submit" name="" class="btn btn-sm btn-warning" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<ul class="nav sticky-top flex-column col-2 bg-light pt-5 border-right" style="height: 100vh;">
				<li class="nav-item pl-2 pt-3">
					<a href="index.php" class="nav-link text-dark">
						<i class="fas fa-home mr-1 d-inline-flex"></i>
						<span class="d-none d-md-inline-flex">Home</span>
					</a>
					<a href="menu.php" class="nav-link bg-dark rounded text-white">
						<i class="fas fa-bars mr-1 d-inline-flex"></i>
						<span class="d-none d-md-inline-flex">Menu</span>
					</a>
					<a href="#" class="nav-link text-dark">
						<i class="far fa-chart-bar  mr-1 d-inline-flex"></i>
						<span class="d-none d-md-inline-flex">DashBoard</span>
					</a>
					
					
				</li>
			</ul>

			<div class="col-10 pt-5">
				<div class="container-fluid">
					<div class="row">
						<h1 class="col">Menu</h1>
					</div>
					<div class="row">
						<div class="card p-3 col-12 overflow-auto" style="margin-bottom: 100px;">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Image</th>
										<th>Name</th>
										<th>Category</th>
										<th>Price</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="" class=""></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td><?php echo "string"; ?></td>
										<td>RM <?php echo "string"; ?></td>
										<td><button class="btn btn-sm btn-outline-dark">Edit</button></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>