<div class="row">
	<?php 
	$sql = "SELECT stall_name FROM stall WHERE status = '1'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$stallname = $row['stall_name'];
	?>
	<div class="col-sm-6 col-md-4 col-lg-3 p-2">
	    <a href="menu.php" class="btn btn-block bg-white k-hover-shadow rounded-0" style="box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.1);">
	        <!-- <div>
	            <img src="../images/<?php echo $image; ?>" style="width: 100%;height: 200px;align-self: center;vertical-align: center;">
	        </div> -->
            <h5><?php echo $stallname; ?></h5>
	    </a>
	</div>
	<?php
		}
	}
	?>
</div>