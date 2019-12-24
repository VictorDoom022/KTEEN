<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <div class="row">
		<div class="k-card card col-12">
			<div class="card-body">
			<form method="post" action="add_purchase.php"  enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-12">
						<h4 class="card-title text-center">Receipt</h4>		
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-md-3 col-form-label">
								Receipt Number
							</label>
							<div class="col-md-9">
								<input type="text" name="receipt_number" class="form-control" required>

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
								<input type="number" class="form-control" name="receipt_amount" id="receipt_amount" aria-label="Dollar amount (with dot and two decimal places)" readonly>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-md-3 col-form-label">
								Date of Receipt
							</label>
							<div class="col-md-9">
								<input type="date" name="receipt_date" class="form-control" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label">
								Upload Invoice
							</label>
							<div class="col-md-9">
								<input type="file" name="receipt_file" class="custom-file-input">
							</div>
						</div>
					</div>
									
				</div>

				<hr>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Inventory</label>
                        <label class="col-md-2 col-form-label">Quantity</label>
                        <label class="col-md-1 col-form-label">Unit</label>
                        <label class="col-md-1 col-form-label">Price per Unit (RM)</label>
                        <label class="col-md-2 col-form-label">Price (RM)</label>
                        <label class="col-md-3 col-form-label">Total (RM)</label>
                    </div>
                    <div class="form-group row">
						<!-- <label class="col-md-3 col-form-label"></label> -->
						<div class="col-md-3">
							<select class="custom-select mr-sm-2" name="receipt_test" id="receipt_test">
								<option selected>Choose from inventory</option>
						    		<?php
						    			$stallID = $_SESSION['kteen_stall_id'];
						    			$sql = "SELECT * from inventory where stall_ID= '$stallID'";
                                        $result = $conn -> query($sql);
						    			if ($result->num_rows > 0) {
						    				while ($row = $result->fetch_assoc()) {
                                    ?>
						    			<option value="<?php echo $row['ID']; ?>">
						    				<?php echo $row['name']; ?>		
						    			</option>
                                        
						    		<?php
						    			}
						    		}
						    		?>
							</select>
						</div>
                        <div class="col-md-2">
                            <input type="number" name="receipt_quantity" id="receipt_quantity" class="form-control" oninput="receipt_cal()">
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="receipt_unit" id="receipt_unit" class="form-control" readonly>
                        </div>	
                        <div class="col-md-1">
                            <input type="number" name="receipt_priceperunit" id="receipt_priceperunit" class="form-control" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="receipt_price" id="receipt_price" class="form-control" readonly>
                        </div>									
					</div>

					<div class="form-group row">
						<!-- <label class="col-md-3 col-form-label"></label> -->
						<div class="col-md-3">
							<select class="custom-select mr-sm-2" name="receipt_test1" id="receipt_test1">
								<option selected>Choose from inventory</option>
						    		<?php
						    			$stallID = $_SESSION['kteen_stall_id'];
						    			$sql = "SELECT * from inventory where stall_ID= '$stallID'";
                                        $result = $conn -> query($sql);
						    			if ($result->num_rows > 0) {
						    				while ($row = $result->fetch_assoc()) {
                                    ?>
						    			<option value="<?php echo $row['ID']; ?>">
						    				<?php echo $row['name']; ?>		
						    			</option>
                                        
						    		<?php
						    			}
						    		}
						    		?>
							</select>
						</div>
                        <div class="col-md-2">
                            <input type="number" name="receipt_quantity1" id="receipt_quantity1" class="form-control" oninput="receipt_cal()">
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="receipt_unit1" id="receipt_unit1" class="form-control" readonly>
                        </div>	
                        <div class="col-md-1">
                            <input type="number" name="receipt_priceperunit1" id="receipt_priceperunit1" class="form-control" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="receipt_price1" id="receipt_price1" class="form-control" readonly>
                        </div>									
					</div>

					<div class="form-group row">
						<!-- <label class="col-md-3 col-form-label"></label> -->
						<div class="col-md-3">
							<select class="custom-select mr-sm-2" name="receipt_test2" id="receipt_test2">
								<option selected>Choose from inventory</option>
						    		<?php
						    			$stallID = $_SESSION['kteen_stall_id'];
						    			$sql = "SELECT * from inventory where stall_ID= '$stallID'";
                                        $result = $conn -> query($sql);
						    			if ($result->num_rows > 0) {
						    				while ($row = $result->fetch_assoc()) {
                                    ?>
						    			<option value="<?php echo $row['ID']; ?>">
						    				<?php echo $row['name']; ?>		
						    			</option>
                                        
						    		<?php
						    			}
						    		}
						    		?>
							</select>
						</div>
                        <div class="col-md-2">
                            <input type="number" name="receipt_quantity2" id="receipt_quantity2" class="form-control" oninput="receipt_cal()">
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="receipt_unit2" id="receipt_unit2" class="form-control" readonly>
                        </div>	
                        <div class="col-md-1">
                            <input type="number" name="receipt_priceperunit2" id="receipt_priceperunit2" class="form-control" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="receipt_price2" id="receipt_price2" class="form-control" readonly>
                        </div>									
					</div>

					<div class="form-group row">
						<!-- <label class="col-md-3 col-form-label"></label> -->
						<div class="col-md-3">
							<select class="custom-select mr-sm-2" name="receipt_test3" id="receipt_test3">
								<option selected>Choose from inventory</option>
						    		<?php
						    			$stallID = $_SESSION['kteen_stall_id'];
						    			$sql = "SELECT * from inventory where stall_ID= '$stallID'";
                                        $result = $conn -> query($sql);
						    			if ($result->num_rows > 0) {
						    				while ($row = $result->fetch_assoc()) {
                                    ?>
						    			<option value="<?php echo $row['ID']; ?>">
						    				<?php echo $row['name']; ?>		
						    			</option>
                                        
						    		<?php
						    			}
						    		}
						    		?>
							</select>
						</div>
                        <div class="col-md-2">
                            <input type="number" name="receipt_quantity3" id="receipt_quantity3" class="form-control" oninput="receipt_cal()">
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="receipt_unit3" id="receipt_unit3" class="form-control" readonly>
                        </div>	
                        <div class="col-md-1">
                            <input type="number" name="receipt_priceperunit3" id="receipt_priceperunit3" class="form-control" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="receipt_price3" id="receipt_price3" class="form-control" readonly>
                        </div>									
					</div>

					<div class="form-group row">
						<!-- <label class="col-md-3 col-form-label"></label> -->
						<div class="col-md-3">
							<select class="custom-select mr-sm-2" name="receipt_test4" id="receipt_test4">
								<option selected>Choose from inventory</option>
						    		<?php
						    			$stallID = $_SESSION['kteen_stall_id'];
						    			$sql = "SELECT * from inventory where stall_ID= '$stallID'";
                                        $result = $conn -> query($sql);
						    			if ($result->num_rows > 0) {
						    				while ($row = $result->fetch_assoc()) {
                                    ?>
						    			<option value="<?php echo $row['ID']; ?>">
						    				<?php echo $row['name']; ?>		
						    			</option>
                                        
						    		<?php
						    			}
						    		}
						    		?>
							</select>
						</div>
                        <div class="col-md-2">
                            <input type="number" name="receipt_quantity4" id="receipt_quantity4" class="form-control" oninput="receipt_cal()">
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="receipt_unit4" id="receipt_unit4" class="form-control" readonly>
                        </div>	
                        <div class="col-md-1">
                            <input type="number" name="receipt_priceperunit4" id="receipt_priceperunit4" class="form-control" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="receipt_price4" id="receipt_price4" class="form-control" readonly>
                        </div>									
					</div>
                    <div class="form-group row">
                        <div class="col-md-9"></div>
                         <div class="col-md-3">
                            <input type="number" name="receipt_total" id="receipt_total" class="form-control" readonly>
                        </div>           
                    </div>             
				
				<div class="card-footer bg-white text-right">
					<a href="purchase.php" class="btn text-danger">Cancel</a>
					<input type="submit" name="add_receipt" value="Submit" class="btn text-dark">
				</div>
			</div>
			</form>
		</div>
	</div>
</div>