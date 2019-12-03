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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
</head>
<body onload="live_search()">
<?php
	$site = 'Purchase';
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>

	<div class="container-fluid">
		<div class="row">
		<div class="col-2"></div>
		<main class="col-10 p-4">
			<div class="k-card card col-12">
				<div class="card-body">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<h4 class="card-title text-center">Receipt Purchase History</h4>
						</div>
					</div>
					<div class="input-group shadow-sm m-2">
						<div class="input-group-prepend">
							<div class="input-group-text border-0 bg-white">
								<i class="fas fa-search"></i>
							</div>
					    </div>
						<input type="search" id="search" name="search" placeholder="Search" class="form-control border-0" oninput="live_search()">
					</div>
					<div class="row">
						<div class="table-responsive">
							<div id="tableContent"></div>
						</div>
					</div>
				</div>
			</div>
		</main>
		</div>
	</div>
</body>
<script>
function live_search(){
		var word = document.getElementById("search").value;
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("tableContent").innerHTML = this.responseText;
			}
		};
		if(word == ""){
			xhttp.open("GET", "purchase_receiptTable.php", true);
			xhttp.send();
			return;
		}else if(word != ""){
			xhttp.open("GET" , "purchase_receiptTable.php?word="+word, true);
			xhttp.send();
			return;
		}
	}
</script>
</html>
