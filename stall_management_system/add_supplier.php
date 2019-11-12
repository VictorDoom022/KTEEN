<?php 
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_add_supplier.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
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
									
										<div class="col-md-6">
											<h4 class="card-title text-center">Supplier Information</h4>
											
										</div>
									
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
												<label class="col-md-3 col-form-label">Name</label>
												<div class="col-md-9">
													<input type="text" name="Name" class="form-control" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Company Name</label>
												<div class="col-md-9">
													<input type="text" name="company_name" class="form-control" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Contact No</label>
												<div class="col-md-9">
													<input type="text" name="contact_no" class="form-control" required>
													<input type="hidden" name="stall_id"  value="<?php echo $_SESSION['kteen_stall_id'] ?>">
												</div>
											</div>
											
										
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">E-mail</label>
											<div class="col-md-9">
												<input id="email" type="email" name="email" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Address</label>
											<div class="col-md-9">
												<textarea class="form-control" name="address"></textarea>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<div class="card-footer bg-white text-right">
								<a href="purchase.php" class="btn text-danger">Cancel</a>
								<input type="submit" name="add_supplier" value="Submit" class="btn text-dark">
							</div>
						</div>
					</div>
				</form>
			</main>
		</div>
	</div>
	<script src="../js/show_input_image.js"></script>
	<script type="text/javascript">
		$("#image").change(function() {
			readURL(this);
		});
	</script>
</body>
</html>