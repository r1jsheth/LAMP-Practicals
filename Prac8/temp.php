
    // $ip = gethostbyname('localhost');
    // $ip2 = $_SERVER['HTTP_CLIENT_IP'];

    // echo $ip2;
    
    /* Actual Legitimate starts here.
    include 'Connection.php';
    
    //echo "done";
    
    // Track and Store current IP Address of User
    // $curUserIP = $_SERVER['REMOTE_ADDR'];
    $curUserIP = get_client_ip_env();
    echo $curUserIP." = <br>--";
    // Check if current IP exists in database
    $checkIPQuery = mysqli_query($conn, "select userip from pageview where page='yourpage' and userip='$curUserIP'");

    //print_r($checkIPQuery);
    if(mysqli_num_rows($checkIPQuery) >= 1){
        echo "<b>existing user</b>";

    }
    else{
        $insertCount = mysqli_query($conn, "INSERT INTO pageview 
                                    VALUES('','yourpage','$curUserIP')");
        $updateCount = mysqli_query($conn, "UPDATE totalview 
                                    SET totalvisit = totalvisit+1 
                                    WHERE page ='yourpage'");
        
    }
    */