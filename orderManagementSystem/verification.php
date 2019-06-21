<?php
session_start();
include("../config.php");
$u = $_POST['staffid'];
$p = $_POST['password'];

 if($stmt = $conn->prepare("SELECT staffid, password FROM staff where staffid=? and password=?")){
		/*bind parameters for markers*/
		$stmt->bind_param("ss",$u,$p);
		$stmt->execute();
		$stmt->bind_result($staffid,$password);
		if($stmt->fetch()){
			$_SESSION['staffid'] = $u; //assign the username to session value
			echo $_SESSION['staffid']."Login Successful";	
			echo "<script>window.location.assign('staffmain.php');</script>";
		}else{
			echo "Login Failed";
			echo "<script>window.location.assign('stafflogin.html');</script>";
		}
		$stmt->close();
	}
?>