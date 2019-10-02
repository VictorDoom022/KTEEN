<?php
include '../config/config.php';

if(isset($_POST['stall_name']) && !empty($_POST['stall_name'])){
	$stall_name = $_POST['stall_name'];
	$sql = "SELECT * FROM stall WHERE username = '$stall_name';";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			$username = $row['username'];
			$stall_name = $row['stall_name'];
?>
<div class="col-md-4 mb-3 text-center">
	<img style="width: 350px;height: 200px;" src="../images/<?= $username ?>/stall.jpg">
</div>
<div class="col-md-8 bg-white shadow p-4 mb-3">
	<div class="h5"><?= $stall_name; ?></div>
</div>
<?php
		}
	}else{
		
	}
}else{
	header("location : index.html");
}

?>