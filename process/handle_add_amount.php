<?php
session_start();
include '../config/config.php';
if(isset($_POST['amount_topup']) ){
    $username = $_SESSION['customer_username'];
    $sql = "SELECT amount FROM wallet where username ='$username'";
    $current_amount = $conn -> query($sql) -> fetch_assoc()['amount'];
    
    $topup_amount = json_decode($_POST['amount_topup'], true);
    $total_amount = $current_amount + $topup_amount;

    $sql = "UPDATE wallet SET amount = '$total_amount' WHERE username ='$username'";
    mysqli_query($conn, $sql);
    echo true;
}else{
  echo false;
}
?>