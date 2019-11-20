<?php
$icon = '';
switch ($site) {
    case 'Dashboard':
        $icon = '<i class="fas fa-home d-inline-flex mr-2"></i>';
        break;
    case 'Menu':
        $icon = '<i class="fas fa-bars d-inline-flex mr-2"></i>';
        break;
    case 'Employee':
        $icon = '<i class="fas fa-user d-inline-flex mr-2"></i>';
        break;
    case 'Report':
        $icon = '<i class="far fa-chart-bar d-inline-flex mr-2"></i>';
        break;
    case 'Purchase':
        $icon = '<i class="fas fa-boxes d-inline-flex mr-2"></i>';
        break;
    case 'Settings':
        $icon = '<i class="fas fa-cog d-inline-flex mr-2"></i>';
        break;
    case 'Notifications':
        $icon = '<i class="fas fa-bell d-inline-flex mr-2"></i>';
        break;
}
?>

<nav class="k-top-nav navbar navbar-expand-lg navbar-light col-10 bg-white border-bottom">
    <div class="container-fluid">
        <span class="navbar-brand h1 mb-0 py-0 col"><?php echo $icon.$site ?></span>
        <ul class="navbar-nav">
            <!-- <li class="nav-item">
                <a href="notifications.php" class="nav-link mx-3" style="position: relative;">
                    <i class="fas fa-bell"></i>
                    <small>
                        <span class="badge badge-danger rounded-circle" style="position: absolute;top: 0;left: 60%;">1</span>
                    </small>
                </a>
            </li> -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle text-reset" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: relative;margin-left: 40px;">
                    <img class="rounded-circle" style="height: 40px;width: 40px;position: absolute;top: 50%;left: -20px;transform: translate(-50%, -50%);" src="../images/<?= $_SESSION['stall_username'] ?>/owner.jpg">
                    <?php echo $_SESSION['kteen_stall_name']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow border-0 rounded-0" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="notifications.php">
                        <i class="fas fa-bell"></i>
                        <span class="mx-2">Notification</span>
                    </a>
                    <a class="dropdown-item" href="setting.php">
                        <i class="fas fa-cog"></i>
                        <span class="mx-2">Settings</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?logout='1'">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="mx-2">Log Out</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>