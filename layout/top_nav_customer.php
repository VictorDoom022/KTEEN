<?php
include '../config/config.php';
session_start();
?>
<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-12 bg-white border-bottom">
    <span class="navbar-brand h1 mb-0 col">KTEEN</span>
    <ul class="navbar-nav px-4">
        <li class="nav-item">
            <?php if(isset($_SESSION['kteen_customerID'])){ ?>
                <a href="index.php?logout='1'" class="btn btn-outline-dark" role="button" aria-pressed="true">Login</a>
            <?php }else{ ?>
                <a href="login.php" class="btn btn-outline-dark" role="button" aria-pressed="true">Login</a>
            <?php } ?>
        </li>
    </ul>
</nav>