<?php
include '../config/config.php';
if (isset($_POST['order_list'])) {
	$order_list = json_decode($_POST['order_list'], true);
}
foreach ($order_list as $key => $order_detail) {
	$food_id = $order_detail['food_id'];
	$sql = "SELECT name FROM food WHERE ID = '$food_id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
		while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="row pb-2">
	<div class="col-5">
		<?= $row['name']; ?>
	</div>
	<div class="col-3">
		<button class="btn btn-sm btn-dark">-</button>
		<?= $order_detail['quantity']; ?>
		<button class="btn btn-sm btn-dark">+</button>
	</div>
	<div class="col-4">
		<input type="text" name="" class="form-control form-control-sm">
	</div>
</div>
<?php
		}
	}
}
?>
