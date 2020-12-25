<?php

session_start();


$conn=mysqli_connect("localhost","root","","vitals");

/*$name=$_POST["name"];
$role=$_POST["role"];
$contact=$_POST["contact"];*/
$pass1=$_POST["pass1"];
$pass2=$_POST["pass2"];

if (empty($_POST["name"])) 
	{echo " <br> Please insert a USERNAME";}
elseif (empty($_POST["role"])) {
	echo "<br>please enter role";
}
elseif (empty($_POST["contact"])) {
	echo "<br>please enter contacts";
}
elseif(empty($_POST["email"]))
{
	echo "<br> please enter email";


}

elseif(true){
	 $conn=mysqli_connect("localhost","root","","vitals") ;

	 $name=$_POST["name"];
	 $role=$_POST["role"];
	 $email=$_POST["email"];

	 $namenum="select*from userdata where name='$name'";
	 $rolenum="select*from userdata where role='$role'";
	 $emailnum="select*from userdata where email='$email'";

	 $queryname=mysqli_query($conn,$namenum);
	 $queryrole=mysqli_query($conn,$rolenum);
	 $queryemail=mysqli_query($conn,$emailnum);

	 $numbername = mysqli_num_rows($queryname);
	 $numberrole=mysqli_num_rows($queryrole);
	 $numberemail=mysqli_num_rows($queryemail);

	 /*echo $numbername;
	 echo $numberrole;
	 echo $numberemail;*/
	 if($numbername>0&$numberrole>0&$numberemail>0){
	 	echo "user also registered";
	 }
	 elseif($pass1==$pass2)
         {

           $conn=mysqli_connect("localhost","root","","vitals") ;

           $password=$pass1;
           $name=$_POST["name"];
           $role=$_POST["role"];
           $contact=$_POST["contact"];
           $email=$_POST["email"];
           echo "<br>successfully registered";

           $query="insert into userdata(name,role,contact,email,pass) values ('$name','$role','$contact','$email','$password')";
           mysqli_query($conn, $query);
         }
     else {
	       echo "<br>please enter password correctly";
          }


}




?>