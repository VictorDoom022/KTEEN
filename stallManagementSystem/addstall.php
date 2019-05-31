<?php
include("connect.php");

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

		$sql = "insert into stall values('1', $stallName','$ownerName','$email','$phoneNo','$password', '1')";
		$result = $conn->query($sql);
	
	}		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Stalls</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	  </script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div onclick="location.href='adminmain.php';" style="cursor: pointer;">
			<p class="navbar-brand bg-dark">KTeen Management System</p>
		</div>
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<button type="button" class="btn btn-outline-light mb-3 mb-md-0 ml-md-3" style="float: right;" onclick="location.href='Login.html?u=logout';">Sign Out</button>
			</li>
		</ul>
	</nav>
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item"><p>Welcome,<strong><?php echo $username;?></strong> </p></li>
                        <li class="list-group-item bg-light" onclick="location.href='adminmain.php';" style="cursor: pointer;"><p>Manage Stalls</p></li>
                        <li class="list-group-item active bg-dark" onclick="location.href='addstall.php';" style="cursor: pointer;"><p>Add Stall</p></li>
                    </ul>                
            </div>
            <!-- stallName, ownerName,email,phoneNo,password,status -->
            <div class="container">
            		<form method="post" action="adminmain.php" class="subform" enctype="multipart/form-data">
            			<div class="form-group">
    						<label for="stallName">Stall Name</label>
    						<input type="text" class="form-control"  placeholder="Enter stall name" name="stallName" id="stallName">
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
  						<button type="submit" class="btn btn-primary bg-dark" value="add" name="add">Submit</button>
					</form>
            </div>
        </div>
    </div>
</body>
</html>