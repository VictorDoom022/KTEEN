<?php
if (isset($_GET['pay_id'])) {
	$order_ID = $_GET['pay_id'];
	$sql = "UPDATE payment SET method = 'cash' WHERE order_ID = '$order_ID';";
	mysqli_query($conn, $sql);
	header("location: index.php");
}
?>