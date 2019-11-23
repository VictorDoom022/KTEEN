<?php 
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_admin.php';
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
	<script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<?php 
	$site = 'Menu';
	include '../layout/top_nav_admin.php';
	include '../layout/side_nav_admin.php';
	$sql = "SELECT name FROM menu_approve WHERE approve = '0';";
	$result = mysqli_query($conn, $sql);
	$menu2approve = mysqli_num_rows($result);
	?>
	<div class="container-fluid">
		<div class="row pt-2">
			<div class="col-2"></div>
			<main class="col-10">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-sm-5 col-md-4 col-lg-3">
							<a href="menu_approve.php" class="btn bg-white mt-2 shadow-sm k-hover-shadow">Menu Approve <?= $menu2approve == '0'? '': '<span class="badge badge-danger">'. $menu2approve .'</span>'; ?>
							</a>
						</div>
						<div class="col-12 col-sm-7 col-md-8 col-lg-9">
							<div class="input-group shadow-sm k-hover-shadow mt-2">
								<div class="input-group-prepend">
									<div class="input-group-text border-0 bg-white">
										<i class="fas fa-search"></i>
									</div>
							    </div>
								<input type="search" id="search" name="search" placeholder="Search" class="form-control border-0">
								<div id="result"></div>
							</div>
						</div>
					</div>
					<div class="pt-2" id="menu"></div>
				</div>
			</main>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$.ajax({
				url: "menu_list.php",
				success: function(result){
					$("#menu").html(result);
				}
			});
		});
	</script>
</body>
</html>