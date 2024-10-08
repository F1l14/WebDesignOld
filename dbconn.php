<?php
    $db_server="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="ndp";
    $conn="";

    try{
        $conn= mysqli_connect($db_server, $db_user, $db_pass, $db_name);
        echo "Conenction to Database Successful" . "<br>";
    }catch (mysqli_sql_exception){
        echo "Connection to Database Failed" . "<br>";
    }
   
?>