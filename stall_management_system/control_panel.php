<?php
session_start();
include '../config/config.php';
$stall_ID = $_SESSION['kteen_stall_id'];
date_default_timezone_set("Asia/Kuala_Lumpur");
$current_time = time();
?>
<div class="k-card bg-white h-100">
	<div class="card-body">
		<div class="h3">Control Panel</div>
		<hr>
		<div class="font-weight-bold text-center bg-light border mb-2 py-1">
			<div class="h5 mb-0"><?= date("h:i:sa", time()); ?></div>
			<?= date('D, M d,Y', $current_time); ?>
		</div>
		<?php
		$sql = "SELECT status FROM stall WHERE ID = '$stall_ID';";
		$result = mysqli_query($conn, $sql);
		$status = mysqli_fetch_assoc($result)['status'];//the current stall's status
		
		$sql = "SELECT start_time, end_time FROM opening_time WHERE stall_ID = '$stall_ID' AND weekday = WEEKDAY(CURDATE());";
		$result = mysqli_query($conn, $sql);
		$is_work_day = (mysqli_num_rows($result) == 1);
		if($is_work_day){
			while($row = mysqli_fetch_assoc($result)){
				$start_time = strtotime($row['start_time']);
				$str_start_time = date('h:i a', strtotime($row['start_time']));
				$end_time = strtotime($row['end_time']);
				$str_end_time = date('h:i a', strtotime($row['end_time']));
			}
		}

		if($is_work_day){
		?>
		<div class="mb-2 text-center">Open Time: <?= $str_start_time ?> - <?= $str_end_time ?></div>
		<?php }else{?>
		<div class="text-center font-weight-bold text-danger">Off Day</div>
		<?php }

		if($status == 0){
		?>
		<div style="position: relative;">
			<div class="font-weight-bold">
				Current status
			</div>
			<span class="bg-danger" style="position: absolute;right: -10px;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);"></span>
			<span style="position: absolute;right: 0;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);background-color: rgba(255, 0, 0, 0.5);"></span>
			<span class="text-white px-3 py-1" style="position: absolute;right: 2px;bottom: 0;">Closing</span>
		</div>
		<?php }else if($status == 1){ ?>
		<div style="position: relative;">
			<div class="font-weight-bold">
				Current status
			</div>
			<span class="bg-success" style="position: absolute;right: -10px;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);"></span>
			<span style="position: absolute;right: 0;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);background-color: rgba(0, 255, 0, 0.5);"></span>
			<span class="text-white px-3 py-1" style="position: absolute;right: 2px;bottom: 0;">Opening</span>
		</div>
		<?php 
		}else{
			if($is_work_day){
		?>
		<div style="position: relative;">
			<div class="font-weight-bold">
				Current status
			</div>
			<?php if ($current_time > $start_time && $current_time < $end_time) { ?>
				<span class="bg-success" style="position: absolute;right: -10px;bottom: 0;width: 170px;height: 30px;transform: skew(45deg);"></span>
				<span style="position: absolute;right: 0;bottom: 0;width: 170px;height: 30px;transform: skew(45deg);background-color: rgba(0, 255, 0, 0.5);"></span>
				<span class="text-white px-3 py-1" style="position: absolute;right: 2px;bottom: 0;">Opening(Auto)</span>
			<?php }else{ ?>
				<span class="bg-danger" style="position: absolute;right: -10px;bottom: 0;width: 170px;height: 30px;transform: skew(45deg);"></span>
				<span style="position: absolute;right: 0;bottom: 0;width: 170px;height: 30px;transform: skew(45deg);background-color: rgba(255, 0, 0, 0.5);"></span>
				<span class="text-white px-3 py-1" style="position: absolute;right: 2px;bottom: 0;">Closing (Auto)</span>
			<?php } ?>
		</div>
		<?php 
			}
		}
		?>
		<div class="text-right mt-2">
			<?php if ($status == 0) { ?>
				<a href="index.php?open=1" title="Click to open" class="btn btn-sm text-success">Open</a>
				<a href="index.php?auto=1" title="Click to auto" class="btn btn-sm text-primary">Auto</a>
			<?php }else if($status == 1){ ?>
				<a href="index.php?close=1" title="Click to close" class="btn btn-sm text-danger">Close</a>
				<a href="index.php?auto=1" title="Click to auto" class="btn btn-sm text-primary">Auto</a>
			<?php }else{ ?>
				<a href="index.php?open=1" title="Click to open" class="btn btn-sm text-success">Open</a>
				<a href="index.php?close=1" title="Click to close" class="btn btn-sm text-danger">Close</a>
			<?php } ?>
		</div>
	</div>
</div>