<!--
        Write down client server programs using PHP socket programing
        functions for the followings:
        1. Client sent number to the server. Once client receive
        response from the server, it display output to the user.
        2. Server calculate factorial of the number and send
        response to the client.
        
        Author: Raj
        Date Created: 2019-04-16 22:27:45

        This file contains logic of client.php

-->


<?php
    // @author: Raj
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>

<html>

<head>
	<title>Client 16BIT031</title>
</head>

<body>
<h1>Client</h1>
<?php
    $host    = "127.0.0.1";
    $port    =  26104;
    $numAsked = 5;
    echo "Factorial of Number = ".$numAsked;
    
    
    // create socket
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
    
    
    // connect to server
    $factNum = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
    
    
    // send string to server // @author: Raj
    socket_write($socket, $numAsked, strlen($numAsked)) or die("Could not send data to server\n");
    
    // get server response
    $factNum = socket_read ($socket, 1024) or die("Could not read server response\n");
    echo "</br>Factorial of Number :".$factNum;
    
    // close socket
    socket_close($socket);
    
?>


</body>

</html>