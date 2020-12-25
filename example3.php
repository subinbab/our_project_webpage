<?php



$email=$_GET['email'];



$conn=mysqli_connect("localhost","root","","vitals") or die ("not connected") ;

$s=" select * from userdata where email= '$email'";

$result1 = mysqli_query($conn,$s);

$row=mysqli_fetch_array($result1);




?>

<html>

<head>

//css

<style>

table

{

border-style:solid;

border-width:2px;

border-color:pink;

}

</style>

</head>

<body bgcolor="#EEFDEF">

<?php



 

$status="stay";
$sql="select * from patientsdata where status='$status'";
$result = $conn->query($sql);

 

echo "<table border='1'>

<tr>
    <th>NAME</th><th>REGISTER NUMBER</th> <!This is HTML table heading>
    </tr>";

 

while($row = mysql_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['name'] . "</td>";

  echo "<td>" . $row['regnumber'] . "</td>";

  ;

  }

echo "</table>";

 

mysql_close($con);

?>

</body>

</html>