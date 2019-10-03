<?php
session_start();
// session_destroy();
include '../config/config.php';
?>
<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-12 bg-white border-bottom">
    <span class="navbar-brand h1 mb-0 col">KTEEN</span>
    <ul class="navbar-nav px-4">
        <?php if(isset($_SESSION['customer_username'])){ ?>
        <li class="nav-item">
            <a href="#" class="nav-link">Wallet</a>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: relative;padding-left: 70px;">
                <!-- <img class="rounded-circle" style="height: 40px;width: 40px;position: absolute;top: 3px;left: 25px;" src="../images/customer/<?= $_SESSION['customer_username']; ?>"> -->
                <?= $_SESSION['customer_username']; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.html?logout='1'">Log Out</a>
            </div>
        </li>
        <?php }else{ ?>
        <li class="nav-item">
            <a href="login.php" class="btn btn-outline-dark" role="button" aria-pressed="true">Login</a>
        </li>
        <?php } ?>
    </ul>
</nav>