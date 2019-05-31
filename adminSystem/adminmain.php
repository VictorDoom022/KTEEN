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
	//delete item
	// foreach ($_REQUEST['item'] as $deleteStall) {
	// 	$sql = "update stall set status='0' where stallName = '$deleteName'";
	// 	$result = $conn -> query($sql);	
	// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
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
                        <li class="list-group-item active bg-dark" onclick="location.href='adminmain.php';" style="cursor: pointer;"><p>Manage Stalls</p></li>
                        <li class="list-group-item bg-light" onclick="location.href='addstall.php';" style="cursor: pointer;"><p>Add Stall</p></li>
                    </ul>                
            </div>
            <div class="container">
			<div class="card">
                        <div class="row">
                        	<?php
                        		$sql = "select stallName, ownerName, email, phoneNo from stall";
                        		$result = $conn -> query($sql);

                        		if($result -> num_rows >0){
                        			while ($row = $result -> fetch_assoc()){
                        				$stallName = $row['stallName'];
                        				$ownerName = $row['ownerName'];
                        				$email = $row['email'];
                        				$phoneNo = $row['phoneNo'];
                        			
                        	?>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title" name="item[]"><?php echo $stallName; ?></h5>	
                                        <ul class="list-group list-group-flush">
                                        	<li class="list-group-item"><?php echo $ownerName; ?></li>
                                        	<li class="list-group-item"><?php echo $email; ?></li>
                                        	<li class="list-group-item"><?php echo $phoneNo; ?></li>
                                        	
                                        </ul>
                                </div>
                                <div class="card-body">
                                	<a href="#" class="card-link">Edit</a>
                                	<a href="#" class="card-link" onclick="return ComfirmDelete()">Delete</a>
                                </div>			
                            </div> 
                            <?php
                            	}
                        	}
                            ?>  
                                                
                            </div>
                            
                        </div>
                        </div>
                    </div>
		</div>
	</div>
</body>
<script>
	function ComfirmDelete(){
		return confirm("Are you sure you want to delete?");
	}
</script>
</html>