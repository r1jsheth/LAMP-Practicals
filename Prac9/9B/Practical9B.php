<!-- 

	(B) Write a program to read a flat file student.dat and display
		the data from file in tabular format also calculate the
		percentage.
		
		Author: Raj
		Date Created: 2019-04-16 19:15:06
 
 -->



<html>
<head>
	<title>Practical-9B 16BIT031</title>
	<style type="text/css">
		

	</style>
</head>
<body>


<?php

	
	// File data stored in student.dat file

	$myfile = fopen("student.dat", "r") or die("Unable to open file!");
	echo "<table border = 0 cellpadding = 10>";
	$rowCount = 0;
	while(!feof($myfile)) {
		echo "<tr>";
		$curLine = fgets($myfile);
		$arrVal = explode("|", $curLine);
		if ($rowCount == 0) {

			// 1st Row contains Header
			foreach ($arrVal as $val) {
				echo "<th>";
				echo $val . "   ";
				echo "</th>";
			}
			echo "<th>";
			echo "Percentage";
			echo "</th>";
		}
		else{

			// Last 3 values in array contains marks.
			$totMarks = $arrVal[3]+$arrVal[4]+$arrVal[5];
			foreach ($arrVal as $val) {
				echo "<td>";
				echo $val . "   ";
				echo "</td>";
			}
			echo "<td><b>";
			$perAns = (float)$totMarks/3;
			echo number_format($perAns,2);
			echo "</b></td>";

		}
		echo "/<tr>";
		$rowCount++;
	}
	echo "</table>";

?>
</body>
</html>