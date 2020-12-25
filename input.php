<?php
echo "welcome";

$conn=mysqli_connect("localhost","root","","vitals") or die ("not connected");
echo("succesfully connectd");
$name=$_POST["name"];
$role=$_POST["role"];
$contact=$_POST["contact"];
$email=$_POST["email"];
?>