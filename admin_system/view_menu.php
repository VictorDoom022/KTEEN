<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';


if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}else{
    echo "<script>window.location.assign('login.php');</script>";
}

$stall_ID = "";
if (isset($_GET['sid'])) {
    $stall_ID = test_input($_GET['sid']);
}

//edit
if(isset($_POST['edit_stall_information'])){
    $id = $_POST['stall_ID'];
    $stall_name = $_POST['stall_name'];
    $owner_name = $_POST['owner_name'];
    $email = $_POST['email'];
    $NRIC = $_POST['NRIC'];
    $contact_no = $_POST['contact_no'];

    echo $sql = "UPDATE stall SET stall_name = '$stall_name', owner_name = '$owner_name' , email = '$email',contact_no = '$contact_no', NRIC = '$NRIC'where ID = '$id'";
    $result = $conn->query($sql);
    header("location: index.php");
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["edit_stall_image"])) {
    $stall_image = "S".$stall_ID.'_stall.jpg';
    echo $sql = "UPDATE stall SET stall_image = '$stall_image' WHERE ID = '$stall_ID'";
    $result = $conn->query($sql);
    
    $target_dir = "../images/stall/"; //folder name
    $target_file = $target_dir.$stall_image; //type of image
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["add"])) {
        $check = getimagesize($_FILES["edit_stall_image"]["tmp_name"]);
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
    if ($_FILES["edit_stall_image"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["edit_stall_image"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["edit_stall_image"]["name"]). " has been uploaded.";
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style type="text/css">
        .edit-image-btn{
            opacity: 0;
            position: absolute;
            z-index: 3;
            text-align: center;
            vertical-align: middle;
            height: 100px;
            width: 100px;
            color: white;
            background-color: rgba(0, 0, 0, 0.8);
            font-size: 25px;
            padding: 29px 28px;
        }
        .edit-image:hover .edit-image-btn{
            opacity: 1;
            z-index: 4;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-light">
    <?php 
    $site = 'Edit Stall';
    include '../layout/top_nav_admin.php';
    include '../layout/side_nav_admin.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <main class="col-10 p-4">
                <div class="col-sm-6 col-md-4 p-2">
                    <?php 
                    $sql= "SELECT ID, name, category_ID, image, price , available FROM food where stall_ID = '$stall_ID'";
                    $result = $conn -> query($sql);
                    if ($result->num_rows >0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $category_ID = $row['category_ID'];
                            $image = $row['image'];
                            $price = $row['price'];
                            $available = $row['available'];
                      
                        
                    ?>
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
                            
                                <div class="card-text mb-0">
                                    RM <?php echo $row['price']; ?>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <?php
                       }
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>
    <script src="../js/show_input_image.js"></script>
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

        $("#image").change(function() {
            readURL(this);
        });

        $("#image-2").change(function() {
            readURL(this);
        });
    </script>
</body>
</html>