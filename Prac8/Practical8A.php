<!--
    (A) Write a PHP program to store current date-time in a COOKIE and
        display the 'Last visited on' date-time on the web page upon reopening of
        the same page.
        
        Author: Raj
        Date Created: 2019-04-15 22:16:12
-->


<?php

    // Uncomment the following line to see 'all stored cookies in the browser'
    // print_r($_COOKIE);

    if(isset($_COOKIE['dateVal'])){
        $cookieData = $_COOKIE['dateVal'];
        echo "<br> Hello! Last visted date: " . $cookieData . "<br>";
    }
    else{
        echo "You're visiting first time!";
    }
    $curDate = getdate();
    $dd = $curDate['mday'];
    $mm = $curDate['mon'];
    $yy =  $curDate['year'];
    $HH = $curDate['hours'];
    $MM = $curDate['minutes'];
    $SS = $curDate['minutes'];
    $datestring = "$dd - $mm - $yy and $HH:$MM:$SS"; 
    
    // cookie expires after 30 seconds bcz time() measures time in seconds
    setcookie("dateVal", $datestring, time() + (30));


    
?>


<html>
<head>
    <title>Practical-8 16BIT031</title>
</head>


</html>