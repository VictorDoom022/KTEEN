<?php
session_start();
include '../config/config.php';
include '../config/test_input.php';

if(isset($_POST['edit_supplier'])){
	$ID = test_input($_POST['ID']);
	$Name = test_input($_POST['Name']);
    $company_name = test_input($_POST['company_name']);
    $contact_no = test_input($_POST['contact_no']);
	$email = test_input($_POST['email']);
	$address = test_input($_POST['address']);
	$stall_ID = test_input($_POST['stall_ID']);

	echo $sql = "UPDATE supplier SET Name = '$Name', company_name= '$company_name', contact_no = '$contact_no', email = '$email', address = '$address', stall_ID = '$stall_ID'
	 WHERE ID = '$ID'";
	$result = $conn->query($sql);
	header('location: purchase.php');
}
?>