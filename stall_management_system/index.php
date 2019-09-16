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

	<title></title>
</head>
<body>
	<?php
	$site = 'Dashboard';
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>
	<main class="container-fluid">
		<div class="row py-3">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="row">
					<div class="col">
						<div class="k-card bg-white p-4">
							<div class="">
								<div class="row">
									<div class="col-8">
										<div class="card-title h3">
											Notice Board
										</div>
									</div>
									<button class="btn ml-auto mr-4">
										<i class="fas fa-plus"></i>
									</button>
								</div>
								<hr>
								<?php 
								$sql = "SELECT date, description FROM notice WHERE stall_ID = '".$_SESSION['kteen_stall_id']."' LIMIT 3";
								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
								?>
								<div class="row">
									<div class="col-md-3 font-weight-bold">
										<?= $row['date']; ?>
									</div>
									<div class="col-md-9">
										<?= $row['description']; ?>
									</div>
								</div>
								<?php
									}
								}else{
									echo 'no result';
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</main>
	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>