<?php
include '../config/test_input.php';

if (isset($_POST['add_notice'])) {
	$description = test_input($_POST['description']);
	echo $sql = "INSERT INTO notice(date, stall_ID, description) VALUES (CURDATE(), '".$_SESSION['stall_username']."', '$description')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	header('location: index.php');
}
?>