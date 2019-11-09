<?php
include '../config/config.php';
//to check table exists or notS
$sql = "SELECT ID FROM stall";
$v = mysqli_query($conn, $sql);

if($v){
	echo "true";
}else{
	echo "false";
}


if (isset($_POST['testing'])) {
	echo "<br>".$_POST['test'];
	unset($_POST['testing']);
}

 ?>
<form method="post">
	<input type="text" name="test">
	<input type="submit" name="testing">
	<input type="reset" name="">
</form>