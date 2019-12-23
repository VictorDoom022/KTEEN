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
					$sql = "SELECT * FROM inventory where stall_ID = '$stallID'".$searchword;
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
				?>
					<div class=" col-12 col-md-6 col-lg-4 p-1">
						<a href="#modal<?php echo $row['ID']; ?>" class="text-decoration-none text-reset" data-toggle="modal">
							<div class="k-card card k-hover-shadow">
								<div class="row no-gutters">
									<div class="col-8">
										<div class="card-body">
											<div class="card-title mb-0">
												<?php echo $row['name']; ?>
											</div>
											<div class="card-text">
												<small class="text-muted mt-0">
													<?php echo $row['description']; ?>
												</small>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>

					<!-- modal -->
					<div class="modal fade" id="modal<?= $row['ID']; ?>" role="dialog">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<div class="row">
										<div class="col-8 pt-4">
											<div class="row pb-2">
												<div class="col">
													<div class="row">
														<small class="text-muted col">Name</small>
														<div class="w-100"></div>
														<div class="col">
															<?php echo $row['name']; ?>
														</div>
													</div>
												</div>
												<div class="col">
													<div class="row">
														<small class="text-muted col">Unit type</small>
														<div class="w-100"></div>
														<div class="col">
															<?php echo $row['unit']; ?>
														</div>
													</div>
												</div>
											</div>
											<div class="row pb-2">
												<div class="col">
													<div class="row">
														<small class="text-muted col">Price per Unit (RM)</small>
														<div class="w-100"></div>
														<div class="col">
															<?php echo $row['price']; ?>
														</div>
													</div>
												</div>
												<div class="col">
													<div class="row">
														<small class="text-muted col">Date added</small>
														<div class="w-100"></div>
														<div class="col">
															<?php echo $row['date']; ?>
														</div>
													</div>
												</div>
											</div>
											<div class="row pb-2">
												<div class="col">
													<div class="row">
														<small class="text-muted col">Description</small>
														<div class="w-100"></div>
														<div class="col">
															<?php echo $row['description']; ?>
														</div>
													</div>
												</div>
												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col text-right">
											<button class="btn text-secondary" data-dismiss="modal">Close</button>
											<a href="edit_inventory.php?ID=<?= $row['ID']; ?>" class="btn text-warning">Edit</a>
											<button class="btn text-danger" onclick="ComfirmDelete('<?= $row['ID']; ?>')">Delete</button>
											<a href="purchase_send.php?ID=<?= $row['ID']; ?>" class="btn text-primary">Purchase</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- modal end -->
				<?php
					}
				}
				?>
				</div>