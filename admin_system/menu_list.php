<?php
session_start();
include '../config/config.php';

echo $sql = "SELECT DISTINCT stall_name, food.name AS food_name FROM food LEFT JOIN stall ON food.stall_ID = stall.ID;";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="k-card card k-hover-shadow h-100 mt-2">
	<div class="card-body">
		<div class="h4">
			<?= $row['stall_name']; ?>
		</div>
	</div>
</div>
<?php
	}
}
?>

