<?php
if(isset($_POST['add_Invoice'])){
	//echo '<script>alert("wtf");</script>';
	$invoice_number = $_POST['invoice_number'];
	$stall_ID = $_SESSION['kteen_stall_id'];
	$supplier_name = $_POST['supplier_name'];
	$invoice_date = $_POST['invoice_date'];
	$invoice_due = $_POST['invoice_due'];
	$invoice_amount = $_POST['invoice_amount'];
	//$invoice_file = ("S".$_SESSION['kteen_stall_id']."_".$supplier_name.".doc");
	
	// name of the uploaded file
    $filename = $_FILES['invoice_file']['name'];

    // destination of the file on the server
    $destination = '../uploads/Invoice/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['invoice_file']['tmp_name'];
    $size = $_FILES['invoice_file']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['invoice_file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO invoice (invoice_number, stall_ID,supplier_name,invoice_date,invoice_due,invoice_amount,invoice_file,date_add)
			 VALUES ('$invoice_number','$stall_ID','$supplier_name','$invoice_date','$invoice_due','$invoice_amount','$filename',NOW())";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("File Upload Success!");</script>';
            }
        } else {
            echo "Failed to upload file.";
        }
    }

}

if(isset($_POST['add_Bill'])){
	//echo '<script>alert("ok");</script>';
	$bill_number = $_POST['bill_number'];
	$stall_ID = $_SESSION['kteen_stall_id'];
	$supplier_name = $_POST['supplier_name'];
	$bill_date = $_POST['bill_date'];
	$bill_amount = $_POST['bill_amount'];

	// name of the uploaded file
    $filename = $_FILES['bill_file']['name'];

    // destination of the file on the server
    $destination = '../uploads/Bill/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['bill_file']['tmp_name'];
    $size = $_FILES['bill_file']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['bill_file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO bill(bill_number, stall_ID,supplier_name,bill_date,bill_amount,bill_file,date_add) 
			values ('$bill_number','$stall_ID','$supplier_name','$bill_date','$bill_amount','$filename',NOW())";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("File Upload Success!");</script>';
            }
        } else {
            echo "Failed to upload file.";
        }
	}
	
}

if(isset($_POST['add_receipt'])){
	//echo '<script>alert("ok");</script>';
	$receipt_number = $_POST['receipt_number'];
	$stall_ID = $_SESSION['kteen_stall_id'];
	$supplier_name = $_POST['supplier_name'];
	$receipt_date = $_POST['receipt_date'];
	$receipt_amount = $_POST['receipt_amount'];

	// name of the uploaded file
    $filename = $_FILES['receipt_file']['name'];

    // destination of the file on the server
    $destination = '../uploads/Receipt/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['receipt_file']['tmp_name'];
    $size = $_FILES['receipt_file']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } else if ($_FILES['receipt_file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO receipt(receipt_number, stall_ID,supplier_name,receipt_date,receipt_amount,receipt_file,date_add) 
			values ('$receipt_number','$stall_ID','$supplier_name','$receipt_date','$receipt_amount','$filename',NOW())";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("File Upload Success!");</script>';
            }
        } else {
            echo "Failed to upload file.";
        }
	}

}
?>