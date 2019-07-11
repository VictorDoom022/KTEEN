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
    <?php
    $sql = "SELECT food.ID AS food_ID, food.name AS food_name, category.name AS category_name, category.ID as category_ID, image, price, available FROM food LEFT JOIN category ON food.category_ID = category.ID WHERE stall_ID = '".$_SESSION['kteen_stallID']."' AND available = '1'".$filterCategory.$keyword;
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
                    <div class="col-6 text-center">
                        <a href="#editfood<?php echo $food_ID; ?>" data-toggle="modal" class="card-link text-warning mx-auto"><i class="fas fa-pen"></i></a>
                    </div>
                    <div class="col-6 text-center">
                        <a onclick="deleteMenu(<?php echo $food_ID; ?>)" class="card-link text-danger"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editfood<?php echo $food_ID; ?>" tabindex="-1" role="modal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="header-title">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="menu.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $food_ID; ?>">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col form-group">
                                <label for="name">Food Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Food Name" value="<?php echo $food_name; ?>">
                            </div>
                            <div class="col form-group">
                                <label for="category">Category</label>
                                <select name="category_ID" id="category" class="form-control" required>
                                    <option value="">Select a category</option>
                                    <?php
                                    $group = "SELECT * FROM category";
                                    $category = $conn -> query($group);
                                    if($category->num_rows > 0){
                                        while($row = $category -> fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $row['ID'] ?>" <?php if($row['ID'] == $category_ID){ echo 'selected'; }?> ><?php echo $row['name']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
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
                                <label for="price">Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">RM</div>
                                    </div>
                                    <input type="number" name="price" id="price" min="0" step="0.05" class="form-control" placeholder="Price" value="<?php echo $price; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="editmenu" class="btn btn-sm btn-warning" value="Edit">
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