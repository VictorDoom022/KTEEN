<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row">
		<div class="k-card card col-12">
			<div class="card-body">
			<form method="post" action="add_purchase.php"  enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-12">
						<h4 class="card-title text-center">Cash Bill</h4>		
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-md-3 col-form-label">
								Bill Number
							</label>
							<div class="col-md-9">
								<input type="text" name="bill_number" class="form-control" required>

							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label">Purchase From</label>
								<div class="col-md-9">
									<select class="custom-select mr-sm-2" name="supplier_name" required>
										<option selected>Choose company</option>
										<?php
											$stallID = $_SESSION['kteen_stall_id'];
											$sql = "SELECT * from supplier where stall_ID= '$stallID'";
											$result = $conn -> query($sql);
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
										?>
											<option value="<?php echo $row['company_name']; ?>">
												<?php echo $row['company_name']; ?>		
											</option>
										<?php
											}
										}
										?>
									</select>
								</div>
											
						</div>
						<div class="input-group mb-3">
							<label class="col-md-3 col-form-label">Total Amount</label>
								<div class="input-group-prepend">
									<span class="input-group-text">RM</span>
								</div>
								<input type="number" class="form-control" name="bill_amount" aria-label="Dollar amount (with dot and two decimal places)">
						</div>
					</div>

									<div class="col-md-6">
						<div class="form-group row">
							<label class="col-md-3 col-form-label">
								Date of Bill
							</label>
							<div class="col-md-9">
								<input type="date" name="bill_date" class="form-control" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label">
								Upload Invoice
							</label>
							<div class="col-md-9">
								<input type="file" name="bill_file" class="custom-file-input">
							</div>
						</div>	
					</div>
									
				</div>
				<div class="card-footer bg-white text-right">
					<a href="purchase.php" class="btn text-danger">Cancel</a>
					<input type="submit" name="add_Bill" value="Submit" class="btn text-dark">
				</div>
			</div>
			</form>
		</div>
	</div>
</div>