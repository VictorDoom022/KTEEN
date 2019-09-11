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
	}else{
		$password_valid = 'is-invalid';
	}

	$sql = "SELECT username FROM stall WHERE username = '".test_input($_POST['username'])."';";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) == 0){
		$username = test_input($_POST['username']);
		$owner_image = $username.'_owner.jpg';
		$stall_image = $username.'_stall.jpg';

		$username_valid = 'is-valid';

		$target_dir = "../images/".$username."/";
		$target_owner_image = $target_dir.$owner_image;
		$target_stall_image = $target_dir.$stall_image;

	}else{
		$username_valid = 'is-invalid';
	}

	if($username_valid == 'is-valid' && $owner_name_valid == 'is-valid' && $stall_name_valid == 'is-valid' && $NRIC_valid == 'is-valid' && $contact_no_valid == 'is-valid' && $email_valid == 'is-valid' && $password_valid == 'is-valid'){
		echo $sql = "INSERT INTO stall(username, stall_name, owner_name, NRIC, owner_image, stall_image, contact_no, email, password, status) VALUES ('$username', '$stall_name', '$owner_name', '$NRIC', '$owner_image', '$stall_image', '$contact_no', '$email', '$password', '1');";
		$result = mysqli_query($conn, $sql) or die(mysqli_error());

		mysqli_close($conn);
		mkdir('../images/'.$username);
		mkdir('../images/'.$username.'/menu');
		mkdir('../images/'.$username.'/staff');

		if (move_uploaded_file($_FILES["owner_image"]["tmp_name"], $target_owner_image)) {
		    $error = "The file ". basename( $_FILES["owner_image"]["name"]). " has been uploaded.";
		} else {
		    $error = "Sorry, there was an error uploading your file.";
		}
		
		if (move_uploaded_file($_FILES["stall_image"]["tmp_name"], $target_stall_image)) {
		    $error = "The file ". basename( $_FILES["owner_image"]["name"]). " has been uploaded.";
		} else {
		    $error = "Sorry, there was an error uploading your file.";
		}
		
		header('location: index.php');
	}
}
?>