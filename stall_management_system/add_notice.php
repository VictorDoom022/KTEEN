<div class="modal fade" tabindex="-1" role="dialog" id="add_notice">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body bg-light">
				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<span class="modal-title h4">Add Notice</span>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<hr>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<div class="form-group">
							<label for="description">Description</label>
							<textarea class="form-control border-0 rounded-0" cols="30" rows="15" name="description" id="description" required></textarea>
						</div>
						<hr>
						<div class="row">
							<div class="col text-right">
								<button type="button" class="btn" data-dismiss="modal">Close</button>
								<input type="submit" name="add_notice" class="btn btn-dark">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>