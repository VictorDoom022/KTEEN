<div class="row">
	<?php 
	$sql = "SELECT * FROM staff WHERE stall_ID = '".$_SESSION['kteen_stall_id']."' AND available = '1'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result)) {
		while ($row = mysqli_fetch_assoc($result)) {
	?>
	<div class=" col-12 col-md-6 col-lg-4 p-1">
		<a href="#modal<?php echo $row['ID']; ?>" class="text-decoration-none text-reset" data-toggle="modal">
			<div class="k-card card k-hover-shadow">
				<div class="row no-gutters">
					<div class="col-4">
						<img class="rounded-circle p-2" src="../images/staff/<?php echo $row['image']; ?>" style="height: 120px;width: 120px;">
					</div>
					<div class="col-8">
						<div class="card-body">
							<div class="card-title mb-0">
								<?php echo $row['name']; ?>
							</div>
							<div class="card-text">
								<small class="text-muted mt-0">
									<?php echo $row['position']; ?>
								</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<?php include 'employee_modal.php'; ?>
	<?php
		}
	}
	?>
</div>
