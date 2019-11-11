<?php
if(isset($_GET['af'])){
	$food_id = $_GET['af'];
	$sql = "UPDATE food SET available = '1' WHERE ID = $food_id;";
	mysqli_query($conn, $sql);
	header("location: menu.php");
}
?>