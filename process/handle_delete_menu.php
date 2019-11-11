<?php
if(isset($_GET['df'])){
	$food_id = $_GET['df'];
	$sql = "DELETE FROM food WHERE ID = $food_id;";
	mysqli_query($conn, $sql);
	header("location: menu.php");
}
?>
