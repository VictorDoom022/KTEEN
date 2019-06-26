<?php
session_start();
include ('../config.php');

$keyword = "";

if(isset($_GET['k'])){
	$keyword = " WHERE stall_name LIKE '%".$_GET['k']."%'";
}?>

<div class="row">
	<?php 
	$sql = "SELECT ID, stall_name, owner_name, stall_image, owner_image, email, NRIC, contact_no, status FROM stall".$keyword;
	$result = $conn -> query($sql);

	if($result ->num_rows >0){
		while ($row = $result -> fetch_assoc()){
			$stall_id = $row['ID'];
			$stall_name = $row['stall_name'];
			$owner_name = $row['owner_name'];
			$email = $row['email'];
			$contact_no = $row['contact_no'];
			$NRIC = $row['NRIC'];
            $stall_image = $row['stall_image'];
			$owner_image = $row['owner_image'];
			$status = $row['status'];
	?>
	<div class="col-12 col-md-4 p-2">
		<a href="#view<?php echo $stall_id; ?>" data-toggle="modal" style="text-decoration: none;color: black;">
			<div class="k-card card k-hover-shadow h-100">
				<div class="row no-gutters">
					<div class="col-4">
						<img class="rounded-circle p-2" src="../images/stall/owner/<?php echo $owner_image; ?>" style="width: 100%;height: 100%;align-self: center;vertical-align: center;">
					</div>
					<div class="col-8">
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
                	<div class="row p-0 m-0 w-100" style="height: 200px;overflow: hidden;">
                		<img style="width: 100%;height: 500px;align-self: center;vertical-align: center;opacity: 0.7;" src="../images/stall/<?php echo $stall_image; ?>" >
                	</div>
                	<span style="position: absolute;transform: translate(-50%, -50%);top: 50%;left: 50%;z-index: 2;">
            			<h3><?php echo $stall_name; ?></h3>
            		</span>
                    <button type="button" class="btn btn-dark rounded-circle" data-dismiss="modal" aria-label="Close" style="position: absolute;top: -20px;right: 20px;z-index: 3;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="position: relative;">
                	<div class="row m-0 p-0" style="position: absolute;top: -60px;">
                		<img class="rounded-circle" src="../images/stall/owner/<?php echo $owner_image ?>" style="left: 10px;height: 100px;width: 100px;">
                		<div>
                			<h3 class="pt-4 pl-2 m-0">
                			<?php echo $owner_name; ?>
                		</h3>
                		</div>
                		<br>
                	</div>
                	<div class="pt-5 px-5">
            			<div class="row pb-2">
            				<div class="col row">
            					<small class="text-muted col">Email</small>
            					<div class="w-100"></div>
            					<div class="col">
            						<?php echo $email; ?>
            					</div>
            				</div>
            				<div class="col">
            					<small class="text-muted col">Contact No</small>
            					<div class="w-100"></div>
            					<div class="col">
            						<?php echo $contact_no; ?>
            					</div>
            				</div>
            			</div>
            			<div class="row pb-2">
            				<div class="col row">
            					<small class="text-muted col">NRIC</small>
            					<div class="w-100"></div>
            					<div class="col">
            						<?php echo $NRIC; ?>
            					</div>
            				</div>
            				<div class="col">
            					<small class="text-muted col">Status</small>
            					<div class="w-100"></div>
            					<div class="col">
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
                <div class="modal-footer">
					<button class="btn text-dark" data-dismiss="modal">CLOSE</button>
					<a href="editStall.php?sid=<?php echo $stall_id; ?>" class="btn text-warning">EDIT</a>
					<button onclick="ComfirmDelete(<?php echo $stall_id; ?>)" class="btn text-danger">DELETE</button>
				</div>
            </div>
        </div>
    </div>
	<?php
		}
	}
	?>		
</div>