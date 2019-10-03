<?php
session_start();
include '../config/config.php';
$error = "";
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = ($_POST['password']);
    echo $u;
    echo $p;
    if($stmt = $conn->prepare("SELECT name, password FROM customer WHERE name=? AND password=?")){
            /*bind parameters for markers*/
            $stmt->bind_param("ss",$u,$p);
            $stmt->execute();
            $stmt->bind_result($username,$password);
            if($stmt->fetch()){
                $_SESSION['customer_username'] = $username;
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