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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- chart js -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
	<title>Report</title>
</head>
<body>
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
							<div class="dropdown">
								<button class="btn bg-white mr-2 shadow-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-export px-2"></i>Export</button>
								<div class="dropdown-menu border-0 shadow">
									<a href="#" class="dropdown-item"><i class="fas fa-file-csv mr-2"></i>CSV</a>
									<a href="#" class="dropdown-item"><i class="fas fa-file-pdf mr-2"></i>PDF</a>
								</div>
							</div>
							<select name="position" class="btn bg-white shadow-sm" onchange="live_search()" id="date" style="cursor: pointer;">
								<option value="">All</option>
								<option value="<?php echo date('Y-m-d');?>">Daily</option>
								<option value="<?php echo date('Y-m');?>">Monthly</option>
								<option value="<?php echo date('Y');?>">Yearly</option>
							</select>
						</div>
					</div>
				</div>
				<div class="mb-3" id="income_expenses_dashboard"></div>
				<div class="row">
					<div id="total_order_area" class="col-md-6 mb-3"></div>
					<div id="" class="col-md-6 mb-3"></div>
				</div>
			</main>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#income_expenses_dashboard').load('income_expenses_dashboard.php');
			$('#total_order_area').load('total_order_dashboard.php');
		});
	</script>
</body>
</html>