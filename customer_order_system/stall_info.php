<?php
include '../config/config.php';

if(isset($_POST['stall_username']) && !empty($_POST['stall_username'])){
	$sql = "SELECT username, stall_name, status FROM stall WHERE username = '".  $_POST['stall_username'] ."';";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 1) {
		while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="col-md-4 mb-3 text-center">
	<img style="width: 350px;height: 200px;" src="../images/<?= $row['username']; ?>/stall.jpg">
</div>
<div class="col-md-8 bg-white shadow p-4 mb-3">
	<div class="h5"><?= $row['stall_name']; ?></div>
	<div class="h6">Status: <?= $r = ($row['status'] == 1)? '<span class="text-success">Opening</span>' :'<span class="text-danger">Closing</span>'; ?></div>
</div>
<?php
		}
	}
}else{
?>
<script type="text/javascript">
	window.location.assign("index.html");
</script>
<?php
}

?>