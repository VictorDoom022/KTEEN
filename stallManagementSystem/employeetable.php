<?php 
session_start();
include('../config.php');
$filterCategory = "";
if(isset($_GET['category'])){
    $filterCategory = " AND position = '".$_GET['category']."'";
}

$keyword = "";
if (isset($_GET['k'])) {
    $keyword = " AND staff.name LIKE '%".$_GET['k']."%'";
}
?>
<div class="row">
    <?php
        $sql = "SELECT * FROM staff WHERE stall_ID = '".$_SESSION['kteen_stallID']."' AND available = '1'".$filterCategory.$keyword;
        $result = $conn -> query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { 
                    $staff_ID = $row['ID'];
                    $employee_name = $row['name'];
                    $employee_position = $row['position'];
                    $birthday= $row['birthday'];
                    $contact = $row['contact_no'];
                    $image = $row['image'];
                    $ic = $row['NRIC'];
                    $salary = $row['salary'];
                    $address = $row['address'];
    ?>
    <div class="col-sm-6 col-md-4 col-lg-3 p-2">
        <div class="k-card card k-hover-shadow h-100">
            <div>
                <img src="../images/staff/<?php echo $image; ?>" style="width: 100%;height: 200px;align-self: center;vertical-align: center;">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $employee_name; ?></h5>
                <p class="card-text">
                    <small class="text-muted"><?php echo $employee_position; ?></small>
                </p>
                <p class="card-text">
                    <small class="text-muted"><?php echo $contact; ?></small>
                </p>
            </div>
            <div class="card-footer bg-white">
                <div class="row">
                    <div class="col-6 text-center">
                        <a href="#editemployee<?php echo $staff_ID; ?>" data-toggle="modal" class="card-link text-warning mx-auto"><i class="fas fa-pen"></i></a>
                    </div>
                    <div class="col-6 text-center">
                        <a onclick="delete_employee(<?php echo $staff_ID; ?>)" class="card-link text-danger"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editemployee<?php echo $staff_ID; ?>" tabindex="-1" role="modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="header-title">Edit Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="employee.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $staff_ID; ?>">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="name">Employee Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo $employee_name; ?>" required>
                            </div>
                            <div class="col form-group">
                                <label for="position">Position</label>
                                <select name="position" id="position" class="form-control" value="<?php echo $employee_position; ?>" required>
                                    <option value="head chef">Head Chef</option>
                                    <option value="kitchen porter">Kitchen Porter</option>
                                    <option value="dishwasher">Dishwasher</option>
                                    <option value="counter">Counter</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-7 form-group">
                                <label>Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="col form-group">
                                <label>Contact Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+60</div>
                                    </div>
                                    <input type="number" name="number" id="number" min="0" step="0.05" class="form-control"  value="<?php echo $contact; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-7 form-group">
                                <label>IC Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="ic" name="ic" id="ic" class="form-control" value="<?php echo $ic; ?>" required>
                                </div>
                            </div>
                            <div class="col form-group">
                                <label>Birthday</label>
                                <div class="input-group">
                                    <input type="date" name="birthday" id="birthday" class="form-control"  value="<?php echo $birthday; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-7 form-group">
                                <label>Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="text" name="address" id="address" class="form-control" value="<?php echo $address; ?>" required>
                                </div>
                            </div>
                            <div class="col form-group">
                                <label>Basic Salary</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="number" name="salary" id="salary" value="<?php echo $salary; ?>" min="0" step="10" class="form-control"  required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="edit_employee" class="btn btn-sm btn-warning" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } 
    } else if($keyword != ""){
    ?>
    <div class="col">
        <h4 class="text-center"><?php echo "No result for '".$_GET['k']."'"; ?></h4>
    </div>
    <?php
    }else{
    ?>
    <div class="col">
        <h4 class="text-center">
            Click the <i class="fas fa-plus"></i> button to add Staff
        </h4>
    </div>
    <?php
    }
    ?>
</div>