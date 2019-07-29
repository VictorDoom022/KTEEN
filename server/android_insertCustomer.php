<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	require '../config.php';
	createCustomer();
}

function createCustomer(){
	global $conn;

	$name = $_POST["name"];
	
	$contact_no = $_POST["contact_no"];
	$password = $_POST["password"];

	$sql = "INSERT INTO customer(name, contact_no, password) VALUES ('$name', '$contact_no', '$password');";

	mysqli_query($conn, $sql) or die (mysqli_error($conn));
	mysqli_close($conn);
}

 ?>