<?php

$temperature = $_GET['temp'];
$humidity = $_GET['hum'];
$reference = $_GET['rfid'];

//<a href="viewtemp.php" class="btn btn-success"> click to enter vital details details </a>

$username = "root";
$password = "";
$servername = "localhost";
$database = "vitals";

$conn = mysqli_connect( $servername, $username, "",$database ) or die ("server not connected");



//$reference = time();
$query = "INSERT INTO temphumid ( temperature, humidity,reference) VALUES ( ".$temperature.", ".$humidity.",".$reference.")";

$result = mysqli_query( $conn, $query );


?>