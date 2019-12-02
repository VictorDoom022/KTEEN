<?php
session_start();
include '../config/config.php';
include '../config/test_input.php';

	$searchword = "";

	if(isset($_GET['word'])){
		$searchword = " AND bill_number LIKE '%".$_GET['word']."%'";
	}
?>
<table class="table table-hover table-borderless table-striped table-sm">
	<thead class="thead-dark">
		<tr>
			<th>No.</th>
            <th>Bill Number</th>
            <th>Supplier Name</th>
            <th>Bill Date</th>
            <th>Total Amount</th>
            <th>File</th>
            <th>Key-in date<th>
		</tr>

        <?php
	    	$stallID = $_SESSION['kteen_stall_id'];
			$count=0;
			$sql = "SELECT bill_number, supplier_name, bill_date, bill_amount, bill_file, date_add from bill where stall_ID = '".$_SESSION['kteen_stall_id']."'".$searchword;
			$result = $conn -> query($sql);
				if(mysqli_num_rows($result)){
				    while ($row = mysqli_fetch_assoc($result)) {
					$count++;
		?>
            <tr>
                <td><?php echo ($count)?></td>
                <td><?php echo $row['bill_number']?></td>
                <td><?php echo $row['supplier_name']?></td>
                   <td><?php echo $row['bill_date']?></td>
                   <td>RM<?php echo $row['bill_amount']?></td>
                   <td><a href="../uploads/Bill/<?php echo $row['bill_file']?>" download><?php echo $row['bill_file']?></a></td>
                   <td><?php echo $row['date_add']?></td>
               </tr>

           <?php
                   }
               }
           ?>
	</thead>
</table>
