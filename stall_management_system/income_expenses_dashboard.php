<?php

?>
<div class="k-card bg-white h-100">
	<div class="card-body">
		<div class="h3">Income & Expenses</div>
		<hr>
		<div class="row">
			<div class="col">
				<canvas id="income_expenses_chart">Your browser does not support the HTML5 canvas tag.</canvas>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var ctx = document.getElementById('income_expenses_chart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: [ 1, 2, 3, 4, 5, 6],
	        datasets: [{
	            label: 'income',
	            fill: false,
	            data: [10, 20, 30, 20, 30, 30],
		        borderColor: 'rgba(0, 0, 255, 0.5)'
	        },{
	        	label: 'Orders',
	            fill: false,
	            data: [20, 20, 10, 20, 30, 30],
		        borderColor: 'rgba(255, 0, 0, 0.5)'
	        }],
	    },
	    options: {
	    	// responsive: false,
	        scales: {
	        	xAxes: [{
	        		gridLines: {
	        			display: false
	        		}
	        	}],
	            yAxes: [{
                    ticks: {
	                    beginAtZero: true,
	                }
	            }]
	        },
	        legend: {
	        	display: false
	        }
	        // elements: {
	        // 	point: {
	        // 		radius: 0
	        // 	}
	        // }
	    }
	});
</script>