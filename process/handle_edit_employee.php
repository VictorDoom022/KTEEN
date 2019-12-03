<?php 
include '../config/test_input.php';

if(isset($_GET['employee_id'])){
    $employee_id = test_input($_GET['employee_id']);
    $sql = "SELECT name, NRIC, image, contact_no, username, address, position, salary FROM staff WHERE ID = '$employee_id';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $employee_name = $row['name'];
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
    // header("location: index.php");
}

if (isset($_POST['edit_employee'])) {
    $employee_id = $employee_name = $NRIC = $image = $contact_no = $address = $salary = $image = "";

    $employee_id = test_input($_POST['employee_id']);
    $employee_name = test_input($_POST['employee_name']);
    $NRIC = test_input($_POST['NRIC']);
    $contact_no = test_input($_POST['contact_no']);
    $address = test_input($_POST['address']);
    $position = test_input($_POST['position']);
    $address = test_input($_POST['address']);
    $salary = test_input($_POST['salary']);


    $sql = "UPDATE staff SET name = '$employee_name', NRIC = '$NRIC', contact_no = '$contact_no', address = '$address', position = '$position', salary = '$salary' WHERE ID = '$employee_id';";
    mysqli_query($conn, $sql);

    // if(){

    // }
    // header("location: employee.php");
}
?>