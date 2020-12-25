<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

$regnumber=$_GET["regnumber"];

$status="discharged";

$conn=mysqli_connect("localhost","root","","vitals") or die("not connected");

//echo "connected  ";


$sql="UPDATE patientsdata SET status ='$status' WHERE regnumber='$regnumber'";

if(mysqli_query($conn,$sql)){

	echo "recorded succesfully";

}
else{

	echo "error updating record :".mysqli_error($conn);
}

?>

</body>
</html>

