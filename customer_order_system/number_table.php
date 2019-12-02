<?php
session_start();
include '../config/config.php';
$sql = "SELECT number, stall_name FROM orders LEFT JOIN stall ON orders.stall_ID = stall.ID WHERE completed = '1' AND taken = '0';";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
?>
<table class="table">
	<thead>
		<tr>
			<td>Number</td>
			<td>Stall Name</td>
		</tr>
	</thead>
	<tbody>
<?php
	while ($row = mysqli_fetch_assoc($result)) {
?>
		<tr>
			<td><?= $row['number'] ?></td>
			<td><?= $row['stall_name'] ?></td>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>
<?php
}
?>