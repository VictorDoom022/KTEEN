<?php
ini_set('display_errors',1); // enable php error display for easy trouble shooting
error_reporting(E_ALL); // set error display to all
include '../config/config.php';

if (isset($_POST)) {
    $ID = $_POST['ID'];
    $sql = "SELECT * FROM inventory WHERE ID = '$ID' LIMIT 1";
    $result = $conn -> query($sql);
    $row = $result->fetch_assoc();

    $unit = $row['unit'];
    $price = $row['price'];
    $json = array('unit' => $unit, 'price' => $price);
    echo json_encode($json);
}

?>