<nav class="k-side-nav nav flex-column col-2 border-right bg-white p-0">
    <div class="logo">
        <h2>
            <a href="index.php" class="d-flex d-md-none">K</a>
            <a href="index.php" class="d-none d-md-flex">KTEEN</a>
        </h2>
    </div>
    <div class="k-nav-container h-75">
        <ul class="k-nav nav">
            <?php if ($site == 'Add Stall' || $site == 'Edit Stall') { ?>
                <li class="nav-item w-100 mb-1">
                    <a href="index.php" class="nav-link w-100 text-center">
                        <i class="fas fa-arrow-left"></i>
                        <span class="d-none d-sm-none d-lg-inline-flex mx-3">Cancel</span>
                    </a>
                </li>
            <?php }else{?>
                <li class="nav-item w-100 mb-1">
                    <a href="index.php" class="nav-link w-100 <?php if($site == 'Stall'){ echo 'active'; } ?>  text-center">
                        <i class="fas fa-store"></i>
                        <span class="d-none d-sm-none d-lg-inline-flex mx-3">Stall</span>
                    </a>
                </li>
                <li class="nav-item w-100 mb-1">
                    <a href="menu.php" class="nav-link w-100 <?php if($site == 'Menu'){ echo 'active'; } ?>  text-center">
                        <i class="fas fa-bars d-inline-flex"></i>
                        <span class="d-none d-sm-none d-lg-inline-flex mx-3">Menu</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>