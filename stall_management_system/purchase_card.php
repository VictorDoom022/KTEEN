<?php 
session_start();
include '../config/config.php';


$searchword = "";
if (isset($_GET['word'])) {
    //$temp = test_input($_GET['keyword']);
    $searchword = " AND name LIKE '%".$_GET['word']."%'";
}
?>
<div class="row">
	<?php 
	$stallID = $_SESSION['kteen_stall_id'];
	$sql = "SELECT * FROM supplier where stall_ID = '$stallID'".$searchword;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
	?>
	<div class=" col-12 col-md-6 col-lg-4 p-1">
		<a href="#modal<?php echo $row['ID']; ?>" class="text-decoration-none text-reset" data-toggle="modal">
			<div class="k-card card k-hover-shadow">
				<div class="row no-gutters">
					<!-- <div class="col-4">
						<img class="rounded-circle p-2" src="../images/staff/<?php echo $row['image']; ?>" style="height: 120px;width: 120px;">
					</div> -->
					<div class="col-8">
						<div class="card-body">
							<div class="card-title mb-0">
								<?php echo $row['name']; ?>
							</div>
							<div class="card-text">
								<small class="text-muted mt-0">
									<?php echo $row['company_name']; ?>
								</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<?php 
	include 'purchase_modal.php';
		}
	}else if($searchword != ""){
		?>
		<div class="col">
				<h4 class="text-center"><?php echo "No result for '".$_GET['word']."'"; ?></h4>
		</div>
		<?php
	}
	?>
</div>
