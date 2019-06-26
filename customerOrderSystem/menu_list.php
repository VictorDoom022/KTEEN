<?php 
session_start();
include('../config.php');
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
    <ul class="list-group col-12">
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
        <li class="list-group-item k-hover-shadow mb-1 border-0 shadow-sm">
            <div class="row">
                <img src="../images/menu/<?php echo $image ?>" class="mr-2" style="width: 200px;height: 100px;align-self: center;vertical-align: center;">
                <div class="food-info">
                    <h5 class="food-name">
                        <span><?php echo $food_name ?></span>
                    </h5>
                </div>
            </div>
        </li>
    <?php
        }
    }
    ?>
    </ul>
</div>