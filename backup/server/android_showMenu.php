<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
	include 'config.php';
	showMenu();
}

function showMenu(){
	global $conn;

	$sql = "SELECT * FROM food;";
	$result = mysqli_query($conn, $sql);

	$temp_array = array();

	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
		}
	}

	header('Content-Type: application/json');
	echo json_encode(array("food" => $temp_array));
	mysqli_close($conn);
}


 ?>