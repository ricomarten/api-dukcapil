<?php
error_reporting(E_ALL);
$servername = "localhost";
$database = "api-dukcapil";
$username = "root";
$password = "123456";

// Create connection

$connect = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$connect) {
    echo("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysqli_close($connect);


?>
