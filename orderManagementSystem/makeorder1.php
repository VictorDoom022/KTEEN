<?php
include("../config.php");

session_start();


	//logout
	if(isset($_GET['u'])){
			if ($_GET['u'] == 'logout') {
				session_destroy();

				echo "<script>window.location.assign('stafflogin.html');</script>";
				}
		}

	if($_SESSION['staffid']!= ''){
				$staffid = $_SESSION['staffid'];
			}else{
				echo "<script>window.location.assign('stafflogin.html');</script>";
			}

	if(isset($_POST['in'])){
		$staffid = $_POST['staffid'];
		
		$sql = "INSERT into attendancein (staffid, date , time) values ('$staffid', CURDATE(), CURTIME())";
		echo "<script>alert('Punch Card Successfull');</script>";
		$result = $conn->query($sql);

	}

	if(isset($_POST['on'])){
		$staffid = $_POST['staffid'];
		
		$sql = "INSERT into attendancein (staffid, date , time) values ('$staffid', CURDATE(), CURTIME())";
		echo "<script>alert('Punch Card Successfull');</script>";
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
<body class="bg-light">
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
                    <a href="staffmain.php" class="nav-link w-100">
                        <i class="fas fa-bars d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Punch In</span>
                    </a>
                    <a href="makeorder.php" class="nav-link w-100 active">
                        <i class="fas fa-hamburger d-inline-flex"></i>
                        <span class="d-none d-md-inline-flex ml-3">Make Order</span>
                    </a>
                </li>    
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<main class="col-10 p-4">
				<form action="makeorder.php" method="post">
            		<div class="row">
            			
            			<?php
            				$sql = "SELECT ID, name, image, price from food where available = 1";

            				$result = $conn-> query($sql);

            				if($result -> num_rows >0){
            					while ($row = $result -> fetch_assoc()){
            						$ID=$row['ID'];
            						$name=$row['name'];
            						$image=$row['image'];
            						$price=$row['price'];

            			?>
	            			<div class="col-md-6">
	            				<div class="card">
	            					<img src="images/<?php echo $image; ?>" class="img-fluid">
		            				<div class="card-body">
		            					<h5 class="card-title"><?php echo $name; ?></h5>
		            					<p class="card-text">RM <?php echo $price; ?></p>
		            					<input class="btn btn-primary bg-dark" type="submit" value="add" name="add">
		            				</div>
		            			</div>
	            			</div>
	            		<?php
	            		   		}
            				}
            			?>
            		</div>
            		
            	</form>
			</main>
		</div>
	</div>

    

</body>
<script>


</script>
</html>