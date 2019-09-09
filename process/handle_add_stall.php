<?php
include '../config/test_input.php';
$username = '';
$owner_name = '';
$stall_name = '';
$NRIC = '';
$contact_no = '';
$email = '';
$password = '';

$username_valid = '';
$owner_name_valid = '';
$stall_name_valid = '';
$NRIC_valid = '';
$contact_no_valid = '';
$email_valid = '';
$password_valid = '';

if (isset($_POST['add_stall'])) {
	$owner_name = test_input($_POST['owner_name']);
	$stall_name = test_input($_POST['stall_name']);
	$NRIC = test_input($_POST['NRIC']);
	// $owner_image = $_POST[''];
	// $stall_image = $_POST[''];
	$contact_no = test_input($_POST['contact_no']);
	$email = test_input($_POST['email']);

	$owner_name_valid = 'is-valid';
	$stall_name_valid = 'is-valid';
	$NRIC_valid = 'is-valid';
	$contact_no_valid = 'is-valid';
	$email_valid = 'is-valid';

	if($_POST['password'] == $_POST['confirm_password']){
		$password = md5(test_input($_POST['password']));

		$password_valid = 'is-valid';
		$sql = "SELECT username FROM stall WHERE username = '".test_input($_POST['username'])."';";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 0){
			$username = test_input($_POST['username']);

			$username_valid = 'is-valid';

			$sql = "INSERT INTO stall(username, stall_name, owner_name, NRIC, contact_no, email, password, status) VALUES ('$username', '$stall_name', '$owner_name', '$NRIC', 'contact_no', '$email', '$password', '1');";
			$result = mysqli_query($conn, $sql) or die(mysqli_error());

			mkdir('../images/'.$username);
			mkdir('../images/'.$username.'/menu');
			mkdir('../images/'.$username.'/staff');
			mysqli_close($conn);
			
			header('location: index.php');
		}else{
			mysqli_close($conn);
		}
		
	}else{
		$password_valid = 'is-invalid';
	}
}
?>