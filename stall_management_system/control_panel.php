<div class="col-md-4 mb-3">
	<div class="k-card bg-white h-100">
		<div class="card-body">
			<div class="h3">Control Panel</div>
			<hr>
			<div class="font-weight-bold" style="position: relative;">
				<div class="font-weight-bold">
					Current status
				</div>
				<?php
				$sql = "SELECT status FROM stall WHERE ID = '$stall_ID';";
				$result = mysqli_query($conn, $sql);
				$status = mysqli_fetch_assoc($result)['status'];
				if ($status == 1) {
				?>
					<span class="bg-success" style="position: absolute;right: -10px;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);"></span>
					<span style="position: absolute;right: 0;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);background-color: rgba(0, 255, 0, 0.5);"></span>
					<span class="text-white px-3 py-1" style="position: absolute;right: 2px;bottom: 0;">Opening</span>
				<?php }else{ ?>
					<span class="bg-danger" style="position: absolute;right: -10px;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);"></span>
					<span style="position: absolute;right: 0;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);background-color: rgba(255, 0, 0, 0.5);"></span>
					<span class="text-white px-3 py-1" style="position: absolute;right: 2px;bottom: 0;">Closing</span>
				<?php } ?>
			</div>
			<div class="text-right mt-2">
				<?php if ($status == 1) { ?>
					<a href="index.php?close=1" title="Click to Close" class="btn btn-sm text-danger">Close</a>
				<?php }else{ ?>
					<a href="index.php?open=1" title="Click to open" class="btn btn-sm text-success">Open</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>