<?php 
if (isset($_SESSION['kteen_stallID'])) {
    $ID = $_SESSION['kteen_stallID'];
    $stall_name = $_SESSION['kteen_stallN'];
    $owner_image = $_SESSION['kteen_stallOI'];
}else{
    echo "<script>window.location.assign('login.php');</script>";
}

 ?>