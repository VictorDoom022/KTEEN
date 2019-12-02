<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_staff.php';
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

	<title></title>
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
				<div class="container">
					<div class="row" style="height: 500px;">
						<div class="col-md-6">
							<div class="k-card card h-100">
								<div class="card-body">
									<div class="card-title">The number has not pay yet (Pay with cash)</div>
									<table class="table table-sm">
										<thead>
											<tr>
												<th>Number</th>
												<th>Date & time</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
										<?php
										$stall_ID = $_SESSION['stall_ID'];
										$sql = "SELECT number, payment.date FROM orders LEFT JOIN payment ON orders.ID = payment.order_ID WHERE stall_ID = '$stall_ID' AND method = '';";
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
													<button class="btn btn-sm btn-success">Pay</button>
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
						<div class="col-md-6">
							<div class="k-card card h-100">
								<div class="card-body">
									<div class="card-title">The Number Waiting Take food</div>
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
										$sql = "SELECT number, date FROM orders WHERE stall_ID = '$stall_ID' AND completed = '1' AND taken = '0';";
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
													<button class="btn btn-sm btn-dark">Taken</button>
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
	<script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>