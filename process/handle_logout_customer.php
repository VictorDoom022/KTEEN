<?php
session_start();
if (isset($_SESSION['customer_username'])) {
	session_destroy();
	header("location: ../customer_order_system/index.html");
}else{
	header("location: ../customer_order_system/index.html");
}
?>