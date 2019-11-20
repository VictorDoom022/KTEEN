<?php 
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_admin.php';


if(isset($_POST['approve'])){
    $ID = $_POST['ID'];
    $approve = $_POST['approve'];

    $sql = "UPDATE menu_approve SET approve = '$approve' WHERE ID = '$ID'";
    $result = mysqli_query($conn, $sql);

    //store to food table
    $name = $_POST['name'];
	$stall_ID = $_POST['stall_ID'];
	$category_ID = $_POST['category_ID'];
	$image = $_POST['image'];
	$price = $_POST['price'];

	$sql = "INSERT INTO food(name, stall_ID, category_ID, image, price, available) VALUES ('$name', '$stall_ID', '$category_ID' , '$image', '$price', '0')";
	$result = $conn->query($sql);
}

if(isset($_POST['reject'])){
    $ID = $_POST['ID'];
    $reject = $_POST['approve'];

    $sql = "UPDATE stall_approve SET approve = '$reject' WHERE ID = '$ID'";
    $result = $conn->query($sql);
}
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
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<title>Admin</title>
</head>
<body>
	<?php 
	$site = 'Manage';
	include '../layout/top_nav_admin.php';
	include '../layout/side_nav_admin.php';
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<main class="col-10 container-fluid">
				<div class="row pt-3">
					<?php
					$sql = "SELECT menu_approve_id, username, menu_approve.name, stall_ID, category.name AS category_name ,image, price FROM menu_approve LEFT JOIN stall ON menu_approve.stall_ID = stall.ID LEFT JOIN category ON menu_approve.category_ID = category.ID WHERE approve = '0'";
					$result = mysqli_query($conn ,$sql);

					if(mysqli_num_rows($result) >0){
						while($row = mysqli_fetch_assoc($result)){
							$ID = $row['menu_approve_id'];
							$username = $row['username'];
							$name = $row['name'];
							$stall_ID = $row['stall_ID'];
							$category_name = $row['category_name'];
							$image = $row['image'];
							$price = $row['price'];
						?>
						<div class="col-12">
							<div class="k-card card k-hover-shadow h-100">
								<div class="card-body">
									<div class="row">
										<div class="col-5 col-md-2">
											<img src="../images/menu2approve/<?= $username ?>/<?= $image; ?>" class="w-100 h-100">
										</div>
										<div class="col-7 col-md-10 my-auto">
											<div class="row">
												<div class="col-md-9 my-auto">
													<div class="h4 mb-0"><?= $name; ?></div>
													<div class="text-muted"><small><?= $category_name; ?></small></div>
													<div>RM <?= $price; ?></div>
												</div>
												<div class="col-md-3 text-center my-auto">
													<button class="btn btn-sm btn-success">Approve</button>
													<button class="btn btn-sm btn-danger">reject</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="card-body border bg-light mx-3">
									
								</div> -->
							</div>
	                	</div>
						<?php 
							}
						}else{
						?>
						<div class="col text-center h3 pt-3">No Action Need</div>
						<?php
						}
						?>
				</div>
			</main>
		</div>
	</div>
</body>
</html>