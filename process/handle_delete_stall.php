<?php 
include '../config/remove_dir.php';

if (isset($_GET['st_i'])) {
	$stall_id = $_GET['st_i'];
	$sql = "SELECT username FROM stall WHERE ID = '$stall_id';";
	$result = $conn -> query($sql);
	$stall_username = $result -> fetch_assoc()['username'];
	
	$sql = "DELETE FROM stall WHERE ID = '$stall_id';";
	$conn -> query($sql);
	$sql = "DELETE FROM opening_time WHERE stall_ID = '$stall_id';";
	$conn -> query($sql);
	$conn->close();

	$path = '../images/'.$stall_username;
	remove_dir($path);
	header("location: index.php");
}
?>