<?php
include '../config/config.php';

$search = "";// search stall name by keyword
if (isset($_POST['search_stall_name'])) {
	$search = " stall_name LIKE '%". $_POST['search_stall_name'] ."%';";
}
?>
<div class="row">
	<?php 
	$sql = "SELECT username, stall_name, status FROM stall WHERE '0' = '0'". $search;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$stall_username = $row['username'];
			$stallname = $row['stall_name'];
	?>
	<div class="col-sm-6 col-md-4 col-lg-3 p-2">
		<div class="k-card card k-hover-shadow h-100 stall" style="cursor: pointer;" data-stall="<?= $stall_username; ?>">
			<div style="position: relative;"> 
				<img src="../images/<?= $stall_username; ?>/stall.jpg" class="items" height="100" alt="" style="width: 100%;height: 200px;align-self: center;vertical-align: center;" />
				<?php
				if ($row['status'] == 1) {
				?>
				<span class="text-white bg-success px-3 py-1" style="position: absolute;right: 0;bottom: 0;">Opening</span>
				<?php
				}else{
				?>
				<span class="text-white bg-danger px-3 py-1" style="position: absolute;right: 0;bottom: 0;">Closing</span>
				<?php
				}
				?>
			</div>
			<div class="card-body">
				<div class="card-text">
					<span class="name h5"><?= $stallname ?></span>
				</div>
			</div>
		</div>
	</div>
	<?php
		}
	}else{
	?>
	<div class="col text-center h5">
		Not has the result for '<?= $_POST['search_stall_name']; ?>'
	</div>
	<?php
	}
	?>
</div>