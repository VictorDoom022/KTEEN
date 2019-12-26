<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_admin.php';

$stall_ID = "";
if (isset($_GET['su'])) {
    $stall_username = test_input($_GET['su']);
    $sql = "SELECT ID, username, stall_image, owner_image, stall_name, owner_name, NRIC, contact_no, email FROM stall WHERE username = '$stall_username';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $stall_ID = $row['ID'];
            $owner_name = $row['owner_name'];
            $username = $row['username'];
            $stall_image = $row['stall_image'];
            $owner_image = $row['owner_image'];
            $stall_name = $row['stall_name'];
            $NRIC = $row['NRIC'];
            $contact_no = $row['contact_no'];
            $email = $row['email'];
        }
    }
    $sql = "SELECT weekday, start_time, end_time FROM opening_time WHERE stall_ID = '$stall_ID';";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $ckd = "checked";
        $monday = $tuesday = $wednesday = $thursday = $friday = $saturday = $sunday = "";
        while ($row = mysqli_fetch_assoc($result)) {
            if($row['weekday'] == 0){
                $monday = $ckd;
            }elseif ($row['weekday'] == 1) {
               $tuesday = $ckd;
            }elseif ($row['weekday'] == 2) {
               $wednesday = $ckd;
            }elseif ($row['weekday'] == 3) {
               $thursday = $ckd;
            }elseif ($row['weekday'] == 4) {
               $friday = $ckd;
            }elseif ($row['weekday'] == 5) {
               $saturday = $ckd;
            }elseif ($row['weekday'] == 6) {
               $sunday = $ckd;
            }
        }
    }
}else{
    header("location: index.php");
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
    <script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
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
<body>
    <?php 
    $site = 'Edit Stall';
    include '../layout/top_nav_admin.php';
    include '../layout/side_nav_admin.php';
    ?>
    <main class="container-fluid">
        <div class="row py-3">
            <div class="col-2"></div>
            <div class="col-10">
                <div class="k-card card">
                    <form id="add_stall_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                        <div class="row no-gutters">
                            <div style="position: relative;width: 100%;height: 250px;">
                                <img src="../images/<?= $stall_username; ?>/<?= $stall_image; ?>" style="height: 250px; width: 100%;position: absolute;" id="img-stall">
                                <input type="file" name="stall_image" id="input-stall-image" accept="image/*" required style="position: absolute;width: 100%;height: 100%;opacity: 0;" data-target="#img-stall">
                                <label for="input-stall-image" class="btn btn-light" style="position: absolute;right: 10px;bottom: 5px;"><i class="fas fa-camera"></i></label>
                                <div style="position: absolute;top: 50%;left: 3%;">
                                    <div style="position: relative;width: 250px;height: 250px;">
                                        <img src="../images/<?= $stall_username; ?>/<?= $owner_image; ?>" class="rounded-circle" style="width: 250px;height: 250px;position: absolute;" id="img-owner">
                                        <input type="file" name="owner_image" id="input-owner-image" data-target="#img-owner" accept="image/*" style="width: 250px;height: 250px;position: absolute;border-radius: 50%;opacity: 0;" required>
                                        <label for="input-owner-image" class="btn btn-dark" style="position: absolute;bottom: 10px;right: 20px;z-index: 2;"><i class="fas fa-camera"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-title h3">
                                        Personal Detail
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="owner_name" value="<?= $owner_name; ?>" class="form-control <?= $owner_name_valid ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">NRIC</label>
                                        <div class="col-md-9">
                                            <input type="text" name="NRIC" value="<?= $NRIC; ?>" class="form-control <?= $NRIC_valid ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Contact No</label>
                                        <div class="col-md-9">
                                            <input type="text" name="contact_no" value="<?= $contact_no; ?>" class="form-control <?= $contact_no_valid ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" name="email" value="<?= $email; ?>" class="form-control <?= $email_valid ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="col-12 card-title h3">
                                Account
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Username</label>
                                        <div class="col-md-9">
                                            <input type="text" name="username" class="form-control <?= $username_valid ?>" value="<?= $username ?>" readonly required>
                                            <div class="invalid-feedback">
                                                The username has been taken. Please try another.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Stall Name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="stall_name" class="form-control <?= $stall_name_valid ?>" value="<?= $stall_name; ?>" required>
                                            <div class="invalid-feedback">
                                                Stall already existed. Please try again.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h3">
                                Opening time
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-7">
                                    <table class="table table-sm table-borderless">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Weekday</th>
                                                <th>opening time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr <?= ($sunday != "")? 'class="table-success"': ''; ?>>
                                                <td>
                                                    <input type="checkbox" name="sunday" class="cb-weekday" <?= $sunday ?>>
                                                </td>
                                                <td>Sunday</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="time" name="sunday_start" class="form-control" <?= ($sunday == "")? 'disabled': 'required'; ?>>
                                                        <div class="input-group-prepend input-group-append">
                                                            <span class="input-group-text">-</span>
                                                        </div>
                                                        <input type="time" name="sunday_end" class="form-control" <?= ($sunday == "")? 'disabled': 'required'; ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr <?= ($monday != "")? 'class="table-success"': ''; ?>>
                                                <td>
                                                    <input type="checkbox" name="monday" class="cb-weekday" <?= $monday ?>>
                                                </td>
                                                <td>Monday</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="time" name="monday_start" class="form-control" <?= ($monday == "")? 'disabled': 'required'; ?>>
                                                        <div class="input-group-prepend input-group-append">
                                                            <span class="input-group-text">-</span>
                                                        </div>
                                                        <input type="time" name="monday_end" class="form-control" <?= ($monday == "")? 'disabled': 'required'; ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr <?= ($tuesday != "")? 'class="table-success"': ''; ?>>
                                                <td>
                                                    <input type="checkbox" name="tuesday" class="cb-weekday" <?= $tuesday ?>>
                                                </td>
                                                <td>Tuesday</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="time" name="tuesday_start" class="form-control" <?= ($tuesday == "")? 'disabled': 'required'; ?>>
                                                        <div class="input-group-prepend input-group-append">
                                                            <span class="input-group-text">-</span>
                                                        </div>
                                                        <input type="time" name="tuesday_end" class="form-control" <?= ($tuesday == "")? 'disabled': 'required'; ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr <?= ($wednesday != "")? 'class="table-success"': ''; ?>>
                                                <td>
                                                    <input type="checkbox" name="wednesday" class="cb-weekday" <?= $wednesday ?>>
                                                </td>
                                                <td>Wednesday</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="time" name="wednesday_start" class="form-control" <?= ($wednesday == "")? 'disabled': 'required'; ?>>
                                                        <div class="input-group-prepend input-group-append">
                                                            <span class="input-group-text">-</span>
                                                        </div>
                                                        <input type="time" name="wednesday_end" class="form-control" <?= ($wednesday == "")? 'disabled': 'required'; ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr <?= ($thursday != "")? 'class="table-success"': ''; ?>>
                                                <td>
                                                    <input type="checkbox" name="thursday" class="cb-weekday" <?= $thursday ?>>
                                                </td>
                                                <td>Thursday</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="time" name="thursday_start" class="form-control" <?= ($thursday == "")? 'disabled': 'required'; ?>>
                                                        <div class="input-group-prepend input-group-append">
                                                            <span class="input-group-text">-</span>
                                                        </div>
                                                        <input type="time" name="thursday_end" class="form-control" <?= ($thursday == "")? 'disabled': 'required'; ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr <?= ($friday != "")? 'class="table-success"': ''; ?>>
                                                <td>
                                                    <input type="checkbox" name="friday" class="cb-weekday" <?= $friday ?>>
                                                </td>
                                                <td>Friday</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="time" name="friday_start" class="form-control" <?= ($friday == "")? 'disabled': 'required'; ?>>
                                                        <div class="input-group-prepend input-group-append">
                                                            <span class="input-group-text">-</span>
                                                        </div>
                                                        <input type="time" name="friday_end" class="form-control" <?= ($friday == "")? 'disabled': 'required'; ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr <?= ($saturday != "")? 'class="table-success"': ''; ?>>
                                                <td>
                                                    <input type="checkbox" name="satuday" class="cb-weekday" <?= $saturday ?>>
                                                </td>
                                                <td>Saturday</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="time" name="saturday_start" class="form-control" <?= ($saturday == "")? 'disabled': 'required'; ?>>
                                                        <div class="input-group-prepend input-group-append">
                                                            <span class="input-group-text">-</span>
                                                        </div>
                                                        <input type="time" name="saturday_end" class="form-control" <?= ($saturday == "")? 'disabled': 'required'; ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button class="btn text-danger">Cancel</button>
                                    <input type="submit" name="add_stall" class="btn" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="../js/show_input_image.js"></script>
    <script type="text/javascript">
        $(".cb-weekday").change(function() {
            var table_row = $(this).parent().parent();
            table_row.toggleClass("table-success");
            var input_time = table_row.find("input[type='time']");
            if(input_time.prop("required")){
                input_time.prop("required", false);
                input_time.prop("disabled", true);
            }else{
                input_time.prop("required", true);
                input_time.prop("disabled", false);
            }
        });

        $("#input-stall-image").change(function() {
            readURL(this);
        });
        $("#input-owner-image").change(function() {
            readURL(this);
        });
    </script>
</body>
</html>