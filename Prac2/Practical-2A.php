<!--
    (A) Write a PHP function that check whether numbers are an amicable
		numbers or not. An amicable numbers (m,n) consists of two integers m,n
		for which the sum of proper divisors (the divisors excluding the number
		itself) of one number equals the other.
		For example let's show that 220 & 284 are amicable numbers:
		First we find the proper divisors of 220: 1, 2, 4, 5, 10, 11, 20, 22, 44, 55, 110
		If you add up all of these numbers you will see that they sum to 284.
		Now find the proper divisors of 284: 1, 2, 4, 71, 142
		These sum to 220, and therefore 220 & 284 are amicable numbers.
        
        Author: Raj
        Date Created: 2019-01-22 22:39:01
-->

<?php

function getSum($num){
	$sum=1;
	for($i=2;$i<sqrt($num)+1;$i++){
		if($num%$i==0){
			if ($i != $num/$i)
				$sum += $i+$num/$i;
			else 
				$sum += $i;
		}
	}
	return $sum;
}
function amicable($n1,$n2){
	$value1 = getSum($n1);
	$value2 = getSum($n2);
	if($value1==$n2 && $value2==$n1){
		echo "Number: ". $n1 ." , ".$n2." are amicable";
	}
	else{
		echo "Number: ". $n1 ." , ".$n2." are not amicable";
	}
}
amicable(120,284);
?>