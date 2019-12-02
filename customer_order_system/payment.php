<?php
session_start();
include '../config/config.php';

$customer_username = $_SESSION['customer_username'];
$sql = "SELECT amount FROM wallet WHERE username = '$customer_username'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
	$amount = mysqli_fetch_assoc($result)['amount'];
}
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
	<main class="container py-3" style="position: relative;">
		<div class="k-card card" id="order_list_card">
			<div class="card-body">
				<table class="table table-sm table-borderless">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Quantity</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody id="order_item"></tbody>	
				</table>
			</div>
		</div>
		<div class="k-card card my-3 mx-2" style="position: absolute;right: 1500px;top: 0;width: 95%;" id="order_number_panel">
			<div class="card-body">
				Your order number is
				<div id="order_number" class="text-center font-weight-bold" style="font-size: 150px;"></div>
			</div>
		</div>
	</main>
	<div class="bg-white text-center container-fluid" id="c_payment_method_footer_bar" style="position: fixed;bottom: 0;left: 0;height: 55px;width: 100%;">
		<div class="row p-2">
			<button class="btn btn-danger col mx-2" id="btn_cash">Cash</button>
			<button class="btn col mx-2" id="btn_e_wallet">E-wallet</button>
		</div>
	</div>
	<div class="bg-white text-center container-fluid" id="back2home" style="position: fixed;bottom: 0;left: 0;height: 55px;width: 100%;display: none;">
		<div class="row p-2">
			<a href="index.html" class="btn btn-dark btn-block mx-2">Back To Home</a>
		</div>
	</div>
	<script src="../js/top-nav-customer.js"></script>
	<script src="../js/orders.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var order_item = [];
			var totalPrice = 0;

			function generate_order_list(){
				var count_order_group = order_item.length;
				var table = document.getElementById("order_item");
				table.innerHTML = "";

				for (var i = 0; i < count_order_group; i++) {
					var row = table.insertRow(-1);
					var noCell = row.insertCell(0);
					var nameCell = row.insertCell(1);
					var quantityCell = row.insertCell(2);
					var priceCell = row.insertCell(3);
					noCell.innerHTML = i + 1;
					nameCell.innerHTML = order_item[i].getName;
					quantityCell.innerHTML = order_item[i].getQuantity;
					var price = order_item[i].getTotalPrice;
					priceCell.innerHTML = "RM "+ price;

					totalPrice += price;
				}
				var row = table.insertRow(-1);
				row.insertCell(0);
				row.insertCell(1);
				var totalLabelCell = row.insertCell(2);
				var totalPriceCell = row.insertCell(3);
				totalLabelCell.innerHTML = "Total";
				totalPriceCell.innerHTML = "RM"+ totalPrice;
			}

			$.ajax({
				type: 'POST',
				url: "../process/handle_if_logout_customer.php",
				dataType: 'json',
				success: function(data){
					if (data.status == 0) {
						window.location.assign("login.php");
					}else{
						if (sessionStorage.getItem("stall_username") == null) {
							window.location.assign("index.html");
						}else{
							if(sessionStorage.getItem("order_list") !== null){
								stall_name = sessionStorage.getItem("stall_username");
								temp =  JSON.parse(sessionStorage.getItem("order_list"));
								for (var i = 0; i < temp.length; i++) {
									order_item.push(new Orders(temp[i]['food_id'], temp[i]['name'], temp[i]['quantity'], temp[i]['price']));
								}
								generate_order_list();
								if(totalPrice > <?= $amount ?>){
									$("#btn_e_wallet").addClass("btn-secondary");
								}else{
									$("#btn_e_wallet").addClass("btn-success");
								}
							}
						}
					}
				}
			});
			$("#btn_e_wallet").click(function() {
				if(totalPrice > <?= $amount ?>){
					alert("Please TopUP your e-wallet!");
					window.location.assign("wallet.html");
				}else{
					$.post("../process/handle_add_order_customer.php", { //get stall_info
						order_list: JSON.stringify(order_item), 
						stall_username: stall_name,
						e_wallet: 1
					}, function(data, status) {
						$("#order_number").html(data);
						sessionStorage.removeItem("stall_username");
						sessionStorage.removeItem("order_list");
					});

					$("#order_list_card").animate({left: '-1500px'});
					$("#order_number_panel").animate({left: '0'});
					$("#c_payment_method_footer_bar").fadeOut();
					$("#back2home").fadeIn();
				}
			});

			$("#btn_cash").click(function() {
				$.post("../process/handle_add_order_customer.php", { //get stall_info
					order_list: JSON.stringify(order_item), 
					stall_username: stall_name,
				}, function(data, status) {
					$("#order_number").html(data);
					sessionStorage.removeItem("stall_username");
					sessionStorage.removeItem("order_list");
				});
				$("#order_list_card").animate({left: '-1500px'});
				$("#order_number_panel").animate({left: '0'});
				$("#c_payment_method_footer_bar").fadeOut();
				alert("Go to stall and pay");
				$("#back2home").fadeIn();
			});
		});
	</script>
</body>
</html>