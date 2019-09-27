<?php 
$sql = "SELECT date, total_price FROM purchase WHERE stall_ID = '$ID';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>
<div class="row">
	<div class="k-card card col-12">
		<div class="card-body">
			
		</div>
	</div>
</div>
<?php
}else{
?>

<?php
}
?>
