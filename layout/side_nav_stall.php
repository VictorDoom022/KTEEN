<nav class="k-side-nav nav flex-column col-2 border-right bg-white p-0">
    <div class="logo">
        <h2>
            <a href="index.php" class="d-flex d-md-none">K</a>
            <a href="index.php" class="d-none d-md-flex">KTEEN</a>
        </h2>
    </div>
    <div class="k-nav-container h-75">
        <ul class="k-nav nav">
            <li class="nav-item w-100 mb-1">
                <a href="index.php" class="nav-link w-100 text-center text-xl-left <?php if($site == 'Dashboard'){ echo 'active'; } ?>">
                    <i class="fas fa-home d-inline-flex px-auto"></i>
                    <span class="d-none d-xl-inline-flex ml-3">Dashboard</span>
                </a>
            </li>
            <li class="nav-item w-100 mb-1">
                <a href="menu.php" class="nav-link w-100 text-center text-xl-left <?php if($site == 'Menu'){ echo 'active'; } ?>">
                    <i class="fas fa-bars d-inline-flex"></i>
                    <span class="d-none d-xl-inline-flex mx-3">Menu</span>
                </a>
            </li>
            <li class="nav-item w-100 mb-1">
                <a href="report.php" class="nav-link w-100 text-center text-xl-left <?php if($site == 'Report'){ echo 'active'; } ?>">
                    <i class="far fa-chart-bar d-inline-flex"></i>
                    <span class="d-none d-sm-none d-xl-inline-flex mx-3">Report</span>
                </a>
            </li>
            <li class="nav-item w-100 mb-1">
                <a href="employee.php" class="nav-link w-100 text-center text-xl-left <?php if($site == 'Employee'){ echo 'active'; } ?>">
                    <i class="fas fa-user d-inline-flex"></i>
                    <span class="d-none d-xl-inline-flex ml-3">Employee</span>
                </a>
            </li>
            <li class="nav-item w-100 mb-1">
                <a href="purchase.php" class="nav-link w-100 text-center text-xl-left <?php if($site == 'Purchase'){ echo 'active'; } ?>">
                    <i class="fas fa-boxes d-inline-flex"></i>
                    <span class="d-none d-xl-inline-flex ml-3">Purchase</span>
                </a>
            </li>
        </ul>
    </div>
</nav>