<?php
session_start();
include '../config/config.php';
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="col-md-1 pl-0 pt-3" style="position: fixed;">
			<button class="w-100 btn btn-dark shadow-sm mb-2">All</button>
			<?php
			$sql = "SELECT * FROM category;";
			$result_catergory = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result_catergory) > 0) {
				while ($row = mysqli_fetch_assoc($result_catergory)) {
			?>
			<button class="w-100 btn bg-white shadow-sm mb-2">
				<?= $row['name']; ?>
			</button>
			<?php
				}
			}
			?>
		</div>
		<div class="row pt-3">
			<div class="col-md-1 pr-0"></div>
			<div class="col-md-7 pr-0">
				<?php
				$sql = "SELECT food.ID AS food_id, stall.username AS stall_username, food.name AS name, price, image FROM food LEFT JOIN stall ON food.stall_ID = stall.ID WHERE stall_id = '" . $_SESSION['stall_ID'] . "' AND available = '1';";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)) {
				?>
				<div data-food_id="<?= $row['food_id']; ?>" class="k-card card mb-2 bg-white p-3 rounded-0 k-hover-shadow add_order" style="cursor: pointer;">
					<div class="row">
						<div class="col-3">
							<img src="../images/<?= $row['stall_username'] ?>/menu/<?= $row['image'] ?>" alt="" style="width: 100%;height: 125px;">
						</div>
						<div class="col-9" style="position: relative">
							<p class="h5 food_name"><?= $row['name']; ?></p>
							<p>
								RM <span class="price"><?= $row['price']; ?></span>
							</p>
						</div>
					</div>
				</div>
				<?php
					}
				}
				?>
			</div>
			<div class="col-md-4" style="position: fixed;right: 0;height: 100vh;">
				<div class="k-card card" style="height: 95%;">
					<div class="card-header bg-white">
						<div class="h5 m-0">Order Detail</div>
					</div>
					<div class="card-body" style="overflow: auto">
						<table class="table table-sm table-borderless">
							<thead>
								<tr>
									<th>Food Name</th>
									<th>Quantity</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody id="order_list"></tbody>
						</table>
					</div>
					<div class="card-footer bg-white">
						<div class="row">
							<div class="col-8">
								<button id="send_order_btn" class="btn btn-block btn-dark">Send Order</button>
							</div>
							<div class="col-4">
								<button onclick="window.close()" role="button" class="btn btn-block">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		function is_exist(array, id){
			for(var i = 0; i < array.length; i++){
				if(array[i].id == id){
					return true;
				}
			}
		}

		$(document).ready(function() {
			var orders = [];
			$('.add_order').click(function() {
				var food_id = $(this).attr('data-food_id');
				var food_name = $(this).find('.food_name').html();
				var food_price= $(this).find('.price').html();
				if(orders.length != 0){
					if(is_exist(orders, food_id)){
						for(var i = 0; i < orders.length; i ++){
							if(orders[i].id == food_id){
								orders[i].quantity++;
								console.log(orders[i].quantity);
							}
						}
					}else{
						orders.push({id : food_id, name : food_name, quantity : 1,price : food_price});
					}
				}else{
					orders.push({id : food_id, name : food_name, quantity : 1,price : food_price});
				}
				
				//init order_list
				$('#order_list').html('');
				//load data into order_list
				var total_price = 0;
				for(var i = 0; i < orders.length; i++){
					total_price += (orders[i].price * orders[i].quantity);
					$('#order_list').append(
						"<tr>"+
						"<td>"+ orders[i].name +"</td>"+
						"<td>"+ orders[i].quantity +"</td>"+
						"<td>RM "+ (orders[i].price * orders[i].quantity) +"</td>"+
						"</tr>"
					);
				}
				$('#order_list').append(
					'<tr class="border-top">'+
					"<td></td>"+
					"<td>Total price :</td>"+
					"<td>RM "+ total_price +"</td>"+
					"</tr>"
				);
				console.log(typeof orders);
				console.log(orders);
			});
			$('#send_order_btn').click(function() {
				$.ajax({
					type: 'POST',
					url: "../process/handle_add_order.php",
					data: {order_list: JSON.stringify(orders)},
					dataType: 'json',
					success: function(data) {
						if(data.status == 0){
							alert(data.msg);
						}else{
							alert(data.msg);
							window.close();
						}
					},
					error: function() {
						alert("Something error!");
					}
				});
			});
		});
	</script>
</body>
</html>