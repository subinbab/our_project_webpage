<?php
echo "successful";

$name = $_POST['name'];
$regnumber = $_POST['regnumber'];
$age = $_POST['age'];
$disease = $_POST['disease'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$status="stay";
$conn=mysqli_connect("localhost","root","","vitals") or die ("not connected");

$query="insert into patientsdata(name,regnumber,age,disease,contact,email,status) values ('$name','$regnumber','$age','$disease','$contact','$email','$status')";
mysqli_query($conn, $query);

echo "successfully uploded";

?>