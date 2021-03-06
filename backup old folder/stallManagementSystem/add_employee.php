<?php 
session_start();
include '../server/config.php';
include '../server/logout.php';
include 'activity/handle_login.php';
include 'activity/handle_add_employee.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../css/kteen_style.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
	<?php 
	$site = 'Employee';
	include 'layout/topnav.php';
	include 'layout/sidenav.php';
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
									<div class="col-md-3">
										<div style="height: 200px;width: 200px;position: relative;">
											<img src="personal.jpg" id="img" style="height: 200px;width: 200px;" class="rounded-circle">
											<input type="file" name="image" id="image" accept="image/gif, image/jpeg, image/png" style="opacity: 0;position: absolute;right: 10px;bottom: 5px;width: 10px;" data-target="#img" required>
											<label for="image" class="btn btn-dark m-0" style="position: absolute;right: 0;bottom: 5px;">Browse</label>
										</div>
									</div>
									<div class="col-md-6">
										<h4 class="card-title text-center">Personal Information</h4>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Name</label>
											<div class="col-md-9">
												<input type="text" name="name" class="form-control" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">NRIC</label>
											<div class="col-md-9">
												<input type="text" name="NRIC" class="form-control" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Contact No</label>
											<div class="col-md-9">
												<input type="text" name="contact_no" class="form-control" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Address</label>
											<div class="col-md-9">
												<textarea class="form-control" name="address"></textarea>
											</div>
										</div>
									</div>
									<div class="col-md-2"></div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label for="employee_id" class="col-md-3 col-form-label">Employee ID</label>
											<div class="col-md-9">
												<input id="employee_id" type="text" name="employee_id" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Password</label>
											<div class="col-md-9">
												<input type="password" name="password" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Confirm Password</label>
											<div class="col-md-9">
												<input type="password" name="password" class="form-control">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Position</label>
											<div class="col-md-9">
												<input type="text" name="position" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Salary</label>
											<div class="input-group col-md-9">
												<div class="input-group-prepend">
													<span class="input-group-text">RM</span>
												</div>
												<input type="number" min="0" name="salary" class="form-control">
											</div>
											<?php include '../server/error.php'; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer bg-white text-right">
								<a href="employee.php" class="btn text-danger">Cancel</a>
								<input type="submit" name="add_employee" value="Submit" class="btn text-dark">
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