<?php
session_start();
include '../config/config.php';
if(isset($_POST['order_list']) && !empty($_POST['order_list'])){
    $orders = json_decode($_POST['order_list'], true);

    // get a available order numer
    $sql = "SELECT order_number FROM number WHERE status = 'free' LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        $order_number = mysqli_fetch_assoc($result)['order_number'];
    }
    $sql = "UPDATE number SET status = 'busy' WHERE order_number = '$order_number';";
    mysqli_query($conn, $sql);

    $order_id = '';
    $sql = "INSERT INTO orders(stall_ID, date, number, completed) VALUES ('" . $_SESSION['stall_ID'] . "', CURRENT_TIMESTAMP(), '$order_number', '0')";
    mysqli_query($conn, $sql);
    $order_id = mysqli_insert_id($conn);//get the id when insert the order to orders table
    $total = 0;
    foreach($orders as $key => $order_detail){
        $food_id = $order_detail['id'];
        $quantity = $order_detail['quantity'];
        $sql = "INSERT INTO order_detail(order_ID, food_ID, quantity, remark) VALUES ('$order_id', '$food_id', '$quantity', null)";
        mysqli_query($conn, $sql);
        $total += $order_detail['price'] * $quantity;
    }

    //create payment record
    $sql = "INSERT INTO payment(method, total, order_ID) VALUES ('', '$total', '$order_id');";
    mysqli_query($conn, $sql);

    echo json_encode(array("status" => "1", "msg" => "Order sended!\nThe number is ". $order_number));
}else{
    echo json_encode(array("status" => "0", "msg" => "Please add some thing to order!"));
}
?>