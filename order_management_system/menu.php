<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_staff.php';
include '../process/handle_hide_menu.php';
include '../process/handle_action_menu.php';
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

	<title>Menu</title>
</head>
<body onload="live_search()">
	<?php 
	$site = "Menu";
	include '../layout/top_nav_staff.php';
	include '../layout/side_nav_staff.php';
	?>
	<main class="container-fluid">
		<div class="row py-3">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="container-fluid">
					<div id="view"></div>
				</div>
			</div>
		</div>
	</main>
	<script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript">
		function live_search(){
			// category = document.getElementById('category').value;
			// var keyword = document.getElementById("keyword").value;
			var xhttp;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("view").innerHTML = this.responseText;
				}
			};
			// if (category == "" && keyword == ""){
				xhttp.open("GET", "menu_card.php", true);
				xhttp.send();
				return;
			// }else if(category == "" && keyword != ""){
			// 	xhttp.open("GET", "menu_card.php?k="+keyword, true);
			// 	xhttp.send();
			// 	return;
			// }else if(category != "" && keyword == ""){
			// 	xhttp.open("GET", "menu_card.php?c="+category, true);
			// 	xhttp.send();
			// 	return;
			// }else{
			// 	xhttp.open("GET", "menu_card.php?c="+category+"&k="+keyword, true);
			// 	xhttp.send();
			// 	return;
			// }
		}
	</script>
</body>
</html>