<?php

if(!isset($_SESSION['customer_username'])){
	header("location: ../customer_order_system/login.php");
}

?>