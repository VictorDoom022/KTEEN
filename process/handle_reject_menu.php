<?php
if(isset($_GET['reject'])){
    $ID = $_GET['reject'];
    $stall_ID = $_GET['stall_id'];
    $sql = "UPDATE menu_approve SET approve = '2' WHERE menu_approve_id = '$ID'";
    mysqli_query($conn, $sql);
    echo $sql = "INSERT INTO notifications(recipient_id, sender_id, type, parameter, created_date) VALUES ('$stall_ID', 'Administrator', 'reject', '', CURDATE())";
    mysqli_query($conn, $sql);

    header("location: menu_approve.php");
}
?>