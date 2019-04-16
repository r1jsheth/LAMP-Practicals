<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $host = 'localhost';
    $uname = 'raj';
    $pass = 'raj';
    $dbname = 'viewcount';

    $conn = mysqli_connect($host,$uname,$pass,$dbname);

    echo "done";
?>

