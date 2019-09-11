<?php 
include '../config/remove_dir.php';

if (isset($_GET['st_u'])) {
	$stall_username = $_GET['st_u'];
	$sql = "DELETE FROM stall WHERE username = '$stall_username';";
	$result = $conn -> query($sql);
	$conn->close();

	$path = '../images/'.$stall_username;
	remove_dir($path);
	header("location: index.php");
}
?>