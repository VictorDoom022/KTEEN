$(document).ready(function() {
	$.ajax({url: "../layout/top_nav_customer.php", success: function(result) {
			$("#nav").html(result);
		}
	});
});