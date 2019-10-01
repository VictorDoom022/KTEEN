<div class="row">
	<?php 
	$sql = "SELECT username, stall_name FROM stall WHERE status = '1'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$stall_username = $row['username'];
			$stallname = $row['stall_name'];
	?>
	<div class="col-sm-6 col-md-4 col-lg-3 p-2">
		<div class="k-card card k-hover-shadow h-100">
			<div id="<?php echo $ID ?>">
				<div> 
					<img src="../images/<?= $stall_username; ?>/stall.jpg" class="items" height="100" alt="" style="width: 100%;height: 200px;align-self: center;vertical-align: center;" />
				</div>
				<div class="card-body">
					<br clear="all" />
					<div class="card-text">
						<span class="name h5"><?= $stallname ?></span>
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