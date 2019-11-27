<?php
$stall_ID = $_SESSION['kteen_stall_id'];

if(isset($_GET['close'])){
	if($_GET['close'] == 1){
		$sql = "UPDATE stall SET status = '0' WHERE ID = '$stall_ID';";
		mysqli_query($conn, $sql);
		mysqli_close();
	}
	header("location: index.php");
}

if(isset($_GET['open'])){
	if($_GET['open'] == 1){
		$sql = "UPDATE stall SET status = '1' WHERE ID = '$stall_ID';";
		mysqli_query($conn, $sql);
		mysqli_close();
	}
	header("location: index.php");
}
?>