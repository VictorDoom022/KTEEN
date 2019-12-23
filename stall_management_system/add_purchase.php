<?php
session_start();
include '../config/config.php';
include '../process/handle_logout.php';
include '../process/handle_add_purchase.php';


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<!-- bootstrap material -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous"> -->

<style>
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
	    /* display: none; <- Crashes Chrome on hover */
    	-webkit-appearance: none;
    	margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
	}

	input[type=number] {
    	-moz-appearance:textfield; /* Firefox */
	}
	</style>
</head>
<body class="bg-light">
	<?php 
	$site = 'Purchase';
	include '../layout/top_nav_stall.php';
	include '../layout/side_nav_stall.php';
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-2"></div>
			<main class="col-10 p-4">

			<ul class="nav nav-tabs" id="myTab" role="tablist">
  				<li class="nav-item">
    				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Invoice</a>
  				</li>
  				<li class="nav-item">
    				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Cash Bill</a>
  				</li>
 				<li class="nav-item">
    				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Receipt</a>
  				</li>
			</ul>

			<div class="tab-content" id="myTabContent">
				<!-- Invoice tab -->
					<?php include 'add_purchase_invoiceTab.php' ?>
				<!-- End of invoice tab -->

				<!-- Cash Bill Tab -->
					<?php include 'add_purchase_billTab.php' ?>
				<!-- End of Cash Bill Tab -->

				<!-- Receipt Tab -->
				<?php include 'add_purchase_receiptTab.php' ?>
			</div>
  					
				
			</main>
		</div>
	</div>
</body>

<script>
	function calDate(){
		var invoice_date = document.getElementById('invoice_date').value;
		var invoice_due = document.getElementById('invoice_due').value;

		var x = new Date(invoice_date);
		var y = new Date(invoice_due);
		console.log();

		if (y < x) {
			alert("The payment date cannot be earlier than payment date!");
			//invoice_date.val('0000-00-00');
		}
	}

	$(document).change(function(){
    var ID = document.getElementById("test").value;
    //var ID = $(this).val();
	console.log(ID);
    //var ID = 6;
    var dataString = "ID=" + ID;
    $.ajax ({
        type: "POST",
        url: "test1.php",
        data: dataString,
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#unit').val(data.unit);
            $('#priceperunit').val(data.price);
        },
        error: function(data) {
            console.log(data);
        }
    });
});

	 
	 
	//  calculate = (idx, val) => {
	// 	 temp.splice(idx,1,val);

	// 	 var total = {
	// 		 quantity: [],
	// 		 price: []
	// 	 };

	// 	 var cul = 0;

	// 	 for (let y = 0; y < temp.length; y++) {
	// 		 if (y % 2 == 0) {
	// 			 total.quantity.push(temp[y]);
	// 		 }else{
	// 			 total.price.push(temp[y]);
	// 		 }
			 
	// 	 }

	// 	 for (let z = 0; z < total.quantity.length; z++) {
	// 		 let hucheng = total.quantity[z] * total.price[z];
			 
	// 		 document.querySelectorAll(".output")[z].innerHTML = hucheng;
	// 		 cul += hucheng;
	// 	 }

	// 	 document.querySelector("#total").innerHTML = cul;
	// 	 //document.querySelector("#total").value = cul;
	// 	 console.log(cul);
	//  }

	


</script>
</html>