<?php
$icon = '';
switch ($site) {
    case 'Home':
        $icon = '<i class="fas fa-home d-inline-flex mr-2"></i>';
        break;
    case 'Menu':
        $icon = '<i class="fas fa-bars d-inline-flex mr-2"></i>';
        break;
    case 'Order':
    	$icon = '<i class="fas fa-clipboard-list d-inline-flex mr-2"></i>';
    	break;
}
?>

<nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-10 bg-white border-bottom">
	<span class="navbar-brand h1 mb-0 col"><?= $icon.$site ?></span>
	<ul class="navbar-nav px-4 ml-auto">
		<li class="nav-item dropdown">
			<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <img class="rounded-circle" style="height: 40px;width: 40px;" src="../images/<?= $_SESSION['image_folder']; ?>/staff/<?= $_SESSION['staff_image']; ?>">
			    <?= $_SESSION['staff_name']; ?>
			</a>
			<div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="navbarDropdown">
				<a href="" class="dropdown-item">setting</a>
				<a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
			</div>
		</li>
	</ul>
</nav>