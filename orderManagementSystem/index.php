<?php 
include '../server/config.php';
include '../server/logout.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/kteen_style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
	<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-10 bg-white border-bottom">
		<span class="navbar-brand h1 mb-0 col"><i class="fas fa-home d-inline-flex mr-2"></i>Home</span>
		<ul class="navbar-nav px-4 ml-auto">
			<li class="nav-item dropdown">
				<a href="#" class="btn btn-outline-dark dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">wdwo</a>
				<div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
				</div>
			</li>
		</ul>
	</nav>
	<nav class="k-side-nav nav flex-column col-2 border-right bg-white p-0">
		<div class="logo">
			<h2>
			    <a href="index.php" class="d-flex d-md-none">K</a>
			    <a href="index.php" class="d-none d-md-flex">KTEEN</a>
			</h2>
		</div>
		<div class="k-nav-container h-75">
            <ul class="k-nav nav">
                <li class="nav-item w-100 mb-1">
                    <a href="index.php" class="nav-link w-100 active">
                        <i class="fas fa-home d-inline-flex px-auto"></i>
                        <span class="d-none d-md-inline-flex ml-3">Home</span>
                    </a>
                </li>
                <li class="nav-item w-100 mb-1">
                    <a href="menu.php" class="nav-link w-100">
                        <i class="fas fa-bars d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Menu</span>
                    </a>
                </li>
                <li class="nav-item w-100 mb-1">
                    <a href="" class="nav-link w-100">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="d-none d-md-inline-flex ml-3">Order</span>
                    </a>
                </li>
            </ul>
        </div>
	</nav>
</body>
</html>