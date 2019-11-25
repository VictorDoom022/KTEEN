<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_stall.php';
include 'ContactEmail.php';

if (isset($_GET['ID'])) {
	$ID = $_GET['ID'];
	$result = mysqli_query($conn, "SELECT * FROM supplier WHERE ID = '$ID';");
	if (mysqli_num_rows($result) == 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			$name = $row['Name'];
			$email = $row['email'];
		}
	}
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
	<title></title>
	<style>
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
	    /* display: none; <- Crashes Chrome on hover */
    	-webkit-appearance: none;
    	margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
	}

	input[type=number] {
    	-moz-appearance:textfield; /* Firefox */
	}
	</style>
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
				<form method="post" action="">
					<div class="row">
						<div class="k-card card col-12">
							<div class="card-body">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-6">
										<h4 class="card-title text-center">Send Mail to Supplier</h4>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Name</label>
											<div class="col-md-9">
											<input type="text" name="name" class="form-control" value="<?= $name ?>" readonly required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Company Name</label>
											<div class="col-md-9">
												<input type="text" name="company_name" class="form-control" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Product Name</label>
											<div class="col-md-9">
												<input type="text" name="product_name" class="form-control" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Quantity</label>
											<div class="col-md-2">
												<input type="number" name="quantity" class="form-control" id="quantity" onkeyup="calc()" value="0" required>
											</div>

											<label class="col-md-3 col-form-label">Tax (%)</label>
											<div class="col-md-2">
												<input type="number" name="tax" class="form-control" placeholder="%" id="tax" onkeyup="calc()" value="0" required>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">E-mail</label>
											<div class="col-md-9">
												<input id="email" type="email" name="email" class="form-control"  value="<?= $email; ?>" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Title</label>
											<div class="col-md-9">
												<textarea class="form-control" name="title"></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Price per item</label>
											<div class="col-md-9">
												<input type="number" name="price" class="form-control" placeholder="RM" id="price" onkeyup="calc()" value="0" step="0.01" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Total</label>
											<div class="col-md-9">
												<input type="number" name="total" class="form-control" id="total" readonly>
											</div>
										</div>
									</div>

									<hr>

									<div class="col-md-12">
										<div class="form-group row">
											<label class="col-md-1 col-form-label">Context</label>
											<div class="col-md-11">
												<textarea class="form-control" name="context"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="card-footer bg-white text-right">
								<a href="purchase.php" class="btn text-danger">Cancel</a>
								<input type="submit" name="submit" value="Submit" class="btn text-dark">
								
							</div>
						</div>
					</div>
				</form>
			</main>
		</div>
	</div>
	

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script>
		function calc(){
			var price= document.getElementById('price').value;
   			var quantity = document.getElementById('quantity').value;
   			var tax = document.getElementById('tax').value;
   			var temp = price * quantity;
   			var total = 0;
			
			total = temp + ((price * quantity)*(tax / 100)); 
   			document.getElementById('total').value = total;
   			
		}

		/* testSubmit = obj => {
			let form = new FormData(obj);

			for(let x of form.entries()) {
				console.log(x);
			}
		} */
	</script>
</body>

</html>