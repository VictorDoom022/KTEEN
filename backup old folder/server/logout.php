<?php 

if (isset($_GET['logout'])) {
    session_destroy();
    echo "<script>window.location.assign('login.php');</script>";
}

 ?>