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
        echo "<br> Hello! Last Visit:<br>" . $cookieData . "<br>";
    }
    else{
        echo "You're visiting first time!";
    }

    // Returns an associative array containing the date information of the timestamp, 
    // or the current local time if no timestamp is given.
    // function getdate ($timestamp = null) {}
    // Get date/time information
    $cookieDate = getdate();
    $dd = $cookieDate['mday'];
    $mm = $cookieDate['mon'];
    $yy =  $cookieDate['year'];
    $HH = $cookieDate['hours'];
    $MM = $cookieDate['minutes'];
    $SS = $cookieDate['seconds'];
    $datestring = "<b>Date:</b> $dd - $mm - $yy <br><b>Time</b>: $HH : $MM : $SS <br>"; 
    
    // cookie expires after 30 seconds bcz time() measures time in seconds
    setcookie("dateVal", $datestring, time() + (30));


    
?>


<html>
<head>
    <title>Practical-8 16BIT031</title>
</head>


</html>