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
	<div class="container-fluid">
		<div class="row">
			<ul class="nav flex-column col-2 bg-light border-right pt-5" style="height: 100vh">
				<li class="nav-item pl-2 pt-3">
					<a href="index.php" class="nav-link text-dark">
						<i class="fas fa-home mr-1 d-inline-flex"></i>
						<span class="d-none d-md-inline-flex">Home</span>
					</a>
					<a href="menu.php" class="nav-link text-dark">
						<i class="fas fa-bars mr-1 d-inline-flex"></i>
						<span class="d-none d-md-inline-flex">Menu</span>
					</a>
					<a href="dashboard.php" class="nav-link bg-dark rounded text-white">
						<i class="far fa-chart-bar mr-1 d-inline-flex"></i>
						<span class="d-none d-md-inline-flex">DashBoard</span>
					</a>
				</li>
			</ul>
			<div class="col-10 pt-5">
				<div class="container-fluid">
					<div class="row">
						<h1 class="col">DashBoard</h1>
					</div>
					<div class="row">
						<div class="card p-3 col-md-12">
							
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