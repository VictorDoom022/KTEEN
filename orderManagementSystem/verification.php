<?php
session_start();
include("../server/config.php");
$error = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$password = md5($password);

    if ($stmt = $conn->prepare("SELECT ID, username FROM staff WHERE username = ? AND password = ?")){
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($staff_ID, $staff_name);
        if ($stmt->fetch()) {
            $_SESSION['kteen_staff_ID'] = $staff_ID;
            $_SESSION['kteen_staff_name'] = $staff_name;
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