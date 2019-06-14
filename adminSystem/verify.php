<?php
session_start();
include("../config.php");
$u = $_POST['username'];
$p = $_POST['password'];
$sql = "select * from admin where username = '$u' and password = '$p'";
$result = $conn->query($sql);

// if($result -> num_rows>0){
// 	while ($row = $result -> fetch_assoc()) {
// 		$_SESSION['username'] = $u;
// 		echo $_SESSION['username']." login Successful";
// 	}
// }else{
// 	echo "Login Failed";
// }

if($stmt = $conn->prepare("SELECT name,password from admin where name=? and password=?")){
		/*bind parameters for markers*/
		$stmt->bind_param("ss",$u,$p);
		$stmt->execute();
		$stmt->bind_result($username,$password);
		if($stmt->fetch()){
			$_SESSION['username'] = $u; //assign the username to session value
			echo $_SESSION['username']."Login Successful";
			echo "<script>window.location.assign('index.php');</script>";
		}else{
			echo "Login Failed";
			echo "<script>window.location.assign('Login.html');</script>";
		}
		$stmt->close();
	}
?>