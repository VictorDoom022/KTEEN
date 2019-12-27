<?php
if(isset($_GET['emp_id'])){
	$employee_id = $_GET['emp_id'];
	$sql = "SELECT username FROM staff WHERE ID = '$employee_id';";
	$result = mysqli_query($conn, $sql);
	$staff_username = mysqli_fetch_assoc($result)['username'];

	$sql = "DELETE FROM staff WHERE ID = '$employee_id';";
	mysqli_query($conn, $sql);

	$target_file = '../images/'. $_SESSION['stall_username'] .'/staff/'. $staff_username .'.jpg';
	unlink($target_file);

	header('location: employee.php');
}
?>