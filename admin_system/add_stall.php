<?php 
session_start();
include '../process/handle_logout.php';
include '../process/handle_if_logout.php';
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

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<title></title>
</head>
<body>
	<?php 
	$site = '';
	include '../layout/top_nav_admin.php';
	include '../layout/side_nav_admin.php';
	?>
	<main class="container-fluid">
		<div class="row py-3">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="k-card card">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="row no-gutters">
							<div style="position: relative;width: 100%;height: 250px;">
								<img src="../images/stall_image.png" style="height: 250px; width: 100%;position: absolute;" id="img-stall">
								<input type="file" name="" id="input-stall-image" required style="position: absolute;width: 100%;height: 100%;opacity: 0;" data-target="#img-stall">
								<label for="input-stall-image" class="btn btn-light" style="position: absolute;right: 10px;bottom: 5px;"><i class="fas fa-camera"></i></label>
								<div style="position: absolute;top: 50%;left: 1%;">
									<div style="position: relative;width: 250px;height: 250px;">
										<img src="../images/personal.jpg" class="rounded-circle" style="width: 250px;height: 250px;position: absolute;" id="img-owner">
										<input type="file" name="" id="input-owner-image" data-target="#img-owner" style="width: 250px;height: 250px;position: absolute;border-radius: 50%;opacity: 0;">
										<label for="input-owner-image" class="btn btn-dark" style="position: absolute;bottom: 10px;right: 20px;z-index: 2;"><i class="fas fa-camera"></i></label>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<br>
									<br>
									<br>
									<br>
								</div>
								<div class="col-md-8">
									<div class="card-title h3">
										Personal Detail
									</div>
									<hr>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Name</label>
										<div class="col-md-10">
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">NRIC</label>
										<div class="col-md-10">
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Contact No</label>
										<div class="col-md-10">
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Email</label>
										<div class="col-md-10">
											<input type="text" name="" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col border-bottom card-title h3">
									Account
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-md-3 col-form-label">ID</label>
										<div class="col-md-9">
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Password</label>
										<div class="col-md-9">
											<input type="text" name="" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Stall Name</label>
										<div class="col-md-9">
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="form-group row" style="font-size: 0.82rem;">
										<label class="col-md-3 col-form-label">Confirm Password</label>
										<div class="col-md-9">
											<input type="text" name="" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col text-right">
									<button class="btn text-danger">Cancel</button>
									<input type="submit" class="btn" value="Submit">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	<script src="../js/show_input_image.js"></script>
	<script type="text/javascript">
		$("#input-stall-image").change(function() {
			readURL(this);
		});
		$("#input-owner-image").change(function() {
			readURL(this);
		});
	</script>
</body>
</html>