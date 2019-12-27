<?php
session_start();
include '../config/config.php';

$stall_ID = $_SESSION['kteen_stall_id'];
//get current time
date_default_timezone_set("Asia/Kuala_Lumpur");
$current_time = time();
$weekday_today = date('w', $current_time) - 1;

$sql = "SELECT COUNT(ID) AS orders, WEEKDAY(DATE(date)) AS weekday FROM orders WHERE stall_ID = '$stall_ID' AND  DATE > DATE_SUB(DATE(NOW()), INTERVAL DAYOFWEEK(NOW())+6 DAY) AND DATE <= DATE_ADD(DATE(NOW()), INTERVAL DAYOFWEEK(NOW())+1 DAY)  GROUP BY DATE(date);";
$result = mysqli_query($conn, $sql);

$total = 0;

switch ($weekday_today) {
	case '0':
		$weekday_data = array('Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Monday');
		$temp = array(1, 2, 3, 4, 5, 6, 0);
		break;
	case '1':
		$weekday_data = array('Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Monday', 'Tuesday');
		$temp = array(2, 3, 4, 5, 6, 0, 1);
		break;
	case '2':
		$weekday_data = array('Thursday', 'Friday', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday');
		$temp = array(3, 4, 5, 6, 0, 1, 2);
		break;
	case '3':
		$weekday_data = array('Friday', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday');
		$temp = array(4, 5, 6, 0, 1, 2, 3);
		break;
	case '4':
		$weekday_data = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
		$temp = array(5, 6, 0, 1, 2, 3, 4);
		break;
	case '5':
		$weekday_data = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
		$temp = array(6, 0, 1, 2, 3, 4, 5);
		break;
	case '6':
		$weekday_data = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
		$temp = array(0, 1, 2, 3, 4, 5, 6);
		break;
}

$count_order = array(0, 0, 0, 0, 0, 0, 0);

if(mysqli_num_rows($result) > 0){
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($data, $row);
		$total += $row['orders'];
	}

	for ($i=0; $i < count($data); $i++) { 
		$index = array_search($data[$i]['weekday'], $temp);
		$count_order[$index] = $data[$i]['orders'];
	}
}
?>
<div class="k-card bg-white h-100">
	<div class="card-body">
		<div class="h3">Total orders</div>
		<hr>
		<div class="row">
			<div class="col-6" style="position: relative;">
				<span class="h2 text-center" style="position: absolute;top: 50%; left: 50%;transform: translate(-50%, -50%);"><?= $total; ?></span>
			</div>
			<div class="col-6">
				<canvas id="total_order_chart">Your browser does not support the HTML5 canvas tag.</canvas>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var ctx = document.getElementById('total_order_chart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: <?php echo json_encode($weekday_data, JSON_NUMERIC_CHECK); ?>,
	        datasets: [{
	            label: 'Orders',
	            data: <?php echo json_encode($count_order, JSON_NUMERIC_CHECK); ?>,
		        borderColor: 'rgba(0, 0, 0)',
	        }],
	    },
	    options: {
	    	// responsive: false,
	        scales: {
	        	xAxes: [{
	        		display: false
	        	}],
	            yAxes: [{
                    display: false
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