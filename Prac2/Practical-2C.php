<!--
    (C) Write a PHP function that check whether user entered number is special
		number or not. For example,
		Consider the number is 59. First, find the sum of all digits (5+9=14). Second,
		find multiplication of all digits (5*9=45). Then find addition of sum and
		multiplication of all digits (14+45=59). If it is same as number itself, than it
		is a special number.
		
		Author: Raj
        Date Created: 2019-01-22 12:39:01

-->


<?php
function isSpecial($i){
	echo "Input Number " . $i . " is ";	
	$sum = 0;
	$multiplication = 1;
	$t = $i;
	$final = 0;
	$digit;
	while($i >= 1){
		$digit = ($i)%10;	
		$sum += $digit;
		$multiplication = ($digit)*($multiplication);
		$i = (int)($i)/10;
	}
	if ($sum + $multiplication === $t) {
		echo "Special";
	}
	else
		echo "Not Special";
}
isSpecial(59);
?>