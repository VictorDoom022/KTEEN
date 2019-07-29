<?php 
session_start();
include '../server/config.php';
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
    $sql = "SELECT food.ID AS food_ID, food.name AS food_name, category.name AS category_name, category.ID as category_ID, image, price, available FROM food LEFT JOIN category ON food.category_ID = category.ID WHERE available = '1'".$filterCategory.$keyword;
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
    <div class="col-sm-6 col-md-4 col-lg-3 p-2">
        <div class="k-card card k-hover-shadow h-100">
            <div>
                <img src="../images/menu/<?php echo $image; ?>" style="width: 100%;height: 200px;align-self: center;vertical-align: center;">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $food_name; ?></h5>
                <p class="card-text">
                    <small class="text-muted"><?php echo $category_name; ?></small>
                </p>
                <p class="card-text">
                    RM <?php echo $price; ?>
                </p>
            </div>
            <div class="card-footer bg-white">
                <div class="row">
                    <a href="" class="btn btn-block btn-warning text-white rounded-0">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>
</div>