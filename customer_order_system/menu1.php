<?php 
include '../server/config.php';

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css -->
    <link rel="stylesheet" href="../css/kteen_style.css">
    <link rel="stylesheet" type="text/css" href="../css/kteen_cart_card.css">
    <link rel="stylesheet" type="text/css" href="../css/kteen_food_list.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    <script src="https://kit.fontawesome.com/baa8fb89d5.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>KTEEN</title>
</head>
<body class="bg-light" onload="filter()">
    <nav class="k-top-nav navbar navbar-expand-lg navbar-light pl-4 col-12 bg-white border-bottom">
        <span class="navbar-brand h1 mb-0 col">KTEEN</span>
        <ul class="navbar-nav px-4">
            <li class="nav-item">
                <?php if(isset($_SESSION['kteen_customerID'])){ ?>
                    <a href="index.php?logout='1'" class="btn btn-outline-dark" role="button" aria-pressed="true">Login</a>
                <?php }else{ ?>
                    <a href="login.php" class="btn btn-outline-dark" role="button" aria-pressed="true">Login</a>
                <?php } ?>
            </li>
        </ul>
    </nav>

    <div class="k-cart">
        <div id="left_bar"> 
            
            <form action="#" id="cart_form" name="cart_form">
            
            <div class="cart-info"></div>
            
            <div class="cart-total">
            
                <b>Total Charges:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> RM<span>0</span>
                
                <input type="hidden" name="total-hidden-charges" id="total-hidden-charges" value="0" />
            </div>
            
            <button type="submit" id="Submit">CheckOut</button>
            
            </form>
            
        </div>
    </div>

    <div class="container-fluid">
        
            <main class="p-4">
                <div class="row pb-3">
                    <div class="col-12 col-sm-5 col-md-4 col-lg-3">
                        <div class="btn-group shadow-sm m-2">
                            <button id="btn-mode" onclick="changeMode()" class="btn bg-white"><i class="fas fa-list"></i></button>
                            <select name="category" class="btn bg-white" onchange="filter()" id="categoryID">
                                <option value="">All</option>
                                <?php
                                    $sql = "SELECT * FROM category";
                                    $result = $conn -> query($sql);
                                    if($result->num_rows > 0){
                                        while($row = $result -> fetch_assoc()){
                                ?>
                                <option value="<?php echo $row['ID'] ?>"><?php echo $row['name'] ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-7 col-md-8 col-lg-9">
                        <div class="input-group shadow-sm m-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text border-0 bg-white">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <input type="search" id="search" name="search" placeholder="Search" class="form-control border-0" oninput="filter()">
                        </div>
                    </div>
                </div>
                <div id="menu"></div>
                <div id="display_item"></div>
                <div class="row">
                <?php
        			$sql = "SELECT * FROM food";
        			$result = $conn ->query($sql);

        			if($result ->num_rows>0){
        				while ($row = $result ->fetch_assoc()) {
        					$ID = $row['ID'];
        							$name = $row['name'];
        							$stall_ID = $row['stall_ID'];
        							$category_ID = $row['category_ID'];
        							$image = $row['image'];
        							$price = $row['price'];
			
			?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                <div class="k-card card k-hover-shadow h-100">
                    <div id="<?php echo $ID ?>" class="jjyy">
                        <div> 
                            <img src="../images/menu/<?php echo $image; ?>" class="items" height="100" alt="" />
                        </div>
                        <div class="card-body">
                            <br clear="all" />
                            <div class="card-text"><span class="name"><?php echo $name ?></span>: RM<span class="price"><?php echo $price ?></span> </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php
				}
			}	
			?>
            </div>
            </main>
            <div style="width: 350px;"></div>
        </div>
    </div>
    <!-- <script type="text/javascript">
        var mode = "card";

        function changeMode(){
            if (mode == "card") {
                mode = "list";
                document.getElementById("btn-mode").innerHTML = '<i class="fas fa-grip-horizontal"></i>';
            }else{
                mode = "card";
                document.getElementById("btn-mode").innerHTML = '<i class="fas fa-list"></i>';
            }
            filter();
        }

        function filter(){
            var c = document.getElementById("categoryID").value;
            var k = document.getElementById("search").value;
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("menu").innerHTML = this.responseText;
                }
            };
            if (c == "" && k == ""){
                xhttp.open("GET", "menu_"+mode+".php", true);
                xhttp.send();
                return;
            }else if(c == "" && k != ""){
                xhttp.open("GET", "menu_"+mode+".php?k="+k, true);
                xhttp.send();
                return;
            }else if(c != "" && k == ""){
                xhttp.open("GET", "menu_"+mode+".php?category="+c, true);
                xhttp.send();
                return;
            }else{
                xhttp.open("GET", "menu_"+mode+".php?category="+c+"&k="+k, true);
                xhttp.send();
            }
        }


        
    </script> -->
</body>
</html>

<script>
$(document).ready(function() {
	
	var Arrays=new Array();
	
	$('div .jjyy').click(function(){
		
		var thisID = $(this).attr('id');
		
		var itemname  = $(this).find('div .name').html();
		var itemprice = $(this).find('div .price').html();
			
		if(include(Arrays,thisID))
		{
			var price 	 = $('#each-'+thisID).children(".shopp-price").find('em').html();
			var quantity = $('#each-'+thisID).children(".shopp-quantity").html();
			quantity = parseInt(quantity)+parseInt(1);
			
			var total = parseInt(itemprice)*parseInt(quantity);
			
			$('#each-'+thisID).children(".shopp-price").find('em').html(total);
			$('#each-'+thisID).children(".shopp-quantity").html(quantity);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)-parseInt(price);
			
			prev_charges = parseInt(prev_charges)+parseInt(total);
			$('.cart-total span').html(prev_charges);
			
			$('#total-hidden-charges').val(prev_charges);
		}
		else
		{
			Arrays.push(thisID);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)+parseInt(itemprice);
			
			$('.cart-total span').html(prev_charges);
			$('#total-hidden-charges').val(prev_charges);
			
			$('#left_bar .cart-info').append('<div class="shopp" id="each-'+thisID+'"><div class="label">'+itemname+'</div><div class="shopp-price"> RM<em>'+itemprice+'</em></div><span class="shopp-quantity">1</span><img src="remove.png" class="remove" /><br class="all" /></div>');
			
		}
		
		// setTimeout('angle()',200);
	});	
	
	
	$('.remove').livequery('click', function() {
		
		var deduct = $(this).parent().children(".shopp-price").find('em').html();
		var prev_charges = $('.cart-total span').html();
		
		var thisID = $(this).parent().attr('id').replace('each-','');
		
		var pos = getpos(Arrays,thisID);
		Arrays.splice(pos,1,"0")
		
		prev_charges = parseInt(prev_charges)-parseInt(deduct);
		$('.cart-total span').html(prev_charges);
		$('#total-hidden-charges').val(prev_charges);
		$(this).parent().remove();
		
	});	
	
	$('#Submit').livequery('click', function() {
		
		var totalCharge = $('#total-hidden-charges').val();
		
		$('#left_bar').html('Total Charges: RM'+totalCharge);
		
		return false;
		
	});	
	
});

function include(arr, obj) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] == obj) return true;
  }
}
function getpos(arr, obj) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] == obj) return i;
  }
}


</script>
</html>


