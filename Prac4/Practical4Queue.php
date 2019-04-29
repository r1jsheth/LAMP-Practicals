<!--
	(B) Write a menu driven program to perform the following stack and queue
		related operations:
		[Hint: use array_push(), array_pop(), array_shift(), array_unshift() functions]
			iv. Insert an element in queue
			v. Delete an element from queue
			vi. Display the contents of queue

		Author: Raj
		Date Created: 2019-02-08 10:29:01
-->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Queue 16BIT031</title>
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
		<button name="endque_btn" id="endque_btn" value="endque_btn">Enqueue</button>
		<button name="deque_btn" id="deque_btn" value="deque_btn">Dequeue</button>
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
				echo "exp = ".$_SESSION['expire']."</br>";
		        if ($now > $_SESSION['expire']) {
		            session_destroy();
		            ob_clean();
		            echo "Your session has expired!"."<br>";
		            exit();
		        }
	    	}
		}
		function endqueValidation(){
			isExpired();
			$ele = $_POST['element'];
			if(empty($ele)){
				exit("Empty!<br>Provide proper input");
			}  
		}
		function dequeValidate(){
			isExpired();
			if(empty($_SESSION['arr'])){
				exit("Empty!");
			}
		}
		function enqueue(){
			if(!isset($_SESSION['arr'])){
				newSession();
			}
			array_push($_SESSION['arr'],$_POST['element']);
		}
		function dequeue(){
			if(!isset($_SESSION['arr'])){
				newSession();
			}
			return array_shift($_SESSION['arr']);
		}
		function disp(){
			foreach (($_SESSION['arr']) as $value) {
				echo "$value <br>";
			} 
			// print_r(($_SESSION['arr']));
		}
    	if(isset($_POST['endque_btn'])){
			endqueValidation();
			enqueue();
			echo "<br>";
			disp();
		}
		else if(isset($_POST['deque_btn'])){
			dequeValidate();
			echo "dequeped Element = ".dequeue()."<br>";
			disp();
		}
    ?>
    <hr>
  </body>
</html>
