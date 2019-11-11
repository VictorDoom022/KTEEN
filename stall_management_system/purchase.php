<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_stall.php';
include '../process/handle_delete_supplier.php';
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
</head>
<body>
	<?php
	$site = 'Purchase';
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>

	<main class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="row">
					<div class="col-12 col-sm-7 col-md-6 col-lg-5">
						<div class="btn-group shadow-sm m-2">
							<a href="add_supplier.php" class="btn bg-white">
								<i class="fas fa-plus"></i>
							</a>
							
						</div>
						<div class="btn-group shadow-sm m-2">
							<a href="sentPurchase.php" class="btn bg-white">
								Check Sent Email
							</a>
						</div>
						<div class="btn-group shadow-sm m-2">
							<a href="add_purchase.php" class="btn bg-white">
								Add purchase
							</a>
						</div>
					</div>
					<div class="col-12 col-sm-5 col-md-6 col-lg-7">
						<div class="input-group shadow-sm m-2">
							<div class="input-group-prepend">
								<div class="input-group-text border-0 bg-white">
									<i class="fas fa-search"></i>
								</div>
						    </div>
							<input type="search" id="search" name="search" placeholder="Search" class="form-control border-0" oninput="filter()">
						</div>
					</div>
				</div>
				<?php include 'purchase_card.php'; ?>
			</div>
		</div>
	</main>

<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script>
		function ComfirmDelete(x){
			var confirmBox = confirm("Are you sure you want to delete?");
			if (confirmBox == true) {
				window.location.assign("purchase.php?ID="+ x);
			}
		}
	</script>
</body>
</html>