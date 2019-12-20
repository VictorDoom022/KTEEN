<?php
session_start();
include '../config/config.php';
?>
<div>
<?php
$sql_stall = "SELECT DISTINCT username, stall_name, ID FROM stall";
$result_stall = mysqli_query($conn, $sql_stall);
if(mysqli_num_rows($result_stall) > 0){
	while ($row = mysqli_fetch_assoc($result_stall)) {
		$temp = $row['ID'];
		$username = $row['username'];
?>
<div class="card mb-2">
	<div class="card-header bg-white">
		<h2 class="card-title">
			<?php echo $row['stall_name']; ?>
		</h2>
	</div>
	<div class="card-body">
			<?php
				$sql = "SELECT * FROM food WHERE stall_ID = '$temp'";
				
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0){
			?>
			<div class="col-12 mt-2 p-0">
				<div class="row">
			<?php
				while ($row = mysqli_fetch_assoc($result)) {
			?>
						<div class="col-3 mb-2">
							<div class="k-card card">
								<div>
								    <img src="../images/<?= $username; ?>/menu/<?php echo $row['image']; ?>" style="width: 100%;height: 150px;align-self: center;vertical-align: center;">
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-7">
											<?php echo $row['name']; ?>
										</div>
										<div class="col-5 card-text text-right">
											RM <?php echo $row['price']; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
			<?php
				}
			?>
					</div>
				</div>
			<?php
			}else{
			?>
			<div class="text-center">No Food Available Yet.</div>
			<?php	
			}
			?>
		</div>
	</div>
			<?php
			}
			?>
			<?php
		}
			 ?>
</div>