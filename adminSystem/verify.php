<?php
session_start();
include("../server/config.php");
$error = "";
if(isset($_POST['login'])){
	$u = $_POST['username'];
	$p = $_POST['password'];

	if($stmt = $conn->prepare("SELECT name, password FROM admin WHERE name=? AND password=?")){
			/*bind parameters for markers*/
			$stmt->bind_param("ss",$u,$p);
			$stmt->execute();
			$stmt->bind_result($username,$password);
			if($stmt->fetch()){
				$_SESSION['username'] = $u;
				$error = "";
				header('location: index.php');
			}else{
				$error = "Your email or password is invalid";
			}
			$stmt->close();
		}
}
?>