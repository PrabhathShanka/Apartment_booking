<?php

$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "e_chargezone_iot_project"; 

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
} 

echo "Database connection is OK<br>"; 

?>