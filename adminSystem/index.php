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
	$stallName = $_POST['stallName'];
	$ownerName = $_POST['ownerName'];
	$email = $_POST['email'];
	$phoneNo = $_POST['phoneNo'];
	$password = $_POST['password'];

	$sql = "UPDATE stall SET stallName = '$stallName', ownerName = '$ownerName' , email = '$email',phoneNo = '$phoneNo', password = '$password'where id = '$id'";
	$result = $conn->query($sql);
}

if(isset($_POST['add'])){
		$stallName = $_POST['stallName'];
		$ownerName = $_POST['ownerName'];
		$email = $_POST['email'];
		$phoneNo = $_POST['phoneNo'];
		$password = $_POST['password'];
		$password = md5($password);

		$sql = "INSERT into stall(stall_name, owner_name, email, contact_no, password, status) values ('$stallName','$ownerName','$email','$phoneNo','$password', '1')";
		$result = $conn->query($sql);
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
		<span class="navbar-brand h1 mb-0 col"><i class="fas fa-bars d-inline-flex mr-2"></i>Stalls</span>
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

				<div class="modal fade" id="addstall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add Stall</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post" action="index.php">
	            					<div class="form-group">
	    								<label for="stallName">Stall Name</label>
	    								<input type="text" class="form-control" placeholder="Enter stall name" name="stallName" id="stallName">
	  								</div>
	  							<div class="form-group">
	    								<label for="exampleInputEmail1">Owner Name</label>
	    								<input type="text" class="form-control" placeholder="Enter owner's name" name="ownerName" id="ownerName">
	  							</div>
	  							<div class="form-group">
	    							<label for="exampleInputEmail1">Email address</label>
	    							<input type="email" class="form-control" placeholder="Enter email" name="email" id="email">
	  							</div>
	  							<div class="form-group">
	    							<label for="exampleInputPassword1">Phone No</label>
	    							<input type="number" class="form-control" placeholder="Enter contact number" name="phoneNo" id="phoneNo">
	  							</div>
	  							<div class="form-group">
	    							<label for="exampleInputPassword1">Password</label>
	    							<input type="password" class="form-control" placeholder="Password" name="password" id="password">
	  							</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary bg-dark" data-dismiss="modal">Close</button>
													
								<input type="submit" class="btn btn-primary bg-warning bg-dark" value="Add" name="add">
							</div>
								</form>
						</div>
					</div>
*				</div>
				<div>
					<div id="stall"></div>
				</div>
			</main>
		</div>
	</div>
</body>
<script>
	function ComfirmDelete(){
		return confirm("Are you sure you want to delete?");
	}

	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').trigger('focus')
	})

// 	function showResult(str) {
//   if (str.length==0) { 
//     document.getElementById("livesearch").innerHTML="";
//     document.getElementById("livesearch").style.border="0px";
//     return;
//   }
//   if (window.XMLHttpRequest) {
//     // code for IE7+, Firefox, Chrome, Opera, Safari
//     xmlhttp=new XMLHttpRequest();
//   } else {  // code for IE6, IE5
//     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//   }
//   xmlhttp.onreadystatechange=function() {
//     if (this.readyState==4 && this.status==200) {
//       document.getElementById("livesearch").innerHTML=this.responseText;
//       document.getElementById("livesearch").style.border="1px solid #A5ACB2";
//     }
//   }
//   xmlhttp.open("GET","livesearch.php?q="+str,true);
//   xmlhttp.send();
// }
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