<div class="modal fade" id="modal_<?= $row['ID']; ?>" tabindex="-1" role="modal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <?= $row['ID'] ?><br>
                <?= $row['name'] ?><br>
                <?= $row['price'] ?><br>
                <?= $row['category'] ?><br>
                <?= $row['image'] ?><br>
            </div>
        </div>
    </div>
</div>