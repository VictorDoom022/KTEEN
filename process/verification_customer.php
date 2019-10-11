<?php
session_start();
include '../config/config.php';
$error = "";
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = md5($_POST['password']);
    if($stmt = $conn->prepare("SELECT name, username FROM customer WHERE username=? AND password=?")){
            /*bind parameters for markers*/
            $stmt->bind_param("ss",$u,$p);
            $stmt->execute();
            $stmt->bind_result($name,$username);
            if($stmt->fetch()){
                $_SESSION['customer_username'] = $username;
                $_SESSION['customer_name'] = $name;
                $error = "";
                header('location: index.html');
            }else{
                $error = "Your username or password is invalid";
            }
            $stmt->close();
        }
    $conn->close();
}
?>