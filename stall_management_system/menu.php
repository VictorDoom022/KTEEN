<?php 
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_stall.php';
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

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
</head>
<body onload="live_search()">
	<?php
	$site = 'Menu';
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>
	<main class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="row">
					<div class="col-12 col-sm-5 col-md-4 col-lg-3">
						<div class="btn-group shadow-sm m-2">
							<a href="add_menu.php" class="btn bg-white">
								<i class="fas fa-plus"></i>
							</a>
							<button class="btn bg-white" onclick="change_view(this)"><i class="fas fa-grip-horizontal"></i></button>
							<select name="position" class="btn bg-white" onchange="live_search()" id="category">
								<option value="">All</option>
								<?php 
								$sql = "SELECT * FROM category";
								$result = mysqli_query($conn, $sql);
								if(mysqli_num_rows($result) > 0){
									while ($row = mysqli_fetch_assoc($result)) {
								?>
								<option value="<?= $row['ID'] ?>"><?= $row['name'] ?></option>
								<?php
									}
								}
								 ?>
							</select>
						</div>
					</div>
					<div class="col-12 col-sm-7 col-md-8 col-lg-9">
						<div class="input-group shadow-sm m-2">
							<div class="input-group-prepend">
								<div class="input-group-text border-0 bg-white">
									<i class="fas fa-search"></i>
								</div>
						    </div>
							<input type="search" id="keyword" name="search" placeholder="Search" class="form-control border-0" oninput="live_search()">
						</div>
					</div>
				</div>
				<div id="view"></div>
				<nav aria-label="..." class="row text-right">
					<ul class="pagination">
						<li class="page-item disabled">
							<span class="btn">
								<i class="fas fa-angle-left"></i>
							</span>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item active" aria-current="page">
							<span class="page-link">
							2
						<span class="sr-only">(current)</span>
					</span>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">3</a></li>
				    <li class="page-item">
				      <a class="btn" href="#">
				      	<i class="fas fa-angle-right"></i>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		var view = 'card';

		function change_view(btn){
			if (view == 'card') {
				view = "list";
				btn.innerHTML = '<i class="fas fa-list"></i>';
			}else{
				view = "card";
				btn.innerHTML = '<i class="fas fa-grip-horizontal"></i>';
			}
			live_search();
		}
		function live_search(){
			category = document.getElementById('category').value;
			var keyword = document.getElementById("keyword").value;
			var xhttp;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("view").innerHTML = this.responseText;
				}
			};
			if (category == "" && keyword == ""){
				xhttp.open("GET", "menu_"+ view +".php", true);
				xhttp.send();
				return;
			}else if(category == "" && keyword != ""){
				xhttp.open("GET", "menu_"+ view +".php?k="+keyword, true);
				xhttp.send();
				return;
			}else if(category != "" && keyword == ""){
				xhttp.open("GET", "menu_"+ view +".php?c="+category, true);
				xhttp.send();
				return;
			}else{
				xhttp.open("GET", "menu_"+ view +".php?c="+category+"&k="+keyword, true);
				xhttp.send();
				return
			}
		}
	</script>
</body>
</html>