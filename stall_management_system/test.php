<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | JSON - Dynamic Dependent Dropdown List using Jquery and Ajax</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 </head>
 <body>
 <form>
<select id="Test" name="Test">
    <option value="1">Name 1</option>
    <option value="2">Name 2</option>
    <option value="3">Name 3</option>
    <option value="4">Name 4</option>
    <option value="5">Name 5</option>
    <option  value="6">Name 6</option>
    <option  value="7">Name 7</option>
</select>
</form>

<input type="text" name="unit" id="unit" />
<input type="text" name="price" id="price" />
 </body>
</html>

<script>
 $(document).change(function(){
    var ID = document.getElementById("Test").value;
    //var ID = $(this).val();
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
            $('#price').val(data.price);
        },
        error: function(data) {
            console.log(data);
        }
    });
});
</script>
