<?php
session_start();
include("../config.php");
$error = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    if ($stmt = $conn->prepare("SELECT ID, stall_name, email, password FROM stall WHERE email = ? AND password = ?")){
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $stmt->bind_result($stall_ID, $stall_name, $email, $password);
        if ($stmt->fetch()) {
            $_SESSION['kteen_stallID'] = $stall_ID;
            // $_SESSION['kteen_stallN'] = $stall_name;
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