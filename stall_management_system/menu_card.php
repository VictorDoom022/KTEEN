<?php 
session_start();
include '../config/config.php';
include '../config/test_input.php';
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
    $sql = "SELECT food.ID AS ID, food.name AS name, category.name AS category, category.ID as category_ID, image, price, available FROM food LEFT JOIN category ON food.category_ID = category.ID WHERE stall_ID = '".$_SESSION['kteen_stall_id']."'".$filterCategory.$keyword;
    $result = $conn -> query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
            $image = $row['image'];
    ?>
    <div class="col-sm-6 col-md-4 p-2">
        <a href="#modal_<?= $row['ID'] ?>" data-toggle="modal" class="text-decoration-none text-reset">
            <div class="k-card card k-hover-shadow h-100">
                <div class="row no-gutters" style="position: relative;">
                    <div class="col-5">
                        <img style="width: 100%;height: 125px;" src="../images/<?= $_SESSION['stall_username']; ?>/menu/<?= $image; ?>">
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
                        </div>
                    </div>
                    <span class="bg-dark text-white py-1 px-2" style="position: absolute;right: -5px;bottom: 10px;">RM <?=$row['price']; ?></span>
                    <?php if ($row['available'] == 1) { ?>
                        <div class="py-5 px-5" style="position: absolute;right: 0;top: 0;overflow: hidden;">
                            <span class="py-1 px-4 text-white" style="position: absolute;background-color: rgb(0, 255, 0);right: -25px;top: 5px;transform: rotate(45deg);overflow: hidden;">action</span>
                        </div>
                    <?php }else{ ?>
                        <div class="py-5 px-5" style="position: absolute;right: 0;top: 0;overflow: hidden;">
                            <span class="py-1 px-4 text-white" style="position: absolute;background-color: rgb(255, 0, 0);right: -25px;top: 5px;transform: rotate(45deg);overflow: hidden;">hidden</span>
                        </div>
                    <?php } ?>
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
<?php
$sql = "SELECT 
stall.username AS username, 
food.name AS food_name, 
food.image AS image, 
food.price AS price
FROM food LEFT JOIN stall ON food.stall_ID = stall.ID WHERE stall_ID = '". $_SESSION['kteen_stall_id'] ."'". $filterCategory.$keyword .";";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
mysqli_close($conn);
$a = ceil($count / 9);
?>
<div class="col-12 mt-2">
    <ul class="pagination pagination-md">
        <?php for ($i=1; $i <= $a; $i++) { ?>
        <li class="page-item">
            <span class="page-link rounded-0 border-0 <?= $r = ($page == ($i * 9) - 9)? 'bg-dark text-white': 'text-dark' ?>" style="cursor: pointer;" data-page="<?= $i ?>"><?= $i ?></span>
        </li>
        <?php } ?>
    </ul>
</div>