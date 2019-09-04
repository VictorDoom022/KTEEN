<?php 
session_start();
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

	<script src="../js/show_input_image.js"></script>
	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<?php 
	$site = 'Menu';
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>
	<main class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="k-card card mt-3">
					<div class="card-body">
						<form action="" method="" enctype="">
							<div class="h3 pl-5 mb-0">Food Detail</div>
							<hr class="mt-0">
							<div class="row">
								<div class="col-md-4">
									<div class="mx-auto" style="position: relative;height: 250px;width: 250px;">
										<img src="../images/food_image.png" style="width: 250px;height: 250px;position: absolute;" id="food_image">
										<input type="file" name="" id="image" data-target="#food_image" style="opacity: 0;width: 100%;height: 100%;">
										<label class="btn btn-dark m-0" for="image" style="position: absolute;right: -10px;bottom: 5px;">Browse</label>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group row">
										<label class="col-md-3 col-form-label text-nowrap">Food ID :</label>
										<div class="col-md-9">
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label text-nowrap">Food Name :</label>
										<div class="col-md-9">
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Price :</label>
										<div class="col-md-9">
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Category :</label>
										<div class="col-md-9">
											<select class="form-control">
												<option></option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="h3 pl-5 mb-0">Op</div>
							<hr class="mt-0">
							<div class="row">
								<div class="col-12 text-right">
									<input type="submit" name="" class="btn btn-dark">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		$("#image").change(function() {
			readURL(this);
		});
	</script>
	
</body>
</html>