<div class="k-card card">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover table-borderless table-striped table-sm">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Catergory</th>
						<th>Price</th>
						<th>Status</th>
						<th colspan="4" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					include '../config/config.php';
					$sql = "SELECT food.name AS name, category.name AS category, price, available FROM food LEFT JOIN category ON food.category_ID = category.ID WHERE stall_ID = '".$_SESSION['kteen_stall_id']."' LIMIT 10";
					$result = mysqli_query($conn, $sql)  or die (mysqli_error($conn));
					if(mysqli_num_rows($result)){
						while ($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<th></th>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['category']; ?></td>
						<td>RM <?php echo $row['price']; ?></td>
						<td><?php echo $r = ($row['available'] == 1) ? '<small class="text-success">action</small>' : '<small class="text-danger">hidden</small>' ; ?></td>
						<td>
							<button class="btn btn-sm btn-outline-dark">View</button>
						</td>
						<td>
							<button class="btn btn-sm btn-outline-success">Edit</button>
						</td>
						<td>
							<button class="btn btn-sm btn-outline-primary">Hide</button>
						</td>
						<td>
							<button class="btn btn-sm btn-outline-danger">Delete</button>
						</td>
					</tr>
					<?php
						}
					}
					mysqli_close($conn);
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
