<?php
include '../config/test_input.php';
if (isset($_GET['complete_id'])) {
	$order_id = test_input($_GET['complete_id']);
	$sql = "UPDATE orders SET completed = '1' WHERE ID = $order_id;";
	mysqli_query($conn, $sql);
	header("location: view_order.php");
}
?>