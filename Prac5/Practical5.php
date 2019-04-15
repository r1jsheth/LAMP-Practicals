<!--
    (A) Derive a class square from class Rectangle. Create one more class circle.
		Create an interface with only one method called area(). Implement this
		interface in all the classes. Include appropriate data members and
		constructors in all classes. Write a program to accept details of a square,
		circle and rectangle and display the area.
        
        Author: Raj
        Date Created: 2019-04-15 22:39:01
-->





<!DOCTYPE html>
<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
?>
<html>
<head>
	<title>Area of any Shape</title>
</head>
<body>
<?php

	// Main Interface
	interface Shape{
		function calcArea();
		function calcPerimeter();
	}

	// Circle class
	class Circle implements Shape {
		private $radius;
		private $PI = 3.1415;
		public function __construct($rad){
			$this->radius = $rad;
		}
		function calcArea(){
			return $this->PI * $this->radius * $this->radius;
		}
		function calcPerimeter(){
			return $this->PI * 2 * $this->radius;
		}
	}
	class Rectangle implements Shape{
		private $len,$wid;
		public function __construct($length, $width){
			$this->len = $length;
			$this->wid = $width;
		}
		function calcArea(){
			return $this->len * $this->wid;
		}
		function calcPerimeter(){
			return 2 * ($this->len + $this->wid);
		}
	}


	// Square inherits propertied of Rectangle class
	class Square extends Rectangle{
		private $length;
		public function __construct($len){
			parent::__construct($len,$len);
		}
		function calcArea(){
			return parent::calcArea();
		}
		function calPerimeter(){
			return parent::calcPerimeter();
		}
	}
?>
	<form action="#" method="post">
	<h2>Circle</h2>
	Radius: 
	<input type="text" name="rad">
	<hr>
	<h2>Rectangle</h2>
	Height: <input type="text" name="height">
	Width: <input type="text" name="width">
	<hr>
	<h2>Square</h2>
	Height: <input type="text" name="length">
	<hr>
	</br></br>
	<button name="calc">Calculate Area</button>
	</form>
<?php
	if(isset($_POST['calc'])){
		
		if(empty($_POST['rad'])){
			echo "<br><font color=\"red\" style=\"font-weight: bold;\">Input Circle Radius!</font><br>";
		}
		else{
			//Circle:
			$circle1 = new Circle($_POST['rad']);
			$ans = $circle1->calcArea();
			echo "<br><br><strong>Circle::</strong><br> Area = $ans";
			$ans = $circle1->calcPerimeter();
			echo "&nbsp;&nbsp;Perimeter = $ans";
		}
		if(empty($_POST['height']) && empty($_POST['width'])){
			echo "<br><font color=\"red\" style=\"font-weight: bold;\">Input Rectangle width and height!</font><br>";
		}
		else{
			//Rectangle
			$rectangle1 = new Rectangle($_POST['height'],$_POST['width']);
			$ans = $rectangle1->calcArea();
			echo "<br><br><strong>Rectangle::</strong><br> Area = $ans";
			$ans = $rectangle1->calcPerimeter();
			echo "&nbsp;&nbsp;Perimeter = $ans";
		}
		if(empty($_POST['length'])){
			echo "<br><font color=\"red\" style=\"font-weight: bold;\">Input Rectangle width and height!</font><br>";
		}
		else{
			//Square
			$square1 = new Square($_POST['length']);
			$ans = $square1->calcArea();
			echo "<br><br><strong>Rectangle::</strong><br> Area = $ans";
			$ans = $square1->calcPerimeter();
			echo "&nbsp;&nbsp;Perimeter = $ans";
		}
	}
	?>
</body>
</html>