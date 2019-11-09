<?php
if (isset($_GET['hf'])) {
	$food_id = $_GET['hf'];
	$sql = "UPDATE food SET available = '0' WHERE ID = $food_id;";
	$result = mysqli_query($conn, $sql);
	header("location: menu.php");
}
?>