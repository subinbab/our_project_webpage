
<?php



$email=$_GET['email'];



$conn=mysqli_connect("localhost","root","","vitals") ;

$s=" select * from userdata where email= '$email'";

$result1 = mysqli_query($conn,$s);

$row=mysqli_fetch_array($result1);




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style>

		h1{
             color:white;

		}

	</style>
</head>
<body>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container-fluid"> 
    <a class="navbar-brand" href="userregistration.php">HOME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      	
      	<li class="nav-item">
          <a class="nav-link" href="profile.php?email=<?php echo $email;?>">PROFILE</a>
        </li>
        
        
        
        
      </ul>
      
    </div>
  </div>
</nav>



<h1><?php echo "Welcome     ";  echo "".$row["name"]."<br> <br>";
 ?></h1>


</body>
</html>




<html>
<head>
  
<style style="width:200%">
table, th, td {
    border: 2px solid black;
    width: 50%;
}
</style>


</head>
<body>

	<div class="container">
		<div >

	<h3>Stayed Patients</h3>
       <?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "vitals";
       // Create connection
       $conn = new mysqli($servername, $username, $password, $dbname);
       // Check connection
       if ($conn->connect_error)  {
       die("Connection failed: " . $conn->connect_error);
       } 
       //MySQL query goes here
       $status="stay";
       $sql="select * from patientsdata where status='$status'";
       $result = $conn->query($sql);


       if ($result->num_rows > 0) {
        echo "<table>
        <tr>
       <th>NAME</th><th>REGISTER NUMBER</th> <!This is HTML table heading>
        </tr>";
       // output data of each row
       while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["name"]. "</td><td>".$row["regnumber"]."</td> <!This is HTML table data>
        </tr>";
        }
        echo "</table>";
        } else {
       echo "0 results";
       }
       $conn->close();
       ?> 

   </div>



<form action ="welcome.php" method ="POST">
	    <div class="myInput">
        <h4> Enter Patient Register Number</h4>
        <input type="text" name="regnumber" class="form-control">
        </div>
        <button class = "butt_out">click</button>
      </form>

      

  </div>
</body>
</html>