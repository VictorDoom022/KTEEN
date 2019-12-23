<?php
if (isset($_POST['add_inventory'])){
	$name = test_input($_POST['name']);
	$unit = test_input($_POST['unit']);
	$price = test_input($_POST['price']);
	$description = test_input($_POST['description']);
	$sql = "INSERT INTO inventory(name, unit, price,description,date ,stall_ID) VALUES ('$name', '$unit','$price' ,'$description',NOW(),'". $_SESSION['kteen_stall_id'] ."')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	header('location: purchase.php');
}
?>