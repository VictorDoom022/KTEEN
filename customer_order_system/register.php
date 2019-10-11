<?php 
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_add_customer.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
	<nav class="navbar navbar-expand-lg navbar-light bg-white p-4 fixed-top shadow">
	    <div class="container">
	        <span class="navbar-brand mb-0 h1">
	            KTEEN
	        </span>
            <ul class="navbar-nav ml-auto px-4">
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
            </ul>
	    </div>
	</nav>
	<main class="container pt-4 pb-3">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-12">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="bg-white shadow col-12">
							<div class="p-3">
								<div class="row">
									<div class="col-md-3"></div>
									<div class="col-md-6">
										<h1 class="card-title text-center">Register</h1>
										<hr>
										<br>
										<h4 class="card-title text-center">Personal Information</h4>
										<hr>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Name</label>
											<div class="col-md-9">
												<input type="text" name="name" class="form-control <?= $valid_name; ?>" value="<?= $name; ?>" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">NRIC</label>
											<div class="col-md-9">
												<input type="text" name="NRIC" class="form-control <?= $valid_NRIC; ?>" value="<?= $NRIC; ?>"required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Contact No</label>
											<div class="col-md-9">
												<input type="text" name="contact_no" class="form-control <?= $valid_contact_no; ?>" value="<?= $contact_no; ?>" required>
											</div>
										</div>
										<br>
										<br>
										<h4 class="card-title text-center">Account Information</h4>
										<hr>


										<div class="form-group row">
											<label for="username" class="col-md-3 col-form-label">Username</label>
											<div class="col-md-9">
												<input id="username" type="text" name="username" class="form-control <?= $valid_username ?>" value="<?= $contact_no; ?>">
												<div class="invalid-feedback">
													the username has been taken !
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Password</label>
											<div class="col-md-9">
												<input type="password" name="password" class="form-control <?= $valid_password ?>" value="<?= $p; ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Confirm Password</label>
											<div class="col-md-9">
												<input type="password" name="password_confirm" class="form-control <?= $valid_password ?>" value="<?= $p; ?>">
												<div class="invalid-feedback">
													Password not match !
												</div>
											</div>
										</div>



									</div>
									<div class="col-md-2"></div>
								</div>
								
								
							</div>
							<div class="card-footer bg-white text-right">
								<a href="login.php" class="btn text-danger">Cancel</a>
								<input type="submit" name="add_customer" value="Submit" class="btn text-dark">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</main>
	<script src="../js/show_input_image.js"></script>
	<script type="text/javascript">
		$("#image").change(function() {
			readURL(this);
		});
	</script>
</body>
</html>