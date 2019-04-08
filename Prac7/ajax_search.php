<?php
    // @author: Raj 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $db=new mysqli('localhost','raj','raj','shopping');
    $sql="SELECT * FROM products";
    extract($_POST);

    if(empty($low)){
        $query1 = "SELECT MIN(price) FROM products";
        $result = mysqli_query($db,$query1) or die(mysqli_error()); 
        while($row = mysqli_fetch_assoc($result)){
            $low = $row['MIN(price)'];
        }
    }
    if(empty($high)){
        $query2 = "SELECT MAX(price) FROM products";
        $result = mysqli_query($db,$query2) or die(mysqli_error()); 
        while($row = mysqli_fetch_assoc($result)){
            $high = $row['MAX(price)'];
        }
    }
    if(isset($size) && isset($gender)){ 
        $sql.=" WHERE size IN (".implode(',', $size).") AND gender = '$gender' 
                AND price >= $low and price <= $high";
    }
    if(isset($size) && !isset($gender)){ 
        $sql.=" WHERE size IN (".implode(',', $size).")
                AND price >= $low and price <= $high";
    }
    if(!isset($size) && isset($gender)){ 
        $sql.=" WHERE gender = '$gender'
                AND price >= $low and price <= $high";
    }
    $all_row=$db->query($sql);
    
?>
<?php if(isset($all_row) && is_object($all_row) && count($all_row)): $i=1;?>
    <?php foreach ($all_row as $key => $product) { ?>
    <div class="col-sm-3 ">		
    	<div class="well">
    		<h3 class="text-info"><?php echo $product['name']; ?></h3>
    		<p>Size : <?php echo $product['size']; ?></p> 
            <p>For : <?php echo ucfirst($product['gender']); ?></p>          		         
    		<p><?php echo $product['description']; ?></p>
    		<hr>
    		<h4>₹ <?php echo $product['price']; ?> </h4>
    		<hr>
          <p><a class="btn btn-default btn-lg" href="#"><i class="icon-ok"></i> Add cart</a></p>
        </div>
    </div>
   <?php } ?>
<?php endif; ?>
   