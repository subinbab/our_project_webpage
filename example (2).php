<?php
$regnumber=$_GET["regnumber"];
 

$conn=mysqli_connect("localhost","root","","vitals") ;


$s=" select * from temphumid where reference= '$regnumber'";
$patient="select * from patientsdata where regnumber='$regnumber'";



$result1 = mysqli_query($conn,$s);

$result2= mysqli_query($conn,$patient);

$row = mysqli_fetch_array($result2);
    $name = "".$row["name"]."";
    $age= "".$row["age"]."";
    $disease="".$row["disease"]."";
    $status="".$row["status"]."";

while ($data = $result1->fetch_assoc()){
    $sensor_data[] = $data;
}

$readings_time = array_column($sensor_data, 'time');

// ******* Uncomment to convert readings time array to your timezone ********
/*$i = 0;
foreach ($readings_time as $reading){
    // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
    $readings_time[$i] = date("Y-m-d H:i:s", strtotime("$reading - 1 hours"));
    // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
    //$readings_time[$i] = date("Y-m-d H:i:s", strtotime("$reading + 4 hours"));
    $i += 1;
}*/

$value1 = json_encode(array_reverse(array_column($sensor_data, 'temperature')), JSON_NUMERIC_CHECK);
$value2 = json_encode(array_reverse(array_column($sensor_data, 'humidity')), JSON_NUMERIC_CHECK);
//$value3 = json_encode(array_reverse(array_column($sensor_data, 'value3')), JSON_NUMERIC_CHECK);
$reading_time = json_encode(array_reverse($readings_time), JSON_NUMERIC_CHECK);

/*echo $value1;
echo $value2;
echo $value3;
echo $reading_time;*/

$result1->free();
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
          <a class="nav-link" href="discharge.php?regnumber=<?php echo $regnumber;?>"  name="regnumber" >DISCHARGED</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="priscriptionview.php?regnumber=<?php echo $regnumber; ?>">PRISCRIPTION</a>
        </li>
       
        
        
      </ul>
      
    </div>
  </div>
</nav>



<link rel="stylesheet" href="styles.css">




<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <style>
    body {
      min-width: 310px;
        max-width: 1380px;
        height: 500px;
      margin: 0 auto;
    }
    h2 {
      font-family: Arial;
      font-size: 2.5rem;
      text-align: center;
    }
  </style>




    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="examplestyle.css">
</head>
<body> 
    <div class="container">
        
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn"> 
                        
                            <header></header>
                            <div class="form-group">
                                
                                <h5>NAME :<?php echo $name; ?></h5>
                                 
                            </div>

                            <div class="form-group">
                                <h5>AGE : <?php echo $age; ?></h5>
                            </div>

                            <div class="form-group">
                                 <h5>DISEASE : <?php echo $disease; ?></h5>
                            </div>

                            <div class="form-group">
                                <h5>STATUS : <?php echo $status; ?></h5>
                            </div>

                            


                            
                        
                    </div>
                    <div class="col-md-6">
                         <div class="box">
                        
                           <form action="priscription.php" method="post">
        
        <div>
            <input type="hidden" name="regnumber" value="<?php echo $regnumber;?>">
        </div>
        <div class="tablet">
            <p>Enter tablet name</p>
          <input type="text" name="name" >
        </div>
        <div>
          <p>Enter time </p>
          <input type="text" name="time" placeholder ="morning or after noon or night">
        </div>
        <br>
        <br>
        <button class="btn btn-success">submit</button>
        <br>
        <br>
        <br>
       </form>    
                        </div>
                    
                  </div>


    
                </div> 
                <div class="col-md-6">
                    <div class="myRightCtn">
                             <body>
                                  <h2>History</h2>
                                <div id="chart-temperature" class="container"></div>
                                <div id="chart-humidity" class="container"></div>
   
                                <script>

                               var value1 = <?php echo $value1; ?>;
                                  var value2 = <?php echo $value2; ?>;
                                 //var value3 = <?php  $value3; ?>;
                                 var reading_time = <?php echo $reading_time; ?>;

                                 var chartT = new Highcharts.Chart({
                                   chart:{ renderTo : 'chart-temperature' },
                                      title: { text: ' Temperature' },
                                  series: [{
                                showInLegend: false,
                               data: value1
                               }],
                                plotOptions: {
                                line: { animation: false,
                                dataLabels: { enabled: true }
                               },
                             series: { color: '#059e8a' }
                                  },
                               xAxis: { 
                               type: 'datetime',
                                categories: reading_time
                                   },
                                  yAxis: {
                                 title: { text: 'Temperature (Celsius)' }
                               //title: { text: 'Temperature (Fahrenheit)' }
                                  },
                              credits: { enabled: false }
                               });
                              </script>
                                
                    </div>
                </div>
                
                
                
            </div>
       
  
</div>
      
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>











</body>
</html>