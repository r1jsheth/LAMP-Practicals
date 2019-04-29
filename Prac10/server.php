<!--
        Write down client server programs using PHP socket programing
        functions for the followings:
        1. Client sent number to the server. Once client receive
        response from the server, it display factNum to the user.
        2. Server calculate findFactorial of the number and send
        response to the client.
        
        Author: Raj
        Date Created: 2019-04-16 19:54:40

        This file contains logic of server.php

-->


<?php
    // @author: Raj
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>

<html>

<head>
	<title>Server 16BIT031</title>
</head>

<body>

<h1>Server </h1>
<?php

    function findFactorial($num){
        $fact = 1;
        for ($i = 1; $i <= $num; $i++) { 
            $fact *= $i;
        }
        return $fact;
    }

    // SERVER Side Code
    echo "Sever:" . "</br>";
    

    // set some variables
    $host = "127.0.0.1";
    $port = 26104;
    
    // 0 suggests infinte time: don't timeout!
    set_time_limit(30);
    
    
    // create socket
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
    
    // bind socket to port
    $result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
    
    // start listening for connections // @author: Raj
    $result = socket_listen($socket, 3) or die("Could not set up socket listener\n");

    // accept incoming connections
    // spawn another socket to handle communication
    $spwn = socket_accept($socket) or die("Could not accept incoming connection\n");
    
    
    // read client numAsked
    $numAsked = socket_read($spwn, 1024) or die("Could not read input\n");
    
    
    // clean up numAsked string
    $numAsked = (int)(trim($numAsked));
    echo "Client Asked Factorial of : ".$numAsked . "</br>";
    
    // Find factorial of numAsked and send back
    $factNum = findFactorial($numAsked);
    
    socket_write($spwn, $factNum, strlen ($factNum)) or die("Could not write factNum\n");
    
    // close sockets
    socket_close($spwn);
    socket_close($socket);
    
?>


</body>

</html>