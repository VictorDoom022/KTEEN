<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_if_logout_stall.php';
include '../process/handle_delete_notification.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- Bootstarp CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Notification</title>
</head>
<body>
	<?php
	$site = "Notifications";
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>
	<main class="container-fluid">
		<div class="row pt-3">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="container-fluid">
					<?php
					$stall_id = $_SESSION['kteen_stall_id'];
					$sql = "SELECT ID, unread, title, parameter, created_date FROM notifications WHERE recipient_id = '$stall_id' ORDER BY ID DESC;";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
					?>
					<div class="k-card card k-hover-shadow mb-2 hover-show">
						<div class="card-body" style="position: relative;">
							<div class="hover-show-item" style="position: absolute;right: 0;padding: 0 20px;">
								<a href="notifications.php?dnid=<?= $row['ID']; ?>" title="Delete" class="text-muted">
									<i class="far fa-trash-alt"></i>
								</a>
							</div>
							<div class="h5 <?= ($row['title'] == 'approve')? 'text-success' : '' ; ?>">
								<?= ucfirst($row['title']) ?><?= ($row['unread'] == '0')? ' <span class="badge badge-danger">New</span>' : ''; ?>
							</div>
							<div>
								<?= $row['parameter']; ?>
							</div>
							<div class="text-right text-muted">
								<small><?= $row['created_date']; ?></small>
							</div>
						</div>
					</div>
					<?php		
						}
					}
					$sql = "UPDATE notifications SET unread = '1';";
					mysqli_query($conn, $sql);
					?>
				</div>
			</div>
		</div>
	</main>
	<script src="https://kit.fontawesome.com/586e3dfa1f.js" crossorigin="anonymous"></script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>