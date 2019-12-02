<?php
session_start();
include '../config/config.php';
include '../config/test_input.php';

$customer_username = $_SESSION['customer_username'];

if(isset($_POST['order_list']) && isset($_POST['stall_username'])){
	$stall_username = test_input($_POST['stall_username']);
	$sql = "SELECT ID FROM stall WHERE username = '$stall_username'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		$stall_ID = mysqli_fetch_assoc($result)['ID'];
	}
	$sql = "SELECT order_number FROM number WHERE status = 'free' LIMIT 1;";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
		$order_number = mysqli_fetch_assoc($result)['order_number'];
	}
	$sql = "UPDATE number SET status = 'busy' WHERE order_number = '$order_number';";
	mysqli_query($conn, $sql);

	$sql = "INSERT INTO orders(customer_username, stall_ID, number, completed) VALUES ('$customer_username', '$stall_ID', '$order_number', '0');";
	mysqli_query($conn, $sql);
	$order_id = mysqli_insert_id($conn);
	$order_list = json_decode($_POST['order_list'], true);
	$total = 0;
	foreach ($order_list as $key => $order_detail) {
		$food_id = $order_detail['food_id'];
		$quantity = $order_detail['quantity'];
		$sql = "INSERT INTO order_detail(order_ID, food_ID, quantity) VALUES ('$order_id', '$food_id', '$quantity');";
		mysqli_query($conn, $sql);
		$total += $order_detail['price'] * $quantity;
	}

	$payment_method = "";
	if(isset($_POST['e_wallet'])){
		$sql = "SELECT amount FROM wallet WHERE username = '$customer_username';";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1){
			$amount = mysqli_fetch_assoc($result)['amount'];
		}
		$amount -= $total;
		$sql = "UPDATE wallet SET amount = $amount WHERE username = '$customer_username';";
		mysqli_query($conn, $sql);

		$payment_method = "e-wallet";
	}
	
	$sql = "INSERT INTO payment(method, total, order_ID) VALUES ('$payment_method', '$total', '$order_id');";
	mysqli_query($conn, $sql);
	echo $order_number;
}
?>