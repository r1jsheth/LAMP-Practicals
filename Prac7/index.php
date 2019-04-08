<?php
  // @author: Raj
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
?>

<html>
<title>Product Search</title>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
<?php
    $db=new mysqli('localhost','raj','raj','shopping'); 
    $all_row=$db->query("SELECT * FROM products");
?>
<div class="page-header">
<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
E-commerce product sort search using PHP.</h2>
</div>
<div class="container">
     <div class="row">      
          <form id="search_form">
          <div class="col-sm-6">
            <div class="well">
                <h3 class="text-info">Search by Size</h3>
                <h4>
                <input value="32" class="sort_rang" name="size[]" value="New" type="checkbox"> 32
                <input value="36" class="sort_rang" name="size[]" value="New" type="checkbox"> 36
                <input value="38" class="sort_rang" name="size[]" value="New" type="checkbox"> 38
                </h4>
                
                <h3 class="text-info">Gender</h3>
                <h4>
                <input type="radio" class="sort_rang" value="male" id="gender" name="gender"> Male</input>
                <input type="radio" class="sort_rang" value="female" id="gender" name="gender"> Female</input>
                </h4>
                
                <h3 class="text-info">Price Range</h3>
                <h4>

                <div class="col-xs-3">
                  <input class="form-control" type="number" name="low" value="low" id="low" placeholder="Low">
                </div>

                <div class="col-xs-3">
                  <input class="form-control" type="number" name="high" value="high" id="high" placeholder="High">
                </div>

                </h4>
              <br>
              <br><br>
                <button type="reset" name="reset" id="reset" value="reset">Reset</button>
            </div>
          </div>
          </form>
        

    </div>   
    <div class="row">
      <div class="ajax_result">
      <?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
        <?php foreach ($all_row as $key => $product) { ?>	
        <div class="col-sm-3 ">
          <div class="well">
        		<h3 class="text-info"><?php echo $product['name']; ?></h3>
        		<p>Size : <?php echo $product['size']; ?></p>   
            <p>For : <?php echo ucfirst($product['gender']); ?></p>           		         
        		<p><?php echo $product['description']; ?></p>
        		<hr>
        		<h4>₹ <?php echo $product['price']; ?></h4>
        		<hr>
        </div>      
        </div>        
        <?php } ?>
      <?php endif; ?>
        <div class="col-sm-3 ">
        </div>
     </div>
	</div>      
</div>
</body>
</html>
<script type="text/javascript">
$(document).on('change','.sort_rang',function(){
   var url = "ajax_search.php";
   $.ajax({
     type: "POST",
     url: url,
     data: $("#search_form").serialize(),
     success: function(data)
     {                  
        $('.ajax_result').html(data);
     }               
   });
  return false;
});
</script>