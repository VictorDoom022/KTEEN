<?php
session_start();
include '../config/config.php';
include '../config/test_input.php';

	$searchword = "";

	if(isset($_GET['word'])){
		$searchword = " AND date LIKE '%".$_GET['word']."%'";
	}
?>
	<table class="table table-hover table-borderless table-striped table-sm">
		<thead class="thead-dark">
			<tr>
				<th>No.</th>
				<th>Date</th>
				<th>Supplier</th>
				<th>Content</th>
				<th>Details</th>
			</tr>
		</thead>
<tbody>
	<?php
		$count=0;
		$sql = "SELECT ID, stall_ID, date, supplier_ID, content, product_name, price, quantity,total 
		from purchase where stall_ID = '".$_SESSION['kteen_stall_id']."'".$searchword;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_assoc($result)) {
			$count++;
	?>
		<tr>
			<td>
				<?php echo($count) ?>
			</td>
											
			<td>
				<?= $row['date']; ?>
			</td>
			<td>
				<?= $row['supplier_ID']; ?>
			</td>
			<td>											
				<a href="#modal<?=$row['ID']; ?>" data-toggle="modal" data-target="#modal<?=$row['ID']; ?>">
					Click to view content
				</a> 				
			</td>
			<td>
				<a href="#details<?=$row['ID']; ?>" data-toggle="modal" data-target="#details<?=$row['ID']; ?>">
					Click to view purchase detail
				</a> 
			</td>
		</tr>
		<div class="modal fade" id="modal<?=$row['ID']; ?>" tabindex="-1" role="modal">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							Content
						</h5>
					</div>
				<div class="modal-body">
					<?= $row['content']; ?>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>										
		</div>
	</div>
		<div class="modal fade" id="details<?=$row['ID']; ?>" tabindex="-1" role="modal">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							Details
						</h5>
					</div>
					<div class="modal-body">
						Purchased Product :<?= $row['product_name']; ?> <br>
						Price per Item : RM<?= $row['price'] ?> <br>
						Quantity Purchased : <?= $row['quantity'] ?> <br>
						Total Amount : RM<?= $row['total'] ?> <br>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
												
			</div>
		</div>
									
	<?php
			}
		}
	?>
	</tbody>
</table>