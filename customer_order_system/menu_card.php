<?php
include '../config/config.php';

if (isset($_POST['stall_username'])) {
	$sql = "SELECT 
	stall.username AS username, 
	food.name AS food_name, 
	food.image AS image, 
	food.price AS price
	FROM food LEFT JOIN stall ON food.stall_ID = stall.ID WHERE username = '". $_POST['stall_username'] ."' AND food.available = '1';";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			$image = $row['image'];
?>
<div class="col-md-3 p-2">
	<div class="k-card card k-hover-shadow h-100" style="cursor: pointer;">
		<div style="position: relative;overflow: hidden;"> 
			<img src="../images/<?= $row['username']; ?>/menu/<?= $image; ?>" class="items" height="100" alt="" style="width: 100%;height: 200px;align-self: center;vertical-align: center;" />
		</div>
		<div class="card-body" style="position: relative;">
			<?= $row['food_name'] ?>
			<span class="text-white bg-dark py-1 px-2" style="position: absolute;right: -4px;">
				RM <span><?= $row['price']; ?></span>
			</span>
		</div>
	</div>
</div>
<?php
		}
	}
}else{
	
}

?>