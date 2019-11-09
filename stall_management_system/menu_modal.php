<div class="modal fade" id="modal_<?= $row['ID']; ?>" tabindex="-1" role="modal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img class="p-2 shadow" src="../images/<?= $_SESSION['stall_username']; ?>/menu/<?= $row['image']; ?>" style="height: 240px;width: 240px;">
                    </div>
                    <div class="col-md-8 py-4 px-3" style="position: relative;">
                        <div class="row">
                            <div class="col">
                                <small class="text-muted">Food Name</small>
                                <div>
                                    <?= $row['name'] ?><br>
                                </div>
                            </div>
                            <div class="col">
                                <small class="text-muted">Category</small>
                                <div>
                                    <?= $row['category'] ?><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <a href="edit_menu.php?id=<?= $row['ID']; ?>" class="btn text-success">Edit</a>
                        <?php if ($row['available'] == 1) { ?>
                            <a href="menu.php?hf=<?= $row['ID']; ?>" class="btn text-warning">Hidden</a>
                        <?php }else{ ?>
                            <a href="menu.php?af=<?= $row['ID']; ?>" class="btn text-primary">Action</a>
                        <?php } ?>
                        <a href="" class="btn text-danger">Delete</a>
                        <button class="btn text-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <span class="bg-dark text-white px-4 py-1" style="position: absolute;right: -7px;bottom: 60px;">
                    RM <?= $row['price'] ?>
                </span>
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
    </div>
</div>