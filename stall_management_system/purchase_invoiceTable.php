<?php
session_start();
include '../config/config.php';
include '../config/test_input.php';

	$searchword = "";

	if(isset($_GET['word'])){
		$searchword = " AND invoice_number LIKE '%".$_GET['word']."%'";
	}
?>

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
			$count=0;
			$sql = "SELECT invoice_number, supplier_name, invoice_date, invoice_due, invoice_amount, invoice_file, date_add from invoice where stall_ID = '".$_SESSION['kteen_stall_id']."'".$searchword;
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
                                       
				<td><a href="../uploads/Invoice/<?php echo $row['invoice_file']?>" download><?php echo $row['invoice_file'] ?></a></td>
                <td><?php echo $row['date_add']?></td>
            </tr>

            <?php
                    }
                }
            ?>
				</thead>
			</table>