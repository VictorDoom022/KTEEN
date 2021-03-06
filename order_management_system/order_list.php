<?php
session_start();
include '../config/config.php';

date_default_timezone_set("Asia/Kuala_Lumpur");
$current_time = date_create(date('Y-m-d H:i:s'));
$stall_ID = $_SESSION['stall_ID'];
$sql = "SELECT orders.ID, orders.date, number, customer_username FROM orders LEFT JOIN payment ON orders.ID = payment.order_ID WHERE stall_ID = '$stall_ID' AND completed = '0' AND method <> '';";
$result = mysqli_query($conn, $sql);
$num_row = mysqli_num_rows($result);
if($num_row > 0){
	while($row = mysqli_fetch_assoc($result)){
		$order_ID = $row['ID'];
		?>
		<div class="k-card card my-2">
			<div class="card-body">
				<div class="container">
					<div class="row border bg-light">
						<div class="col-10 h5">Order number: <?= $row['number']; ?></div>
						<div class="col-2">
							<a href="view_order.php?complete_id=<?= $order_ID ?>" class="btn btn-sm btn-dark btn-block">Complete</a>
						</div>
					</div>
					<table class="table table-sm table-borderless">
						<tr>
							<th>Food</th>
							<th>Quantity</th>
						</tr>
						<?php
						$detail_sql = "SELECT quantity, food.name AS food_name FROM order_detail LEFT JOIN food ON order_detail.food_ID = food.ID WHERE order_ID = '$order_ID';";
						$detail_result = mysqli_query($conn, $detail_sql);
						if(mysqli_num_rows($detail_result) > 0){
							while($detail_row = mysqli_fetch_assoc($detail_result)){
						?>
						<tr>
							<td width="50%;"><?= $detail_row['food_name']; ?></td>
							<td>x <?= $detail_row['quantity']; ?></td>
						</tr>
						<!-- <?= json_encode($detail_row); ?> -->
						<?php
							}
						}
						$diff = date_diff($current_time, date_create(date($row['date'])));
						?>
					<!-- <?= json_encode($diff); ?> -->
					</table>
					<!-- <div class="text-right">current time = <?= date('Y-m-d H:i:s'); ?> order time = <?= $row['date']; ?></div> -->
					<div class="text-right"><?= $r = ($diff->i == 0)? $diff->s . 's': $diff->i . 'm '. $diff->s . 's'; ?> ago</div>
				</div>
			</div>
		</div>
		<?php
	}
}
mysqli_close($conn);
?>