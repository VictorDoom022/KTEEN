<?php
if(isset($_GET['taken_id'])){
	$order_id = $_GET['taken_id'];
	$sql = "UPDATE orders SET taken = '1' WHERE ID = '$order_id';";
	mysqli_query($conn, $sql);
	header("location: index.php");
}
?>