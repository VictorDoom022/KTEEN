<?php 
session_start();
include '../server/config.php';
include '../server/logout.php';
include 'controller/handle_login.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
	$site = "Report";
	include 'layout/topnav.php';
	include 'layout/sidenav.php';
	?>
    
	<div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <main class="col-10 p-4">
                <div class="row">
                    <div class="card col-12">
						<div class="card-body" style="height: 400px;">
							<canvas id="myChart" width="w-100" class="h-100"></canvas>
						</div>
					</div>
                </div>
            </main>
        </div>
    </div>
	<script>
		var myChart = document.getElementById('myChart').getContext('2d');

		var myDoughnutChart = new Chart(myChart, {
			type:'line',
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
					label: 'Population'
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