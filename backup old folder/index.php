<?php include 'server/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- css -->
	<link rel="stylesheet" href="css/kteen_style.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
	<?php include 'layout/topnav.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<main style="margin-top: 20px;">
					<div class="container-fluid">
						<div class="row">
							<div class="k-card col-12 bg-white card p-0">
								<div class="card-body">
									<div class="row">
										<div class="col-2 ml-auto">
											<select class="form-control">
												<option></option>
												<option>Stall</option>
												<option selected>Category</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<?php 
							$category_ID = "SELECT DISTINCT category_ID, category.name AS name FROM food LEFT JOIN category ON food.category_ID = category.ID";
							$result_category_ID = mysqli_query($conn, $category_ID);
							while ($row = mysqli_fetch_assoc($result_category_ID)) {
								$temp = $row['category_ID'];
							?>
							<div class="k-card card col-12 mt-2 p-0">
								<div class="card-header bg-white">
									<h2 class="card-title">
										<?php echo $row['name']; ?>
									</h2>
								</div>
								<div class="card-body bg-light">
									
									<div class="row">
								
							<?php
								
								$sql = "SELECT * FROM food WHERE category_ID = '$temp'";
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
							?>
										<div class="col-3 mb-2">
											<div class="k-card card">
												<div>
												    <img src="images/menu/<?php echo $row['image']; ?>" style="width: 100%;height: 150px;align-self: center;vertical-align: center;">
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col-7">
															<h5 class="card-title">
																<?php echo $row['name']; ?>
															</h5>
														</div>
														<div class="col-5 card-text text-right">
															RM <?php echo $row['price']; ?>
														</div>
													</div>
												</div>
											</div>
										</div>
							<?php
								}
							?>
									</div>
								</div>
							</div>
							<?php
							}
							 ?>
						</div>
					</div>
				</main>
			</div>
		</div>
	</div>
</body>
</html>