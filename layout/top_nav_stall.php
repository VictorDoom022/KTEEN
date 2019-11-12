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

<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-10 bg-white border-bottom">
    <span class="navbar-brand h1 mb-0 col"><?php echo $icon.$site ?></span>
    <ul class="nav px-4">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-reset" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle" style="height: 40px;width: 40px;" src="../images/<?= $_SESSION['stall_username'] ?>/owner.jpg">
                <?php echo $_SESSION['kteen_stall_name']; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right rounded-0 shadow border-0" aria-labelledby="navbarDropdown">
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
</nav>