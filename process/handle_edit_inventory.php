<?php
include '../config/config.php';
include '../config/test_input.php';

if(isset($_POST['edit_inventory'])){
	$ID = test_input($_POST['ID']);
	$Name = test_input($_POST['Name']);
    $unit = test_input($_POST['unit']);
    $price = test_input($_POST['price']);
	$description = test_input($_POST['description']);
	$stall_ID = test_input($_POST['stall_ID']);

	$sql = "UPDATE inventory SET Name = '$Name', unit= '$unit', price = '$price', description = '$description', date = NOW(), stall_ID = '$stall_ID'
	 WHERE ID = '$ID'";
	$result = $conn->query($sql);
	header('location: inventory.php');
}
?>