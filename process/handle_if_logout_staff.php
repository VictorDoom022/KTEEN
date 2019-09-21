<?php 
if(isset($_SESSION['staff_name'])){
	// $username = $_SESSION['kteen_staff_name'];
}else{
	header("location: login.php");
}
?>