<?php
if(isset($_GET['approve'])){
	$id = $_GET['approve'];
	$sql = "SELECT stall.username AS username, menu_approve.name AS food_name, stall_ID, category_ID, image, price, available FROM menu_approve LEFT JOIN stall ON menu_approve.stall_ID = stall.ID WHERE menu_approve_id = '$id';";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		$stall_username = $row['username'];
		$food_name = $row['food_name'];
		$stall_ID = $row['stall_ID'];
		$category_ID = $row['category_ID'];
		$image = $row['image'];
		$price = $row['price'];
		$available = $row['available'];

		$sql = "UPDATE menu_approve SET approve = '1' WHERE menu_approve_id = '$id';";
		mysqli_query($conn, $sql);

		//insert data to menu (food table)
		$sql = "INSERT INTO food(name, stall_ID, category_ID, image, price, available) VALUES ('$food_name', '$stall_ID', '$category_ID', '$image', '$price', '$available');";
		mysqli_query($conn, $sql);
		rename("../images/menu2approve/$stall_username/$image", "../images/$stall_username/menu/$image");
		$sql = "INSERT INTO notifications(recipient_id, sender_id, title, parameter, created_date) VALUES ('$stall_ID', '0', 'approve', 'You menu has been approve by Administrator', CURRENT_TIMESTAMP())";
		mysqli_query($conn, $sql);
	}
	mysqli_close();
	header("location: menu_approve.php");
}
?>