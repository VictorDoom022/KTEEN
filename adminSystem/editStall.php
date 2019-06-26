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
//edit
if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $stallName = $_POST['stall_name'];
    $ownerName = $_POST['owner_name'];
    $email = $_POST['email'];
    $phoneNo = $_POST['contact_no'];
    $password = $_POST['password'];

    $target_dir = "../images/stall/"; //folder name
    $target_file = $target_dir.$image; //type of image
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

    $sql = "UPDATE stall SET stall_name = '$stallName', owner_name = '$ownerName' , email = '$email',contact_no = '$phoneNo', password = '$password'where id = '$id'";
    $result = $conn->query($sql);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
                    <a href="index.php" class="nav-link w-100">
                        <i class="fas fa-arrow-left"></i>
                        <span class="d-none d-md-inline-flex ml-3">BACK</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <main class="col-10 p-4">
                <div class="container">
                    <div class="row">
                        <?php 
                        if (isset($_GET['sid'])) {
                            $stall_ID = test_input($_GET['sid']);
                        }
                        $sql = "SELECT * FROM stall WHERE ID = '$stall_ID'";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 1) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="k-card card col-12 px-0">
                            <div class="card-header bg-white p-0 m-0" style=";position: relative;">
                                <div class="row p-0 m-0" style="height: 200px;overflow: hidden;">
                                    <img src="../images/stall/<?php echo $row['image']; ?>" style="width: 100%;height: 500px;align-self: center;vertical-align: center;opacity: 0.7;">
                                </div>
                            </div>
                            <form action="index.php" method="post" enctype="multipart/form-data">
                                <div class="card-body" style="position: relative;">
                                    <img class="rounded-circle" src="../images/stall/<?php echo $row['image']; ?>" style="position: absolute;top: -60px;left: 60px;height: 100px;width: 100px;">
                                    <div class="pt-5 px-5">
                                        <div class="form-row">
                                            <div class="form-group col-md">
                                                <label for="stall_name">Stall Name</label>
                                                <input type="text" name="" id="stall_name" class="form-control" value="<?php echo $row['stall_name'] ?>">
                                            </div>
                                            <div class="form-group col-md">
                                                <label for="owner_name">Owner Name</label>
                                                <input type="text" name="" id="owner_name" class="form-control" value="<?php echo $row['owner_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="owner_name">Email</label>
                                                <input type="text" name="" id="owner_name" class="form-control" value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md">
                                                <label for="stall_name">NRIC</label>
                                                <input type="text" name="" id="stall_name" class="form-control" value="<?php echo $row['NRIC'] ?>">
                                            </div>
                                            <div class="form-group col-md">
                                                <label for="owner_name">Contact No</label>
                                                <input type="text" name="" id="owner_name" class="form-control" value="<?php echo $row['contact_no']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white container-fluid">
                                    <input type="submit" name="" value="SUBMIT" class="btn btn-dark float-right mb-2">
                                </div>
                            </form>
                        </div>
                        <?php
                            }
                        }
                        ?>
                        
                    </div>
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
</script>
</html>