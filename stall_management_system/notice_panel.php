<div class="k-card bg-white">
	<div class="p-4">
		<div class="row">
			<div class="col-8">
				<div class="card-title h3">
					Notice Board
				</div>
			</div>
			<button type="button" data-toggle="modal" data-target="#add_notice" class="btn ml-auto mr-4">
				<i class="fas fa-plus"></i>
			</button>
		</div>
		<hr>
		<?php 
		$sql = "SELECT ID, date, description FROM notice WHERE stall_ID = '".$_SESSION['stall_username']."' LIMIT 3";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
		?>
		<div class="modal fade" tabindex="-1" role="dialog" id="edit_notice_<?= $row['ID']; ?>">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body bg-light">
						<div class="container-fluid">
							<div class="row">
								<div class="col">
									<span class="modal-title h4">Edit Notice</span>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
							<hr>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								<input type="hidden" name="notice_id" value="<?= $row['ID']; ?>">
								<div class="form-group">
									<label for="description_<?= $row['ID']; ?>">Description</label>
									<textarea class="form-control border-0 rounded-0" cols="30" rows="15" name="description" id="description_<?= $row['ID']; ?>" required><?= $row['description']; ?></textarea>
								</div>
								<hr>
								<div class="row">
									<div class="col text-right">
										<button type="button" class="btn" data-dismiss="modal">Close</button>
										<input type="submit" name="edit_notice" class="btn btn-dark">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 font-weight-bold"><?= $row['date']; ?></div>
			<div class="col-md-7"><?= $row['description']; ?></div>
			<div class="col-md-2 text-center p-2 p-lg-0">
				<button class="btn btn-sm btn-outline-success" type="button" data-toggle="modal" data-target="#edit_notice_<?= $row['ID']; ?>">Edit</button>
				<button class="btn btn-sm btn-outline-danger" onclick="ask_delete_notice('<?= $row['ID'] ?>')">Delete</button>
			</div>
		</div>
		<hr>
		<?php
			}
		}else{
			echo '<div class="text-center text-muted">no notice</div>';
		}
		?>
	</div>
</div>