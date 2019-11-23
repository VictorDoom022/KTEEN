<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
//include '../process/handle_add_supplier.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- bootstrap material -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous"> -->

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

			<ul class="nav nav-tabs" id="myTab" role="tablist">
  				<li class="nav-item">
    				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Invoice</a>
  				</li>
  				<li class="nav-item">
    				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Cash Bill</a>
  				</li>
 				<li class="nav-item">
    				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Receipt</a>
  				</li>
			</ul>

			<div class="tab-content" id="myTabContent">
				<!-- Invoice tab -->
  				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="row">
						<div class="k-card card col-12">
							<div class="card-body">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-12">
										<h4 class="card-title text-center">Invoice</h4>		
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">
												Invoice Number
											</label>
											<div class="col-md-9">
												<input type="text" name="invoice_number" class="form-control" required>

											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Purchase From</label>
												<div class="col-md-9">
													<select class="custom-select mr-sm-2" required>
														<option selected>Choose company</option>
														<?php
															$stallID = $_SESSION['kteen_stall_id'];
															$sql = "SELECT * from supplier where stall_ID= '$stallID'";
															$result = $conn -> query($sql);
															if ($result->num_rows > 0) {
																while ($row = $result->fetch_assoc()) {
														?>
															<option value="<?php echo $row['company_name']; ?>">
																<?php echo $row['company_name']; ?>		
															</option>
														<?php
															}
														}
														?>
													</select>
												</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">
												Date of invoice
											</label>
											<div class="col-md-9">
												<input type="date" name="invoice_date" class="form-control" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">
												Payment Due
											</label>
											<div class="col-md-9">
												<input type="date" name="invoice_due" class="form-control" required>
											</div>
										</div>
									</div>

									<div class="col"><hr></div>

									<div class="col-md-12">
										<div class="form-group row" class="input" class="group">
											<label class="col-md-2 col-form-label">
												Product Name
											</label>
											<div class="col-md-3">
												<input type="text" name="product_name" class="form-control" id="product_name" required>
											</div>

											<label class="col-md-1 col-form-label">
												Price
											</label>
											<div class="col-md-1">
												<input type="number" name="price" class="form-control" id="price" value="0" class="price" required>
											</div>

											<label class="col-md-2 col-form-label">
												Quantity
											</label>
											<div class="col-md-1">
												<input type="number" name="quantity" class="form-control" id="tax"  value="0" class="quantity" required>
											</div>

											<label class="col-md-1 col-form-label">
												Total
											</label>
											<p><span class="output">0</span></p>
												<!-- <div class="col-md-1">
													<input type="number" name="quantity" class="form-control" placeholder="%" id="tax"  value="0" required>
												</div> -->
											</div>
											
											
											<div class="add_area" id="add_area"></div>
											

										</div>
										<button class="add_btn btn-dark" style="border-radius:5spx" id="add">Add</button>
								</div>
								<div class="card-footer bg-white text-right">
									<a href="purchase.php" class="btn text-danger">Cancel</a>
									<input type="submit" name="add_supplier" value="Submit" class="btn text-dark">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of invoice tab -->

				<!-- Cash Bill Tab -->
  				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				    <div class="row">
						<div class="k-card card col-12">
							<div class="card-body">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-12">
										<h4 class="card-title text-center">Cash Bill</h4>		
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">
												Bill Number
											</label>
											<div class="col-md-9">
												<input type="text" name="bill_number" class="form-control" required>

											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Purchase From</label>
												<div class="col-md-9">
													<select class="custom-select mr-sm-2" required>
														<option selected>Choose company</option>
														<?php
															$stallID = $_SESSION['kteen_stall_id'];
															$sql = "SELECT * from supplier where stall_ID= '$stallID'";
															$result = $conn -> query($sql);
															if ($result->num_rows > 0) {
																while ($row = $result->fetch_assoc()) {
														?>
															<option value="<?php echo $row['company_name']; ?>">
																<?php echo $row['company_name']; ?>		
															</option>
														<?php
															}
														}
														?>
													</select>
												</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">
												Date of Bill
											</label>
											<div class="col-md-9">
												<input type="date" name="bill_date" class="form-control" required>
											</div>
										</div>
										
									</div>

									<div class="col"><hr></div>

									<div class="col-md-12">
										<div class="form-group row" class="input" class="group">
											<label class="col-md-2 col-form-label">
												Product Name
											</label>
											<div class="col-md-3">
												<input type="text" name="product_name" class="form-control" id="product_name" required>
											</div>

											<label class="col-md-1 col-form-label">
												Price
											</label>
											<div class="col-md-1">
												<input type="number" name="price" class="form-control" id="price" value="0" class="price" required>
											</div>

											<label class="col-md-2 col-form-label">
												Quantity
											</label>
											<div class="col-md-1">
												<input type="number" name="quantity" class="form-control" id="tax"  value="0" class="quantity" required>
											</div>

											<label class="col-md-1 col-form-label">
												Total
											</label>
											<p><span class="output">0</span></p>
												<!-- <div class="col-md-1">
													<input type="number" name="quantity" class="form-control" placeholder="%" id="tax"  value="0" required>
												</div> -->
											</div>
										</div>
								</div>
								<div class="card-footer bg-white text-right">
									<a href="purchase.php" class="btn text-danger">Cancel</a>
									<input type="submit" name="add_supplier" value="Submit" class="btn text-dark">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Cash Bill Tab -->
  				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				  <div class="row">
						<div class="k-card card col-12">
							<div class="card-body">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-12">
										<h4 class="card-title text-center">Receipt</h4>		
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">
												Receipt Number
											</label>
											<div class="col-md-9">
												<input type="text" name="receipt_number" class="form-control" required>

											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label">Purchase From</label>
												<div class="col-md-9">
													<select class="custom-select mr-sm-2" required>
														<option selected>Choose company</option>
														<?php
															$stallID = $_SESSION['kteen_stall_id'];
															$sql = "SELECT * from supplier where stall_ID= '$stallID'";
															$result = $conn -> query($sql);
															if ($result->num_rows > 0) {
																while ($row = $result->fetch_assoc()) {
														?>
															<option value="<?php echo $row['company_name']; ?>">
																<?php echo $row['company_name']; ?>		
															</option>
														<?php
															}
														}
														?>
													</select>
												</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-md-3 col-form-label">
												Date of Receipt
											</label>
											<div class="col-md-9">
												<input type="date" name="receipt_date" class="form-control" required>
											</div>
										</div>
										
									</div>

									<div class="col"><hr></div>

									<div class="col-md-12">
										<div class="form-group row" class="input" class="group">
											<label class="col-md-2 col-form-label">
												Product Name
											</label>
											<div class="col-md-3">
												<input type="text" name="product_name" class="form-control" id="product_name" required>
											</div>

											<label class="col-md-1 col-form-label">
												Price
											</label>
											<div class="col-md-1">
												<input type="number" name="price" class="form-control" id="price" value="0" class="price" required>
											</div>

											<label class="col-md-2 col-form-label">
												Quantity
											</label>
											<div class="col-md-1">
												<input type="number" name="quantity" class="form-control" id="tax"  value="0" class="quantity" required>
											</div>

											<label class="col-md-1 col-form-label">
												Total
											</label>
											<p><span class="output">0</span></p>
												<!-- <div class="col-md-1">
													<input type="number" name="quantity" class="form-control" placeholder="%" id="tax"  value="0" required>
												</div> -->
											</div>
										</div>
								</div>
								<div class="card-footer bg-white text-right">
									<a href="purchase.php" class="btn text-danger">Cancel</a>
									<input type="submit" name="add_supplier" value="Submit" class="btn text-dark">
								</div>
							</div>
						</div>
					</div>
				</div>
			</dsiv>
  					
				
			</main>
		</div>
	</div>
</body>

<!-- <script>
	function calDate(){
		var invoice_date = document.getElementById('invoice_date').value;
		var payment_due = document.getElementById('payment_due').value;

		var x = new Date(invoice_date);
		var y = new Date(payment_due);
		console.log();

		if (y < x) {
			alert("The invoice date cannot be later than payment date!");
		}
	}

	function calc(){
			var price = document.getElementById('price').value;
   			var quantity = document.getElementById('quantity').value;
   			var total = 0;
			
			total = price*quantity; 
   			document.getElementById('total').value = total;
   			console.log(price);
		}

	document.getElementById('shoppingmallbtn').onclick = function() {
   		document.getElementById("choosecompany").disabled = true;
	};
	
	document.getElementById('purchasefrombtn').onclick = function() {
   		document.getElementById("shoppingmall").disabled = true;
	};


	

	var temp = [];
	$(document).on('click', '#add', function(){
    	var html = '';
  		$('#add_area').append(html);

		  
		for (let x = 0; x < document.querySelectorAll(".group input"); x++) {
			temp.push(0);
		}
		document.querySelectorAll('.group input').forEach((each, index) => {
			each.addEventListener("input",() => {
				calculate(index, each.value);
			})
		});
	});

	 
	 
	 calculate = (idx, val) => {
		 temp.splice(idx,1,val);

		 var total = {
			 quantity: [],
			 price: []
		 };

		 var cul = 0;

		 for (let y = 0; y < temp.length; y++) {
			 if (y % 2 == 0) {
				 total.quantity.push(temp[y]);
			 }else{
				 total.price.push(temp[y]);
			 }
			 
		 }

		 for (let z = 0; z < total.quantity.length; z++) {
			 let hucheng = total.quantity[z] * total.price[z];
			 
			 document.querySelectorAll(".output")[z].innerHTML = hucheng;
			 cul += hucheng;
		 }

		 document.querySelector("#total").innerHTML = cul;
		 //document.querySelector("#total").value = cul;
		 console.log(cul);
	 }

	


</script> -->
</html>