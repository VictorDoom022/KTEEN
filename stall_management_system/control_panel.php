<?php
session_start();
include '../config/config.php';
$stall_ID = $_SESSION['kteen_stall_id'];
date_default_timezone_set("Asia/Kuala_Lumpur");
?>
<div class="k-card bg-white h-100">
	<div class="card-body">
		<div class="h3">Control Panel</div>
		<hr>
		<?php
		$weekday = "";
		switch (date("w", time())) {
			case '0':
				$weekday = "Monday";
				break;
			case '1':
				$weekday = "Tuesday";
				break;
			case '2':
				$weekday = "Tuesday";
				break;
			case '3':
				$weekday = "Tuesday";
				break;
			case '4':
				$weekday = "Tuesday";
				break;
			case '5':
				$weekday = "Tuesday";
				break;
			case '6':
				$weekday = "Saturday";
				break;
		}
		?>
		<div class="font-weight-bold text-center bg-light mb-2 py-1">
			<div class="h5 mb-0"><?= date("h:i:sa", time()); ?></div>
			<?= $weekday; ?>, <?= date('M d,Y', time()); ?>
		</div>
		<?php
		$sql = "SELECT start_time, end_time FROM opening_time WHERE stall_ID = '$stall_ID' AND weekday = WEEKDAY(CURDATE());";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1){
			while($row = mysqli_fetch_assoc($result)){
				$start_time = date('h:m a', strtotime($row['start_time']));
				$end_time = date('h:m a', strtotime($row['end_time']));
			}
		?>
		<div class="mb-2 text-center">Open Time: <?= $start_time ?> - <?= $end_time ?></div>
		<?php
		}
		?>
		<div style="position: relative;">
			<div class="font-weight-bold">
				Current status
			</div>
			<?php
			$sql = "SELECT status FROM stall WHERE ID = '$stall_ID';";
			$result = mysqli_query($conn, $sql);
			$status = mysqli_fetch_assoc($result)['status'];
			$current_time = date('h:i:a', time());
			if (($current_time > $start_time && $current_time < $end_time) && $status == 1) {
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
				<a href="index.php?open=1" title="Click to open" class="btn btn-sm text-success">Auto</a>
			<?php } ?>
		</div>
	</div>
</div>