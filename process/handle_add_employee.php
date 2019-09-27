<?php
include '../config/test_input.php';

if (isset($_POST['add_employee'])) {
	$employee_id = '';
	$employee_name = test_input($_POST['employee_name']);
	$NRIC = test_input($_POST['NRIC']);
	$contact_no = test_input($_POST['contact_no']);
	$address = test_input($_POST['address']);
	$employee_id = test_input($_POST['employee_id']);
	$salary =test_input($_POST['salary']);

	if($_POST['password'] == $_POST['password_confirm']){
		$password = $_POST['password'];
	}else{

	}
}
?>
<!-- <script>console.log("<?= $employee_id; ?>")</script> -->