<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_stall.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- Bootstarp CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
	<title>Report</title>
</head>
<body onload="live_search()">
	<?php
	$site = 'Report';
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<main class="col-10">
				<div class="row">
					<div class="col text-right">
						<div class="btn-group my-2">
							<!-- <div class="dropdown">
								<button class="btn bg-white mr-2 shadow-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
								<div class="dropdown-menu border-0 shadow">
									<a href="#" class="dropdown-item">CSV</a>
									<a href="#" class="dropdown-item">PDF</a>
								</div>
							</div> -->
							<select name="position" class="btn bg-white shadow-sm" onchange="live_search()" id="date" style="cursor: pointer;">
								<option value="">All</option>
								<option value="<?php echo date('Y-m-d');?>">Daily</option>
								<option value="<?php echo date('Y-m');?>">Monthly</option>
								<option value="<?php echo date('Y');?>">Yearly</option>
							</select>
						</div>
					</div>
				</div>
				<div id="info" class="mb-2"></div>
				<div class="container-fluid">
					<div class="row">
						<canvas id="ExpenseChart"></canvas>
						<canvas id="finalChart"></canvas>
					</div>
				</div>
			</main>
		</div>
	</div>
</body>

<script type="text/javascript">
function live_search(){
	var word = document.getElementById("date").value;
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("info").innerHTML = this.responseText;
		}
	};
	if(word == ""){
		xhttp.open("GET", "report_info.php", true);
		xhttp.send();
		return;
	}else if(word != ""){
		xhttp.open("GET" , "report_info.php?word="+word, true);
		xhttp.send();
		return;
	}
}

var invoice_total = document.getElementById("invoice_session").value;
var bill_total = document.getElementById("bill_session").value;
var receipt_total = document.getElementById("receipt_session").value;
var mail_total = document.getElementById("mail_session").value;

var income_total = document.getElementById("total_income").value;
var expenses_total = document.getElementById("total_expenses").value;
console.log(expenses_total);

var ctx = document.getElementById('ExpenseChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: ['Invoice', 'Bill', 'Receipt', 'Mail'],
        datasets: [{
            label: 'Expenses',
            backgroundColor:[
						'rgba(3, 49, 255)',
						'rgba(247, 20, 50)',
						'rgba(83, 237, 104)',
						'rgba(75, 192, 192, 0.6)'
					],
            borderColor: 'rgb(255, 255, 255)',
            data: [invoice_total, bill_total, receipt_total, mail_total]
        }]
    },

    // Configuration options go here
    options: {
		title:{
			display: true,
			text: 'Expenses'
		},
		layout:{
			padding:{
					left:0,
					right:0,
					bottom:50,
					top:0
				},
			},

	}
});


var ctx = document.getElementById('finalChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Income', 'Expenses'],
        datasets: [{
            label: 'Expenses',
            backgroundColor:[
						'rgba(3, 49, 255)',
						'rgba(83, 237, 104)',
						'rgba(75, 192, 192, 0.6)'
					],
            borderColor: 'rgb(255, 255, 255)',
            data: [income_total, expenses_total]
        }]
    },

    // Configuration options go here
    options: {
		title:{
			display: true,
			text: 'Income & Expenses Comparison'
		},
		layout:{
			padding:{
					left:0,
					right:0,
					bottom:300,
					top:0
				},
			},

	}
});
</script>
</html>

