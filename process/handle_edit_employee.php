<?php 
include '../config/test_input.php';

if(isset($_GET['employee_un'])){
    $employee_username = test_input($_GET['employee_un']);
    $sql = "SELECT name, NRIC, image, contact_no, username, address, position, salary FROM staff WHERE username = '$employee_username';";
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
?>