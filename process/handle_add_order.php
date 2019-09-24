<?php
session_start();
include '../config/config.php';
if(isset($_POST['order_list']) && !empty($_POST['order_list'])){
    $orders = json_decode($_POST['order_list'], true);
    $order_id = '';
    $sql = "INSERT INTO orders(customer_ID, stall_ID, date, number, completed) VALUES (0, '" . $_SESSION['stall_ID'] . "', CURRENT_TIMESTAMP(), '0', '0')";
    mysqli_query($conn, $sql);
    $order_id = mysqli_insert_id($conn);//get the id when insert the order to orders table

    foreach($orders as $key => $order_detail){
        $food_id = $order_detail['id'];
        $quantity = $order_detail['id'];
        $sql = "INSERT INTO order_detail(order_ID, food_ID, quantity, remark) VALUES ('$order_id', '$food_id', '$quantity', null)";
        mysqli_query($conn, $sql);
    }
    echo json_encode(array("status" => "1", "msg" => "Order sended"));
}else{
    echo json_encode(array("status" => "0", "msg" => "Please add some thing to order!"));
}
?>