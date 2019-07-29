<?php 
session_start();
include '../server/config.php';
include '../server/logout.php';

if (isset($_SESSION['kteen_stallID'])) {
    $ID = $_SESSION['kteen_stallID'];
    $stall_name = $_SESSION['kteen_stallN'];
    $owner_image = $_SESSION['kteen_stallOI'];
}else{
    echo "<script>window.location.assign('login.php');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css -->
    <link rel="stylesheet" href="../css/kteen_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

	<title>KTEEN</title>
</head>
<body class="bg-light">
    <nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-10 bg-white border-bottom">
        <span class="navbar-brand h1 mb-0 col"><i class="fas fa-home d-inline-flex mr-2"></i>Dashboard</span>
        <ul class="navbar-nav px-4">
            <li class="nav-item">
                
            </li>
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
                    <a href="index.php" class="nav-link w-100 active">
                        <i class="fas fa-home d-inline-flex px-auto"></i>
                        <span class="d-none d-md-inline-flex ml-3">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item w-100 mb-1">
                    <a href="menu.php" class="nav-link w-100">
                        <i class="fas fa-bars d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Menu</span>
                    </a>
                </li>
                <li class="nav-item  w-100 mb-1">
                    <a href="report.php" class="nav-link w-100">
                        <i class="far fa-chart-bar d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Report</span>
                    </a>
                </li>
                <li class="nav-item  w-100 mb-1">
                    <a href="employee.php" class="nav-link w-100">
                        <i class="fas fa-home d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Employee</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    <nav class="k-side-nav-r nav flex-column col-2 border-left bg-white p-0 d-none d-md-flex overflow-auto">
        <div class="container-fluid p-3">
            <div class="custom-control custom-switch border-bottom">
                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Stall Status</label>
            </div>
        </div>
        <div class="row">
            <div class="w-100"></div>
            <canvas id="myChart" width="100%" height="100%"></canvas>
            <div class="w-100"></div>
        </div>
        <div class="mt-3 container-fluid"></div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <main class="col-10 col-md-8 p-4">
                
            </main>
            <div class="d-none d-md-flex col-md-2"></div>
        </div>
    </div>

    <script>
            var myChart = document.getElementById('myChart').getContext('2d');
    
            var myDoughnutChart = new Chart(myChart, {
                type:'doughnut',
                data: {
                    labels: [
                        'mee goreng', 
                        'fried rice',
                        'jjyy'
                    ],
                    datasets: [{
                        data: [
                            600,
                            400,
                            400
                        ],
                        backgroundColor:[
                            '#0078C8',
                            '#55A4D9',
                            '#8DC2E5',
                            '#8DC2E5',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ],
                        label: 'Population'
                    }],
                },
                options: {
                    title:{
                        display:true,
                        text:'Top 3',
                        fontSize:20
                    },
                    legend:{
                        display: false,
                        position:'bottom',
                        labels:{
                            fontColor:'#000'
                        }
                    },
                    layout:{
                        padding:{
                            left:0,
                            right:0,
                            bottom:0,
                            top:0
                        }
                    },
                }
            });
        </script>
</body>
</html>