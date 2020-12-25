<?php




$email = $_POST['email'];
$pass = $_POST['pass'];

$conn=mysqli_connect("localhost","root","","vitals") ;

$s=" select * from userdata where email= '$email'";
$a="select *from userdata where pass='$pass'";

$result1 = mysqli_query($conn,$s);
$result2 = mysqli_query($conn,$a);

$nums1 = mysqli_num_rows($result1);
$nums2=mysqli_num_rows($result2);


if($nums1>0 & $nums2>0)
{

    header("Location:redirect.php?email=".$email);
    exit();



}
else {
	echo "not registered";}


?>



