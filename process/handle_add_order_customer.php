<?php
session_start();
include '../config/config.php';
include '../config/test_input.php';

$customer_username = $_SESSION['customer_username'];

if(isset($_POST['order_list']) && isset($_POST['stall_username'])){
	$stall_username = test_input($_POST['stall_username']);
	$sql = "SELECT ID FROM stall WHERE username = '$stall_username'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
		while ($row = mysqli_fetch_assoc($result)) {
			$stall_ID = $row['ID'];
		}
	}

	$order_list = json_decode($_POST['order_list'], true);
	$sql = "INSERT INTO orders(customer_ID, stall_ID, number, completed) VALUES ('$customer_username', '$stall_ID', '0', '0');";
	mysqli_query($conn, $sql);
	$order_id = mysqli_insert_id($conn);

	foreach ($order_list as $key => $order_detail) {
		$food_id = $order_detail['food_id'];
		$quantity = $order_detail['quantity'];
		$sql = "INSERT INTO order_detail(order_ID, food_ID, quantity) VALUES ('$order_id', '$food_id', '$quantity');";
		mysqli_query($conn, $sql);
	}

	echo json_encode(array("status" => "0", "msg" => "success"));
}
?>