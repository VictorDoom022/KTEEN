<?php
session_start();
if (isset($_SESSION['customer_username'])) {
	echo json_encode(array("status" => "1"));
}else{
	echo json_encode(array("status" => "0"));
}
?>