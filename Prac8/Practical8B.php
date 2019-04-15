<!--
    (B) Write a PHP program to store page views count in SESSION, to
        increment the count on each refresh, and to show the count on web page.
        
        Author: Raj
        Date Created: 2019-04-15 22:39:01
-->

<?php  
  
    session_start(); 
    
    if(isset($_SESSION['views'])) 
        $_SESSION['views'] = $_SESSION['views'] + 1; 
    else
        $_SESSION['views'] = 1; 
        
    echo "views = " . $_SESSION['views']; 
    
?> 


<html>
<head>
    <title>Practical-8 16BIT031</title>
</head>


</html>