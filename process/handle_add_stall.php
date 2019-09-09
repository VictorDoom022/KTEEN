<?php
$username = '';
$owner_name = '';
$stall_name = '';
$NRIC = '';
$contact_no = '';
$email = '';
$password = '';

if (isset($_POST['add_stall'])) {
	$owner_name = $_POST['owner_name'];
	$stall_name = $_POST['stall_name'];
	$NRIC = $_POST['NRIC'];
	// $owner_image = $_POST[''];
	// $stall_image = $_POST[''];
	$contact_no = $_POST['contact_no'];
	$email = $_POST['email'];

	if($_POST['password'] == $_POST['confirm_password']){
		$password = $_POST['password'];

		echo $sql = "SELECT username FROM stall WHERE username = '".$_POST['username']."';";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 0){
			$username = $_POST['username'];
			mkdir('../images/'.$username);
			mkdir('../images/'.$username.'/menu');
			mkdir('../images/'.$username.'/staff');
		}else{

		}
		
	}
	
	// header('location: add_stall.php');
}
?>