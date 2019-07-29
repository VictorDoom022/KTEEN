<?php
include ("../config.php");


session_start();
	//logout
	if(isset($_GET['u'])){
			if ($_GET['u'] == 'logout') {
				session_destroy();

				echo "<script>window.location.assign('stafflogin.html');</script>";
				}
		}

	// if($_SESSION['staffid']!= ''){
	// 			$username = $_SESSION['staffid'];
	// 		}else{
	// 			echo "<script>window.location.assign('stafflogin.html');</script>";
	// 		}

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
		<div onclick="location.href='staffmain.php';" style="cursor: pointer;">
			<p class="navbar-brand bg-dark">KTeen Management System</p>
		</div>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item text-nowrap">
				<button type="button" class="btn btn-outline-light mb-3 mb-md-0 ml-md-3" style="float: right;" onclick="location.href='staffmain.php?u=logout';">Sign Out</button>
			</li>
		</ul>
	</nav>
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item"><p>Welcome,<strong><?php echo $username;?></strong> </p></li>
                        <li class="list-group-item bg-light" onclick="location.href='staffmain.php';" style="cursor: pointer;"><p>Punch Card</p></li>
                        <li class="list-group-item active bg-dark" onclick="location.href='makeorder.php';" style="cursor: pointer;"><p>Manage Orders</p></li>
                    </ul>                
            </div>
            <div class="container">
            	<button type="button" class="btn btn-primary bg-dark">
 					Added &nbsp;<span class="badge badge-light">0</span>
				</button><br><br>
            	<form action="makeorder.php" method="post">
            		<div class="row">
            			
            			<?php
            				$sql = "SELECT ID, name, image, price from food where available = 1";

            				$result = $conn-> query($sql);

            				if($result -> num_rows >0){
            					while ($row = $result -> fetch_assoc()){
            						$ID=$row['ID'];
            						$name=$row['name'];
            						$image=$row['image'];
            						$price=$row['price'];

            			?>
	            			<div class="col-md-6">
	            				<div class="card">
	            					<img src="images/<?php echo $image; ?>" class="img-fluid">
		            				<div class="card-body">
		            					<h5 class="card-title"><?php echo $name; ?></h5>
		            					<p class="card-text">RM <?php echo $price; ?></p>
		            					<input class="btn btn-primary bg-dark" type="submit" value="add" name="add">
		            				</div>
		            			</div>
	            			</div>
	            		<?php
	            		   		}
            				}
            			?>
            		</div>
            		
            	</form>
			</div>

		</div>
	</div>
</body>
</html>