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