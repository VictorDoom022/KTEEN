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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
<?php
	$site = 'Purchase';
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>

	<div class="container-fluid">
		<div class="row">
		<div class="col-2"></div>
		<main class="col-10 p-4">
			<div class="container">
				<div class="font-weight-bolder text-center"><p>Select Type of Purchase</p></div>
				<div class="k-card card card-12 mb-3" style="cursor: pointer;" onclick="invoice()">
					<div class="card-body">
						<div class="text-center">Invoice</div>
					</div>
				</div>
				
				<div class="k-card card card-12 mb-3" style="cursor: pointer;" onclick="bill()">
					<div class="card-body">
						<div class="text-center">Cash Bill</div>
					</div>
				</div>

				<div class="k-card card card-12" style="cursor: pointer;" onclick="receipt()">
					<div class="card-body">
						<div class="text-center">Receipt</div>
					</div>
				</div>
			</div>
			
		</main>
		</div>
	</div>
</body>

<script>
function invoice() {
	window.location.assign('purchase_invoice.php');
}

function bill() {
	window.location.assign('purchase_bill.php');
}

function receipt() {
	window.location.assign('purchase_receipt.php');
}
</script>
</html>
