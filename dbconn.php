<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "superuser";
    $db_name = "web";

    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection to Database Failed: " . $conn->connect_error);
    } else {
        echo "Connection to Database Successful<br>"; // Προσωρινή προσθήκη για debugging
    }
?>
