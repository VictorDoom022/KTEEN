<?php
include '../process/verification_customer.php';

if(isset($_SESSION['customer_username'])){
	header("location: index.html");
}
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
	<title>Customer Login</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-white p-4 fixed-top shadow">
	    <div class="container">
	        <span class="navbar-brand mb-0 h1">
	            KTEEN
	        </span>
            <ul class="navbar-nav ml-auto px-4">
                <li class="nav-item">
                    <a href="register.php" class="nav-link">Register</a>
                </li>
            </ul>
	    </div>
	</nav>
	<main class="container pt-4">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="k-card card shadow rounded-0" style="padding: 20px;">
					<h4 class="card-title pb-3 text-center">Customer Login</h4>	
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
						</div>
						<div class="form-group-sm text-center">
							<?php include '../config/error.php'; ?>
						</div>
						<div class="form-group text-right text-muted">
							No account?<a href="register.php">Register Now!</a>
							<input type="submit" name="login" class="btn btn-dark rounded-0 mx-3" value="Login">
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
	</main>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>