<?php 
include('../config/config.php');
$filterCategory = "";
if(isset($_GET['category'])){
    $filterCategory = " AND category_ID = '".$_GET['category']."'";
}

$keyword = "";
if (isset($_GET['k'])) {
    $keyword = " AND food.name LIKE '%".$_GET['k']."%'";
}
?>
<div class="row">
    <?php
    $sql = "SELECT food.ID AS food_ID, food.name AS food_name, category.name AS category_name, category.ID as category_ID, image, price, available FROM food LEFT JOIN category ON food.category_ID = category.ID WHERE stall_ID = '".$_SESSION['kteen_stall_id']."' AND available = '1'".$filterCategory.$keyword;
    $result = $conn -> query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
            $food_ID = $row['food_ID'];
            $food_name = $row['food_name'];
            $category_ID = $row['category_ID'];
            $category_name = $row['category_name'];
            $price = $row['price'];
            $image = $row['image'];
    ?>
    <div class="col-sm-6 col-md-4 p-2">
        <div class="k-card card k-hover-shadow h-100">
            <div class="row no-gutters">
                <div class="col-5">
                    <img style="width: 100%;height: 125px;" src="../images/menu/<?php echo $image; ?>">
                </div>
                <div class="col-7">
                    <div class="card-body">
                        <div class="card-title h5 mb-0">
                            <?php echo $row['food_name']; ?>
                        </div>
                        <div class="card-text">
                            <small class="text-muted">
                                <?php echo $row['category_name']; ?>
                            </small>
                        </div>
                        <div class="card-text mb-0">
                            RM <?php echo $row['price']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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