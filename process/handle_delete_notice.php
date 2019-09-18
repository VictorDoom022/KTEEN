<?php
if (isset($_GET['notice_id'])) {
	$notice_id = test_input($_GET['notice_id']);
	$sql = "DELETE FROM notice WHERE ID = '$notice_id';";
	mysqli_query($conn, $sql);
	header('location: index.php');
}
?>