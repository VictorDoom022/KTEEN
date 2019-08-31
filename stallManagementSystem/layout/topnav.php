<?php 
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
    case 'Setting':
        $icon = '<i class="fas fa-cog d-inline-flex mr-2"></i>';
        break;
}

 ?>

<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-10 bg-white border-bottom">
    <span class="navbar-brand h1 mb-0 col"><?php echo $icon.$site ?></span>
    <ul class="navbar-nav px-4">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                <img class="rounded-circle" style="height: 40px;width: 40px;" src="../images/stall/owner/<?php echo $owner_image; ?>">
                <?php echo $stall_name; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right rounded-0 shadow border-0" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Notification</a>
                <a class="dropdown-item" href="setting.php">Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
            </div>
        </li>
    </ul>
</nav>