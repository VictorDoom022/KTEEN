<?php
include '../config/test_input.php';

$valid = "is-valid";
$invalid = "is-invalid";

$employee_name = $NRIC = $contact_no = $address = $staff_username = $position = $salary =  $p = "";//init variable

$valid_employee_name = $valid_NRIC = $valid_contact_no = $valid_address = $valid_staff_username = $valid_position = $valid_salary = $valid_password = "";//init variable for validation

if (isset($_POST['add_employee'])) {
	$ok2add = true;

	$employee_name = test_input($_POST['employee_name']);
	$NRIC = test_input($_POST['NRIC']);
	$contact_no = test_input($_POST['contact_no']);
	$address = test_input($_POST['address']);
	$salary =test_input($_POST['salary']);
	$position =test_input($_POST['position']);

	$valid_employee_name = $valid_NRIC = $valid_contact_no = $valid_address = $valid_salary = $valid;
	// check username
	$staff_username = test_input($_POST['employee_username']);// (username)
	$sql = "SELECT username FROM staff WHERE username = '$staff_username';";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) != 0){//validation employee id
		$valid_staff_username = $invalid;
		$ok2add = false;
	}else{
		$valid_staff_username = $valid;
	}
	
	// check password
	$password = test_input($_POST['password']);
	$password_confirm = test_input($_POST['password_confirm']);
	if($password == $password_confirm){
		$p = $password;
		$password = md5($p);
		$valid_password = $valid;
	}else{
		$valid_password = $invalid;
		$ok2add = false;
	}

	if ($ok2add) {
		$image = $staff_username.".jpg";
		$stall_ID = $_SESSION['kteen_stall_id'];
		$sql = "INSERT INTO staff(name, NRIC, image, stall_ID, contact_no, address, username, password, position, salary) VALUES ('$employee_name', '$NRIC', '$image', '$stall_ID', '$contact_no', '$address', '$staff_username',  '$p', '$position', '$salary');";
		mysqli_query($conn, $sql);

		$target_dir = "../images/".$_SESSION['stall_username']."/staff/";
		$target_image = $target_dir.$image;
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_image)) {
		    $error = "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		} else {
		    $error = "Sorry, there was an error uploading your file.";
		}
		header("location: employee.php");
	}

}
?>