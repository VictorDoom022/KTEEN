<?php
session_start();
include '../config/config.php';
include '../process/handle_if_logout_stall.php';
include '../process/handle_change_password_stall.php';
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<?php
	$site = "Settings";
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>
	<main class="container-fluid">
		<div class="row pt-3">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="k-card bg-white p-4 mb-4">
					<div class="h4">
						Info
					</div>
					<hr>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-9"></div>
							<div class="col-md-3 text-right">
								<button class="btn btn-dark btn-sm edit">Edit</button>
							</div>
						</div>
					</div>
				</div>
				<div class="k-card bg-white mb-4 p-4">
					<div class="h4">
						Security
					</div>
					<hr>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-9">Change password</div>
							<div class="col-md-3 text-right">
								<button class="btn btn-dark btn-sm edit" data-target="#change_password_panel">Edit</button>
							</div>
						</div>
						<div id="change_password_panel" style="display: none;" class="pt-4">
							<div class="row bg-light border p-3">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="m-0">
										<div class="form-group row">
											<label class="col-form-label col-md-3" style="font-size: 0.85rem;">Current password</label>
											<div class="col-md-9">
												<input type="password" name="current_password" class="form-control form-control-sm">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-3" style="font-size: 0.85rem;">New password</label>
											<div class="col-md-9">
												<input type="password" name="" class="form-control form-control-sm">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-3" style="font-size: 0.9rem;">Retype new password</label>
											<div class="col-md-9">
												<input type="password" name="" class="form-control form-control-sm">
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-12 text-right">
												<input type="submit" name="change_password" class="btn btn-dark btn-sm">
											</div>
										</div>
									</form>
								</div>
								<div class="col-md-2"></div>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".edit").click(function(){
				if ($(this).html() == "Edit") {
					$($(this).attr("data-target")).fadeIn();
					$(this).html("Cancel");
				}else{
					$($(this).attr("data-target")).fadeOut();
					$(this).html("Edit");
				}
			});
		});
	</script>
</body>
</html>