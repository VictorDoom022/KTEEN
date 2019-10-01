<?php
session_start();
include("../config/config.php");
$error = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    if ($stmt = $conn->prepare("SELECT ID, username, stall_name FROM stall WHERE username = ? AND password = ?")){
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($stall_ID, $username, $stall_name, $owner_image);
        if ($stmt->fetch()) {
            $_SESSION['kteen_stall_id'] = $stall_ID;
            $_SESSION['kteen_stall_name'] = $stall_name;
            $_SESSION['stall_username'] = $username;
            $error = "";
            header('location: index.php');
        }else{
            $error = "Your Username or password is invalid";
        }
        $stmt->close();
    }
    $conn->close();
}
?>