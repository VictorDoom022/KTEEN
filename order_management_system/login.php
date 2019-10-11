<?php include '../process/verification_staff.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/preloading.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- Bootstarp CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title></title>
</head>
<body>
	<div class="loading-wrapper">
		<div class="loading">
			<div id="box-wrapper">
				<div id="parent">
					<div id="left">K</div>
					<div id="right">T</div>
					<div id="top">E</div>
					<div id="bottom">E</div>
					<div id="front">E</div>
					<div id="back">N</div>
				</div>
			</div>
		</div>
	</div>
	
	<nav class="navbar navbar-light bg-white shadow">
		<a class="navbar-brand" href="index.php">
			KTEEN | Staff Login
		</a>
	</nav>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="k-card card p-0 shadow">
					<div class="card-body">
						<h4 class="card-title pb-3">Staff Login</h4>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<div class="form-group">
								<label for="username">Username</label>
								<input id="username" type="text" name="username" class="form-control rounded-0" placeholder="Enter Username" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" placeholder="Enter password" class="form-control rounded-0" id="password" required>
							</div>
							<div class="form-group-sm text-center">
								<?php include('../config/error.php'); ?>
							</div>
							<div class="form-group text-right">
								<input type="submit" name="login" class="btn btn-dark" value="Login">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function() {
				$(".loading-wrapper").fadeOut(500);
			}, 1000);
		})
	</script>
</body>
</html>