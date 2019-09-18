<?php 
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_admin.php';


if(isset($_POST['approve'])){
    $ID = $_POST['ID'];
    $approve = $_POST['approve'];

    $sql = "UPDATE stall_approve SET approve = '$approve' WHERE ID = '$ID'";
    $result = $conn->query($sql);

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
	
	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<title>Admin</title>
</head>
<body>
	<?php 
	$site = 'menu_approve';
	include '../layout/top_nav_admin.php';
	include '../layout/side_nav_admin.php';
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<main class="col-10">
				<div class="row">
					<?php
					$sql = "SELECT ID, name, stall_ID, category_ID ,image, price FROM stall_approve WHERE approve = '0'";
					$result = $conn -> query($sql);

					if($result ->num_rows >0){
						while($row = $result -> fetch_assoc()){
							$ID = $row['ID'];
							$name = $row['name'];
							$stall_ID = $row['stall_ID'];
							$category_ID = $row['category_ID'];
							$image = $row['image'];
							$price = $row['price'];
						?>
						<div class="col-12 col-md-6 col-lg-4 p-2">
							<form action="menu_approve.php" method="post" enctype="multipart/form-data">
							<div class="k-card card k-hover-shadow h-100">
								<div class="row no-gutters">
		                    <div class="col-5">
		                        <img style="width: 100%;height: 125px;" src="../images/menu/<?php echo $image; ?>">
		                    </div>
		                    <div class="col-7">
		                        <div class="card-body">
		                            <div class="card-title h5 mb-0">
		                                <?= $row['name']; ?>
		                            </div>
		                            <div class="card-text">
		                                <small class="text-muted">
		                                    <?= $row['stall_ID']; ?>
		                                </small>
		                            </div>
		                            <div class="card-text mb-0">
		                                RM <?php echo $row['price']; ?>
		                            </div> 
		                            <input type="hidden" name="ID" id="ID" value="<?= $ID?>">
		                            <input type="hidden" name="name" id="name" value="<?= $name ?>">
		                            <input type="hidden" name="stall_ID" id="stall_ID" value="<?= $stall_ID ?>">
		                            <input type="hidden" name="category_ID" id="category_ID" value="<?= $category_ID?> ">
		                            <input type="hidden" name="image" id="image" value="<?= $image ?>">
		                            <input type="hidden" name="price" id="price" value="<?= $price ?>">

		                            <input type="hidden" name="approve" id="approve" value="1">
		                            <input type="hidden" name="reject" id="reject" value="2">

		                            <button class="btn btn-outline-success">Approve</button>
		                            <button type="reject" class="btn btn-outline-danger">Reject</button>
		                    
		                        </div>
		                    </div>
                </div>
						</div>
						</form>
						<?php 
							}
						}
						?>
					</div>
				<!-- <?php include 'stall_card.php'; ?> -->
			</main>
		</div>
	</div>
</body>
</html>