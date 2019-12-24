<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	<div class="row">
		<div class="k-card card col-12">
			<div class="card-body">
				<form method="post" action="add_purchase.php" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-12">
							<h4 class="card-title text-center">Invoice</h4>		
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-md-3 col-form-label">
									Invoice Number
								</label>
								<div class="col-md-9">
									<input type="text" name="invoice_number" class="form-control" required>

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
								<input type="number" class="form-control" id="invoice_amount" name="invoice_amount" aria-label="Dollar amount (with dot and two decimal places)" readonly>
							</div>				
						</div>

						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-md-3 col-form-label">
									Date of invoice
								</label>
								<div class="col-md-9">
									<input type="date" name="invoice_date" class="form-control" id="invoice_date" onchange="calDate()" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">
									Payment Due
								</label>
								<div class="col-md-9">
									<input type="date" name="invoice_due" class="form-control" id="invoice_due" onchange="calDate()" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3 col-form-label">
									Upload Invoice
								</label>
								<div class="col-md-9">
									<input type="file" name="invoice_file" class="custom-file-input">
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
							<select class="custom-select mr-sm-2" name="test" id="test">
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
                            <input type="number" name="quantity" id="quantity" class="form-control" oninput="cal()">
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="unit" id="unit" class="form-control" readonly>
                        </div>	
                        <div class="col-md-1">
                            <input type="number" name="priceperunit" id="priceperunit" class="form-control" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="price" id="price" class="form-control" readonly>
                        </div>									
					</div>

					<div class="form-group row">
						<!-- <label class="col-md-3 col-form-label"></label> -->
						<div class="col-md-3">
							<select class="custom-select mr-sm-2" name="test1" id="test1">
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
                            <input type="number" name="quantity1" id="quantity1" class="form-control" oninput="cal()">
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="unit1" id="unit1" class="form-control" readonly>
                        </div>	
                        <div class="col-md-1">
                            <input type="number" name="priceperunit1" id="priceperunit1" class="form-control" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="price1" id="price1" class="form-control" readonly>
                        </div>									
					</div>

					<div class="form-group row">
						<!-- <label class="col-md-3 col-form-label"></label> -->
						<div class="col-md-3">
							<select class="custom-select mr-sm-2" name="test2" id="test2">
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
                            <input type="number" name="quantity2" id="quantity2" class="form-control" oninput="cal()">
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="unit2" id="unit2" class="form-control" readonly>
                        </div>	
                        <div class="col-md-1">
                            <input type="number" name="priceperunit2" id="priceperunit2" class="form-control" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="price2" id="price2" class="form-control" readonly>
                        </div>									
					</div>

					<div class="form-group row">
						<!-- <label class="col-md-3 col-form-label"></label> -->
						<div class="col-md-3">
							<select class="custom-select mr-sm-2" name="test3" id="test3">
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
                            <input type="number" name="quantity3" id="quantity3" class="form-control" oninput="cal()">
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="unit3" id="unit3" class="form-control" readonly>
                        </div>	
                        <div class="col-md-1">
                            <input type="number" name="priceperunit3" id="priceperunit3" class="form-control" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="price3" id="price3" class="form-control" readonly>
                        </div>									
					</div>

					<div class="form-group row">
						<!-- <label class="col-md-3 col-form-label"></label> -->
						<div class="col-md-3">
							<select class="custom-select mr-sm-2" name="test4" id="test4">
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
                            <input type="number" name="quantity4" id="quantity4" class="form-control" oninput="cal()">
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="unit4" id="unit4" class="form-control" readonly>
                        </div>	
                        <div class="col-md-1">
                            <input type="number" name="priceperunit4" id="priceperunit4" class="form-control" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="price4" id="price4" class="form-control" readonly>
                        </div>									
					</div>
                    <div class="form-group row">
                        <div class="col-md-9"></div>
                         <div class="col-md-3">
                            <input type="number" name="total" id="total" class="form-control" readonly>
                        </div>           
                    </div>             
										
					<div class="card-footer bg-white text-right">
						<a href="purchase.php" class="btn text-danger">Cancel</a>
						<input type="submit" name="add_Invoice" value="Submit" class="btn text-dark">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
