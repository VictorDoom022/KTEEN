<?php
include '../config/config.php';
if(isset($_POST['order_list'])){
	$order_list = json_decode($_POST['order_list'], true);
	$temp = array();
	foreach ($order_list as $key => $order_detail) {
		$food_id = $order_detail['food_id'];
		$sql = "SELECT name, price FROM food WHERE ID = '$food_id';";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 1) {
			while ($row = mysqli_fetch_assoc($result)) {
				$price = $row['price'];
				array_push($temp, 
					array(
						'food_id' => $order_detail['food_id'], 
						'food_name' => $row['name'], 
						'price' => $price, 
						'quantity' => $order_detail['quantity'], 
						'remark' => $order_detail['remark']
					)
				);
			}
		}
	}
	echo json_encode($temp);
}
?>