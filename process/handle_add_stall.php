<?php
include '../config/test_input.php';

$valid = 'is-valid';
$invalid = 'is-invalid';

$username = $owner_name = $stall_name = $NRIC = $contact_no = $email = $p = '';

$username_valid = $owner_name_valid = $stall_name_valid = $NRIC_valid = $contact_no_valid = $email_valid = $password_valid = '';

if (isset($_POST['add_stall'])) {
	$owner_name = test_input($_POST['owner_name']);
	$NRIC = test_input($_POST['NRIC']);
	$contact_no = test_input($_POST['contact_no']);
	$email = test_input($_POST['email']);

	$username_valid = $owner_name_valid = $stall_name_valid = $NRIC_valid = $contact_no_valid = $email_valid = $valid;

	if($_POST['password'] == $_POST['confirm_password']){
		$p = test_input($_POST['password']); 
		$password = md5(test_input($_POST['password']));
		$password_valid = $valid;
	}else{
		$password_valid = $invalid;
	}

	$sql = "SELECT username, stall_name FROM stall WHERE username = '".test_input($_POST['username'])."' OR stall_name = '".test_input($_POST['stall_name'])."';";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['stall_name'] == $_POST['stall_name']) {
				$stall_name_valid = $invalid;
			}
			if($row['username'] == $_POST['username']){
				$username_valid = $invalid;
			}
		}
	}

	if($stall_name_valid == $valid){
		$stall_name = test_input($_POST['stall_name']);
	}
	if($username_valid == $valid){
		$username = test_input($_POST['username']);
	}

	if($username_valid == 'is-valid' && $owner_name_valid == 'is-valid' && $stall_name_valid == 'is-valid' && $NRIC_valid == 'is-valid' && $contact_no_valid == 'is-valid' && $email_valid == 'is-valid' && $password_valid == 'is-valid'){

		$weekday = array();
		$start_time = array();
		$end_time = array();

		if (isset($_POST['monday'])) {
			array_push($weekday, 0);
			array_push($start_time, test_input($_POST['monday_start']));
			array_push($end_time, test_input($_POST['monday_end']));
		}
		if (isset($_POST['tuesday'])) {
			array_push($weekday, 1);
			array_push($start_time, test_input($_POST['tuesday_start']));
			array_push($end_time, test_input($_POST['tuesday_end']));
		}		
		if (isset($_POST['wednesday'])) {
			array_push($weekday, 2);
			array_push($start_time, test_input($_POST['wednesday_start']));
			array_push($end_time, test_input($_POST['wednesday_end']));
		}
		if (isset($_POST['thursday'])) {
			array_push($weekday, 3);
			array_push($start_time, test_input($_POST['thursday_start']));
			array_push($end_time, test_input($_POST['thursday_end']));
		}
		if (isset($_POST['friday'])) {
			array_push($weekday, 4);
			array_push($start_time, test_input($_POST['friday_start']));
			array_push($end_time, test_input($_POST['friday_end']));
		}
		if (isset($_POST['saturda'])) {
			array_push($weekday, 5);
			array_push($start_time, test_input($_POST['saturday_start']));
			array_push($end_time, test_input($_POST['saturday_end']));
		}
		if (isset($_POST['sunday'])) {
			array_push($weekday, 6);
			array_push($start_time, test_input($_POST['sunday_start']));
			array_push($end_time, test_input($_POST['sunday_end']));
		}

		print_r($start_time);

		$owner_image = 'owner.jpg';
		$stall_image = 'stall.jpg';

		$sql = "INSERT INTO stall(username, stall_name, owner_name, NRIC, owner_image, stall_image, contact_no, email, password) VALUES ('$username', '$stall_name', '$owner_name', '$NRIC', '$owner_image', '$stall_image', '$contact_no', '$email', '$password');";
		$result = mysqli_query($conn, $sql) or die(mysqli_error());
		$stall_ID = mysqli_insert_id($conn);

		// opening time
		for ($i=0; $i < count($weekday); $i++) { 
			$sql = "INSERT INTO opening_time(stall_ID, weekday, start_time, end_time) VALUES ('$stall_ID', '$weekday[$i]', '$start_time[$i]', '$end_time[$i]');";
			$result = mysqli_query($conn, $sql) or die(mysqli_error());
		}
		
		$target_dir = "../images/".$username."/";
		$target_owner_image = $target_dir.$owner_image;
		$target_stall_image = $target_dir.$stall_image;

		// open dir for menu and staff
		mysqli_close($conn);
		mkdir('../images/'.$username);
		mkdir('../images/'.$username.'/menu');
		mkdir('../images/'.$username.'/staff');
		mkdir('../images/menu2approve/'.$username);

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