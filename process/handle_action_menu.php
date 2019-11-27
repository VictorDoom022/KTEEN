<?php
include '../config/test_input.php';
if(isset($_GET['af'])){
	$food_id = test_input($_GET['af']);
	$sql = "UPDATE food SET available = '1' WHERE ID = $food_id;";
	mysqli_query($conn, $sql);
	header("location: menu.php");
}
?>