<?php
session_start();
include '../config/config.php';
?>
<div class="card-title">Payment not done (cash)</div>
<table class="table table-sm">
	<thead>
		<tr>
			<th>Number</th>
			<th>Date & time</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	$stall_ID = $_SESSION['stall_ID'];
	$sql = "SELECT orders.ID, number, payment.date FROM orders LEFT JOIN payment ON orders.ID = payment.order_ID WHERE stall_ID = '$stall_ID' AND method = '';";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$order_ID = $row['ID'];
	?>	
		<tr>
			<td>
				<?= $row['number'] ?>
			</td>
			<td>
				<?= $row['date']; ?>	
			</td>
			<td>
				<a href="#modal_<?= $order_ID; ?>" data-toggle="modal" class="btn btn-sm btn-success">Pay</a>
				<div class="modal fade" id="modal_<?= $order_ID; ?>" tabindex="-1" role="modal">
				    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
				        <div class="modal-content">
				            <div class="modal-body">
				            	<div class="h4">Payment Detail</div>
				            	<table class="table table-sm">
				            		<tr>
				            			<th>#</th>
				            			<th>name</th>
				            			<th>quantity</th>
				            			<th>price</th>
				            		</tr>
				            	<?php
				            	$sql_orderDetail = "SELECT food.name, food.price, quantity FROM order_detail LEFT JOIN food ON order_detail.food_ID = food.ID WHERE order_ID = '$order_ID';";
				            	$result_orderDetail = mysqli_query($conn, $sql_orderDetail);
				            	if(mysqli_num_rows($result_orderDetail) > 0){
				            		$i = 0;
				            		$total = 0;
				            		while ($row_orderDetail = mysqli_fetch_assoc($result_orderDetail)) {
				            			$i ++;
				            			$food_name = $row_orderDetail['name'];
				            			$price = $row_orderDetail['price'];
				            			$quantity = $row_orderDetail['quantity'];
				            			$subtotal = $price * $quantity;
				            			$total += $subtotal;
			            		?>
				            		<tr>
				            			<td><?= $i ?></td>
				            			<td><?= $food_name ?></td>
				            			<td>x<?= $quantity ?></td>
				            			<td>RM <?= $subtotal ?></td>
				            		</tr>
			            		<?php
				            		}
				            	}
				            	?>
				            		<tr>
				            			<td></td>
				            			<td></td>
				            			<td>Total:</td>
				            			<td>RM <?= $total; ?></td>
				            		</tr>
				            	</table>
				            </div>
				            <div class="modal-footer text-right">
				            	<a href="index.php?pay_id=<?= $order_ID ?>" class="btn btn-success">Submit</a>
				            </div>
				        </div>
				    </div>
				</div>
			</td>
		</tr>
	<?php
		}
	}
	?>
	</tbody>
</table>