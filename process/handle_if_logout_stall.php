<?php 
if(isset($_SESSION['stall_username'])){
	$username = $_SESSION['stall_username'];
}else{
	header("location: login.php");
}
?>