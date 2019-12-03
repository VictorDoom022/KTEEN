<?php
if(isset($_GET['reject'])){
    $ID = $_GET['reject'];
    $stall_ID = $_GET['stall_id'];
    $sql = "UPDATE menu_approve SET approve = '2' WHERE menu_approve_id = '$ID'";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO notifications(recipient_id, sender_id, title, parameter, created_date) VALUES ('$stall_ID', '0', 'reject', 'You menu has been approve by Administrator', CURRENT_TIMESTAMP())";
    mysqli_query($conn, $sql);
    mysqli_close();
    header("location: menu_approve.php");
}
?>