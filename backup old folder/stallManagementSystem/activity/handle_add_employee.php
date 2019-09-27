<?php
$error = '';
if (isset($_POST['add_employee'])) {
	$employee_name = $_POST['name'];
	$NRIC = $_POST['NRIC'];
	$contact_no = $_POST['contact_no'];
	$address = $_POST['address'];

	$employee_id = $_POST['employee_id'];
	$password = $_POST['password'];
	$position = $_POST['position'];
	$salary = $_POST['salary'];

	$image = $employee_id . '.jpg';
	
	$target_dir = "../images/staff/";
    $target_file = $target_dir.$image;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	
	$sql = "INSERT INTO staff (stall_ID, name, NRIC, contact_no, address, employee_ID, password, position, salary, image, available) VALUES ('$ID', '$employee_name', '$NRIC', '$contact_no', '$address', '$employee_id', '$password', '$position', '$salary', '$image', '1')";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	
	if(isset($_POST["image"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $error = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $error = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
            $error = "Sorry, file already exists.";
            $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg") {
            $error = "Sorry, only JPG file are allowed.";
            $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
            $error = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $error = "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            header('location: add_employee.php');
        } else {
            $error = "Sorry, there was an error uploading your file.";
            header('location: add_employee.php');
        }
    }

	header('location: employee.php');
}
?>