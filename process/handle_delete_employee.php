<?php
if(isset($_GET['emp_id'])){
	$employee_id = $_GET['emp_id'];
	$sql = "DELETE FROM staff WHERE ID = '$employee_id';";
	$result = mysqli_query($conn, $sql);
	header('location: employee.php');
}
?>