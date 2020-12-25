<?php
echo "welcome ";

$conn=mysqli_connect("localhost","root","","vitals") or die("not connected");
echo "connected";

 

           
           $name=$_POST["name"];
           $regnumber=$_POST["regnumber"];
           $time=$_POST["time"];
           
           

           $query="insert into priscription(name,regnumber,time) values ('$name','$regnumber','$time')";
           mysqli_query($conn, $query);

           echo "successfully registered";
?>