<?php
//session_start();
include '../config/config.php';
include '../config/test_input.php';

	$searchword = "";

	if(isset($_GET['word'])){
		$searchword = " WHERE date LIKE '%".$_GET['word']."%'";
	}
?>


<!-- income -->
    <div class="k-card card col-12">
		<div class="card-body">
			<div class="row">
				<div class="col-md-3"></div>
					<div class="col-md-6">
						<h4 class="card-title text-center">Income</h4>
					</div>			
			</div>
			<div class="row">
				<div class="table-responsive">
					<table class="table table-hover table-borderless table-striped table-sm">
						<thead class="thead-dark">
							<tr>
								<th>Type of Income</th>
								<th>Total (RM)</th>
								<th>Total (RM)</th>
							</tr>
						<?php
							$total_income=0; 
							$sql = "SELECT total FROM payment".$searchword;
							$result = $conn -> query($sql);
							if(mysqli_num_rows($result)){
								while ($row = mysqli_fetch_assoc($result)) {
									$total_income = $row['total'];
								}
							}
						?>
							<tr>
								<td>Food</td>
								<td><?php echo $total_income ?></td>
											<input type="hidden" id="total_income" value="<?php echo $total_income ?>"></input>
										</tr>
									
										<tr>
											<td colspan="2" class="border-top"><strong>Total:</strong></td>
											<td class="border-top"><strong><?php echo $total_income ?></strong></td>
											
										</tr>
									
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- Expenses -->
				<div class="k-card card col-12">
					<div class="card-body">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<h4 class="card-title text-center">Expenses</h4>
							</div>
						</div>

						<div class="row">
							<div class="table-responsive">
								<table class="table table-hover table-borderless table-striped table-sm">
									<thead class="thead-dark">
										<tr>
											<th>Type of Expenses</th>
											<th>Total (RM)</th>
											<th>Total (RM)</th>
										</tr>
									<?php 
										$invoice_total=0;
										$sql = "SELECT invoice_amount FROM invoice".$searchword;
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												// $_SESSION["invoice_total"] = $row['total'];	
												$invoice_total += $row['invoice_amount'];
											}
										}
									?>	
										<tr>
											<td>Invoice </td>
											<td><?php echo $invoice_total?> </td>
											<input type="hidden" id="invoice_session" value="<?php echo $invoice_total ?>"/>
										</tr>
										
									<?php
										$bill_total=0;
										$sql = "SELECT bill_amount FROM bill".$searchword;
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												$bill_total += $row['bill_amount'];
											}
										}
									?>
										<tr>
											<td>Bill</td>
											<td><?php echo $bill_total?></td>
											<input type="hidden" id="bill_session" value="<?php echo $bill_total ?>"/>
										</tr>

									<?php
										$receipt_total=0;	
										$sql = "SELECT receipt_amount FROM receipt".$searchword;
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												$receipt_total += $row['receipt_amount'];
											}
										}
									?>
										<tr>
											<td>Receipt</td>
											<td><?php echo $receipt_total?></td>
											<input type="hidden" id="receipt_session" value="<?php echo $receipt_total ?>"/>
										</tr>
									

									<?php
										$mail_total=0;
										$sql = "SELECT total FROM purchase".$searchword;
										$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
											while ($row = mysqli_fetch_assoc($result)) {
												$mail_total = $row['total'];
											} 
										}
									?>
										<tr>
											<td>Sent from Mail</td>
											<td><?php echo $mail_total?></td>
											<input type="hidden" id="mail_session" value="<?php echo $mail_total ?>"/>
										</tr>


									<?php
										$total =$invoice_total + $bill_total + $receipt_total + $mail_total;
									?>
										<tr>
											<td colspan="2" class="border-top"><strong>Total:</strong></td>
											<td class="border-top"><strong><?php echo $total ?></strong></td>
											<input type="hidden" id="total_expenses" value="<?php echo $total?>" />
										</tr>

									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- final calculatations -->
				<div class="k-card card col-12">
					<div class="card-body">
						<div class="row">
							<div class="col-md-3"></div>
								<div class="col-md-6">
									<h4 class="card-title text-center">Income - Expenses</h4>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="table-responsive">
								<table class="table table-hover table-borderless table-striped table-sm">
									<thead class="thead-dark">
										<tr>
											<th>Income / Expenses</th>
											<th>Total (RM)</th>
											<th>Total (RM)</th>
										</tr>

										<tr>
											<td>Income</td>
											<td><?php echo $total_income ?></td>
										</tr>

										<tr>
											<td>Expenses</td>
											<td><?php echo $total ?></td>
										</tr>
										<?php
											$finalCal = $total_income - $total;
										?>
										<tr>
											<td colspan="2" class="border-top"><strong>Total:</strong></td>
											<td class="border-top"><strong><?php echo $finalCal ?></strong></td>
										</tr>
									</thead>
								</table>	
						</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<canvas id="ExpenseChart"></canvas>
						<canvas id="finalChart"></canvas>
					</div>
				</div>