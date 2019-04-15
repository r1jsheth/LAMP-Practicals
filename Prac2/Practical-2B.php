<!--
    (B) Write a PHP function to check whether number is isAutomorphic
		Number or not. isAutomorphic numbers are numbers of "n" digits whose
		squares end in the number itself. For instance, the square of 1 is 1; the square
		of 5 is 25; the square of 6 is 36;the square of 25 if 625
		
		Author: Raj
        Date Created: 2019-01-22 12:39:01

-->

<?php
	function isAutomorphic($i){
		echo "Number = ".$i;
		$Result = $i * $i;
		$f = 0;
		echo " Square = ".$Result."</br>";
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
			echo "Number is Automorphic";
		}
		else{
			echo "Number is Not Automorphic";
		}
	}
isAutomorphic(25);
?>