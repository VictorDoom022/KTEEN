<?php
if (isset($_GET['ID'])) {
	$ID = test_input($_GET['ID']);
	$sql = "DELETE FROM inventory WHERE ID = '$ID';";
	mysqli_query($conn, $sql);
	header("location: inventory.php");
}
?>