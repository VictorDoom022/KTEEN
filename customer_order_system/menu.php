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
	<title>Menu</title>
</head>
<body>
	<div id="nav"></div>
	<main class="container">
		<div class="row py-2">
			<div class="col">
				<a href="index.html" class="btn btn-dark rounded-0 shadow">
					<i class="fas fa-arrow-left"></i>
				</a>
			</div>
		</div>
		<div class="row pb-3" id="stall_info"></div>
		<div class="row pb-2">
			<div class="col-12 bg-white shadow pl-0 pr-0">
				<div class="input-group">
					<!-- <div class="input-group-prepend">
						<button class="btn btn-block btn-dark rounded-0 px-3" type="button"></button>
					</div> -->
					<input type="search" id="search-bar" placeholder="Search" class="form-control rounded-0 py-4 border-0">
					<div class="input-group-append">
						<button class="btn btn-block btn-dark rounded-0 px-3" id="search-btn">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-bottom: 55px;" id="menu"></div>
	</main>
	<div id="order_list" class="bg-dark col-md-4 p-0" style="display: none;position: fixed;bottom: 0;right: 0;margin: 0;box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.3);z-index: 10;">
		<div id="order_detail" class="bg-white px-4 py-2 text-reset" style="display: none;">
			<div style="height: 350px;overflow: auto;">
				<table class="table table-sm">
					<thead>
						<tr>
							<th>#</th>
							<th>Food Name</th>
							<th>Quantity</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody id="order_item"></tbody>
				</table>
			</div>
			<div class="bg-white px-4 py-2 text-reset border-top text-right">
				<button id="btn-clear" class="btn">Empty</button>
				<a href="payment.php" class="btn">Check out</a>
			</div>
		</div>
		<div id="order_list_footer" class="py-2 px-4 text-white h3" style="cursor: pointer;position: relative;">
			Order List
			<span class="badge badge-danger" id="count_order"></span>
			<span style="position: absolute;right: 20px;">
				<i class="fas fa-caret-up"></i>
			</span>
		</div>
	</div>
	<script src="../js/orders.js"></script>
	<script src="../js/top-nav-customer.js"></script>
	<script type="text/javascript">
		function is_exist(array, id){
			for(var i = 0; i < array.length; i++){
				if(array[i].food_id == id){
					return true;
				}
			}
		}
		
		$(document).ready(function() {
			// this function provide method to refresh the order list
			function generate_order_list(){
				var count_order_group = order_item.length;
				var table = document.getElementById("order_item");
				table.innerHTML = "";
				var totalPrice = 0;

				for (var i = 0; i < count_order_group; i++) {
					var row = table.insertRow(-1);
					var noCell = row.insertCell(0);
					var nameCell = row.insertCell(1);
					var quantityCell = row.insertCell(2);
					var priceCell = row.insertCell(3);
					noCell.innerHTML = i + 1;
					nameCell.innerHTML = order_item[i].getName;
					quantityCell.innerHTML = "<button class='bg-white border-0 mx-1 minus-btn' data-food_id='"+ order_item[i].getFood_id +"'>-</button>x"+ order_item[i].getQuantity +"<button class='bg-white border-0 mx-1 add-btn'>+</button>";
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

			var url = new URL(window.location.href);// get current url
			var c = url.searchParams.get("stall");// get $_GET['stall'] (stall) value form url
			$.post("stall_info.php", { //get stall_info
				stall_username: c
			}, function(data, status) {
				$("#stall_info").html(data);
			});

			$.post("menu_card.php", { //get stall menu
				stall_username: c
			}, function(data, status) {
				$("#menu").html(data);
			});

			$("#search-bar").keyup(function() {
				var keyword = $(this).val();
				$.post("menu_card.php", {
					stall_username: c, 
					food_name: keyword
				}, function(data, status) {
					$("#menu").html(data);
				});
			});
			
			//pagination
			$("#menu").on("click", ".page-link", function() {
				if($("#search-bar").val() == ''){
					var page_num = $(this).attr('data-page');
					$.post("menu_card.php", {
						stall_username: c, 
						page: page_num
					}, function(data, status) {
						$("#menu").html(data);
					});
				}else{
					var keyword = $("#search-bar").val();
					var page_num = $(this).attr('data-page');
					$.post("menu_card.php", {
						stall_username: c, 
						food_name: keyword, 
						page: page_num
					}, function(data, status) {
						$("#menu").html(data);
					});
				}
			});

			// make order
			var order_item = [];
			var count_order_quantity = 0;

			if (sessionStorage.getItem("stall_username") == null) {
				sessionStorage.setItem("stall_username", c);
			}else{
				if(sessionStorage.getItem("stall_username") == c){
					if(sessionStorage.getItem("order_list") !== null){
						temp =  JSON.parse(sessionStorage.getItem("order_list"));
						for (var i = 0; i < temp.length; i++) {
							order_item.push(new Orders(temp[i]['food_id'], temp[i]['name'], temp[i]['quantity'], temp[i]['price']));
							count_order_quantity += order_item[i]['quantity'];
						}
						generate_order_list();
						$("#count_order").html(count_order_quantity);
						$("#order_list").fadeIn();
					}
				}else{
					sessionStorage.setItem("stall_username", c);
					sessionStorage.removeItem("order_list");
				}
			}

			$("#menu").on("click", ".stall_menu", function(){
				var food_id = $(this).attr("data-food_id");
				$.ajax({
					type: 'POST',
					url: "../process/handle_if_logout_customer.php",
					dataType: 'json',
					success: function(data){
						if (data.status == 0) {
							window.location.assign("login.php");
						}else{
							$.post("order_list.php", {
								food_id: food_id
							},function(data) {
								var food_info = JSON.parse(data);
								if(order_item != 0){
									if (is_exist(order_item, food_id)) {
										for (var i = 0; i < order_item.length; i++) {
											if(order_item[i].getFood_id == food_id){
												order_item[i].add_quantity();
											}
										}
									}else{
										order_item.push(new Orders(food_id, food_info.food_name, 1, food_info.price));
									}
									sessionStorage.setItem("order_list", JSON.stringify(order_item));
									count_order_quantity++;
									$("#count_order").html(count_order_quantity);
								}else{
									order_item.push(new Orders(food_id, food_info.food_name, 1, food_info.price));
									sessionStorage.setItem("order_list", JSON.stringify(order_item));
									$("#order_list").fadeIn();
									count_order_quantity++;
									$("#count_order").html(count_order_quantity);
								}
								generate_order_list();
							});
						}
					},
					error: function(){
						alert("Something error!");
					}
				});
			});

			$("#btn-clear").click(function() {
				order_item = [];
				sessionStorage.removeItem("order_list");
				$("#order_detail").fadeToggle();
				count_order_quantity = 0;
				$("#count_order").html("");
				var table = document.getElementById("order_item");
				table.innerHTML = "";
				$("#order_list").fadeOut();
				console.log(order_item);
			});

			$("#order_list_footer").click(function() {
				$("#order_detail").fadeToggle();
			});

			$("#order_item").on("click", ".add-btn", function(){
				var index = $(this).parent().parent().index();//index of table row = array index
				var food_id2minus = $(this).attr("data-food_id");
				order_item[index].add_quantity();
				sessionStorage.setItem("order_list", JSON.stringify(order_item));
				generate_order_list();
				//refresh quantity
				count_order_quantity++;
				$("#count_order").html(count_order_quantity);
			});

			function checkQuantity(order_item){
				return order_item.quantity > 0;
			}

			$("#order_item").on("click", ".minus-btn", function(){
				var index = $(this).parent().parent().index();//index of table row = array index
				var food_id2minus = $(this).attr("data-food_id");
				order_item[index].minus_quantiy();
				order_item = order_item.filter(checkQuantity);
				sessionStorage.setItem("order_list", JSON.stringify(order_item));
				generate_order_list();

				//refresh quantity
				count_order_quantity--;
				$("#count_order").html(count_order_quantity);

				console.log(order_item);
				console.log(food_id2minus);
				console.log(index);
			});
		});
	</script>
</body>
</html>