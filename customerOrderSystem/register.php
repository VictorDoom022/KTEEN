<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/kteen_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

	<title>Register</title>
</head>
<body class="bg-light">
	<div class="container-fluid">
		<div class="row" style="height: 100vh;align-items: center;">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card border-0 shadow rounded-0">
					<div class="card-body p-5">
						<h2 class="card-title">
							REGISTER
						</h2>
						<form class="needs-validation" novalidate>
						  <div class="form-row">
						    <div class="col-md-4 mb-3">
						      <label for="validationCustom01">First name</label>
						      <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
						      <div class="valid-feedback">
						        Looks good!
						      </div>
						    </div>
						    <div class="col-md-4 mb-3">
						      <label for="validationCustom02">Last name</label>
						      <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
						      <div class="valid-feedback">
						        Looks good!
						      </div>
						    </div>
						    <div class="col-md-4 mb-3">
						      <label for="validationCustomUsername">Username</label>
						      <div class="input-group">
						        <div class="input-group-prepend">
						          <span class="input-group-text" id="inputGroupPrepend">@</span>
						        </div>
						        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
						        <div class="invalid-feedback">
						          Please choose a username.
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-md-6 mb-3">
						      <label for="validationCustom03">City</label>
						      <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
						      <div class="invalid-feedback">
						        Please provide a valid city.
						      </div>
						    </div>
						    <div class="col-md-3 mb-3">
						      <label for="validationCustom04">State</label>
						      <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
						      <div class="invalid-feedback">
						        Please provide a valid state.
						      </div>
						    </div>
						    <div class="col-md-3 mb-3">
						      <label for="validationCustom05">Zip</label>
						      <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
						      <div class="invalid-feedback">
						        Please provide a valid zip.
						      </div>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="form-check">
						      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
						      <label class="form-check-label" for="invalidCheck">
						        Agree to terms and conditions
						      </label>
						      <div class="invalid-feedback">
						        You must agree before submitting.
						      </div>
						    </div>
						  </div>
						  <button class="btn btn-primary" type="submit">Submit form</button>
						</form>

						
						<form>
							<div class="form-group">
								<label for="exampleFormControlInput1">Email</label>
								<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
							</div>
							<div class="form-group row">
								<label for="password">Password</label>
								<input type="password" id="password" name="password" placeholder="Password" class="form-control">
							</div>
							<input type="submit" name="" value="LOGIN" class="btn btn-dark rounded-0 float-right">
						</form>
					</div>
					<div class="card-footer p-0 border-0">
						<div class="row">
							<div class="col pr-0">
								<button class="btn btn-block bg-white p-3 rounded-0" disabled>REGISTER</button>
							</div>
							<div class="col pl-0">
								<a href="login.php" class="btn btn-block btn-dark p-3 rounded-0">LOGIN</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Fetch all the forms we want to apply custom Bootstrap validation styles to
	    var forms = document.getElementsByClassName('needs-validation');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();
	</script>
</body>
</html>