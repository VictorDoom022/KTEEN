<?php
include '../config/config.php';
include '../config/test_input.php';

$search = "";// search stall name by keyword
if (isset($_POST['search_stall_name'])) {
	$search_stall_name = test_input($_POST['search_stall_name']);
	$search = "WHERE stall_name LIKE '%$search_stall_name%' ";
}
?>
<div class="row">
	<?php
	$page = @ $_POST['page'];
	if($page == 0 || $page == 1){
		$page = 0;
	}else{
		$page = ($page * 8) - 8;
	}
	$sql = "SELECT username, stall_name, status FROM stall ". $search ."LIMIT ". $page .", 8;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$stall_username = $row['username'];
			$stallname = $row['stall_name'];
	?>
	<div class="col-sm-6 col-md-4 col-lg-3 p-2">
		<div class="k-card card k-hover-shadow h-100 stall" style="cursor: pointer;" data-stall="<?= $stall_username; ?>">
			<div style="position: relative;overflow: hidden;"> 
				<img src="../images/<?= $stall_username; ?>/stall.jpg" class="items" height="100" alt="" style="width: 100%;height: 200px;align-self: center;vertical-align: center;" />
				<?php
				if ($row['status'] == 1) {
				?>
				<span class="bg-success" style="position: absolute;right: 0;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);"></span>
				<span style="position: absolute;right: 15px;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);background-color: rgba(0, 255, 0, 0.5);"></span>
				<span class="text-white px-3 py-1" style="position: absolute;right: 12px;bottom: 0;">Opening</span>
				<?php
				}else{
				?>
				<span class="bg-danger" style="position: absolute;right: 0;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);"></span>
				<span style="position: absolute;right: 15px;bottom: 0;width: 100px;height: 30px;transform: skew(45deg);background-color: rgba(255, 0, 0, 0.5);"></span>
				<span class="text-white px-3 py-1" style="position: absolute;right: 12px;bottom: 0;">Closing</span>
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
		No result for '<?= $search_stall_name; ?>'
	</div>
	<?php
	}
	$count = mysqli_num_rows($result);
	mysqli_close($conn);
	$a = ceil($count / 8);
	?>
	<div class="col-12 mt-2">
		<ul class="pagination pagination-md">
			<?php for ($i=1; $i <= $a; $i++) { ?>
			<li class="page-item">
				<span class="page-link rounded-0 border-0 <?= $r = ($page == ($i * 8) - 8)? 'bg-dark text-white': 'text-dark' ?>" style="cursor: pointer;" data-page="<?= $i ?>"><?= $i ?></span>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>