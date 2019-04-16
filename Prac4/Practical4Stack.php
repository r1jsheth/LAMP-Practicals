<!--
    (A) Write a menu driven program to perform the following stack and queue
				related operations:
				[Hint: use Array_push(), Array_pop(), Array_shift(), array_unshift() functions]
				i. Insert an element in stack
				ii. Delete an element from stack
				iii. Display the contents of stack
        
        Author: Raj
        Date Created: 2019-02-08 10:19:01
-->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Raj Sheth 16BIT031</title>
  </head>
  <body>
  	<?php
  		ini_set('display_errors', 1);
		error_reporting(E_ALL);
     	session_start();
  	?>
    <form action="#" method="post">
		Input: 
		<input type="Number" name="element" id="element"></input><br>
		<br>
		<button name="push_btn" id="push_btn" value="push_btn">Push</button>
		<button name="pop_btn" id="pop_btn" value="pop_btn">Pop</button>
    </form>


	<?php
		function newSession(){
		  	$_SESSION['arr'] = array();
		  	// Session variables expires after 20 seconds
		  	$expiringTime = 2000;
		  	$_SESSION['expire'] = time()+$expiringTime;
		}
		function isExpired(){
			if(isset($_SESSION['expire'])){
				$now = time();
				echo "now = ".time()." and ";
				echo "expire = ".$_SESSION['expire']."</br>";
				if ($now > $_SESSION['expire']) {
					session_destroy();
					ob_clean();
					echo "Your session has expired!"."<br>";
					exit();
				}
			}
		}
		function PushValidation(){
			isExpired();
			$ele = $_POST['element'];
			if(empty($ele)){
				exit("Empty!<br>Provide proper input");
			}
		}
		function PopValidate(){
			isExpired();
			if(empty($_SESSION['arr'])){
				exit("Empty!");
			}
		}
		function push(){
			if(!isset($_SESSION['arr'])){
				newSession();
			}
			isExpired();
			array_push($_SESSION['arr'],$_POST['element']);
		}
		function pop(){
			if(!isset($_SESSION['arr'])){
				newSession();
			}
			return array_pop($_SESSION['arr']);
		}
		function disp(){
			foreach (($_SESSION['arr']) as $value) {
				echo "$value <br>";
			}
			// print_r(array_reverse($_SESSION['arr']));
		}
		if(isset($_POST['push_btn'])){
			PushValidation();
			push();
			echo "<br>";
			disp();
		}
		else if(isset($_POST['pop_btn'])){
			PopValidate();
			echo "Popped Element = ".pop()."<br>";
			disp();
		}
    ?>
    <hr>
  </body>
</html>
