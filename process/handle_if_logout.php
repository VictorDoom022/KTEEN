<?php 
if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
}else{
	echo "<script>window.location.assign('login.php');</script>";
}
?>