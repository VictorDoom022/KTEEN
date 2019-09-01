<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-10 bg-white border-bottom">
	<span class="navbar-brand h1 mb-0 col"><i class="fas fa-home d-inline-flex mr-2"></i>Home</span>
	<ul class="navbar-nav px-4 ml-auto">
		<li class="nav-item dropdown">
			<a href="#" class="btn dropdown-toggle" id="navbarDropdown" data-toggle="dropdown"><?php echo $_SESSION['kteen_staff_name']; ?></a>
			<div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Action</a>
				<a class="dropdown-item" href="#">Another action</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
			</div>
		</li>
	</ul>
</nav>