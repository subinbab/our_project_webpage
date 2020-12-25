

<?php

session_start();



$regnumber=$_POST["regnumber"];
 

$conn=mysqli_connect("localhost","root","","vitals") ;


$s=" select * from temphumid where reference= '$regnumber'";
$patient="select * from patientsdata where regnumber='$regnumber'";



$result1 = mysqli_query($conn,$s);

$result2= mysqli_query($conn,$patient);

$nums1 = mysqli_num_rows($result1);

$hello="hello";

if($nums1>0){

    
    header("Location:welcomeinterface.php?regnumber=".$regnumber);
    exit();
}
else {

	echo "patient not registrered";

}

?>
 
