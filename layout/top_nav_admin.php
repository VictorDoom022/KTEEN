<?php
$icon = '';
switch ($site) {
    case 'Stall':
        $icon = '<i class="fas fa-store d-inline-flex mr-2"></i>';
        break;
    case 'Menu':
        $icon = '<i class="fas fa-bars d-inline-flex mr-2"></i>';
        break;
    case 'Report':
        $icon = '<i class="far fa-check-square d-inline-flex mr-2"></i>';
        break;
}
?>

<nav class="k-top-nav navbar navbar-expand-lg navbar-light bg-white col-10 pl-4 border-bottom">
	<span class="navbar-brand h1 mb-0 col"><?= $icon.$site; ?></span>
	<ul class="navbar-nav px-4">
		<li class="nav-item">
			<a href="index.php?logout='1'" class="btn btn-outline-dark" role="button" aria-pressed="true">Log Out</a>
		</li>
	</ul>
</nav>