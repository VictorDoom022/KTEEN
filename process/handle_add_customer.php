<?php
include '../config/test_input.php';

$valid = "is-valid";
$invalid = "is-invalid";

$name = $NRIC = $contact_no = $username = $password = $p = $c = "";//init variable

$valid_name = $valid_NRIC = $valid_contact_no = $valid_username = $valid_password = "";//init variable for validation

if (isset($_POST['add_customer'])) {
	$ok2add = true;

	$name = test_input($_POST['name']);
	$NRIC = test_input($_POST['NRIC']);
	$contact_no = test_input($_POST['contact_no']);
	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);

	$valid_name = $valid_NRIC = $valid_contact_no = $valid_username = $valid_password = $valid;
	// check username
	$c = test_input($_POST['username']);
	$username = md5($c);
	$sql = "SELECT username FROM customer WHERE username = '$username';";
	$result   = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) != 0){//validation employee id
		$valid_username = $invalid;
		$ok2add = false;
	}else{
		$valid_username = $valid;
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

	if ($ok2add == true) {
		$sql = "INSERT INTO customer(name,NRIC,contact_no,username,password) VALUES ('$name','$NRIC','$contact_no','$username','$password');";
		$sql .= "INSERT INTO wallet(username) VALUES ('$username');";
		if (mysqli_multi_query($conn,$sql)){
			do{// Store first result set
				if ($result=mysqli_store_result($conn)) {// Fetch one and one row
					while ($row=mysqli_fetch_row($result)){
						printf("%s\n",$row[0]);
					}// Free result set
					mysqli_free_result($result);
				}
			}
			while (mysqli_next_result($conn));
		}
		echo "<script>
		alert('Register Sucessful ! !');
		window.location.assign('login.php')
		</script>";
	}
}
?>