<!--
    (B) Write a PHP program to store page viewCount count in SESSION, to
        increment the count on each refresh, and to show the count on web page.
        
        Author: Raj
        Date Created: 2019-04-15 22:39:01
-->

<?php  


    /*
        This is naive approach to deal with this problem.
        Here we are simply using temporary count variable.

    */
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        session_start(); 
        if(isset($_SESSION['viewCount'])){
            $_SESSION['viewCount']++;
        }
        else{
            $_SESSION['viewCount'] = 1; 
        }
        echo "<h2>Page Hit = " . $_SESSION['viewCount']. " </h2>"; 
    
    
    
?> 


<html>
<head>
    <title>Practical-8 16BIT031</title>
</head>
<body>
<!-- <?php
    $selQuery = mysqli_query($conn, "SELECT totalvisit FROM totalview WHERE page = 'yourpage' ");
?> -->
<!-- <p>This page is viewed <?php echo mysqli_num_rows($selQuery);?> times.</p> -->
</body>


</html>