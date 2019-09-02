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