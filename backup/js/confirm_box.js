function ComfirmDelete(x){
	var confirmBox = confirm("Are you sure you want to delete?");
	if (confirmBox == true) {
		window.location.assign("index.php?del="+ x);
	}
}