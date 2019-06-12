<div class="card overflow-auto">
    <div class="card-body">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Food Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
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
                        $image = $row['image'];
                ?>
                    <tr>
                        <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check<?php echo $food_ID; ?>">
                            <label class="custom-control-label" for="check<?php echo $food_ID; ?>"></label>
                        </div>
                        </td>
                        <td>            
                            <h6 class="card-title">
                                <a href="#fooddetail<?php echo $food_ID; ?>" data-toggle="modal" class="card-link text-dark"><?php echo $food_name; ?></a>
                            </h6>
                        </td>
                        <td>
                            <p class="card-text"><?php echo $category_name; ?></p>
                        </td>
                        <td>
                            <div class="card-text"><?php echo $price; ?></div>
                        </td>
                        <td>
                            <a href="#editfood<?php echo $food_ID; ?>" data-toggle="modal" class="btn btn-outline-dark">Edit</a>
                        </td>
                    </tr>

        <div class="modal fade" id="fooddetail<?php echo $food_ID; ?>" tabindex="-1" role="modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div>
                        <img src="../images/<?php echo $image; ?>" alt="" class="img-fluid" style="position: relative;">
                        <p style="position: absolute;bottom: 15%;right: 5%;background-color: rgba(255, 255, 255, 0.8);padding: 20px;">
                            <?php echo $food_name; ?><br>
                            Category: <?php echo $category_name; ?><br>
                            RM <?php echo $price; ?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editfood<?php echo $food_ID; ?>" tabindex="-1" role="modal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="header-title">Edit Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="menu_test.php" method="post" enctype="multipart/form-data">
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
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
        