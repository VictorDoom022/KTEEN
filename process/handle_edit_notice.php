<?php
if (isset($_POST['edit_notice'])) {
	$id = test_input($_POST['notice_id']);
	$description = test_input($_POST['description']);

	echo $sql = "UPDATE notice SET description = '$description' WHERE ID = '$id';";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	header("location: index.php");
}
?>