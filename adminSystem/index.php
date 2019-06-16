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

if(isset($_SESSION['username'])){
			$username = $_SESSION['username'];
}else{
	echo "<script>window.location.assign('Login.html');</script>";
}
//delete item
if(isset($_GET['del'])){
	if($_GET['del'] != ''){
		$id = $_GET['del'];
		$sql = "DELETE FROM stall where id = '$id'"; 
		$result = $conn->query($sql);
	}
}
//edit
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$stallName = $_POST['stallName'];
	$ownerName = $_POST['ownerName'];
	$email = $_POST['email'];
	$phoneNo = $_POST['phoneNo'];
	$password = $_POST['password'];

	$sql = "UPDATE stall SET stallName = '$stallName', ownerName = '$ownerName' , email = '$email',phoneNo = '$phoneNo', password = '$password'where id = '$id'";
	$result = $conn->query($sql);
}

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
		<ul class="navbar-nav ml-auto">
			<li class="nav-item text-nowrap">
				<button type="button" class="btn btn-outline-light mb-3 mb-md-0 ml-md-3" style="float: right;" onclick="location.href='index.php?u=logout';">Sign Out</button>
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
            <div class="col-md-10">
			<div class="card">
                <div class="row">
                	<?php
                		$sql = "SELECT ID, stall_name, owner_name, email, contact_no FROM stall";
                		$result = $conn -> query($sql);

                		if($result -> num_rows >0){
                			while ($row = $result -> fetch_assoc()){
                				$id = $row['ID'];
                				$stallName = $row['stall_name'];
                				$ownerName = $row['owner_name'];
                				$email = $row['email'];
                				$phoneNo = $row['contact_no'];
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
                        	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-<?php echo $id; ?>">
									Edit
							</button>
               
                        	<a href="adminmain.php?del=<?php echo $id; ?>" class="card-link" onclick="return ComfirmDelete()">Delete</a>

                        	<div class="modal fade" id="edit-<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									<div class="modal-content">
											<div class="modal-header">
	 											<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
											<form method="post" action="adminmain.php">
						    					<input type="hidden" value="<?php echo $id; ?>" name="id">
						            			<div class="form-group">
						    						<label for="stallName">Stall Name</label>
						    						<input type="text" class="form-control" value="<?php echo $stallName; ?>" name="stallName" id="stallName">
						  						</div>
						  						<div class="form-group">
						    						<label for="exampleInputEmail1">Owner Name</label>
						    						<input type="text" class="form-control" value="<?php echo $ownerName; ?>" name="ownerName" id="ownerName">
						  						</div>
						  						<div class="form-group">
						    						<label for="exampleInputEmail1">Email address</label>
						    						<input type="email" class="form-control" value="<?php echo $email; ?>" name="email" id="email">
						  						</div>
						  						<div class="form-group">
						    						<label for="exampleInputPassword1">Phone No</label>
						    						<input type="number" class="form-control" value="<?php echo $phoneNo; ?>" name="phoneNo" id="phoneNo">
						  						</div>
						  						<div class="form-group">
						    						<label for="exampleInputPassword1">Password</label>
						    						<input type="password" class="form-control" value="<?php echo $password; ?>" name="password" id="password">
						  						</div>
						  				</div>
						  				<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											
											<input type="submit" class="btn btn-primary bg-warning" value="edit" name="edit">
											</div>
											</form>
									</div>
									</div>
							</div>
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

	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
</html>