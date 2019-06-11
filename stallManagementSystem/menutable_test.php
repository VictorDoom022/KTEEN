<?php
$sql = "SELECT food.ID AS food_ID, food.name AS food_name, category.name AS category_name, category.ID as category_ID, image, price, available FROM food LEFT JOIN category ON food.category_ID = category.ID WHERE stall_ID = '$id'";
$result = $conn -> query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
        $food_ID = $row['food_ID'];
        $food_name = $row['food_name'];
        $category_ID = $row['category_ID'];
        $category_name = $row['category_name'];
        $price = $row['price'];

?>
        <tr>
            <td>
                <div class="card mb-3">
                    <div class="row card-body">
                        <div class="col-1">
                            <input type="checkbox">
                        </div>
                        <div class="col-12 col-md-3">
                            <img src="../images/<?php echo $row['image']; ?>" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-12 col-md-7">
                            <h6 class="card-title"><?php echo $row['food_name']; ?></h6>
                            <div class="card-text">
                                Category: <?php echo $row['category_name']; ?><br>
                                Price: RM <?php echo $row['price']; ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-1 pt-2">
                                <a href="#editfood<?php echo $row['food_ID']; ?>" data-toggle="modal" class="btn btn-outline-dark ml-auto mr-3 mt-auto">Edit</a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="../images/<?php echo $row['image']; ?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body h-100">
                        <h4 class="card-title"><?php echo $row['food_name']; ?></h4>
                        <p class="card-text h-50">
                            Category: <?php echo $row['category_name']; ?><br>
                            Price: RM <?php echo $row['price']; ?>
                        </p>
                        <div class="row align-items-end h-25">
                            <a href="#editfood<?php echo $row['food_ID']; ?>" data-toggle="modal" class="btn btn-outline-dark ml-auto mr-3 mt-auto">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editfood<?php echo $row['food_ID']; ?>" tabindex="-1" role="modal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="header-title">Edit Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="menu.php" method="post" enctype="multipart/form-data">
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
                                        <input type="file" class="custom-file-input" id="customFile" name="fileToUpload">
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
                            <input type="submit" name="addmenu" class="btn btn-sm btn-warning" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}
?>