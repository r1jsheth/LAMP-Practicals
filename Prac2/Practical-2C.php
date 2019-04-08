<?php
function special($i){
	echo "number ".$i." is ";	
	$sum=0;
	$multiplication=1;
	$t=$i;
	$final=0;
	$digit;
	while($i>=1){
		$digit=($i)%10;	
		$sum+=$digit;
		$multiplication=($digit)*($multiplication);
		$i=(int)($i)/10;
	}
	if ($sum+$multiplication == $t) {
		echo "Special";
	}
	else
		echo "Not Special";
}
special(59);
?>