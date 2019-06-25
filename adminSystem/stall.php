<?php
session_start();
include ('../config.php');

$keyword = "";

if(isset($_GET['k'])){
	$keyword = " WHERE stall_name LIKE '%".$_GET['k']."%'";
}?>

<div class="row">
	<?php 
	$sql = "SELECT ID, stall_name, owner_name, image, email, contact_no FROM stall".$keyword;
	$result = $conn -> query($sql);

	if($result ->num_rows >0){
		while ($row = $result -> fetch_assoc()){
			$id = $row['ID'];
			$stallName = $row['stall_name'];
			$ownerName = $row['owner_name'];
			$email = $row['email'];
			$phoneNo = $row['contact_no'];
			$image = $row['image'];
	?>
	<div class="col-12 col-md-4 col-lg-3 p-2">
		<div class="k-card card k-hover-shadow h-100">
			<img src="../images/stall/<?php echo $image; ?>" style="width: 100%;height: 200px;align-self: center;vertical-align: center;">
	        <div class="card-body">
	            <h5 class="card-title" name="item[]"><?php echo $stallName; ?></h5>	
	            <ul class="list-group list-group-flush">
	            	<li class="list-group-item"><?php echo $ownerName; ?></li>
	            	<li class="list-group-item"><?php echo $email; ?></li>
	            	<li class="list-group-item"><?php echo $phoneNo; ?></li>
	            </ul>
	        </div>
	        <div class="card-footer bg-white">
	        	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-<?php echo $id; ?>">
						Edit
				</button>

	        	<a href="index.php?del=<?php echo $id; ?>" class="card-link" onclick="return ComfirmDelete()">Delete</a>

	        	<div class="modal fade" id="edit-<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Edit stall</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<form method="post" action="index.php">
								<div class="modal-body">
			    					<input type="hidden" value="<?php echo $id; ?>" name="id">
			            			<div class="form-group">
			    						<label for="stallName">Stall Name</label>
			    						<input type="text" class="form-control" value="<?php echo $stallName; ?>" name="stall_name" id="stallName">
			  						</div>
			  						<div class="form-group">
			    						<label for="exampleInputEmail1">Owner Name</label>
			    						<input type="text" class="form-control" value="<?php echo $ownerName; ?>" name="owner_name" id="ownerName">
			  						</div>
			  						<div class="form-group">
			    						<label for="exampleInputEmail1">Email address</label>
			    						<input type="email" class="form-control" value="<?php echo $email; ?>" name="email" id="email">
			  						</div>
			  						<div class="form-group">
			    						<label for="exampleInputPassword1">Phone No</label>
			    						<input type="number" class="form-control" value="<?php echo $phoneNo; ?>" name="contact_no" id="phoneNo">
			  						</div>
			  						<div class="form-group">
			    						<label for="exampleInputPassword1">Password</label>
			    						<input type="password" class="form-control" value="<?php echo $password; ?>" name="password" id="password">
			  						</div>
			  				</div>
			  				<div class="modal-footer">
								<button class="btn btn-secondary bg-dark" data-dismiss="modal">Close</button>
								
								<input type="submit" class="btn btn-primary bg-warning bg-dark" value="Submit" name="edit">
								</div>
								</form>
						</div>
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