<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "ndp";
    
    // Try to establish a connection
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    
    // Check if the connection was successful
    if ($conn) {
        echo "Connection to Database Successful" . "<br>";
    } else {
        echo "Connection to Database Failed: " . mysqli_connect_error() . "<br>";
    }
?>
    