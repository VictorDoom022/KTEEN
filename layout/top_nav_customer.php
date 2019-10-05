<?php
session_start();
include '../config/config.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white p-4 fixed-top shadow">
    <div class="container">
        <span class="navbar-brand mb-0 h1">
            KTEEN
        </span>
        <?php if(isset($_SESSION['customer_username'])){ ?>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Wallet</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION['customer_username']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="setting.html">Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../process/handle_logout_customer.php">Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
        <?php }else{ ?>
            <ul class="navbar-nav ml-auto px-4">
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
            </ul>
        <?php } ?>
    </div>
</nav>