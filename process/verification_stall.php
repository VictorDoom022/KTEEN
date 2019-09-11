<?php
session_start();
include("../config/config.php");
$error = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    if ($stmt = $conn->prepare("SELECT ID, stall_name, owner_image, username FROM stall WHERE email = ? AND password = ?")){
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $stmt->bind_result($stall_ID, $stall_name, $owner_image, $username);
        if ($stmt->fetch()) {
            $_SESSION['kteen_stall_id'] = $stall_ID;
            $_SESSION['kteen_stall_name'] = $stall_name;
            $_SESSION['kteen_stall_owner_image'] = $owner_image;
            $_SESSION['stall_username'] = $username;
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