<?php
include '../config/config.php';
//to check table exists or notS
$sql = "SELECT ID FROM stall";
$v = mysqli_query($conn, $sql);

if($v){
	echo "true";
}else{
	echo "false";
}

 ?>