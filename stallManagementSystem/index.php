<?php
session_start(); 
include '../server/config.php';
include '../server/logout.php';
include 'activity/handle_login.php';

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
    <?php 
    $site = "Dashboard";
    include 'layout/topnav.php';
    include 'layout/sidenav.php';
     ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <main class="col-10 p-4">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <div class="k-card card">
                            <div class="card-body">
                                <div class="chart-container" style="position: relative;">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-2">
                        <div class="k-card card h-100">
                            <div class="card-body">
                                Total
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
            var myChart = document.getElementById('myChart').getContext('2d');
    
            var myDoughnutChart = new Chart(myChart, {
                type:'bar',
                data: {
                    labels: [
                        'mee goreng', 
                        'fried rice',
                        'jjyy'
                    ],
                    datasets: [{
                        data: [
                            400,
                            200,
                            100
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
                        position:'left',
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