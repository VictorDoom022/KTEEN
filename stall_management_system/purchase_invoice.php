<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_stall.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- Bootstarp CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
<?php
	$site = 'Purchase';
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>

	<div class="container-fluid">
		<div class="row">
		<div class="col-2"></div>
		<main class="col-10 p-4">
			<div class="k-card card col-12">
				<div class="card-body">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<h4 class="card-title text-center">Invoice Purchase History</h4>
						</div>
					</div>

					<div class="row">
					<div class="table-responsive">
						<table class="table table-hover table-borderless table-striped table-sm">
							<thead class="thead-dark">
								<tr>
									<th>No.</th>
                                    <th>Invoice Number</th>
                                    <th>Supplier Name</th>
                                    <th>Invoice Date</th>
                                    <th>Due Date</th>
                                    <th>Total Amount</th>
                                    <th>File</th>
                                    <th>Key-in date<th>
								</tr>

                                <?php
							    	$stallID = $_SESSION['kteen_stall_id'];
									$count=0;
									$sql = "SELECT invoice_number, supplier_name, invoice_date, invoice_due, invoice_amount, invoice_file, date_add from invoice where stall_ID = '$stallID'";
									$result = $conn -> query($sql);
										if(mysqli_num_rows($result)){
										    while ($row = mysqli_fetch_assoc($result)) {
											$count++;
								?>
                                    <tr>
                                        <td><?php echo ($count)?></td>
                                        <td><?php echo $row['invoice_number']?></td>
                                        <td><?php echo $row['supplier_name']?></td>
                                        <td><?php echo $row['invoice_date']?></td>
                                        <td><?php echo $row['invoice_due']?></td>
                                        <td>RM<?php echo $row['invoice_amount']?></td>
                                       
										<td><a href="../uploads/<?php echo $row['invoice_file']?>" download><?php echo $row['invoice_file'] ?></a></td>
                                        <td><?php echo $row['date_add']?></td>
                                    </tr>

                                <?php
                                        }
                                    }
                                ?>
							</thead>
						</table>
					</div>
					</div>
				</div>
			</div>
		</main>
		</div>
	</div>
</body>
</html>
