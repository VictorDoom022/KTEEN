<?php
include("../config.php");

session_start();
	//logout
	if(isset($_GET['u'])){
			if ($_GET['u'] == 'logout') {
				session_destroy();
				echo "<script>window.location.assign('Login.html');</script>";
				}
		}

	if($_SESSION['username']!= ''){
				$username = $_SESSION['username'];
			}else{
				echo "<script>window.location.assign('Login.html');</script>";
			}

	if(isset($_POST['add'])){
		$stallName = $_POST['stallName'];
		$ownerName = $_POST['ownerName'];
		$email = $_POST['email'];
		$phoneNo = $_POST['phoneNo'];
		$password = $_POST['password'];
		$password = md5($password);

		$sql = "INSERT into stall(stall_name, owner_name, email, contact_no, password, status) values ('$stallName','$ownerName','$email','$phoneNo','$password', '1')";
		$result = $conn->query($sql);
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="../css/kteen_style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<script type="text/javascript">

	</script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>KTEEN</title>
</head>
<body>
<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-10 bg-white border-bottom">
		<span class="navbar-brand h1 mb-0 col"><i class="fas fa-bars d-inline-flex mr-2"></i>Menu</span>
		<ul class="navbar-nav px-4">
			<li class="nav-item">
				<a href="adminmain.php?u=logout" class="btn btn-outline-dark" role="button" aria-pressed="true">Log Out</a>
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
                    <span class="w-100"><?php echo $username;?></span>
                </li>
                <li class="nav-item w-100 mb-1">
                    <a href="index.php" class="nav-link w-100">
                        <i class="fas fa-home d-inline-flex px-auto"></i>
                        <span class="d-none d-md-inline-flex ml-3">Manage Stalls</span>
                    </a>
                </li>
                <li class="nav-item w-100 mb-1">
                    <a href="addstall.php" class="nav-link w-100 active">
                        <i class="fas fa-plus d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Add Stall</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
    	<div class="col-sm-6 col-md-4 col-lg-3 p-2">
	    		<form method="post" action="addstall.php">
	            			<div class="form-group">
	    						<label for="stallName">Stall Name</label>
	    						<input type="text" class="form-control" placeholder="Enter stall name" name="stallName" id="stallName">
	  						</div>
	  						<div class="form-group">
	    						<label for="exampleInputEmail1">Owner Name</label>
	    						<input type="text" class="form-control" placeholder="Enter owner's name" name="ownerName" id="ownerName">
	  						</div>
	  						<div class="form-group">
	    						<label for="exampleInputEmail1">Email address</label>
	    						<input type="email" class="form-control" placeholder="Enter email" name="email" id="email">
	  						</div>
	  						<div class="form-group">
	    						<label for="exampleInputPassword1">Phone No</label>
	    						<input type="number" class="form-control" placeholder="Enter contact number" name="phoneNo" id="phoneNo">
	  						</div>
	  						<div class="form-group">
	    						<label for="exampleInputPassword1">Password</label>
	    						<input type="password" class="form-control" placeholder="Password" name="password" id="password">
	  						</div>
	  						<input type="submit" class="btn btn-primary bg-warning" value="add" name="add">
				</form>
    	</div>
    </div>
</body>
</html>