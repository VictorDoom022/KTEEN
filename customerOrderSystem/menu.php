<?php 
include("../config.php")
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
        <div class="k-cart-card">
            <div>
                View Cart
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
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
            </main>
            <div style="width: 350px;"></di>
        </div>
    </div>
    <script type="text/javascript">
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
    </script>
</body>
</html>