<?php 
session_start();
include('../config.php');

if (isset($_GET['logout'])) {
    session_destroy();
    echo "<script>window.location.assign('login.php');</script>";
}

if (isset($_SESSION['kteen_stallID'])) {
    $ID = $_SESSION['kteen_stallID'];
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
                <a href="index.php?logout='1'" class="btn btn-outline-dark" role="button" aria-pressed="true">Log Out</a>
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
                    <a href="index.php" class="nav-link rounded-pill w-100 active">
                        <i class="fas fa-home d-inline-flex px-auto"></i>
                        <span class="d-none d-md-inline-flex ml-3">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item w-100 mb-1">
                    <a href="menu.php" class="nav-link rounded-pill w-100">
                        <i class="fas fa-bars d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Menu</span>
                    </a>
                </li>
                <li class="nav-item  w-100 mb-1">
                    <a href="report.php" class="nav-link rounded-pill w-100">
                        <i class="far fa-chart-bar d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Report</span>
                    </a>
                </li>
                <li class="nav-item  w-100 mb-1">
                    <a href="" class="nav-link rounded-pill w-100">
                        <i class="fas fa-home d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Employee</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    <nav class="k-side-nav-r nav flex-column col-2 border-left bg-white p-0 d-none d-md-flex overflow-auto">
        <div class="mt-3 container-fluid">
            <canvas id="myChart" width="100%" height="100%"></canvas>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <main class="col-10 col-md-8  p-4">
                <div class="row">
                    <div class="col-12 card">
                        <div class="card-body">
                            <div class="card-title">Notice</div>
                        </div>
                    </div>
                    <div class="col-12 card">
                        <div class="card-body">
                            <div class="card-title">Notice</div>
                        </div>
                    </div>
                    <div class="col-12 card">
                        <div class="card-body">
                            <div class="card-title">Notice</div>
                        </div>
                    </div>
                    <div class="col-12 card">
                        <div class="card-body">
                            <div class="card-title">Notice</div>
                        </div>
                    </div>
                    <div class="col-12 card">
                        <div class="card-body">
                            <div class="card-title">Notice</div>
                        </div>
                    </div>
                    <div class="col-12 card">
                        <div class="card-body">
                            <div class="card-title">Notice</div>
                        </div>
                    </div>
                    <div class="col-12 card">
                        <div class="card-body">
                            <div class="card-title">Notice</div>
                        </div>
                    </div>
                    <div class="col-12 card">
                        <div class="card-body">
                            <div class="card-title">Notice</div>
                        </div>
                    </div>
                    <div class="col-12 card">
                        <div class="card-body">
                            <div class="card-title">Notice</div>
                        </div>
                    </div>
                    <div class="col-12 card">
                        <div class="card-body">
                            <div class="card-title">Notice</div>
                        </div>
                    </div>
                </div>
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
                        'fried rice'
                    ],
                    datasets: [{
                        data: [
                            600,
                            400
                        ],
                        backgroundColor:[
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ],
                        label: 'Population',
                        borderWidth:1,
                        borderColor:'#777',
                        hoverBorderWidth:3,
                        hoverBorderColor:'#000'
                    }],
                },
                options: {
                    title:{
                        display:false,
                        text:'Top 2',
                        fontSize:25
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