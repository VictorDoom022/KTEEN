<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_staff.php';
include '../process/handle_order_taken.php';
include '../process/handle_payment_cash.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
	<!-- Bootstarp CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Home</title>
</head>
<body>
	<?php 
	$site = "Home";
	include '../layout/top_nav_staff.php';
	include '../layout/side_nav_staff.php';
	?>
	<main class="container-fluid">
		<div class="row py-3">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="container-fluid">
					<div class="row" style="height: 500px;">
						<div class="col-md-6 mb-3">
							<div class="k-card card h-100">
								<div class="card-body" id="cash_payment_table"></div>
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="k-card card h-100">
								<div class="card-body">
									<div class="card-title">Number Waiting To Collect</div>
									<table class="table table-sm">
										<thead>
											<tr>
												<th>Number</th>
												<th>Date</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
										<?php
										$stall_ID = $_SESSION['stall_ID'];
										$sql = "SELECT ID, number, date FROM orders WHERE stall_ID = '$stall_ID' AND completed = '1' AND taken = '0';";
										$result = mysqli_query($conn, $sql);
										if(mysqli_num_rows($result) > 0){
											while($row = mysqli_fetch_assoc($result)){
										?>
											<tr>
												<td>
													<?= $row['number'] ?>
												</td>
												<td>
													<?= $row['date']; ?>	
												</td>
												<td>
													<a href="index.php?taken_id=<?= $row['ID'] ?>" class="btn btn-sm btn-dark">Taken</a>
												</td>
											</tr>
										<?php
											}
										}
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#cash_payment_table').load('cash_payment_table.php');
			// var auto_refresh_element = setInterval(function() {
			// 	$('#cash_payment_table').load('cash_payment_table.php');
			// }, 10000);
		});
	</script>
</body>
</html>