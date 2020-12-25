<?php
$username = "root";
$password = "";
$servername = "localhost";
$database = "vitals";
$conn = mysqli_connect( $servername, $username, "",$database ) or die ("server not connected");
$selectquery ="SELECT * FROM temphumid";
$query = mysqli_query($conn,$selectquery);





if($row = mysqli_fetch_array($query)){


	echo "temperature :".$row["temperature"]."<br>humiodity :".$row["humidity"]."<br>time :".$row["time"]."" ;

}

?>