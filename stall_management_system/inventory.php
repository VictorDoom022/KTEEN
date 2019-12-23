<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_stall.php';
include '../config/test_input.php';
include '../process/handle_delete_inventory.php';
?>
<!DOCTYPE html>
<html>
<head>
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
					<div class="col-12 col-sm-5 col-md-4 col-lg-1">
						<div class="btn-group shadow-sm m-2">
							<a href="add_inventory.php" class="btn bg-white">
								<i class="fas fa-plus"></i>
							</a>
						</div>
					</div>
					<div class="col-12 col-sm-7 col-md-8 col-lg-10">
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

				<div class="row">
				<?php 
					$stallID = $_SESSION['kteen_stall_id'];
					$sql = "SELECT * FROM inventory where stall_ID = '$stallID'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
				?>
					<div class=" col-12 col-md-6 col-lg-4 p-1">
						<a href="#modal<?php echo $row['ID']; ?>" class="text-decoration-none text-reset" data-toggle="modal">
							<div class="k-card card k-hover-shadow">
								<div class="row no-gutters">
									<div class="col-8">
										<div class="card-body">
											<div class="card-title mb-0">
												<?php echo $row['name']; ?>
											</div>
											<div class="card-text">
												<small class="text-muted mt-0">
													<?php echo $row['description']; ?>
												</small>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>

					<!-- modal -->
					<div class="modal fade" id="modal<?= $row['ID']; ?>" role="dialog">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<div class="row">
										<div class="col-8 pt-4">
											<div class="row pb-2">
												<div class="col">
													<div class="row">
														<small class="text-muted col">Name</small>
														<div class="w-100"></div>
														<div class="col">
															<?php echo $row['name']; ?>
														</div>
													</div>
												</div>
												<div class="col">
													<div class="row">
														<small class="text-muted col">Unit type</small>
														<div class="w-100"></div>
														<div class="col">
															<?php echo $row['unit']; ?>
														</div>
													</div>
												</div>
											</div>
											<div class="row pb-2">
												<div class="col">
													<div class="row">
														<small class="text-muted col">Price per Unit (RM)</small>
														<div class="w-100"></div>
														<div class="col">
															<?php echo $row['price']; ?>
														</div>
													</div>
												</div>
												<div class="col">
													<div class="row">
														<small class="text-muted col">Date added</small>
														<div class="w-100"></div>
														<div class="col">
															<?php echo $row['date']; ?>
														</div>
													</div>
												</div>
											</div>
											<div class="row pb-2">
												<div class="col">
													<div class="row">
														<small class="text-muted col">Description</small>
														<div class="w-100"></div>
														<div class="col">
															<?php echo $row['description']; ?>
														</div>
													</div>
												</div>
												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col text-right">
											<button class="btn text-secondary" data-dismiss="modal">Close</button>
											<a href="edit_inventory.php?ID=<?= $row['ID']; ?>" class="btn text-warning">Edit</a>
											<button class="btn text-danger" onclick="ComfirmDelete('<?= $row['ID']; ?>')">Delete</button>
											<a href="purchase_send.php?ID=<?= $row['ID']; ?>" class="btn text-primary">Purchase</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- modal end -->
				<?php
					}
				}
				?>
				</div>
			</div>
		</div>
	</main>
</body>
<script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		function ComfirmDelete(x){
			var confirmBox = confirm("Are you sure you want to delete?");
			if (confirmBox == true) {
				window.location.assign("inventory.php?ID="+ x);
			}
		}
	</script>
</html>