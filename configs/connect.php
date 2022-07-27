<?php
    $host = 'localhost';
    $username = 'root';
    $pass = 'root';
    $db = 'tech_store';

    $conn = mysqli_connect($host, $username, $pass, $db);
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 
    session_start();
?>

