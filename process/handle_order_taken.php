<?php
if(isset($_GET['taken_id'])){
	$order_id = $_GET['taken_id'];
	//reset order number
	$sql = "SELECT number FROM orders WHERE ID = '$order_id'";
	$result = mysqli_query($conn, $sql);
	$order_num = mysqli_fetch_assoc($result)['number'];
	$sql = "UPDATE number SET status = 'free' WHERE order_number = '$order_num';";
	mysqli_query($conn, $sql);

	$sql = "UPDATE orders SET taken = '1' WHERE ID = '$order_id';";
	mysqli_query($conn, $sql);
	header("location: index.php");
}
?>