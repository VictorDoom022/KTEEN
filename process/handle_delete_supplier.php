<?php 
include '../config/test_input.php';
if (isset($_GET['ID'])) {
	$ID = test_input($_GET['ID']);
	$sql = "DELETE FROM supplier WHERE ID = '$ID';";
	mysqli_query($conn, $sql);
	header("location: purchase.php");
}
?>