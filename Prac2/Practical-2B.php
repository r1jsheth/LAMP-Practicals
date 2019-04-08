<?php
	function automorphic($i){
		echo "number = ".$i;
		$Result = $i * $i;
		$f = 0;
		echo " square = ".$Result."</br>";
		$tmp = 0;
		$cnt=0;
		while($Result > 0){
			$tmp += ($Result%10)*pow(10,$cnt);
			if($tmp == $i){
				$f = 1;
				break;
			}
			$Result = (int) $Result/10;
			$cnt=$cnt+1;
		}
		if($f==1){
			echo "Number is AUTOMORPHIC";
		}
		else{
			echo "Number is Not AUTOMORPHIC";
		}
	}
automorphic(25);
?>