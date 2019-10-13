<?php
session_start();
include '../config/config.php';
$username = $_SESSION['customer_username'];
$sql = "SELECT amount FROM wallet WHERE username = '$username';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "RM ". $row['amount'];
	}
}
?>