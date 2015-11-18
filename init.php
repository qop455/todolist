<?php
    session_start();
    
    $hostname = 'localhost';
    $dbname = 'root';
    $dbpass = 'XXXXXXX';
    $database = 'TodoList';
    
    $db= new mysqli($hostname,$dbname,$dbpass,$database);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $db->query("set names 'utf8'");
?>
