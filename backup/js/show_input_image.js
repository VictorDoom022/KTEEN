function readURL(input) {
	if (input.files && input.files[0]) {
		target = $(input).attr("data-target");
		var reader = new FileReader();
		reader.onload = function(e) {
			$(target).attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}