<?php 
define('servername', 'localhost');
define('username', 'root');
define('password', '');
define('dbname', 'kteen');

$conn = new mysqli(servername, username, password, dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
 ?>