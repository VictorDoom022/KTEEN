<?php 
include '../config/test_input.php';

if(isset($_GET['employee_id'])){
    $employee_id = test_input($_GET['employee_id']);
    $sql = "SELECT name, NRIC, image, contact_no, username, address, position, salary FROM staff WHERE ID = '$employee_id';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $NRIC = $row['NRIC'];
            $image = $row['image'];
            $contact_no = $row['contact_no'];
            $staff_username = $row['username'];
            $address = $row['address'];
            $position = $row['position'];
            $salary = $row['salary'];
        }
    }
}else{
    header("location: index.php");
}

if (isset($_POST['edit_employee'])) {
    $employee_name = $NRIC = $image = $contact_no = $address = $salary = "";

    // $employee_name = test_input($_POST['name']);
    // $NRIC = test_input($_POST['NRIC']);
    // $contact_no = test_input($_POST['contact_no']);uncomplete
    // $employee_name = test_input($_POST['name']);

    // $sql = "UPDATE staff SET name = '',  = '' WHERE ID = '$employee_id';";
    header("location: employee.php");
}
?>