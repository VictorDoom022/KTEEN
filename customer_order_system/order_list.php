<?php
include '../config/config.php';
if (isset($_POST['order_list'])) {
	$order_list = json_decode($_POST['order_list'], true);
	$totalprice = 0;
}
foreach ($order_list as $key => $order_detail) {
	$food_id = $order_detail['food_id'];
	$sql = "SELECT name, price FROM food WHERE ID = '$food_id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
		while ($row = mysqli_fetch_assoc($result)) {
			$price = $row['price'] * $order_detail['quantity'];
			$totalprice += $price;
?>
<div class="row py-1">
	<div class="col-4">
		<?= $row['name']; ?>
	</div>
	<div class="col-4">
		<div class="form-group row m-0">
			<button class="btn btn-sm btn-dark rounded-0 col-3">
				<i class="fas fa-minus"></i>
			</button>
			<div class="col-6">
				<input type="" name="" class="form-control form-control-sm rounded-0 text-center" value="<?= $order_detail['quantity']; ?>" readonly>
			</div>
			<button class="btn btn-sm btn-dark rounded-0 col-3">
				<i class="fas fa-plus"></i>
			</button>
		</div>
	</div>
	<div class="col-4">
		RM <?= $price ?>
	</div>
</div>
<?php
		}
	}
}
?>
<div class="row">
	<div class="col-8"></div>
	<div class="col-4 h6 border-top">
		total: RM <?= $totalprice ?>
	</div>
</div>