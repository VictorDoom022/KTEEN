<?php
session_start();
include("../config/config.php");
$error = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$password = md5($password);

    if ($stmt = $conn->prepare("SELECT ID, stall_ID, username, image FROM staff WHERE username = ? AND password = ?")){
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($staff_ID, $stall_ID, $staff_name, $staff_photo);
        if ($stmt->fetch()) {
            $_SESSION['staff_ID'] = $staff_ID;
            $_SESSION['stall_ID'] = $stall_ID;
            $_SESSION['staff_name'] = $staff_name;
            $_SESSION['staff_image'] = $staff_photo;
            $error = "";
        }else{
            $error = "Your email or password is invalid";
        }
        $stmt->close();
    }
    $conn->close();

    if(isset($_SESSION['stall_ID'])){
        $sql = "SELECT username FROM stall WHERE ID = '". $_SESSION['stall_ID'] ."';";
        include '../config/config.php';
        $result = mysqli_query($conn, $sql);
        $_SESSION['image_folder'] = mysqli_fetch_assoc($result)['username'];
        mysqli_close($conn);
        header('location: index.php');
    }

}
?>