<?php
session_start();
include ('../config.php');

$keyword = "";

if(isset($_GET['k'])){
	$keyword = " WHERE stall_name LIKE '%".$_GET['k']."%'";
}?>

<div class="row">
	<?php 
	$sql = "SELECT ID, stall_name, owner_name, image, email, contact_no, status FROM stall".$keyword;
	$result = $conn -> query($sql);

	if($result ->num_rows >0){
		while ($row = $result -> fetch_assoc()){
			$stall_id = $row['ID'];
			$stall_name = $row['stall_name'];
			$owner_name = $row['owner_name'];
			$email = $row['email'];
			$phoneNo = $row['contact_no'];
			$image = $row['image'];
			$status = $row['status'];
	?>
	<div class="col-12 col-md-4 p-2">
		<a href="#view<?php echo $stall_id; ?>" data-toggle="modal" style="text-decoration: none;color: black;">
			<div class="k-card card k-hover-shadow h-100">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img class="rounded-circle p-2" src="../images/stall/<?php echo $image; ?>" style="width: 100%;height: 100%;align-self: center;vertical-align: center;">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title">
								<?php echo $stall_name ?>
							</h5>
							<div class="card-text">
								<?php echo $owner_name; ?>
							</div>
							<div class="card-text">
								<?php if ($status == "1") { ?>
									<small class="text-success">opening</small>
								<?php }else{ ?>
									<small class="text-danger">closing</small>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>

	<div class="modal fade" id="view<?php echo $stall_id; ?>" tabindex="-1" role="modal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header p-0" style=";position: relative;">
                	<div class="row p-0 m-0" style="height: 200px;overflow: hidden;">
                		<img src="../images/stall/<?php echo $image; ?>" style="width: 100%;height: 500px;align-self: center;vertical-align: center;opacity: 0.7;">
                	</div>
                    <button type="button" class="btn btn-dark rounded-circle" data-dismiss="modal" aria-label="Close" style="position: absolute;top: -20px;right: 20px;z-index: 3;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $stall_id; ?>">
                    <div class="modal-body" style="position: relative;">
                    	<img class="rounded-circle" src="../images/stall/<?php echo $image ?>" style="position: absolute;top: -110px;left: 10px;height: 100px;width: 100px;">
                        <div class="form-row">
							<div class="col form-group">
								<label for="stallName">Stall Name</label>
								<input type="text" class="form-control" placeholder="Enter stall name" name="stallName" id="stallName">
							</div>
						</div>
						<div class="form-row">
							<div class="col form-group">
								<label for="exampleInputEmail1">Owner Name</label>
								<input type="text" class="form-control" placeholder="Enter owner's name" name="ownerName" id="ownerName">
							</div>
						</div>
						<div class="form-row">
							<div class="col form-group">
								<label for="exampleInputEmail1">NRIC NO</label>
								<input type="text" class="form-control" placeholder="Enter NRIC" name="NRIC" id="NRIC">
							</div>
							<div class="col form-group">
								<label>Image</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="customFile" name="fileToUpload" required>
									<label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" placeholder="Enter email" name="email" id="email">
							</div>
							<div class="col form-group">
								<label for="exampleInputPassword1">Phone No</label>
								<input type="number" class="form-control" placeholder="Enter contact number" name="phoneNo" id="phoneNo" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col form-group">
								<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
							</div>
							<div class="col form-group">
								<label for="exampleInputPassword1">Comfirm Password</label>
								<input type="password" class="form-control" placeholder="Password" name="Comfirm password" id="password1" required>
								<div class="invalid-feedback" role="alert" id="validate-status"></div>
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="editmenu" class="btn btn-sm btn-warning" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
	<?php
		}
	}
	?>		
</div>