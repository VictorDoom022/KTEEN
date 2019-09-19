<?php 
include '../config/test_input.php';

if(isset($_GET['id'])){
    $food_id = test_input($_GET['id']);
    $sql = "SELECT * FROM food WHERE ID = '$food_id';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $food_name = $row['name'];
            $category_ID = $row['category_ID'];
            $price = $row['price'];
            $image = $row['image'];
        }
    }
}


if(isset($_POST['add_menu'])){
    $food_id = test_input($_POST['food_id']);
    $food_name = $category_ID = $image = $price = "";

    $food_name = test_input($_POST['name']);
    $category_ID = test_input($_POST['category_ID']);
    $image = test_input("S".$_SESSION['kteen_stall_id']."_".$food_name.".jpg");
    $price = test_input($_POST['price']);

    echo $sql = "UPDATE food SET name = '$food_name', category_ID= '$category_ID', price = '$price' WHERE id = '$food_id';";
    $result = $conn->query($sql);

    $target_dir = "../images/menu/";
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
    // delete file already exists
    if (file_exists($target_file)) {
            unlink($target_file.$image);
            echo 'deleted exists file';
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
            echo "<script>alert('Edit Successful')</script>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $conn->close();
    header('location: menu.php');
}

?>