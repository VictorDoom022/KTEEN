<?php 
session_start();
include '../config/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- css -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<div id="nav"></div>
	<main class="container py-4">
		<div class="jumbotron bg-white shadow">
			<div class="container">
				<p class="text">Transaction History</p>
					<table class="table table-sm">
					<thead>
						<tr>
							<th style="text-align: center;">Type</th>
							<th style="text-align: center;">Date</th>
							<th style="text-align: center;">Amount (RM)</th>
						</tr>
						<?php 
							$username = $_SESSION['customer_username'];
							$typename;
							$sql = "SELECT ID, customer_name, amount,date,type FROM transaction_history where customer_name ='$username' ORDER BY ID DESC;";
							$result = mysqli_query($conn, $sql);
							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
									if($row['type'] == '1'){
										$typename = '<td class="text-success" style="text-align: center;">Top-Up</td>' ;
									}else if($row['type'] == '2'){ 
										$typename = '<td  class="text-danger" style="text-align: center;">Food</td>' ;
									};
						?>
								<tr>
									<?php echo $typename; ?>
									<td style="text-align: center;"><?php echo $row['date']; ?></td>
									<td style="text-align: center;"><?php echo $row['amount']; ?></td>
								</tr>	
						<?php
							}
						}	
						?>
					</thead>
					<table>	
				<hr>
				<a href="wallet.html" class="btn btn-dark">Back to Wallet</a>
			</div>
		</div>
	</main>
</body>
<script src="../js/top-nav-customer.js"></script>
</html>