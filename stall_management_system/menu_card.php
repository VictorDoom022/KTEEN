<?php 
session_start();
include('../config/config.php');
$filterCategory = "";

if(isset($_GET['c'])){
    $filterCategory = " AND category_ID = '".$_GET['c']."'";
}

$keyword = "";
if (isset($_GET['k'])) {
    $keyword = " AND food.name LIKE '%".$_GET['k']."%'";
}
?>
<div class="row">
    <?php
    $sql = "SELECT food.ID AS ID, food.name AS name, category.name AS category, category.ID as category_ID, image, price, available FROM food LEFT JOIN category ON food.category_ID = category.ID WHERE stall_ID = '".$_SESSION['kteen_stall_id']."' AND available = '1'".$filterCategory.$keyword;
    $result = $conn -> query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
            $category_ID = $row['category_ID'];
            $price = $row['price'];
            $image = $row['image'];
    ?>
    <div class="col-sm-6 col-md-4 p-2">
        <a href="#modal_<?= $row['ID'] ?>" data-toggle="modal" class="text-decoration-none text-reset">
            <div class="k-card card k-hover-shadow h-100">
                <div class="row no-gutters">
                    <div class="col-5">
                        <img style="width: 100%;height: 125px;" src="../images/menu/<?php echo $image; ?>">
                    </div>
                    <div class="col-7">
                        <div class="card-body">
                            <div class="card-title h5 mb-0">
                                <?= $row['name']; ?>
                            </div>
                            <div class="card-text">
                                <small class="text-muted">
                                    <?= $row['category']; ?>
                                </small>
                            </div>
                            <div class="card-text mb-0">
                                RM <?php echo $row['price']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php 
    include 'menu_modal.php';
        } 
    } else if($keyword != ""){
    ?>
    <div class="col">
        <h4 class="text-center"><?php echo "No result for '".$_GET['k']."'"; ?></h4>
    </div>
    <?php
    }else if($filterCategory == ""){
    ?>
    <div class="col">
        <h4 class="text-center">
            Click the <i class="fas fa-plus"></i> button to add Food
        </h4>
    </div>
    <?php
    }
    ?>
</div>