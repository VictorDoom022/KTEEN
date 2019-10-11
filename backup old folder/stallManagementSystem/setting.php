<?php 
session_start();
include '../server/config.php';
include '../server/logout.php';
include 'activity/handle_login.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../css/kteen_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
</head>
<body class="bg-light">
    <?php 
    $site = 'Setting';
    include 'layout/topnav.php';
    include 'layout/sidenav.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <main class="col-10 p-4">
                <div class="col-12 card k-card px-0">
                    <div class="card-header bg-white p-0">
                        <div class="row p-0 m-0" style="height: 200px;overflow: hidden;">
                            <img class="edit-image" src="../images/stall/<?php echo $stall_image; ?>" style="width: 100%;height: 500px;align-self: center;vertical-align: center;opacity: 0.7;">
                        </div>
                    </div>
                    <div class="card-body" style="position: relative;">
                        <div class="edit-image rounded-circle border-0" style="position: absolute;top: -60px;left: 60px;background-image: url(../images/stall/owner/<?php echo $owner_image; ?>);background-size: cover;height: 100px;width: 100px;">
                        </div>
                        <div class="pt-5">
                            
                        </div>
                    </div>
                </div>
            </main>
            
        </div>
    </div>
    
</body>
</html>
