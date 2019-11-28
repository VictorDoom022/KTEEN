<?php
include '../config/test_input.php';
$p = $valid_current_password = $valid_not_match_password = "";

if(isset($_POST['change_password'])){
	$p = test_input($_POST['current_password']);
	$current_password = md5($p);
	$sql = "SELECT * FROM customer WHERE username = '".$_SESSION['customer_username']."' AND password = '$current_password';";
	$result = mysqli_query($conn, $sql);
	mysqli_num_rows($result);
	if(mysqli_num_rows($result) == 1){//check account exist
		$valid_current_password = "is-valid";
		$new_password = test_input($_POST['new_password']);
		$retype_new_password = test_input($_POST['retype_new_password']);
		if($new_password == $retype_new_password){
			$password = md5($new_password);
			echo $sql = "UPDATE customer SET password = '$password' WHERE username = '".$_SESSION['customer_username']."'";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
			echo "<script type='text/javascript'>
					alert('Password change succeeded');
					location.assign('setting.php');
				</script>";
		}else{
			$valid_not_match_password = 'is-invalid';
		}
	}else{
		$valid_current_password = "is-invalid";
		$p = "";
		mysqli_close($conn);
	}
}
?>