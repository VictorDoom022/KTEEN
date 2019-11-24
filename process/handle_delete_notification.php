<?php
include '../config/test_input.php';
if (isset($_GET['dnid'])) {
	$id = test_input($_GET['dnid']);
	$sql = "DELETE FROM notifications WHERE ID = '$id';";
	mysqli_query($conn, $sql);
	// $sql = "";
	header("location: notifications.php");
}
?>