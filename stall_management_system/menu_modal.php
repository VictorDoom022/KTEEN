<div class="modal fade" id="modal_<?= $row['ID']; ?>" tabindex="-1" role="modal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img class="p-2 shadow" src="../images/<?= $_SESSION['stall_username']; ?>/menu/<?= $row['image']; ?>" style="height: 240px;width: 240px;">
                    </div>
                    <div class="col-md-8">
                        <?= $row['name'] ?><br>
                        RM <?= $row['price'] ?><br>
                        <?= $row['category'] ?><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <button class="btn text-secondary" data-dismiss="modal">Close</button>
                        <a href="" class="btn text-danger">Delete</a>
                        <a href="edit_menu.php?id=<?= $row['ID']; ?>" class="btn text-warning">Edit</a>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>