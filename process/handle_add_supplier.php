<?php
include '../config/test_input.php';

if (isset($_POST['add_supplier'])) {
	$Name = test_input($_POST['Name']);
	$company_name = test_input($_POST['company_name']);
	$contact_no = test_input($_POST['contact_no']);
	$address = test_input($_POST['address']);
	$email = test_input($_POST['email']);
	echo $sql = "INSERT INTO supplier(Name, company_name, contact_no,email, address) VALUES ('$Name', '$company_name','$contact_no' ,'$email','$address')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	header('location: purchase.php');
}
?>