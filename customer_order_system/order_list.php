<?php
include '../config/config.php';
include '../config/test_input.php';
if(isset($_POST['food_id'])){
	$food_id = test_input($_POST['food_id']);
	$sql = "SELECT name, price FROM food WHERE ID = '$food_id';";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			$price = $row['price'];
			$temp = array(
					'food_name' => $row['name'], 
					'price' => $price, 
				);
		}
	}
	echo json_encode($temp);
}
?>