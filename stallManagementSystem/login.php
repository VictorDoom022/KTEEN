<?php include('verification.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Stall login</title>
</head>
<body class="bg-light">
	<nav class="navbar navbar-light bg-white shadow">
		<a class="navbar-brand" href="index.php">
			KTEEN | Stall Owner Login
		</a>
	</nav>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="card shadow" style="padding: 20px;">
					<form method="post" action="login.php">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
						</div>
						<div class="form-group-sm text-center">
							<?php include('../error.php'); ?>
						</div>
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-warning" value="Login">
						</div>
					</form>
				</div>
				
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>