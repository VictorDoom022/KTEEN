<?php
include("../config.php");

session_start();
//logout
if (isset($_GET['logout'])) {
	session_destroy();
	echo "<script>window.location.assign('login.php');</script>";
}

if(isset($_SESSION['username'])){
			$username = $_SESSION['username'];
}else{
	echo "<script>window.location.assign('login.php');</script>";
}
//delete item
if(isset($_GET['del'])){
	if($_GET['del'] != ''){
		$id = $_GET['del'];
		$sql = "DELETE FROM stall where id = '$id'"; 
		$result = $conn->query($sql);
	}
}
//edit
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$stallName = $_POST['stall_name'];
	$ownerName = $_POST['owner_name'];
	$email = $_POST['email'];
	$phoneNo = $_POST['contact_no'];
	$password = $_POST['password'];

	$sql = "UPDATE stall SET stall_name = '$stallName', owner_name = '$ownerName' , email = '$email',contact_no = '$phoneNo', password = '$password'where id = '$id'";
	$result = $conn->query($sql);
}

if(isset($_POST['add'])){
		$stallName = $_POST['stallName'];
		$ownerName = $_POST['ownerName'];
		$NRIC = $_POST['NRIC'];
		$email = $_POST['email'];
		$phoneNo = $_POST['phoneNo'];
		$password = $_POST['password'];
		$image= $stallName.'.jpg';
		$password = md5($password);
		
		$sql = "INSERT into stall(stall_name, owner_name,NRIC,image ,email, contact_no, password, status) values ('$stallName','$ownerName','$NRIC','$image','$email','$phoneNo','$password', '1')";
		$result = $conn->query($sql);

		$target_dir = "../images/stall/"; //folder name
		$target_file = $target_dir . $image; //type of image
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["add"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
	
	
}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/kteen_style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>
</head>
<body class="bg-light" onload="filter()">
	<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-10 bg-white border-bottom">
		<span class="navbar-brand h1 mb-0 col"><i class="fas fa-bars d-inline-flex mr-2"></i>Stall</span>
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
                    <a href="menu.php" class="nav-link w-100 active">
                        <i class="fas fa-bars d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Home</span>
                    </a>
                </li>
                 
            </ul>
        </div>
    </nav>

	<div class="modal fade" id="addstall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Stall</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="index.php">
					<div class="modal-body">
						<div class="form-row">
							<div class="col form-group">
								<label for="stallName">Stall Name</label>
								<input type="text" class="form-control" placeholder="Enter stall name" name="stallName" id="stallName">
							</div>
						</div>
						<div class="form-row">
							<div class="col form-group">
								<label for="exampleInputEmail1">Owner Name</label>
								<input type="text" class="form-control" placeholder="Enter owner's name" name="ownerName" id="ownerName">
							</div>
						</div>
						<div class="form-row">
							<div class="col form-group">
								<label for="exampleInputEmail1">NRIC NO</label>
								<input type="text" class="form-control" placeholder="Enter NRIC" name="NRIC" id="NRIC">
							</div>
							<div class="col form-group">
								<label>Image</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept="image/*" required>
									<label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" placeholder="Enter email" name="email" id="email">
							</div>
							<div class="col form-group">
								<label for="exampleInputPassword1">Phone No</label>
								<input type="number" class="form-control" placeholder="Enter contact number" name="phoneNo" id="phoneNo" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col form-group">
								<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
							</div>
							<div class="col form-group">
								<label for="exampleInputPassword1">Comfirm Password</label>
								<input type="password" class="form-control" placeholder="Password" name="Comfirm password" id="password1" required>
								<div class="invalid-feedback" role="alert" id="validate-status"></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-sm btn-dark" value="Submit" name="add" id="submitbtn">
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
							<a href="#addstall" data-toggle="modal" class="btn bg-white">
								<i class="fas fa-plus"></i>
							</a>
							<a href="" class="btn bg-white"><i class="fas fa-list"></i></a>
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
							<div id="result"></div>
						</div>
					</div>
				</div>
				<div>
					<div id="stall"></div>
				</div>
			</main>
		</div>
	</div>
</body>
<script>
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	function ComfirmDelete(){
		return confirm("Are you sure you want to delete?");
	}

	$('#password1').on('keyup', function () {
  		if ($('#password').val() == $('#password1').val()) {
    		$('#validate-status').html('Matched').css('display', 'none');
    		$('#submitbtn').removeAttr('disabled');
  		} 
  		if ($('#password').val() != $('#password1').val()) {
    		$('#validate-status').html('The password Not Match').css('display', 'flex');
    		// document.getElementById("add").diabled = true;
    		$('#submitbtn').attr('disabled','disabled');
  		}
	});

	function filter(){
		var k = document.getElementById("search").value;
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("stall").innerHTML = this.responseText;
			}
		};
		if(k == ""){
			xhttp.open("GET", "stall.php", true);
			xhttp.send();
			return;
		}else if(k != ""){
			xhttp.open("GET" , "stall.php?k="+k, true);
			xhttp.send();
			return;
		}
	}
</script>
</html>