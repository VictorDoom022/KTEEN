<?php 
session_start();
include("../config.php");

if (isset($_GET['logout'])) {
	session_destroy();
	echo "<script>window.location.assign('login.php');</script>";
}

if (isset($_SESSION['kteen_stallID'])) {
	$id = $_SESSION['kteen_stallID'];
}else{
	echo "<script>window.location.assign('login.php');</script>";
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_POST['addmenu'])){
	$foodname = $category_ID = $image = $price = "";

	$foodname = test_input($_POST['name']);
	$category_ID = test_input($_POST['category_ID']);
	$image = test_input("S".$id."_".$foodname.".jpg");
	$price = test_input($_POST['price']);

	$sql = "INSERT INTO food (name, stall_ID, category_ID, image, price, available) VALUES ('$foodname', '$id', '$category_ID', '$image', '$price', '1')";
	$result = $conn->query($sql);

	$target_dir = "../images/";
    $target_file = $target_dir.$image;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["addmenu"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg") {
            echo "Sorry, only JPG file are allowed.";
            $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
			echo "Sorry, there was an error uploading your file.";
        }
	}
	$conn->close();
	header('location: menu.php'); 
}

if(isset($_POST['editmenu'])){
	$foodid = $foodname = $category_ID = $image = $price = "";

	$foodid = test_input($_POST['id']);
	$foodname = test_input($_POST['name']);
	$category_ID = test_input($_POST['category_ID']);
	$image = test_input("S".$id."_".$foodname.".jpg");
	$price = test_input($_POST['price']);

	$sql = "UPDATE food SET name = '$foodname', category_ID = '$category_ID', image = '$image', price = '$price' WHERE ID = '$foodid'";
	$result = $conn->query($sql);

	$target_dir = "../images/";
    $target_file = $target_dir.$image;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["editmenu"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg") {
            echo "Sorry, only JPG file are allowed.";
            $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
			echo "Sorry, there was an error uploading your file.";
        }
	}
	$conn->close();
	header('location: menu.php'); 
}

if (isset($_GET['dfid'])) {
	$food_ID = $_GET['dfid'];
	$sql = "UPDATE food SET available ='0' WHERE ID = '$food_ID';";
	$result = $conn -> query($sql);
	$conn->close();
	header("location: menu.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="../css/kteen_style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<title>KTEEN</title>
</head>
<body class="bg-light" onload="filter()">
	<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-10 bg-white border-bottom">
		<span class="navbar-brand h1 mb-0 col"><i class="fas fa-bars d-inline-flex mr-2"></i>Menu</span>
		<ul class="navbar-nav px-4">
			<li class="nav-item">
				<a href="index.php?logout='1'" class="btn btn-outline-dark" role="button" aria-pressed="true">Log Out</a>
			</li>
		</ul>
	</nav>

	<nav class="k-side-nav nav flex-column col-2 border-right bg-white p-0">
        <div class="logo">
            <h2>
                <a href="index.php" class="d-flex d-md-none">K</a>
                <a href="index.php" class="d-none d-md-flex">KTEEN</a>
            </h2>
        </div>
        <div class="k-nav-container h-75">
            <ul class="k-nav nav">
                <li class="nav-item w-100 mb-1">
                    <a href="index.php" class="nav-link w-100">
                        <i class="fas fa-home d-inline-flex px-auto"></i>
                        <span class="d-none d-md-inline-flex ml-3">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item w-100 mb-1">
                    <a href="menu.php" class="nav-link w-100 active">
                        <i class="fas fa-bars d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Menu</span>
                    </a>
                </li>
                <li class="nav-item w-100 mb-1">
                    <a href="report.php" class="nav-link w-100">
                        <i class="far fa-chart-bar d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Report</span>
                    </a>
                </li>
                <li class="nav-item w-100 mb-1">
                    <a href="employee.php" class="nav-link w-100">
                        <i class="fas fa-home d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Employee</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

	<div class="modal fade" id="addfood" tabindex="-1" role="modal">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="header-title">Add Menu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-row">
							<div class="col form-group">
								<label for="name">Food Name</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Food Name" required>
							</div>
							<div class="col form-group">
								<label for="category">Category</label>
								<select name="category_ID" id="category" class="form-control" required>
									<option value="">Select a category</option>
									<?php
									$sql = "SELECT * FROM category";
									$result = $conn -> query($sql);
									if($result->num_rows > 0){
										while($row = $result -> fetch_assoc()){
									?>
									<option value="<?php echo $row['ID'] ?>"><?php echo $row['name'] ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="col-7 form-group">
								<label>Image</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="customFile" name="fileToUpload" required>
									<label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							</div>
							<div class="col form-group">
								<label for="price">Price</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">RM</div>
									</div>
									<input type="number" name="price" id="price" min="0" step="0.05" class="form-control" placeholder="Price" required>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm" data-dismiss="modal">Cancel</button>
						<input type="submit" name="addmenu" class="btn btn-sm btn-warning" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<main class="col-10 p-4">
				<div class="row pb-3">
					<div class="col-12 col-sm-5 col-md-4 col-lg-3">
						<div class="btn-group shadow-sm m-2">
							<a href="#addfood" data-toggle="modal" class="btn bg-white">
								<i class="fas fa-plus"></i>
							</a>
							<a href="" class="btn bg-white"><i class="fas fa-list"></i></a>
							<select name="category" class="btn bg-white" onchange="filter()" id="categoryID">
								<option value="">All</option>
								<?php
									$sql = "SELECT * FROM category";
									$result = $conn -> query($sql);
									if($result->num_rows > 0){
										while($row = $result -> fetch_assoc()){
								?>
								<option value="<?php echo $row['ID'] ?>"><?php echo $row['name'] ?></option>
								<?php
										}
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-12 col-sm-7 col-md-8 col-lg-9">
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
				<div id="menu"></div>
			</main>
		</div>
	</div>
	<script type="text/javascript">
		$(".custom-file-input").on("change", function() {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});

		function deleteMenu(x) {  
			var confirmBox = confirm("Are you sure you want to delete?");
			if (confirmBox == true) {
				window.location.assign("menu.php?dfid="+ x);
			}
		}
		
		function filter(){
			var c = document.getElementById("categoryID").value;
			var k = document.getElementById("search").value;
			var xhttp;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("menu").innerHTML = this.responseText;
				}
			};
			if (c == "" && k == ""){
				xhttp.open("GET", "menucard.php", true);
				xhttp.send();
				return;
			}else if(c == "" && k != ""){
				xhttp.open("GET", "menucard.php?k="+k, true);
				xhttp.send();
				return;
			}else if(c != "" && k == ""){
				xhttp.open("GET", "menucard.php?category="+c, true);
				xhttp.send();
				return;
			}else{
				xhttp.open("GET", "menucard.php?category="+c+"&k="+k, true);
				xhttp.send();
			}
		}
	</script>
</body>
</html>