<?php
session_start();
include '../config/config.php';


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
	<title></title>
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
			<main class="col-10 p-4">
				<div class="k-card card col-12">
					<div class="card-body">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<h4 class="card-title text-center">Expenses</h4>
							</div>
						</div>

						<div class="row">
							<div class="table-responsive">
								<table class="table table-hover table-borderless table-striped table-sm">
									<thead class="thead-dark">
										<tr>
											<th>Type of records</th>
											<th>Total (RM)</th>
											<th>Sub-total (RM)</th>
										</tr>
									<?php 
										$sql = "SELECT SUM(invoice_amount) AS total FROM invoice";
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												$_SESSION["invoice_total"] = $row['total'];
									?>	
										<tr>
											<td>Invoice </td>
											<td><?php echo $row['total']?> </td>
											<input type="hidden" id="invoice_session" value="<?php echo $row['total'] ?>"/>
										</tr>
										<?php
											}
										}		
									?>
									<?php
										$sql = "SELECT SUM(bill_amount) AS bill_total FROM bill";
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												$_SESSION["bill_total"] = $row['bill_total'];
									?>
										<tr>
											<td>Bill</td>
											<td><?php echo $row['bill_total']?></td>
											<input type="hidden" id="bill_session" value="<?php echo $row['bill_total'] ?>"/>
										</tr>

									<?php
											}
										}		
									?>

									<?php 		
										$sql = "SELECT SUM(receipt_amount) AS receipt_total FROM receipt";
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												$_SESSION["receipt_total"] = $row['receipt_total'];
									?>
										<tr>
											<td>Receipt</td>
											<td><?php echo $row['receipt_total']?></td>
											<input type="hidden" id="receipt_session" value="<?php echo $row['receipt_total'] ?>"/>
										</tr>
									<?php
											}
										}		
									?>

									<?php
										$sql = "SELECT SUM(total) AS mail_total FROM purchase";
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												$_SESSION["mail_total"] = $row['mail_total'];
									?>
										<tr>
											<td>Sent from Mail</td>
											<td><?php echo $row['mail_total']?></td>
											<input type="hidden" id="mail_session" value="<?php echo $row['mail_total'] ?>"/>
										</tr>

									<?php
											}
										}		
									?>

									<?php
										$total =$_SESSION["invoice_total"] + $_SESSION["bill_total"] + $_SESSION["receipt_total"] + $_SESSION["mail_total"];
									?>
										<tr>
											<td colspan="2" class="border-top"><strong>Total:</strong></td>
											<td class="border-top"><strong><?php echo $total ?></strong></td>
										</tr>

									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
				<canvas id="ExpenseChart"></canvas>
			</main>
		</div>
	</div>

</body>

<script type="text/javascript">
var invoice_total = document.getElementById("invoice_session").value;
var bill_total = document.getElementById("bill_session").value;
var receipt_total = document.getElementById("receipt_session").value;
var mail_total = document.getElementById("mail_session").value;
console.log(mail_total);
// Load google charts
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

