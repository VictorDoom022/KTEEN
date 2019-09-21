<?php
session_start();
include("../config/config.php");
$error = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$password = md5($password);

    if ($stmt = $conn->prepare("SELECT ID, username, image FROM staff WHERE username = ? AND password = ?")){
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($staff_ID, $staff_name, $staff_photo);
        if ($stmt->fetch()) {
            $_SESSION['staff_ID'] = $staff_ID;
            $_SESSION['staff_name'] = $staff_name;
            $_SESSION['staff_image'] = $staff_photo;
            $error = "";
            header('location: index.php');
        }else{
            $error = "Your email or password is invalid";
        }
        $stmt->close();
    }
    $conn->close();
}
?>