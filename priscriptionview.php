<?php
//echo " welcome";
$conn=mysqli_connect("localhost","root","","vitals") ;//or die("<br>not connected");
//echo "connected";

$regnumber=$_GET["regnumber"];

$priscription="select* from priscription where regnumber='$regnumber'" ;

$query=mysqli_query($conn,$priscription);

//echo "<br>successfully selected";

while($column=mysqli_fetch_array($query)){

	echo "<br>".$column["name"]."     :    ".$column["time"]."";
}

?>