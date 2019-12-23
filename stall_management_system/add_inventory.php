<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_stall.php';
include '../config/test_input.php';
include '../process/handle_add_inventory.php';
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
		$site = 'Purchase';
		include '../layout/top_nav_stall.php';
		include '../layout/side_nav_stall.php';
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<main class="col-10 p-4">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="k-card card col-12">
							<div class="card-body">
								<div class="row">
									<div class="col-md-1"></div>
									
										<div class="col-md-12">
											<h4 class="card-title text-center">Inventory Information</h4>
										</div>
									
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
												<label class="col-md-3 col-form-label">Name</label>
												<div class="col-md-9">
													<input type="text" name="name" class="form-control" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Unit in:</label>
												<div class="col-md-9">
													<input type="text" name="unit" class="form-control" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Price per Unit (RM)</label>
												<div class="col-md-9">
													<input type="text" name="price" class="form-control" required>
													<input type="hidden" name="stall_id"  value="<?php echo $_SESSION['kteen_stall_id'] ?>">
												</div>
											</div>
											
										
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Description (If any)</label>
											<div class="col-md-9">
												<textarea class="form-control" name="description"></textarea>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<div class="card-footer bg-white text-right">
								<a href="inventory.php" class="btn text-danger">Cancel</a>
								<input type="submit" name="add_inventory" value="Submit" class="btn text-dark">
							</div>
						</div>
					</div>
				</form>
			</main>
		</div>
	</div>
</body>
	
</html>