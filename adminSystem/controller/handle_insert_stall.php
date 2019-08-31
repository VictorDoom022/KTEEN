<?php 

if(isset($_POST['add'])){
	$stallName = $ownerName = $NRIC = $email = $phoneNo = $password = $image = "";

	$stall_name = test_input($_POST['stallName']);
	$owner_name = test_input($_POST['ownerName']);
	$NRIC = test_input($_POST['NRIC']);
	$email = test_input($_POST['email']);
	$contact_no = test_input($_POST['phoneNo']);
	$password = test_input($_POST['password']);
	$password = md5($password);

	$getmaxid = "SELECT MAX(ID) AS LAST_ID FROM stall";
	$result_getMax = $conn->query($getmaxid);
	if($result_getMax->num_rows > 0){
		while ($getMaxRow = $result_getMax->fetch_assoc()) {
			$maxID = number_format($getMaxRow['LAST_ID']) + 1;
			
		}
	}else{
		$maxID = '1';
	}

	$stall_image = "S".$maxID.'_stall.jpg';
	$owner_image = "S".$maxID.'_owner.jpg';
	
	$sql = "INSERT into stall(stall_name, owner_name, NRIC, owner_image, stall_image, contact_no, email, password, status) values ('$stall_name','$owner_name','$NRIC','$owner_image', '$stall_image', '$contact_no', '$email', '$password', '1')";
	$result = $conn->query($sql);

	$target_dir = "../images/stall/"; //folder name
	$target_file = $target_dir.$stall_image; //type of image
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
    if(isset($_POST["stall_image"])) {
        $check = getimagesize($_FILES["stall_image"]["tmp_name"]);
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
    if ($_FILES["stall_image"]["size"] > 500000) {
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
		if (move_uploaded_file($_FILES["stall_image"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["stall_image"]["name"]). " has been uploaded.";
        } else {
			echo "Sorry, there was an error uploading your file.";
        }
	}

	$target_dir_owner = "../images/stall/owner/"; //folder name
	$target_file_owner = $target_dir_owner.$owner_image; //type of image
	$uploadOk_owner = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
    if(isset($_POST["add"])) {
        $check = getimagesize($_FILES["owner_image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file_owner)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["owner_image"]["size"] > 500000) {
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
		if (move_uploaded_file($_FILES["owner_image"]["tmp_name"], $target_file_owner)) {
			echo "The file ". basename( $_FILES["owner_image"]["name"]). " has been uploaded.";
        } else {
			echo "Sorry, there was an error uploading your file.";
        }
	}
	$conn->close();
	header('location: index.php'); 
}

?>